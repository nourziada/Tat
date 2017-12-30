jQuery(function ($) {

    'use strict';


    // -------------------------------------------------------------
    //  ScrollUp Minimum setup
    // -------------------------------------------------------------

    (function() {

        $.scrollUp();

    }());

    // -------------------------------------------------------------
    //  Placeholder
    // -------------------------------------------------------------

    (function() {

        var textAreas = document.getElementsByTagName('textarea');

        Array.prototype.forEach.call(textAreas, function(elem) {
            elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
        });

    }());

    

    // -------------------------------------------------------------
    //  Show 
    // -------------------------------------------------------------

    (function() {

        $("document").ready(function()
            {
                 $(".more-category.one").hide();
                $(".show-more.one").click(function()
                    {
                        $(".more-category.one").show();
                        $(".show-more.one").hide();
                    });
            });

        $("document").ready(function()
            {
                 $(".more-category.two").hide();
                $(".show-more.two").click(function()
                    {
                        $(".more-category.two").show();
                        $(".show-more.two").hide();
                    });
            });

        $("document").ready(function()
            {
                 $(".more-category.three").hide();
                $(".show-more.three").click(function()
                    {
                        $(".more-category.three").show();
                        $(".show-more.three").hide();
                    });
            });

    }());    
    

    // -------------------------------------------------------------
    //  Slider
    // -------------------------------------------------------------

    (function() {

        $('#price').slider();

    }());   
	
	
   
    
    // -------------------------------------------------------------
    //  language Select
    // -------------------------------------------------------------

   (function() {

        $('.language-dropdown').on('click', '.language-change a', function(ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.language-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

        $('.category-dropdown').on('click', '.category-change a', function(ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.category-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

    }());


    // -------------------------------------------------------------
    //  Tooltip
    // -------------------------------------------------------------

    (function() {

        $('[data-toggle="tooltip"]').tooltip();

    }());


    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------

        (function () {  
            $('.collapse').on('show.bs.collapse', function() {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
            });

            $('.collapse').on('hide.bs.collapse', function() {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
            });
        }());


    // -------------------------------------------------------------
    //  Checkbox Icon Change
    // -------------------------------------------------------------

    (function () {

        $('input[type="checkbox"]').change(function(){
            if($(this).is(':checked')){
                $(this).parent("label").addClass("checked");
            } else {
                $(this).parent("label").removeClass("checked");
            }
        });

    }()); 
	
	
	 // -------------------------------------------------------------
    //  select-category Change
    // -------------------------------------------------------------
	$('.select-category.post-option ul li a').on('click', function() {
		$('.select-category.post-option ul li.link-active').removeClass('link-active');
		$(this).closest('li').addClass('link-active');
	});

	$('.subcategory.post-option ul li a').on('click', function() {
		$('.subcategory.post-option ul li.link-active').removeClass('link-active');
		$(this).closest('li').addClass('link-active');
	});
	
    // -------------------------------------------------------------
    //   Show Mobile Number
    // -------------------------------------------------------------  

    (function () {

        $('.show-number').on('click', function() {
            $('.hide-text').fadeIn(500, function() {
              $(this).addClass('hide');
            });  
			$('.hide-number').fadeIn(500, function() {
              $(this).addClass('show');
            }); 			
        });


    }());
	
   
// script end
});


    // -------------------------------------------------------------
    //  Owl Carousel
    // -------------------------------------------------------------


    (function() {

        $("#featured-slider").owlCarousel({
            items:3,
            nav:true,
            autoplay:true,
            dots:true,
            autoplayHoverPause:true,
            nav:true,
            navText: [
              "<i class='fa fa-angle-left '></i>",
              "<i class='fa fa-angle-right'></i>"
            ],
            responsive: {
                0: {
                    items: 1,
                    slideBy:1
                },
                500: {
                    items: 2,
                    slideBy:1
                },
                991: {
                    items: 2,
                    slideBy:1
                },
                1200: {
                    items: 3,
                    slideBy:1
                },
            }            

        });

    }());


    (function() {

        $("#featured-slider-two").owlCarousel({
            items:4,
            nav:true,
            autoplay:true,
            dots:true,
            autoplayHoverPause:true,
            nav:true,
            navText: [
              "<i class='fa fa-angle-left '></i>",
              "<i class='fa fa-angle-right'></i>"
            ],
            responsive: {
                0: {
                    items: 1,
                    slideBy:1
                },
                480: {
                    items: 2,
                    slideBy:1
                },
                991: {
                    items: 3,
                    slideBy:1
                },
                1000: {
                    items: 4,
                    slideBy:1
                },
            }            

        });
        
        

    }());

    (function() {

        $(".testimonial-carousel").owlCarousel({
            items:1,
            autoplay:true,
            autoplayHoverPause:true
        });

    }());

    (function() {

        $(".car-slider").owlCarousel({
            items:1,
            autoplay:true,
            autoplayHoverPause:true
        });

    }());
function inboxdetails(i,j,k)
	{		
	if(i !='')
{
		var UrlToPass = 'action=updateinboxstatus&ad_id='+i+'&rece_id='+j+'&send_id='+k;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
              // $("#chatdetails"+i+j).show();
		// $(".answer_rowc").hide();
		// $("#headingdetails").hide();
			// $(".answer_rowc1").hide(); 
			 $("#getchatdetails").html(data);
		$(".answer_rowc").hide();
		$("#headingdetails").hide();
			$(".answer_rowc1").hide(); 
			$("#messagetab").load("adds.php #messagetab"); 
			$("#messagetabb").load("adds.php #messagetabb");
			
				
            }
        });
		// var UrlToPass = 'action=getchatdetails&ad_id='+i+'&rece_id='+j+'&send_id='+k;
	// $.ajax({ 
			// type : 'POST', 
			// data : UrlToPass, 
			// url  : 'process.php',
			 // success: function (data) {
              // $("#getchatdetails").html(data);
		// $(".answer_rowc").hide();
		// $("#headingdetails").hide();
			// $(".answer_rowc1").hide(); 
				
            // }
        // });
		
	}
		

	}
	
	function senddetails(i,j,k)
	{	
	
	if(i !='')
{
		var UrlToPass = 'action=updateinboxstatuss&ad_id='+i+'&rece_id='+j+'&send_id='+k;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
              // $("#chatdetails"+i+j).show();
		// $(".answer_rowc").hide();
		// $("#headingdetails").hide();
			// $(".answer_rowc1").hide(); 
			 $("#getchatdetailssend").html(data);
		$(".answer_rowcsend").hide();
		$("#headingdetailssend").hide();
			$(".answer_rowc1send").hide(); 
			$("#messagetab").load("adds.php #messagetab"); 
			$("#messagetabb").load("adds.php #messagetabb");
			
				
            }
        });
		// var UrlToPass = 'action=getchatdetails&ad_id='+i+'&rece_id='+j+'&send_id='+k;
	// $.ajax({ 
			// type : 'POST', 
			// data : UrlToPass, 
			// url  : 'process.php',
			 // success: function (data) {
              // $("#getchatdetails").html(data);
		// $(".answer_rowc").hide();
		// $("#headingdetails").hide();
			// $(".answer_rowc1").hide(); 
				
            // }
        // });
		
	}
		

	}
	
	
	function archivedetails(i,j,k)
	{	
	
	if(i !='')
{
		var UrlToPass = 'action=updateinboxstatusss&ad_id='+i+'&rece_id='+j+'&send_id='+k;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
              // $("#chatdetails"+i+j).show();
		// $(".answer_rowc").hide();
		// $("#headingdetails").hide();
			// $(".answer_rowc1").hide(); 
			 $("#getchatdetailsarchive").html(data);
		$(".answer_rowcarchive").hide();
		$("#headingdetailsarchive").hide();
			$(".answer_rowc1archive").hide(); 
			$("#messagetab").load("adds.php #messagetab"); 
			$("#messagetabb").load("adds.php #messagetabb");
			
				
            }
        });
		// var UrlToPass = 'action=getchatdetails&ad_id='+i+'&rece_id='+j+'&send_id='+k;
	// $.ajax({ 
			// type : 'POST', 
			// data : UrlToPass, 
			// url  : 'process.php',
			 // success: function (data) {
              // $("#getchatdetails").html(data);
		// $(".answer_rowc").hide();
		// $("#headingdetails").hide();
			// $(".answer_rowc1").hide(); 
				
            // }
        // });
		
	}
		

	}
	
	function backinbox()
	{
		
		$("#chatdetails").hide();
		$(".answer_rowc1").show(); 
		$(".answer_rowc").show();
		$("#headingdetails").show();
        $("#in").load("adds.php #in");		

	}
