<?php
//homepage slider
if ( function_exists( 'soliloquy' ) ) { soliloquy( '32' ); }
?>
<!-- home middle -->
<div class="row home_middle">
  <div class="four columns left">
    <img src="/wp-content/uploads/2016/09/homepage_middle_left_image.jpeg" alt="Peak Running Merchandise" title="Peak Running Merchandise">
    <div class="container">
      <h1>merchandise</h1>
      <div class="content">
        <?php echo do_shortcode('[content_block id=42]'); ?>
        <a class="btn" href="/goods-and-gear/">view all the brands we carry »</a>
      </div>
    </div>
  </div>
  <div class="four columns mid">
    <img src="/wp-content/uploads/2016/09/homepage_middle_middle_image.jpeg" alt="Our Upcoming Events" title="Our Upcoming Events">
    <div class="container">
      <div class="content">
        <h1>upcoming events</h1>
        <?php echo do_shortcode('[content_block id=42]'); ?>
        <a class="btn" href="/event-calendar/">view more events »</a>
      </div>
    </div>
  </div>

  <div class="four columns right">
    <img src="/wp-content/uploads/2016/09/homepage_middle_right_image.jpeg" alt="Why Chose Up For Your Next Visit" title="Why Chose Up For Your Next Visit">
    <div class="container">
      <h1>the perfect fit</h1>
      <div class="content">
        <?php echo do_shortcode('[content_block id=44]'); ?>
        <a class="btn" href="/the-fit-process/"><span>learn more »</span></a>
      </div>
    </div>
  </div>
</div>