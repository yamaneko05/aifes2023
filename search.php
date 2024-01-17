<?php get_header() ?>
<main>
  <div class="wrapper">
    <div id="head">
      <h1>「<?php the_search_query(); ?>」の検索結果</h1>
      <p class="description">掲載された日時順に文化祭が表示されます。</p>
    </div>

    <?php if( have_posts() ): ?>
    <ul class="festivals">
      <?php while(have_posts()): the_post(); ?>
      <?php
        get_template_part( "template-parts/festival") ?>
      <?php endwhile;
      $args = array(
        'mid_size' => 1,
        'prev_text' => '&lt;',
        'next_text' => '&gt;',
      );
      the_posts_pagination($args);
      ?>

    </ul>
    <?php else: ?>
      <p style="margin-bottom: 80px;">「<?php the_search_query(); ?>」の文化祭は登録されてないかも😭↓のリンクから掲載応募してくれると助かる🙏🙏</p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer() ?>