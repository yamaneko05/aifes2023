<?php get_header() ?>
<main>
  <div class="wrapper">
    <div id="head">
    <h1>
        <img src="<?php bloginfo( "template_url" )?>/img/icon/erea.png" alt="">
        地域別に検索
      </h1>
      <p class="description">地域別に文化祭の検索ができます。</p>
    </div>

    <ul class="ereas">
      <?php $terms = get_terms("erea"); ?>
      <?php foreach($terms as $term): ?>
      <?php if($term->count !== 0): ?>
      <li>
        <a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?>（<?php echo $term->count; ?>件）</a>
      </li>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</main>
<?php get_footer() ?>