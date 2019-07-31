
(function($){

	"use strict";
    

    // var locations = [ "Sydney, Australia", "Perth, Australia", "Adelaide, Australia", "Darwin, Australia", "Brisbane, Australia", "Melbourne, Australia", "Vancouver, Canada","Victoria, Canada", "Toronto, Canada", "Ontario, Canada", "Long Beach, California", "Ottowa, Canada", "Scottsdale, Arizona", "Lethbridge, Canada", "Montreal, Canada", "Edmonton, Canada", "Calgary, Canada",  "Naniamo, Canada", "Los Angeles, California", "Oakland, California", "Berkely, California","Chicago, Illinois", "Houston, Texas", "Philadelphia, Pennsylvania", "Phoenix, Arizona", "San Antonio, Texas", "San Diego, California", "Dallas, Texas", "San Jose, California", "Austin, Texas", "Indianapolis, Indiana", "Jacksonville, Florida", "San Francisco, California", "Columbus, Ohio", "Charlotte, North Carolina", "Fort Worth, Texas", "Detroit, Michigan", "El Paso, Texas", "Memphis, Tennessee", "Seattle, Washington", "Denver, Colorado", "Washington, D.C.", "Boston, Massachusetts", "Nashville, Tennessee", "Baltimore, Maryland", "Oklahoma City, Oklahoma", "Louisville, Kentucky", "Portland, Oregon", "Las Vegas, Nevada", "Milwaukee, Wisconsin", "Albuquerque, New Mexico", "Tucson, Arizona", "Fresno, California", "Sacramento, California", "Long Beach, California", "Kansas City, Missouri", "Mesa, Arizona", "Virginia Beach, Virginia", "Atlanta, Georgia", "Colorado Springs, Colorado", "Omaha, Nebraska", "Raleigh, North Carolina", "Miami, Florida", "Oakland, California", "Minneapolis, Minnesota", "Tulsa, Oklahoma", "Cleveland, Ohio", "Wichita, Kansas", "Arlington, Texas", "New Orleans, Louisiana", "Bakersfield, California", "Tampa, Florida", "Honolulu, Hawaii", "Aurora, Colorado", "Anaheim, California", "Santa Ana, California", "St. Louis, Missouri", "Riverside, California", "Corpus Christi, Texas", "Lexington, Kentucky", "Pittsburgh, Pennsylvania", "Anchorage, Alaska", "Stockton, California", "Cincinnati, Ohio", "St. Paul, Minnesota", "Toledo, Ohio", "Greensboro, North Carolina", "Newark, New Jersey", "Plano, Texas", "Henderson, Nevada", "Lincoln, Nebraska", "Buffalo, New York", "Jersey City, New Jersey", "Chula Vista, California", "Fort Wayne, Indiana", "Orlando, Florida", "St. Petersburg, Florida", "Chandler, Arizona", "Laredo, Texas", "Norfolk, Virginia", "Durham, North Carolina", "Madison, Wisconsin", "Lubbock, Texas", "Irvine, California", "Glendale, Arizona", "Garland, Texas", "Hialeah, Florida", "Reno, Nevada", "Chesapeake, Virginia", "Gilbert, Arizona", "Baton Rouge, Louisiana", "Irving, Texas", "Scottsdale, Arizona", "North Las Vegas, Nevada", "Fremont, California", "Boise, Idaho", "San Bernardino, California", "Birmingham, Alabama" ]
      

    // var products = product_vars.products;

      // product_vars.products;
      // console.log(product_vars.liton);
      // console.log(product_vars.products;

	var Osaka = {


      	// Bootstrap Carousels

      	carousel: function() {
      		try {  (function($) {				
		      		$('.carousel.slide').carousel({
		      			cycle: true
		      		}); 
		      	})(jQuery);
			} catch(e) { }
      	}, 

        magnificpopUp: function() {
      		try {  (function($) {
			        $('.popup-video').magnificPopup({
			           	type: 'iframe'
			        });

			        $('.image-popup').magnificPopup({
			           type: 'image',
			           gallery: {
			            enabled: true
			          },
			        });
		      	})(jQuery);
			} catch(e) { }

        },

		// Isotop Filters
		isotope: function() {
      		try {  (function($) {				
			
					//init Isotope
					var $grid = $('.portfolio-items').isotope({
					  itemSelector: '.item',
						layoutMode: 'masonry',
						transitionDuration: '0.6s',
						percentPosition: true,
						
						masonry: {
							columnWidth: '.item'
						}
					});

					// filter functions
					var filterFns = {
					  // show if number is greater than 50
					  numberGreaterThan50: function() {
					    var number = $(this).find('.number').text();
					    return parseInt( number, 10 ) > 50;
					  },
					  // show if name ends with -ium
					  ium: function() {
					    var name = $(this).find('.name').text();
					    return name.match( /ium$/ );
					  }
					};

					$('.filter').on( 'change', function() {
					  // get filter value from option value
					  var filterValue = this.value;
					  // use filterFn if matches value
					  filterValue = filterFns[ filterValue ] || filterValue;
					  $grid.isotope({ filter: filterValue });
					});
		      	})(jQuery);
			} catch(e) { }


		},

		// Images Loaded

		imagesloaded: function() {
      		try {  (function($) {				
					var $grid = $('.portfolio-items');
					$grid.imagesLoaded().progress( function() {
						$grid.isotope('layout');
					});  
		      	})(jQuery);
			} catch(e) { }					

		},

		// Google Map Functions

		googlemap: function() {

      		try {  (function($) {	

					function isMobile() {
						return ('ontouchstart' in document.documentElement);
					}
					function init_gmap() {
						if ( typeof google == 'undefined' ) return;
						var options = {
							center: {lat: -37.834812, lng: 144.963055},
							zoom: 15,
							mapTypeControl: true,
							mapTypeControlOptions: {
								style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
							},
							navigationControl: true,
							scrollwheel: false,
							streetViewControl: true,
							styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#faf8f8"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#faf8f8"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#cdcdcd"},{"visibility":"on"}]}]
						}
						if (isMobile()) {
							options.draggable = false;
						}
						$('#googleMaps').gmap3({
							map: {
								options: options
							},
				          marker: {
				           latLng: [-37.834811, 144.963054],
				           options: { icon: 'images/map-icon.png' }
				         }
		       			});
					}

					init_gmap();

		      	})(jQuery);
			} catch(e) { }
		},


		// Selectpicker 

		selectpicker: function() {
      		try {  (function($) {				
					$('.portfolio-filter .filter').selectpicker();
		      	})(jQuery);
			} catch(e) { }
		},

		bannerBG: function(){

      		try {  (function($) {				

					// Background Img
					$(".banner-background-bg").css('background-image', function () {
						var bg = ('url(' + $(this).data("image-src") + ')');
						return bg;
					});

		      	})(jQuery);
			} catch(e) { }
		},

	
		
	};

	$(document).ready(function() {
		"use strict";

		var adminbarheight = $('#wpadminbar').height();
		//$('body').css('margin-top', (adminbarheight));
		$('.navbar.fixed-top').css('top', (adminbarheight));		

		var containerwidth = $('.navbar .container').width();
		$('.full_width .pwpt-navbar-dropdown').css('width', (containerwidth) * 1);	

	    Osaka.bannerBG();
	    Osaka.carousel();
	    Osaka.isotope();
	    Osaka.imagesloaded();
	    Osaka.magnificpopUp();
	    Osaka.googlemap();
	    Osaka.selectpicker();




    /* Fomo by Jewel Theme */
    // $(function() {
    //   // console.log(product_vars.products);
      
    //   var products = product_vars.products;
      
    //   getProduct();
      
    //   function getProduct() {
    //     var num = Math.floor(Math.random() * products.length);

    //     $(".buyer_name").text( (products[num].buyer_name) );
    //     $(".product_image").attr('src',products[num].image);
    //     $(".product_name").text( (products[num].product_name) );
    //     $(".product_name").attr('href', (products[num].url) );
    //     $(".time_diff").text( products[num].time );
    //     // $(".location").text( products[num].location );

    //   }
      
     
    //   (function loop() {
    //       var rand = Math.round(Math.random() * 5000 ) + 8000;
    //       setTimeout(function() {
    //         changeNotification();
    //         loop();  
    //       }, rand);
    //   }());
      
    //   function changeNotification() {
    //     showNotification();
    //     setTimeout(function() {
    //       hideNotification();
    //     }, 6000)
    //   }
      
    //   function showNotification() {
    //     $("#fomo").addClass("is-visible");
    //   }
      
    //   function hideNotification() {
    //     $("#fomo").removeClass("is-visible");
    //     setTimeout(function() {
    //       getProduct();
    //     }, 500)
    //   }
      
    // });



	      
  });


})(jQuery);



jQuery( window ).on( 'scroll', function (){
  if ( jQuery( this ).scrollTop() > 100 ){
    jQuery( '.navbar.fixed-top' ).addClass( "sticky" );
  } else {
    jQuery( '.navbar.fixed-top' ).removeClass( "sticky" );
  }
});


