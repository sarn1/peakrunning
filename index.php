<?php get_header(); ?>
<main role="main">
<?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();

      if (is_front_page()) {
        //homepage slider
        if ( function_exists( 'soliloquy' ) ) { soliloquy( '32' ); }
?>
        <!-- home middle -->
        <div class="row home_middle">
          <div class="four columns left">
            <img src="/wp-content/uploads/2016/09/homepage_middle_left_image.jpeg" alt="Peak Running Merchandise" title="Peak Running Merchandise">
          </div>
          <div class="four columns mid">
            <img src="/wp-content/uploads/2016/09/homepage_middle_middle_image.jpeg" alt="Our Upcoming Events" title="Our Upcoming Events">
          </div>

          <div class="four columns right">
            <img src="/wp-content/uploads/2016/09/homepage_middle_right_image.jpeg" alt="Why Chose Up For Your Next Visit" title="Why Chose Up For Your Next Visit">
          </div>
        </div>

<?php
      } else {
        ?>
        <article>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </article>


        <!--
      <aside>
        <?php get_sidebar(); ?>
      </aside>
-->
<?php
      }
    }
  } elseif (is_404()) {
    get_template_part('partials', '404');
  }
  ?>
</main>
<?php get_footer(); ?>