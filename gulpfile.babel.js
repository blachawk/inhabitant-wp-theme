//THIS IS HOW TO RUN GULP WITH BABEL (ES2015+)
import gulp from 'gulp'; //https://github.com/gulpjs/gulp
import yargs from 'yargs'; //https://www.npmjs.com/package/yargs | a parser for gulp
import sass from 'gulp-sass'; //https://www.npmjs.com/package/gulp-sass  | sass transpiling on css
import cleanCSS from 'gulp-clean-css'; //https://www.npmjs.com/package/gulp-clean-css | minifies css in dist folder
import gulpif from 'gulp-if'; //https://www.npmjs.com/package/gulp-if | conditional logic for gulp
import sourcemaps from 'gulp-sourcemaps'; //https://www.npmjs.com/package/gulp-sourcemaps | this targets specific scss locations for us in dev tools
import imagemin from 'gulp-imagemin'; //https://www.npmjs.com/package/gulp-imagemin |  minify image files | It's too weak, I still prefer https://tinypng.com/
import del from 'del'; //https://www.npmjs.com/package/del | this will remove the dist folder
import webpack from 'webpack-stream'; //https://www.npmjs.com/package/webpack-stream | using webpack inside of gulp (nice!!!) //https://webpack.js.org/concepts/mode/
import uglify from 'gulp-uglify'; //https://www.npmjs.com/package/gulp-uglify | this minifies to one line, which is nice, but not really needed below.  Webpack comes with its own minfy settting below.
import named from 'vinyl-named'; //https://github.com/shama/vinyl-named | give vinyl files arbitrary chunk names (i.e. the multiple js files below)
import browserSync from 'browser-sync'; //https://www.browsersync.io/ | reload our pages on save or stream it without reloading the page!
import zip from 'gulp-zip'; //https://www.npmjs.com/package/gulp-zip | packages our project when its ready for distribution.
import replace from 'gulp-replace'; //https://www.npmjs.com/package/gulp-replace | a string replacement tool.  we are using it to replace the wordpress theme name everywhere from a single file. we nust ALSO import package.json file to get the 'name' value that will be used everywhere.
import info from './package.json';

const server = browserSync.create();

const PRODUCTION = yargs.argv.prod;

//CREATE ALL PATHS WITH KEYS BELOW

const paths = {
    styles: {
        src: ['src/assets/scss/bundle.scss','src/assets/scss/admin.scss'],
        dest: 'dist/assets/css'
    },
    images: {
        src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
        dest: 'dist/assets/images'
    },
    scripts: {
        src: ['src/assets/js/bundle.js', 'src/assets/js/admin.js'],
        dest: 'dist/assets/js'
    },
    // plugins: {
    //     src: ['../../plugins/_themename-metaboxes/packaged/*'],
    //     dest: ['lib/plugins/']
    // },
    other: {
        src: ['src/assets/**/*','!src/assets/{images,js,scss}','!src/assets/{images,js,scss}/**/*'],
        dest: 'dist/assets/misc'
    },
    package: {
    src: ['**/*','!.vscode','!node_modules{,/**}','!packaged{,/**}','!src{,/**}','!.babelrc','!.gitignore','!gulpfile.babel.js','!package.json','!package-lock.json', '!_themename.zip'],
        dest: 'packaged'
    }
}

//CREATE ALL TASKS BELOW

export const serve = (done) => {
    server.init({
        port: 8081,
        proxy: "http://woo.inhabitant/"
    });
    done();
}

export const reload = (done) => {
    server.reload();
    done();
}

export const clean = () => del(['dist']);

export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error',sass.logError))
        .pipe(gulpif(PRODUCTION,cleanCSS({compatibility:'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(server.stream());
}

export const images = () => {
    return gulp.src(paths.images.src)
    .pipe(gulpif(PRODUCTION, imagemin()))

    .pipe(imagemin([
        imagemin.gifsicle({interlaced: true}),
        imagemin.jpegtran({progressive: true}),
        imagemin.optipng({optimizationLevel: 3}),
    ]))
    .pipe(gulp.dest(paths.images.dest));
}

export const watch = () => {
    gulp.watch('src/assets/scss/**/*.scss', styles);
    gulp.watch(paths.images.src, gulp.series(images, reload));
    gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
    gulp.watch('**/*.php',reload);
    gulp.watch(paths.other.src, gulp.series(copy, reload));
} 

export const copy = () => {
    return gulp.src(paths.other.src)
    .pipe(gulp.dest(paths.other.dest));
}

// export const copyPlugins = () => {
//     return gulp.src(paths.plugins.src)
//     .pipe(gulp.dest(paths.plugins.dest));
// }

export const scripts = () => {
    return gulp.src(paths.scripts.src)
    .pipe(named())
    .pipe(webpack({
        module: {
            rules: [
                {
                    test: /\.js$/,
                    use:  {
                        loader: 'babel-loader',
                        options: {
                             presets: ['@babel/preset-env']
                        }
                    }
                }
            ]
        },
        mode: 'development',
        optimization: {
            //https://webpack.js.org/configuration/optimization/
            namedModules: false,
            namedChunks: false,
            minimize: false
        },
         output: {
            filename: '[name].js'
        },

    }))
    .pipe(gulp.dest(paths.scripts.dest));
}

export const compress = () => {
    return gulp.src(paths.package.src)
    .pipe(gulpif((file)=>(file.relative.split('.').pop() !== 'zip'),replace('_tn',info.name)))
    .pipe(zip(`${info.name}.zip`))
    .pipe(gulp.dest(paths.package.dest));
}

//create a new task called build, that will build our project (run all of our tasks, one after another)
//we watch for changes on our development build
export const dev = gulp.series(clean,gulp.parallel(styles,scripts,images,copy), serve, watch);
export const build = gulp.series(clean,gulp.parallel(styles,scripts,images,copy));
//export const build = gulp.series(clean,gulp.parallel(styles,scripts,images,copy,),copyPlugins);
export const bundle = gulp.series(build,compress);

export default dev; //let gulp know that this is the default approach

