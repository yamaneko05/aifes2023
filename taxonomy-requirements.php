<?php get_header() ?>
<main>
  <div class="wrapper">
  <?php $term = get_queried_object(); ?>
    <p class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <a href="<?php bloginfo("url") ?>">TOP</a>>
      <a href="<?php bloginfo("url") ?>/schedule">入場条件別に検索</a>>
      <a href="<?php echo get_term_link( $term, "festival" ) ?>"><?php echo $term->name ?></a>
    </p>
    <div id="head">
      <h1>入場条件: <?php echo $term->name ?> の文化祭</h1>
      <p class="description">選択された入場条件の文化祭が表示されます。</p>
    </div>

    <ul class="festivals">
        <?php 
          $args = array(
            "post_type" => "festival",
            "posts_per_page" => 6,
            "taxonomy" => "requirements",
            "term" => $term->slug,
            'paged' => get_query_var('paged')
          );
          $my_query = new WP_Query($args);
        ?>
        <?php while($my_query->have_posts()): $my_query->the_post(); ?>   
        <?php
        get_template_part( "template-parts/festival") ?>
        <?php endwhile;
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