function backsend()
	{
		
		$("#getchatdetailssend").hide();
		$(".answer_rowc1send").show(); 
		$(".answer_rowcsend").show();
		$("#headingdetailssend").show();
        $("#sendd").load("adds.php #sendd");		

	}	
	function backarchive()
	{
		
		$("#getchatdetailsarchive").hide();
		$(".answer_rowc1archive").show(); 
		$(".answer_rowcarchive").show();
		$("#headingdetailsarchive").show();
        $("#archivee").load("adds.php #archivee");		

	}	
  function deleteinboxmessage (i,j,k,l)
{
	if (confirm('Are you sure you want to delete this ?')) {

	if((i!=''))

	{ 
	var UrlToPass = 'action=deleteselectedchat&ad_id='+j+'&rece_id='+k+'&send_id='+l;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			success: function(status){ 
		
		$("#inn"+i).fadeOut('slow', function(){ 
            $("#inn"+i).remove();                  
          });  

			}
	    });
	}
	
}
} 
function deleteinboxmessagesend (i,j,k,l)
{
	if (confirm('Are you sure you want to delete this ?')) {

	if((i!=''))

	{ 
	var UrlToPass = 'action=deleteselectedchatsend&ad_id='+j+'&rece_id='+k+'&send_id='+l;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			success: function(status){ 
		
		$("#insend"+i).fadeOut('slow', function(){ 
            $("#insend"+i).remove();                  
          });  

			}
	    });
	}
	
} 
} 
function deleteinboxmessagearchive (i,j,k,l,m)
{
	if (confirm('Are you sure you want to delete this ?')) {

	if((i!=''))

	{ 
	var UrlToPass = 'action=deleteinboxmessagearchive&ad_id='+j+'&rece_id='+k+'&send_id='+l+'&user_id='+m;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			success: function(status){ 
		
		$("#inarchive"+i).fadeOut('slow', function(){ 
            $("#inarchive"+i).remove();                  
          });  

			}
	    });
	}
	
}
}
 function makefavouriteinbox (i,j,k,l,m)
{
	if((i!=''))

	{ 
	var UrlToPass = 'action=makefavouriteinbox&ad_id='+j+'&rece_id='+k+'&send_id='+l+'&status='+m;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			success: function(status){ 
		
		$("#add_table_listt").load("adds.php #add_table_listt"); 
		
//$("#star").toggleClass('startopecity');
	//$("#in").load("adds.php #in");	
//$("#in"+i).load("adds.php #in"+i);
			}
	    });
	}
	
}
 function makefavouritesend (i,j,k,l,m)
{
	
	if((i!=''))

	{ 
	var UrlToPass = 'action=makefavouritesend&ad_id='+j+'&rece_id='+k+'&send_id='+l+'&status='+m;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			success: function(status){ 
		
		$("#add_table_listtsend").load("adds.php #add_table_listtsend"); 
//$("#star2").toggleClass('startopecity');
//$("#add_table_listt").load("adds.php #add_table_listt"); 
			}
	    });
	}
	  
} 
function restore (i,j,k,l,m)
{
	
	if((i!=''))

	{ 
	var UrlToPass = 'action=restorefromarchive&ad_id='+j+'&rece_id='+k+'&send_id='+l+'&user_id='+m;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			success: function(status){ 
		
		$("#add_table_listtsend").load("adds.php #add_table_listtsend"); 
$("#add_table_listt").load("adds.php #add_table_listt"); 
$("#add_table_listtarchive").load("adds.php #add_table_listtarchive"); 

			}
	    });
	}
	
} 

