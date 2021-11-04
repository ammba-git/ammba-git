/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// IE8 ployfill for GetComputed Style (for Responsive Script below)
window.getComputedStyle||(window.getComputedStyle=function(e,t){this.el=e;this.getPropertyValue=function(t){var n=/(\-([a-z]){1})/g;t=="float"&&(t="styleFloat");n.test(t)&&(t=t.replace(n,function(){return arguments[2].toUpperCase()}));return e.currentStyle[t]?e.currentStyle[t]:null};return this});jQuery(document).ready(function(e){var t=e(window).width();t<481;t>481;if(t>=768){e(".comment img[data-gravatar]").each(function(){e(this).attr("src",e(this).attr("data-gravatar"))});var n=e(".header-container"),r=e(".anchor-links");n.waypoint({handler:function(e){r.toggleClass("sticky",e=="down");e=="down"?n.css({height:r.outerHeight()}):n.css({height:"auto"})}})}t>1030;e(".flyout").click(function(){e(this).find(".flyout__content").toggleClass("active");return!1});e("#tabs").tabs();var i=e(".main-nav"),s=e(".menu-toggle");s.click(function(){s.toggleClass("active");i.toggleClass("active");return!1});var o=e(".searchbox"),u=e(".search-toggle");u.click(function(){u.toggleClass("active");o.toggleClass("active");return!1});e("#home-slider").owlCarousel({navigation:!1,pagination:!1,slideSpeed:300,paginationSpeed:400,singleItem:!0,addClassActive:!0,autoPlay:!0});e("#testimonial").owlCarousel({navigation:!1,slideSpeed:300,paginationSpeed:400,pagination:!0,singleItem:!0,addClassActive:!0});e(".flexslider").flexslider({animation:"slide",animationLoop:!0,controlNav:!1,itemWidth:400,itemMargin:0});e("#openModal").on("click",function(e){jQuery(e.target).is("#openModal")&&(window.location="#close")});e("#newModal").on("click",function(e){jQuery(e.target).is("#newModal")&&(window.location="#close")});e("#section-1").on("click",function(e){jQuery(e.target).is("#section-1")&&(window.location="#close")});e("#section-2").on("click",function(e){jQuery(e.target).is("#section-2")&&(window.location="#close")});e("#section-3").on("click",function(e){jQuery(e.target).is("#section-3")&&(window.location="#close")});e("#section-4").on("click",function(e){jQuery(e.target).is("#section-4")&&(window.location="#close")});e(window).on("resize",function(){var t=e('[data-key="sameSize"]'),n=t.length,r=0;if(n){while(n--){var i=e(t[n]);i.css("height","auto");i.height()>r&&(r=i.height())}t.height(r);console.log(r)}}).trigger("resize");e("#mixer").mixItUp({})});(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);