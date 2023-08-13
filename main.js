//
// This is The Scripts used for Simply Theme
//
function main() {
(function () {
   'use strict'
	//Script
	//-----------------------------------
    jQuery(document).ready(function($){
		var wd = $(window).width();
		
		var wd = jQuery(window).width();
		/* ---------------------------------------------- /*
			* MenuMobie
		/* ---------------------------------------------- */
		$('.rst-menu-trigger').click(function(){
			$('.menu-main').slideToggle(400);
			$(this).toggleClass('exit');
			$(this).parents('#header').toggleClass('click-menu');
			return false;
		});
		
		$('.click-mobile').click(function(){
			$('.menu').slideToggle(400);
			return false;
		});

	});
	$('.products ul li a').click(function() { 
			
		var id = $(this).attr('href');
		$('.active').removeClass('active');
		$(this).addClass('active');
		$('.inner-box').hide();
		$(id).show();
		return false;
	});
	$('.slide').slick({
		infinite: true,
		arrows:true,
		slidesToShow: 1,
		slidesToScroll: 1
		
	})
	$('.slider2').slick({
		infinite: true,
		arrows:true,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
		{
		breakpoint: 1200,
		settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 1008,
		settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 800,
		settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 576,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
		},
		},
	  ], 	

	})
	$('.slider3').slick({
		infinite: true,
		arrows:true,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
		{
		breakpoint: 1200,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 1008,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 800,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 576,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
		},
		},
	  ], 	
	})
	
	jQuery(window).scroll(function($) {			
		var hg_scroll = jQuery(window).scrollTop();
		if(hg_scroll >= 150){
			jQuery('header').addClass('is-sticky-opening');
		}else{
			jQuery('header').removeClass('is-sticky-opening');
		}
		
	});
	
}());
}
main();