function replymessage()
	{		
	var ad_id = $('#ad_idd').val();
	var receiver_id = $('#receiver_idd').val();
	var sender_id = $('#sender_idd').val();
	var message = $('#message').val();
	var block_status = $('#block_status').val();
	if((message!=''))

	{ 
	var UrlToPass = 'action=ad_chatreply&ad_id='+ad_id+'&receiver_id='+receiver_id+'&sender_id='+sender_id+'&message='+message+'&block_status='+block_status;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
           // $("#chatdetails").load("process.php #chatdetails"); 
			inboxdetails(ad_id,sender_id,receiver_id);	
			$("#messageerror").html('');
            }
        });
		
		
	}
	else{
	$("#messageerror").html('Please enter message');	
	}
		

	}
	
	function replymessagesend()
	{		
	var ad_id = $('#ad_idd').val();
	var receiver_id = $('#receiver_idd').val();
	var sender_id = $('#sender_idd').val();
	var message = $('#message').val();
	if((message!=''))

	{ 
	var UrlToPass = 'action=ad_chatreply&ad_id='+ad_id+'&receiver_id='+receiver_id+'&sender_id='+sender_id+'&message='+message;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
           // $("#chatdetails").load("process.php #chatdetails"); 
			senddetails(ad_id,receiver_id,sender_id);	
			$("#messageerror").html('');
            }
        });
		
		
	}
	else{
	$("#messageerror").html('Please enter message');	
	}
		

	}
	
	function replymessagearchive()
	{		
	var ad_id = $('#ad_idd').val();
	var receiver_id = $('#receiver_idd').val();
	var sender_id = $('#sender_idd').val();
	var message = $('#message').val();
	if((message!=''))

	{ 
	var UrlToPass = 'action=ad_chatreplyarchive&ad_id='+ad_id+'&receiver_id='+receiver_id+'&sender_id='+sender_id+'&message='+message;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
           // $("#chatdetails").load("process.php #chatdetails"); 
			archivedetails(ad_id,receiver_id,sender_id);	
			$("#messageerror").html('');
            }
        });
		
		
	}
	else{
	$("#messageerror").html('Please enter message');	
	}
		

	}
	
	function blcokunblockuser(s,i,j,k)
	{		
	if(i !='')
{
		var UrlToPass = 'action=blcokunblockuser&rece_id='+i+'&se_id='+j+'&status='+k;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
             inboxdetails(s,i,j);	
				
            }
        });
		
		
	}
		

	}
	
	function blcokunblockusersend(s,i,j,k)
	{		
	if(i !='')
{
		var UrlToPass = 'action=blcokunblockuser&rece_id='+i+'&se_id='+j+'&status='+k;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
             senddetails(s,i,j);	
				
            }
        });
		
		
	}
		

	}
	
	function blcokunblockuserarchive(s,i,j,k)
	{		
	if(i !='')
{
		var UrlToPass = 'action=blcokunblockuser&rece_id='+i+'&se_id='+j+'&status='+k;
	$.ajax({ 
			type : 'POST', 
			data : UrlToPass, 
			url  : 'process.php',
			 success: function (data) {
             archivedetails(s,i,j);	
				
            }
        });
		
		
	}
		

	}
function showtextareareasonsall()
{		
var resonall=$("input:radio[name=resonall]:checked").val();
if(resonall==7)
{
		$(".issue-descall").show();
}
else {
$(".issue-descall").hide();
}	
}

function showtextareareasons()
{
var resonall=$("input:radio[name=reson]:checked").val();
if(resonall==7)
{
$(".issue-desc").show();
}
else {
$(".issue-desc").hide();
}	
}

function deactivesearchh()
{
$("#deactivesearch").show();
$("#activesearch").hide();
}
function activesearchh()
{
$("#activesearch").show();
$("#deactivesearch").hide();
}