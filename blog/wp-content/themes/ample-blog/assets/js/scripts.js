jQuery(document).ready(function($){

	 "use strict"



	//parrallax

	if($('header[data-type="background"]').length > 0){

		$('header[data-type="background"]').each(function(){

	        var $bgobj = $(this); // assigning the object

	    	var $window = $(window);

	        $window.scroll(function() {

	            var yPos = -($window.scrollTop() / $bgobj.data('speed')); 

	            

	            // Put together our final background position

	            var coords = '50% '+ yPos + 'px';



	            // Move the background

	            $bgobj.css({ backgroundPosition: coords });

	        }); 

	    }); 

	}

	

	//header style1 carousel

	//if($(".header-slider-style1").length > 0){

		$(".header-slider-style1").owlCarousel({

			items: 3,

			responsive:{

				200:{

		            items:1

		        },

		        600:{

		            items:1

		        },

		        1000:{

		        	items:3

		        }

		    },

			center: true,

			//loop: true,

			dots: false

		});

	//}

	

	


		$('.header-slider-style2').owlCarousel({

			items: 1,

			loop: true,

			dots: false,

			nav: true,

			responsive: {

				300:{

		            nav: false,

		        },

		        1000:{

		        	nav: true,

		        }

			},

			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],

		});



	

	//post images carousel

	if($(".post-carousel").length > 0){

		$(".post-carousel").owlCarousel({

			items: 1,

			nav: true,

			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],

			center: true,

			loop: true,

			dots: false

		});

	}

	

	//related posts carousel

	if($('.related-posts').length > 0){

		$('.related-posts').owlCarousel({

			items: 3,

			loop: false,

			dots: false,

			margin: 30,

			responsive:{

				200:{

		            items:1

		        },

		        300:{

		            items:1,

		            margin: 15

		        },

		        500:{

		            items:3

		        },

		        1000:{

		        	items:3

		        }

		    },

			

		});

	}

	



	if($(".responsive-video").length > 0){

		$(".responsive-video").fitVids();

	}



	$('.sidebar-wrap .widget > ul > li').each(function(){

		$(this).prepend('<span class="fa-stack list-style"><i class="fa fa-square-o"></i><i class="fa fa-square-o fa-stack-1x"></i></span>');

	});

    

    $('.popup-youtube, .popup-vimeo').magnificPopup({

      disableOn: 700,

      type: 'iframe',

      mainClass: 'mfp-fade',

      removalDelay: 160,

      preloader: false,

      fixedContentPos: false

    });

	$(".grid-post-style2 .image-holder").imgLiquid();


	//$('.widget-eq-height').equalHeights();

	//$('.equal-grid-2').equalHeights();

	if($("#instafeed").length > 0){

		var userFeed = new Instafeed({

			target: 'instafeed',

	        get: 'user',

	        userId: $('#instafeed').data('user_id'),

			limit : $('#instafeed').data('total'),

			clientId: 'aebc122c9c0241209d24a92d494a9ade',

			accessToken: '2223881582.3a81a9f.c66d3ed5cdc2456896dc01eee43cdbe4',

			template: '<a class="insta-img" href="{{link}}"><img src="{{image}}" /></a>',

			after:  function() {

				$('.insta-img img').each(function(){

					var oldurl = $(this).attr('src');

					var replacewith = 's320x320';

					var newurl = oldurl.replace('s150x150', replacewith);

					$(this).attr('src', newurl);

				});



				$("#instafeed").owlCarousel({

					items: 6,

					center: true,

					autoplay: true,

					loop: true,

					dots: false,

					responsive:{

						200:{

				            items:1

				        },

				        600:{

				            items:1

				        },

				        1000:{

				        	items:6

				        }

				    }

				});

			}

	    });

	    userFeed.run();

	}

	
//Check to see if the window is top if not then display button
	jQuery(window).scroll(function($){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scrollToTop').addClass('activetop');
			jQuery('.scrollToTop').fadeIn();
		} else {
			jQuery('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	jQuery('.scrollToTop').click(function($){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});


    if($('#google-map').length > 0){

    	// This example adds a marker to indicate the position of Bondi Beach in Sydney,

      

      	var pos = {lat: 40.735657, lng: -74.172367};

        var map = new google.maps.Map(document.getElementById('google-map'), {

          zoom: 12,

          center: pos,

          scrollwheel: false

        });



        var image = 'images/map-marker.png';

        var beachMarker = new google.maps.Marker({

          position: pos,

          map: map,

          icon: image

        });



        map.set('styles', [{

		    featureType: 'Greyscale',

		    stylers: [

		            { saturation: -90 },

		            { gamma: 1.5 }

		        ]

		    }]

		);

	

	}//if($('#google-map').length > 0)


		// share-link

      $('.share-link').on('click', function(){

      		var toggolearea = $(this).closest('li').find('.social-links-wrap');

      		toggolearea.css({

      			width: $(this).closest('ul').innerWidth(), 

      			left: -($(this).closest('li').position()).left

      		});

      		toggolearea.slideToggle('fast');

      		$(this).closest('li').toggleClass('social-links-wrap-open');

      	return false;

      })

      // share-link

      
        /*=================================*/
            /* search popup */
        /*=================================*/

        $('.header-search .top-search').on('click', function() { 
            $('.header-search .search-popup').toggleClass('active'); 
        }); 

        $('.ak-search .close').on('click', function() { 
            $('.search-icon .ak-search').removeClass('active'); 
        });

        $('.search-overlay').on('click', function() { 
            $('.header-search .search-popup').removeClass('active'); 
        });

        
        
        /*=================================*/
            /* toggle-nav */
        /*=================================*/
        
        $('.header-nav-search .toggle-button').on('click', function() {
            $('body').addClass('menu-active');
        });
        $('.close-icon').on('click', function() {
            $('body').removeClass('menu-active');
        });
        


})//end Ready



