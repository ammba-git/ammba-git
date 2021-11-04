/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

if(Function('/*@cc_on return document.documentMode===10@*/')()){
    document.documentElement.className+=' ie10';
}

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}


// as the page loads, call these scripts
jQuery(document).ready(function($) {

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */

    /* getting viewport width */
    var responsive_viewport = $(window).width();

    /* if is below 481px */
    if (responsive_viewport < 481) {

    } /* end smallest screen */

    /* if is larger than 481px */
    if (responsive_viewport > 481) {

    } /* end larger than 481px */

    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {

        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });

		// STICKY HEADERS
        // Do our DOM lookups beforehand
		var header_container = $(".header-container");
		var nav = $(".anchor-links");

		header_container.waypoint({
			handler: function(direction) {
		    	nav.toggleClass('sticky', direction=='down');
				if (direction == 'down')
				  header_container.css({ 'height':nav.outerHeight() });
				else
				  header_container.css({ 'height':'auto' });
		    }
		});

        // Animate Tile Descriptions
        $('.overlay').on('hover', function(){
            $(this).find('.slide-descr').slideToggle('fast').delay(500);
        });


    }

    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {

    }

	/*
    ** Add all your scripts here
    */


    // External Links
    $(document).on('click', '[rel="external"]', function(event) {
        event.preventDefault();
        var href = $(this).attr('href');
        window.open(href);
    });

    $(".main-content a[href^='http://']").attr("target","_blank");

    // Email Masking
    var mailto = function(link)
    {
        link = $(link);
        var email = link.text();
        email = email.replace(/__AT__/gi, '@');
        email = email.replace(/__DOT__/gi, '.');
        var subject = (link.attr('title')) ? '?subject='+lbb.urlEncode(link.attr('title')) : '';
        link.attr('href', 'mailto:'+email+subject);
        link.text(email);
    };
    $('a.mailto').each(function() { mailto(this);});


    //Auto-Scrolling
    $('.scrollto').click(function() {
        var elementClicked = $(this).attr("href");
        var destination = $(elementClicked).offset().top;
        $("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination-50}, 1000 );
        return false;
    });


    // Fade Overlay
    $(document).ready(function() {
        $('.fade-overlay').fadeOut(300);
    });

    // Mobile Menu
    $('.toggle-menu').on('click', 'a', function(){
        $('.main-nav').slideToggle('fast');
        $('header').toggleClass('active');
    });

    // Hide News Search
    $('.show-sidebar').find('a').on('click', function(){
        $('.sidebar').slideToggle('fast');
    });

    // Move 'read more' button on news list
    $('.post').each(function(){
        var newLocation = $(this).find('.list-img-wrapper');
        $(this).find('.align-right').appendTo(newLocation);
    });

    // Adding classes to list items
    //$('.team-list li:nth-child(2n)').addClass('team-switch');

    // $('.work-list li:first-child > div, .work-list li:nth-child(4n) > div').addClass('wide');
    // $('.work-list li:nth-child(2n) > div, .work-list li:nth-child(3n) > div').addClass('square');

    // $('.work-list li:first-child, .work-list li:nth-child(4n)').addClass('lap-and-up-two-thirds');
    // $('.work-list li:nth-child(2n), .work-list li:nth-child(3n)').addClass('lap-and-up-one-third');

    // $('.work-list li:first-child p, .work-list li:nth-child(4n) p').addClass('slide-descr');
    // $('.work-list li:nth-child(2n) p, .work-list li:nth-child(3n) p').addClass('descr');

    // Waypoints
    $('.container').waypoint(function() {
        $('header').toggleClass('minimised');
    }, { offset: 60 });

    $('.container').waypoint(function() {
        $('.article-ref-box').toggleClass('sticky');
    }, { offset: 30 });


    // Align content to grid
    var alignItem = $('.align-with-grid');
    function getWidth(screenWidth) {
        var space = (screenWidth-1440)/2+40;
        $(alignItem).css('margin-left', space);            
    }
    $(window).on('resize', function(){  
        var screenWidth = $(window).width();
        if (screenWidth > 1440) {
            getWidth(screenWidth);
        } else {
            $(alignItem).css('margin-left', 0);
        }
    });

    var pushItem = $('.push-left');
    function pushLeft(screenWidth) {
        var space = (screenWidth-1440)/2+40;
        $(pushItem).css('margin-right', space);            
    }
    $(window).on('resize', function(){  
        var screenWidth = $(window).width();
        if (screenWidth > 1440) {
            pushLeft(screenWidth);
        } else {
            $(pushItem).css('margin-right', 0);
        }
    });




  // Height equal to Width

  // var cw = $('.project').width();
  // $('.project').css({'height':cw+'px'});

  // Forces the elements to be the same height, after detecting the tallest height.
    // Apply data-key="sameSize" to the elements you want to use this on.

  $(window).on('resize', function () {
        var s = $('[data-key="sameSize"]');
        var sL = s.length;
        var max = 0;
        if (sL) {
            while (sL--) {
                var $s = $(s[sL]);
                    $s.css('height', 'auto');
                    if ($s.height() > max) max = $s.height();
            }
            s.height(max);
        }
    }).trigger('resize');

}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );
