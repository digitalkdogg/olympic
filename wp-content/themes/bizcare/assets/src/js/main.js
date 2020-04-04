+(function($){
	$(document).ready(function() {
		bannerSlider();
		testimonialsSlider();
		searchToggler();
		clientSlider();

		$('.bt-main-menu').mrMobileMenu();

		$(".bt-nav-bar-section").sticky({topSpacing:0});
    	wow = new WOW(
	      {
	        animateClass: 'animated',
	        offset:       100	        
	      }
	    );
	    wow.init();
	    $('.scroll-top').click(function() {      
		    $('body,html').animate({
		        scrollTop : 0             
		    }, 500);
		});

	});	
	$(window).scroll(function() {
	    if ($(this).scrollTop() >= 500) {       
	        $('.scroll-top').fadeIn(200);   
	    } else {
	        $('.scroll-top').fadeOut(200);   
	    }
	});
	

	$(window).load(function() {
		$(".loader").delay(500).fadeOut("slow");
	    $("#overlayer").delay(500).fadeOut("slow");
	    $("body").removeClass('has-preloader');

	})

	var Enable_Arrow  = customzier_values['bizcare-slider-enable-arrow'];
	var Enable_Pager  = customzier_values['bizcare-slider-enable-pager'];
	

	function bannerSlider() {
		$('.bt-banner-init').slick({
			autoplay: true,
  			autoplaySpeed: 2000,
		  	dots: ( Enable_Pager == 1 ) ? true : false,
		  	infinite: true,
		 	speed: 1500,
		  	slidesToShow: 1,
			slidesToScroll: 1,
			arrows: ( Enable_Arrow == 1 ) ? true : false,
			fade: true,
			prevArrow: '<button type="button" class="slick-prev bt-prev-arrow arow-lf"><i class="fa fa-angle-left"></i></button>',
		  	nextArrow: '<button type="button" class="slick-next bt-next-arrow arow-lf"><i class="fa fa-angle-right"></i></button>',
		});
	}

	function clientSlider() {
		$('.client-img-slider').slick({
		  	dots: false,
		  	infinite: true,
		 	speed: 1500,
		  	slidesToShow: 7,
			slidesToScroll: 1,
			arrows: false,
			prevArrow: '<button type="button" class="slick-prev bt-prev-arrow arow-lf"><i class="fa fa-angle-left"></i></button>',
		  	nextArrow: '<button type="button" class="slick-next bt-next-arrow arow-lf"><i class="fa fa-angle-right"></i></button>',
		});
	}

	function testimonialsSlider() {
		$('.bt-testimonials-slider-init').slick({
		  	dots: true,
		  	infinite: true,
		 	speed: 1000,
		  	slidesToShow: 2,
			slidesToScroll: 1,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev bt-prev-arrow arrow-right"><i class="fa fa-angle-left"></i></button>',
		  	nextArrow: '<button type="button" class="slick-next bt-next-arrow arrow-right"><i class="fa fa-angle-right"></i></button>',
		  	responsive: [			    
			    {
			      breakpoint: 560,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }			    
			]
		});
	}

	function searchToggler() {
		$("#search-toggler").on('click', function(event){
			event.preventDefault();
		  $(".top-search-form").slideToggle();
		});
		$(document).on("click", function(event){
	        var $trigger = $(".search-icon");
	        if($trigger !== event.target && !$trigger.has(event.target).length){
	            $(".top-search-form").slideUp();
	        }            
	    });

	}	
	
})(jQuery);