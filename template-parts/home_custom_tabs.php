<?php if ( isset($tabs_data) && $tabs_data ) { ?>
<?php $section_title = get_field('home_tabs_title','option'); ?>
<div class="outer-tabs-wrapper">
  <div class="custom-tabs-slider">
    <div class="inner-wrap">

      <?php if ($section_title) { ?>
      <div class="tab-section-title animated fadeInDown"><h2><span><?php echo $section_title ?></span></h2></div>  
      <?php } ?>

      <ul id="tab-links">
        <?php 
          $first_bgcolor = '#FFF';
          $i=1; foreach ($tabs_data as $index=>$k) { 
          $bgcolor = ($k['bgcolor']) ? $k['bgcolor'] : "#CCC";
          if($i==1) {$first_bgcolor=$bgcolor;}
          $is_active = ($i==1) ? ' active':'';
          ?>
          <?php if ( $k['title'] &&  $k['text'] ) { ?>
          <li id="custom-tab-<?php echo $i?>" class="custom-tab-link<?php echo $is_active ?>" tabindex="<?php echo $index ?>"><a href="javascript:void(0)"><?php echo $k['title'] ?></a></li>  
          <?php $i++; } ?>
        <?php } ?>
      </ul>

      <style type="text/css">
        .custom-tabs-slider { background-color: <?php echo $first_bgcolor ?>; }
      </style>

      <div class="tab-swiper-wrap">
        <div class="swiper tabSwiper">
          <div class="swiper-wrapper">
            <?php $n=1; foreach ($tabs_data as $k) { 
              $bgcolor = ($k['bgcolor']) ? $k['bgcolor'] : "#CCC";
              $button = $k['button'];
              $btn = (isset($button['button']) && $button['button']) ? $button['button'] : '';
              $button_title = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
              $button_link = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
              $button_target = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
              $btn_bgcolor = (isset($button['button_bgcolor']) && $button['button_bgcolor']) ? $button['button_bgcolor'] : '';
              $btn_bgcolor_hover = (isset($button['button_bgcolor_hover']) && $button['button_bgcolor_hover']) ? $button['button_bgcolor_hover'] : '#2b2b2b';
              $btn_txtcolor = (isset($button['button_text_color']) && $button['button_text_color']) ? $button['button_text_color'] : '#FFF';
              $btn_txtcolor_hover = (isset($button['button_text_color_hover']) && $button['button_text_color_hover']) ? $button['button_text_color_hover'] : '#FFF';
              $btn_style = '';
              if($btn_bgcolor && $btn_txtcolor) {
                $btn_style = ' style="background-color:'.$btn_bgcolor.';color:'.$btn_txtcolor.'"';
              }
              $wrap_bgcolor = ($bgcolor) ? ' style="background-color:'.$bgcolor.'"' : '';
              ?>
              <?php if ( $k['title'] &&  $k['text'] ) { ?>
              <div id="swiper-slide-tab-<?php echo $n?>" class="swiper-slide custom-tab-<?php echo $i?>" data-bgcolor="<?php echo $bgcolor ?>">
                <div class="tab-info">
                  <div class="text"><?php echo $k['text'] ?></div>
                  <?php if ($button_title && $button_link) { ?>
                  <div class="buttondiv">
                    <a href="<?php echo $button_link ?>" target="<?php echo $button_target ?>" class="tab-button tab-button-<?php echo $n?>"><?php echo $button_title ?></a>
                  </div>  
                  <?php } ?>
                </div>
                <style type="text/css">
                  .tab-button-<?php echo $n?> {
                    background-color: <?php echo $btn_bgcolor ?>;
                    color: <?php echo $btn_txtcolor ?>!important;
                  }
                  .tab-button-<?php echo $n?>:hover {
                    background-color: <?php echo $btn_bgcolor_hover ?>!important;
                    color: <?php echo $btn_txtcolor_hover ?>!important;
                  }
                </style>
              </div>
               <?php $n++; } ?>
            <?php } ?>

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>