<?php get_header(); ?>
<main role="main">
<?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();

      if (is_front_page()) {
        get_template_part('partials','home');
      } else {
?>
        <div class="row">
          <div class="twelve columns">
            <article>
              <h1><?php the_title(); ?></h1>
              <?php the_content(); ?>
            </article>
          </div>
        </div>
<?php
      }
    }
  } elseif (is_404()) {
    get_template_part('partials', '404');
  }
  ?>
</main>
<?php get_footer(); ?>