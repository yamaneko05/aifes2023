<?php get_header() ?>
<main>
  <div class="wrapper">
    <?php $term = get_queried_object(); ?>
    <p class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <a href="<?php bloginfo("url") ?>">TOP</a>>
      <a href="<?php bloginfo("url") ?>/schedule">日程別に検索</a>>
      <a href="<?php echo get_term_link( $term, "festival" ) ?>"><?php echo $term->name ?></a>
    </p>
    <div id="head">
      <h1><?php echo $term->name ?>開催予定の文化祭</h1>
      <p class="description">選択された日程の文化祭が表示されます。</p>
    </div>

    <ul class="festivals">
        <?php 
          $args = array(
            "post_type" => "festival",
            "posts_per_page" => -1,
            "taxonomy" => "schedule",
            "term" => $term->slug,
          );
          $my_query = new WP_Query($args);
        ?>
        <?php while($my_query->have_posts()): $my_query->the_post();  
        get_template_part( "template-parts/festival") ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(  ); ?>
      </ul>
  </div>
</main>
<?php get_footer() ?>