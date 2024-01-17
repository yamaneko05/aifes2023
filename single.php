<?php get_header() ?>
<main>
  <div class="wrapper">
    <div id="head">
      <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
      <h1><?php the_title() ?></h1>
      <p>更新日: <?php echo get_the_date("Y m/d"); ?> | 投稿者: <?php the_author() ?></p>
    </div>

    <div class="content">
      <?php the_content() ?>
    </div>
  </div>
</main>
<?php get_footer() ?>