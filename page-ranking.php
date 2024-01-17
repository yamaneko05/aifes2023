<?php get_header() ?>
<main>
  <div class="wrapper">
    <div id="head">
      <h1>
        <!-- <img src="<?php bloginfo( "template_url" )?>/img/icon/schedule.png" alt=""> -->
        <?php the_title(); ?>
      </h1>
      <p class="description">いいね数の多い順のランキングです。（リアルタイム）</p>
    </div>

    <ul class="festivals ranking">
      <?php 
        $args = array(
          $post__in = wp_ulike_get_popular_items_ids(array(
            'type'       => 'post',
            'rel_type'   => 'festival',
            'status'     => 'like',
            'period'     => 'all',
          )),     
          'posts_per_page' => 10, // 10件表示
          'post__in' => $post__in,
          'post_type' => 'festival', // カスタム投稿名（例:newsの場合）
          'orderby' => 'post__in',
          'order' => 'DESC' // いいねの降順
        );
        $my_query = new WP_Query($args);
        $rank = 0;
      ?>
      <?php if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post(); ?>
      <?php
      get_template_part( "template-parts/festival") ?>
      <?php endwhile; endif;
      wp_reset_postdata(); ?>
    </ul>
  </div>
</main>
<?php get_footer() ?>