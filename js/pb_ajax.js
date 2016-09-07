jQuery(document).ready(function($){

/*==========================
	Simple Preloader
============================*/
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});


/*==========================
	Next page
============================*/
	next_page('.first-page'); // First Page
	next_page('.second-page'); // Second Page
	next_page('.third-page'); // Third Page
	next_page('.fourth-page'); // Fourth Page - Only for Tab Background purposes


/*==========================
	Previous page
============================*/
	previousPage('.second_page'); // Second Page
	previousPage('.third_page'); // Third Page
	previousPage('.fourth_page'); // Fourth Page


/*==========================
	Insert
============================*/
	insertData('.first-page', '#first-page-form');
	insertData('.second-page', '#second-page-form');
	insertData('.third-page', '#third-page-form');
	insertData('.fourth-page', '#fourth-page-form');


/*==========================
	Print "Штампај ПДФ"
============================*/
	press_printBtn('#print');







});