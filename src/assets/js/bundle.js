"use strict";
import 'bootstrap';
import $ from 'jquery'; //https://www.npmjs.com/package/jquery | added jquery for javascript purposes.

console.log('testing raw js is ok ');
//testing jquery
$('html').addClass('mjquery');

//////
//JQ- Test
function testjs() {
    console.log('js connected via wordpress');
}

////////////////
//JQ - SCROLL TOP BTN
function scrollbackup() {
    
    //GET AND FADE ELEMENT
    var scrollTop = $(".scroll-top-btn");
    $(window).scroll(function () {
        var topPos = $(this).scrollTop();
        if (topPos > 20) {
            $(scrollTop).fadeIn();
        } else {
            $(scrollTop).fadeOut();
        }
    });

    //SCROLL PAGE
    $(scrollTop).click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
}


/////////////////////////////////////////
//DETECT IF CSS3 ANIMATIONS ARE SUPPORTED
function animatetopbar() {
    var root = document.getElementsByTagName('html')[0];
    var animation = false;
    var elem = document.createElement('div');

    if (elem.style.animationName !== undefined) {
        animation = true;
        //IF CLASS NAME EXSIT ON HTML TAG...

        if (document.querySelector('.inhabitant') !== null) {
            //IF SO ADD THE CUSTOM ANIMATION CLASS NAME
            root.className += " " + "css3animation";
        }
    }
}

//////////////////////////////////////////////////////
//JQ- DEV MODE - DISABLE ALL ANCHORLINKS DURING DEVELOPMENT
function disableLinks() {
    $('a').on('click', function (e) {
        e.preventDefault();
    });
}

////////////////////
//JQ - RUN BS4 JS ACTIONS
function bs4actions() {
    //INITIATE BS4 TOOLTIPS | https://getbootstrap.com/docs/4.0/components/tooltips/
    //use css to disable them on mobile devices | https://stackoverflow.com/a/26689836/957186
    $('[data-toggle="tooltip"]').tooltip();
}



//_tn - THE PROPER WAY TO LOAD JQUERY IN WORDPRESS
//_tn - RUN ALL SCRIPTS
jQuery(document).ready(function($){
    // now you can use jQuery code here with $ shortcut formatting
    // this will execute after the document is fully loaded
    // anything that interacts with your html should go here
    testjs()
    scrollbackup();
}); 
