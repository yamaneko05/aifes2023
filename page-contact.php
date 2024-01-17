<?php get_header(); ?>
<main>
  <div class="wrapper">
    <div id="head">
      <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
      <h1><?php the_title() ?></h1>
      <p>文化祭・コメントの修正や削除、追記のご依頼や当サイトへのご意見はこちらからお願いします。</p>
    </div>
    <div class="contact">
      <?php echo do_shortcode( '[contact-form-7 id="355" title="お問い合わせ"]' ) ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>