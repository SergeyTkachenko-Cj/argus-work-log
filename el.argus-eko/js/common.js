$(function() {

	$('#main-menu-btn').on('click', function(event) {
		$('.main-menu ul').slideToggle();
	});

  $('.main-menu a[href^="#"]').on('click', function(event) {
    var target = $( $(this).attr('href') );
    if( target.length ) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }
	  // return false;
  });


	$('.license-slider').slick({
	  dots: true,
	  speed: 1000,
	  fade: true,
	  cssEase: 'linear',
	  autoplay: true,
  	autoplaySpeed: 3000
	});

	$('.documents-slider').slick({
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  speed: 500,
	  autoplay: true,
  	autoplaySpeed: 3000,
  	responsive: [
  		{
  			breakpoint: 992,
      	settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
      	}
      },
  		{
  			breakpoint: 768,
      	settings: {
      		fade: true,
      	  cssEase: 'linear',		
	        slidesToShow: 1,
	        slidesToScroll: 1
      	}      	
  		}
  	]
	});

	$('#order-check, #popup-call-res, #popup-call-res2, #order-check-second, #link-popup-work-1, #link-popup-work-2, #link-popup-work-3, #link-popup-work-4').fancybox();

	$('.slider-wraper .item').fancybox();

	initialize();


	var wrapper = $( ".file_upload" ),
      inp = wrapper.find( "input" ),
      btn = wrapper.find( ".button" ),
      lbl = wrapper.find( "mark" );

  // Crutches for the :focus style:
  inp.focus(function(){
      wrapper.addClass( "focus" );
  }).blur(function(){
      wrapper.removeClass( "focus" );
  });

  var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

  inp.change(function(){
      var file_name;
      if( file_api && inp[ 0 ].files[ 0 ] )
          file_name = inp[ 0 ].files[ 0 ].name;
      else
          file_name = inp.val().replace( "C:\\fakepath\\", '' );

      if( ! file_name.length )
          return;

      if( lbl.is( ":visible" ) ){
          lbl.text( file_name );
      }else
          btn.text( file_name );
  }).change();


});

function initialize() {
  
 //  var myLatlng = new google.maps.LatLng(55.777757, 37.505254);
 //  var myOptions = {
 //    zoom: 17,
 //    center: myLatlng,
 //    mapTypeId: google.maps.MapTypeId.ROADMAP
 //  }

 // var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

 // var marker = new google.maps.Marker({
 //    position: myLatlng,
 //    map: map,
 //    title:"Hello World!"
 //  });

}


$( window ).resize(function(){
    $( ".file_upload input" ).triggerHandler( "change" );
});