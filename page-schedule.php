<?php get_header() ?>
<main>
  <div class="wrapper">
    <div id="head">
      <h1>
        <img src="<?php bloginfo( "template_url" )?>/img/icon/schedule.png" alt="">
        日程別に検索
      </h1>
      <p class="description">日程別に文化祭の検索ができます。</p>
    </div>

    <ul class="ereas_parent">
      <?php $terms = get_terms("schedule", array("hide_empty" => false,"parent" => 0)); ?>
      <?php foreach($terms as $term_parent): ?>
      <li>
        <h2><a href="<?php echo get_term_link($term_parent) ?>"><?php echo $term_parent->name ?></a></h2>
        <?php $terms = get_terms("schedule", array("parent" => $term_parent->term_id)); ?>
        <?php if( !empty($terms)): ?>
        <ul class="ereas">
          <?php foreach($terms as $term): ?>
          <li>
            <a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?>（<?php echo $term->count; ?>件）</a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <p>データがありません😭</p>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</main>
<?php get_footer() ?>