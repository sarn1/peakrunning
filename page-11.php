<?php
  get_header();

  $args = array(
    'post_type' => 'good-and-gear',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  );

  $my_query = new WP_Query($args);

  $shoes = $apparel = $nutrition = $accessories = [];

  while ($my_query->have_posts()) {
    $my_query->the_post();
    $item = new stdclass();

    //can't run current and reset inline due to strict warning
    $item->type = get_post_meta(get_the_ID(), 'wpcf-good-and-gear-type', false);
    $item->type = reset($item->type[0]);
    $item->type = current($item->type);

    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);

    $item->img = current($thumb_url);
    $item->title = get_the_title();

    //pq($item->type);

    switch ($item->type) {
      case 'SHOE' : $shoes[] = $item; break;
      case 'APPAREL' : $apparel[] = $item; break;
      case 'NUTRITION' : $nutrition[] = $item; break;
      case 'ACCESSORIES' : $accessories[] = $item; break;
    }

    //pqd($shoes);
  }


?>
<main role="main">
  <div class="row">
    <div class="twleve columns">
      <h1>goods and gear</h1>

      <article>
        <h2>shoes</h2>
        <img src="/wp-content/uploads/2016/09/good-and-gears-accessories.jpeg" alt="Shoes" title="Shoes" class="category_banner">
        <?php my_render_goods_and_gears_item($shoes); ?>
      </article>

      <article>
        <h2>apparel</h2>
        <img src="/wp-content/uploads/2016/09/good-and-gears-apparel.jpeg" alt="Apparel" title="Apparel" class="category_banner">
        <?php my_render_goods_and_gears_item($apparel); ?>
      </article>

      <article>
        <h2>nutrition</h2>
        <img src="/wp-content/uploads/2016/09/good-and-gears-nutrition.jpeg" alt="Nutrition" title="Nutrition" class="category_banner">
        <?php my_render_goods_and_gears_item($nutrition); ?>
      </article>

      <article>
        <h2>accessories</h2>
        <img src="/wp-content/uploads/2016/09/good-and-gears-accessories.jpeg" alt="Accessories" title="Accessories" class="category_banner">
        <?php my_render_goods_and_gears_item($accessories); ?>
      </article>

    </div>
  </div>
</main>
<?php get_footer(); ?>