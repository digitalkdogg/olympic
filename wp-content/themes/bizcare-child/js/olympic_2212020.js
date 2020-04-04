var $ = jQuery

jQuery(function($){

	/* @todo:
		Make feature section with 2 box to contact and schedule
		Make tag line blue - done
		fine better way to do the contact us page
		on services center text on desktop - done */

	$.fn.olympic = {
		init: function () {
			$(document).ready(function() {

				$('style#bizcare-style-inline-css').remove()
				$('div#sticky-wrapper').css({'height':'200px'})

				$('#masthead .bt-top-bar .bt-social-nav').remove()

				$('div.site-logo').removeClass('col-md-3 py-2 pl-md-0' );
				$('div.site-logo').addClass('col-sm-6 col-md-5 col-10');

				$('div.site-logo').removeClass('col-8');

				$('.evt-header-wrap .l-0.d-none').attr('id', 'phone-num');
				let phonenumdiv = $('#phone-num').find('.d-inline-block.fs-7');
				let phonenum = $(phonenumdiv).text().trim();
				$(phonenumdiv).empty();
			  $(phonenumdiv).html('<i class="fa fa-phone bt-color-primary"></i><a id = "phonelink" href = "tel://' + phonenum + '">' + phonenum + '</a>');
				$('<li />', {'text': 'H.I. #2099', 'class': 'd-inline-block fs-7 no-border-right'}).insertAfter(phonenumdiv)
				$('header#masthead .bt-top-bar .bt-appointment-btn').attr('id', 'contact-us');
				$('header#masthead .bt-top-bar .bt-appointment-btn').parent().attr('id', 'contact-us-wrapper')

				$('.bt-nav-bar-section .row .col-md-9').attr('id', 'bt-nav-bar-section');
				$('#bt-nav-bar-section').removeClass('col-md-9 col-4 pl-0 pr-md-3');
				$('#bt-nav-bar-section').addClass('col-sm-6 col-md-7 col-2');

				$('header#masthead .bt-top-bar .bt-appointment-btn').attr('id', 'contact-us')

				$('.bt-nav-bar-section .row .col-md-9').addClass('col-md-8')

				$('.bt-top-bar .row').children('div').each(function () {
					if ($(this).attr('id')==='phone-num') {
						$(this).removeClass('col-md-5');
						$(this).removeClass('l-0');
						$(this).removeClass('d-none');
						$(this).removeClass('d-md-block');
					} else if($(this).attr('id')==='contact-us-wrapper') {
						$(this).removeClass('col-md-3');
						$(this).removeClass('col-8');
						$(this).removeClass('text-right')
					}

					if ($('div.everest-forms').length>0) {
						$.fn.olympic.style_everest_form();
					}

					if ($('section.bt-about-section').length>0) {
						$('.col-12.col-md-6').removeClass('col-md-6')
						$('.bt-about-section .bt-about-left .section-title-wrappe').hide()
						$('section.bt-about-section .about-box-small').each(function () {
							var thehref = $(this).find('a').attr('href');
							if (thehref != undefined) {
								$(this).click(function () {
									window.location = thehref;
								})
							}
							//$(this).wrap('a')
						})
						// make the feature section happen with 2 boxes one for contact us and one for schedule now.
					}
				})//end doc ready



				$('<div />', {
					'id': 'lefttrix',
					'class': 'col-xs-2'
				}).appendTo('header#masthead .container .bt-logo')
				$('<div />', {
					'id': 'righttrix',
					'class': 'col-xs-7'
				}).appendTo('header#masthead .container .bt-logo')

				$('.bt-logo a.custom-logo-link').appendTo('#lefttrix');

				$('.bt-logo h1.site-title').appendTo('#righttrix');
				$('.bt-logo p.site-description').appendTo('#righttrix');

				$('#masthead .container').addClass('container-fluid')
				$('#masthead .container.container-fluid').removeClass('container')

				$('.footer-bottom .site-info').html('<a href="https://www.nachi.org/verify.php?nachiid=nachi19101524" target="_blank"><img src="https://www.nachi.org/webseals/sb-v2-nachi19101524.gif" width="98" height="102" alt="Certified by the International Association of Certified Home Inspectors" border="0" /></a>');

				$(window).resize(function () {
					$.fn.olympic.adjust_header_height();
				})
			})


		},
		'is_sticky': function () {
			if ($('#sticky-wrapper').hasClass('is-sticky')==true) {
				$.fn.olympic.data.global.sticky = true;
				$('header#masthead').addClass('is-sticky');
			} else {
				$.fn.olympic.data.global.sticky = false;
				$('header#masthead').removeClass('is-sticky');
			}
		},
		'is_mobile' : function () {
			return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
		},
		'adjust_header_height': function () {
			var dynamicheight;
			if ($(window).width > 768) {
				dynamicheight = $('.bt-nav-bar-section').height();
			} else {
				dynamicheight =  $('.bt-nav-bar-section').height()+ 20;
			}


			$('#sticky-wrapper').css({'height': dynamicheight+'px'})
		},
		'style_everest_form': function () {
			//syle the inputs and select dropdown by add the form-control class
			$('div.everest-forms input').each(function () {
				$(this).addClass('form-control');
			})

			$('div.everest-forms select').each(function () {
				$(this).addClass('form-control');
			})


			$('div.everest-forms input.flatpickr-input').each(function () {
				$(this).css({'background':'white'});
			})

			//style the submit button with in styling
			$('div.everest-forms button').each(function () {
				$(this).css({
					'background':'#27548b',
					'border-radius':'5px',
					'color':'white'
				})

				//adds the hover effect to the submit button
				$(this).hover(function () {
					$(this).css({'background':'#ffd700', 'color': '#333'})
				}, function () {
					$(this).css({'background':'#27548b', 'color': 'white'})
				})
			})
		},
		'data': {
			'global': {
				'sticky':false
			}
		}
	}


  	$.fn.myPlugin = function() {
    	alert('hi');
  	};

  	$.fn.olympic.init()
  	$.fn.olympic.is_sticky();

  	$(window).scroll(function () {
  		$.fn.olympic.is_sticky();
  		$.fn.olympic.adjust_header_height();
  	})
});
//})( jQuery );
