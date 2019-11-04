"use strict";
import 'bootstrap';
import $ from 'jquery'; //https://www.npmjs.com/package/jquery | added jquery for javascript purposes.

//////////
//JQ- Test
function testjs() {
    $('html').addClass('mjquery');
    console.log('js connected via wordpress');
}

///////////////////////////////////////////////////////////
//JQ- DEV MODE - DISABLE ALL ANCHORLINKS DURING DEVELOPMENT
function disableLinks() {
    $('a').on('click', function (e) {
        e.preventDefault();
    });
}

/////////////////////
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

/////////////////////////////
//JQ - RUN BS4 CUSTOM ACTIONS
function bs4actions() {

    //CLICK OUTSIDE THE TOP NAV BAR MENU TO CLOSE IT
    $(document).click(function (e) {
        e.stopPropagation();
        var menuOpen = $("#navbarToggleExternalContent.collapse");
        if (!$(e.target).closest(menuOpen).length) {
            menuOpen.collapse('hide');
        }
    });

    //TOGGLE THE FADE ON THE COUNT WHEN MENU IS FIRED
    var mMiniCart = $('.inhabit-mini-cart');
    $('#navbarToggleExternalContent').on('show.bs.collapse', function () {
        mMiniCart.fadeOut();
    });
    $('#navbarToggleExternalContent').on('hide.bs.collapse', function () {
        mMiniCart.fadeIn();
    });
}

//_tn - THE PROPER WAY TO LOAD JQUERY IN WORDPRESS
jQuery(document).ready(function ($) {
    //testjs();
    //disableLinks();
    animatetopbar();
    scrollbackup();
    bs4actions();
});