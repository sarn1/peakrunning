<?php get_header(); ?>
<main role="main">
<?php
  if (have_posts()) {
      //home
      if (is_front_page()) {
        the_post();
        get_template_part('partials','home');
      }
      //blog
      elseif (my_blog_page()) { ?>
          <div class="row">
            <div class="eight columns">
              <?php
              while (have_posts()) {
                the_post();
              ?>
              <article>
                <?php if (is_archive() || is_home() || is_search()): ?>
                  <div class="row blog_archive">
                    <div class="eight columns">
                      <a href="<?= the_permalink() ?>"><h1><?php the_title()?></h1></a>
                      <small><?php the_date() ?></small>
                      <?php the_excerpt() ?>
                      <a href="<?= the_permalink() ?>" class="article_link">read full article »</a>
                      <div class="blog_cat"><strong>Categories: </strong><?php the_category(', '); ?></div>
                    </div>
                    <div class="four columns">
                      <div class="feat_img">
                      <?php
                      if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                      } else {
                        echo '<img src="/wp-content/uploads/2016/09/peak-running-logo-sm.jpg">';
                      }?>
                      </div>
                    </div>
                  </div>
                  <hr/>
                <?php else: ?>
                  <div class="row blog_single">
                    <a href="<?= the_permalink() ?>"><h1><?php the_title()?></h1></a>
                    <small><?php the_date() ?></small>
                    <?php the_content() ?>
                    <hr />
                    <div class="blog_cat"><strong>Categories: </strong><?php the_category(', '); ?></div>
                    <a href="/event-calendar/" class="article_link">« back to all blog</a>
                  </div>
                <?php endif; ?>
            <?php } ?>
            </article>
          </div>
          <div class="four columns">
            <aside class="blog_pages">
            <h2>Blog Articles</h2>
            <form action="<? bloginfo('url'); ?>" method="get">
              <select name="page_id" id="page_id" onchange="this.form.submit()">
                <option>Select Article</option>
                <?php
                global $post;
                $args = array( 'numberposts' => -1, 'post_status' => 'publish' );
                $posts = get_posts($args);
                foreach( $posts as $post ) : setup_postdata($post); ?>
                  <option value="<? echo $post->ID; ?>">
                    <?php echo mb_strimwidth(get_the_title(),0,40,'...'); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </form>
            <?php dynamic_sidebar('sidebar'); ?>
            </aside>
          </div>
          </div>
          <?php
      //everything else
      } else {
      the_post();
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
  //404
  elseif (is_404()) {
    get_template_part('partials', '404');
  }
  ?>
</main>
<?php get_footer(); ?>