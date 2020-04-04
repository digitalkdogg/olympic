var $ = jQuery
jQuery(document).ready(function() {
  $('#sidebar-primary').height($('#primary').height() + 60);
  $('#sidebar-primary').css({'top': $('header#masthead').height()+25})

  var mobiletrigger = $('#mobile-trigger');
  $(mobiletrigger).clone().prependTo('#site-identity .site-title');
  $(mobiletrigger).remove();
  $('#mobile-trigger').addClass('mobile');
  $('#mobile-trigger').attr('id', 'mobile-trig')


  setTimeout(function () {
    $('<span />', {
      'id': 'close',
      'text': 'X'
    }).prependTo('#sidr-main.sidr.left .sidr-inner')

    $('#mobile-trig').on('click', function () {
      $('#sidr-main.sidr.left').css({'left': '0'})
    })

    $('.sidr-inner #close').on('click', function () {
      $('#sidr-main.sidr.left').css({'left': '-260px'})
    })

  },500)





})
