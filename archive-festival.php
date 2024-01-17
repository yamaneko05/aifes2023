<?php get_header() ?>
<main>
  <div class="wrapper">
    <div id="head">
      <h1>文化祭の一覧</h1>
      <p class="description">掲載された日時順に文化祭が表示されます。</p>
    </div>

    <ul class="festivals">
      <?php 
        $args = array(
          "post_type" => "festival",
          "posts_per_page" => 10,
          'paged' => get_query_var('paged')
        );
        $my_query = new WP_Query($args);
      ?>
      <?php if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();
      get_template_part( "template-parts/festival") ?>
      <?php endwhile; endif;
      wp_reset_postdata();
      $args = array(
        'mid_size' => 1,
        'prev_text' => '&lt;',
        'next_text' => '&gt;',
      );
      the_posts_pagination($args);
      ?>
    </ul>
  </div>
</main>
<?php get_footer() ?>