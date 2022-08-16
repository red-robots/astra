jQuery(document).ready(function($){

  var swiper = new Swiper(".tabSwiper", {
    effect: "fade",
    centeredSlides: true,
    loop: true,
    speed:100,
    autoplay: {
      delay: 10000,
      disableOnInteraction: false,
    },
    navigation: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
  });

  swiper.on('slideChange', function (e) {
    swipeCallbackFunction(this);
  });

  $('#tab-links li').on('click',function(){
    var tabIndex = $(this).attr('tabindex');
    $('.custom-tabs-slider .swiper-pagination-bullet').eq(tabIndex).trigger('click');
  });

  function swipeCallbackFunction(data){
    var id = parseInt(data.realIndex) + 1;
    var bgcolor = '';
    if( typeof $('#swiper-slide-tab-'+id).attr('data-bgcolor')!=="undefined" ) {
      bgcolor = $('#swiper-slide-tab-'+id).attr('data-bgcolor');
      $('.custom-tabs-slider').css('background-color',bgcolor);
      $('#tab-links li').removeClass('active');
      $('#tab-links li#custom-tab-'+id).addClass('active');
    }
  }

  $(window).on('scroll',function() {
    $("#car-icon").addClass('moved');
    if($(window).scrollTop() + window.innerHeight > $(document).height() - 50) {
      $("#car-icon").addClass('bottom');
    } else {
      $("#car-icon").removeClass('bottom');
    }

    var currentWindow = Math.round($(window).height()/2);

    if( $(window).scrollTop()>= 500 ) {
      $('.rside-broken-lines-2').addClass('adjust');
    } else {
      $('.rside-broken-lines-2').removeClass('adjust');
    }
  });


  $.fn.scrollStopped = function(callback) {
    var that = this, $this = $(that);
    $this.scroll(function(ev) {
      clearTimeout($this.data('scrollTimeout'));
      $this.data('scrollTimeout', setTimeout(callback.bind(that), 250, ev));
    });
  };

  $(window).scrollStopped(function(ev){
    $("#car-icon").removeClass('moved');
  });


});