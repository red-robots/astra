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
  // var passedNum = 0;
  $(window).on('scroll',function() {
    // var offset = $(window).scrollTop();
    //     offset = Math.round(offset/2);
    //     var top_offset = '-' + offset + 'px';
    //     passedNum += 20;
    //     $('#car-lines-2 span').css({
    //       'margin-top': '-' + passedNum + 'px'
    //     });
    //   console.log(passedNum);
    $("#car-icon").addClass('moved');
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
      $("#car-icon").addClass('bottom');
    } else {
      $("#car-icon").removeClass('bottom');
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