/*==========================
	Initialization Tabs
============================*/
	$( "#tabs" ).tabs();

	var visibilityPage1 = $('li.page-1-display');
		var	fontColorPage1 	= $('li.page-1-display a span');
	var visibilityPage2 = $('li.page-2-display');
		var	fontColorPage2	= $('li.page-2-display a span');
	var visibilityPage3 = $('li.page-3-display');
		var	fontColorPage3 	= $('li.page-3-display a span');
	var visibilityPage4 = $('li.page-4-display');
		var	fontColorPage4 	= $('li.page-4-display a span');

	// Set Default HIDDEN Value for Tabs
		visibilityPage1.css('visibility', 'visible');
		visibilityPage2.css('visibility', 'hidden');
		visibilityPage3.css('visibility', 'hidden');
		visibilityPage4.css('visibility', 'hidden');


/*===================================
    Show all tabs if tab 4 is active
=====================================*/
    var x = window.location.href;
    if( x == 'http://localhost/PoreskiBilans/tabs.php#page-4' ){
        visibilityPage2.css('visibility', 'visible');
        visibilityPage3.css('visibility', 'visible');
        visibilityPage4.css('visibility', 'visible');
        
        visibilityPage1.css('background-color', '#2ecc71');
        fontColorPage1.css('color', '#ffffff');
        visibilityPage2.css('background-color', '#2ecc71').css('color','#ffffff');
        fontColorPage2.css('color', '#ffffff');
        visibilityPage3.css('background-color', '#2ecc71').css('color','#ffffff');
        fontColorPage3.css('color', '#ffffff');
        visibilityPage4.css('background-color', '#2ecc71').css('color','#ffffff');
        fontColorPage4.css('color', '#ffffff');
    }



/*==========================
	Next Page
============================*/
function next_page($currentPage){
	$($currentPage).on('click', function(){
        var nextPage = $(this).data('index');
        //alert(nextPage);
        if( nextPage == 1 ){
        	visibilityPage1.css('background-color', '#2ecc71');
        	fontColorPage1.css('color', '#ffffff');
        	visibilityPage2.css('visibility', 'visible');
        }
        else if ( nextPage == 2 ){
        	visibilityPage2.css('background-color', '#2ecc71').css('color','#ffffff');
        	fontColorPage2.css('color', '#ffffff');
        	visibilityPage3.css('visibility', 'visible');
        }
        else if ( nextPage == 3 ){
        	visibilityPage3.css('background-color', '#2ecc71').css('color','#ffffff');
        	fontColorPage3.css('color', '#ffffff');
        	visibilityPage4.css('visibility', 'visible');
        }
        else if ( nextPage == 4 || window.location.href == 'http://localhost/PoreskiBilans/tabs.php#page-4' ){
        	visibilityPage4.css('background-color', '#2ecc71').css('color','#ffffff');
        	fontColorPage4.css('color', '#ffffff');
            location.reload();
            window.location.href = 'http://localhost/PoreskiBilans/tabs.php#page-4';
        }
        
        $('#tabs').tabs("option", "active", nextPage);
           
    });
}



/*==========================
	Previous Page
============================*/
function previousPage($currentPage){
	$($currentPage).on('click', function(){
        var previousPage = $(this).data('index');
        //alert(previousPage);
        $('#tabs').tabs("option", "active", previousPage);
    });
}



/*=================================
    Ajax Submit Form - sending
    info into database
===================================*/ 
function insertData($btn, $formId){
    $($btn).on('click', function(){
        var dataSerialize = $($formId).serialize();
        var url  = $($formId).attr('action');
        var page = $(this).data('page');

        $.ajax({
            url: url,
            type: 'POST',
            data: { dataSerialize:dataSerialize, page:page },
            success: function(response){
                console.log(dataSerialize + ' => ' + page);
            },
            error: function(response){
                console.log('Error during the sending request.');
            }
        });
        

    });
}    



/*=============================
    Print "Штампај ПДФ" button
===============================*/
function press_printBtn($btn){
    $($btn).on('click', function(){
        if( confirm('Pre nego što pristupite štampi PDF-a, neophodno je da klinkete na polje \n"ИЗРАЧУНАЈ"\n kako bi vrednosti poslednje stranice bile obračunate u poresku osnovicu.\n\n Ukoliko ste to učinili, pritisnite dugme "OK". U suprotnom izaberite "Cancel" i pritisnite dugme "Израчунај".') ){
            window.location.href = 'pdf.php';
        }
    });

}
