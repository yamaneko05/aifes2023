<?php get_header() ?>
<main>
  <div class="wrapper">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if(function_exists('bcn_display'))
      {
          bcn_display();
      }?>
    </div>
    <div class="single-festival">
      <?php if(have_posts()): while(have_posts()): the_post() ?>
      <?php 
      $term_erea = get_the_terms($post->ID, 'erea')[0];
      $terms_schedule = get_the_terms($post->ID, 'schedule');
      ?>
      <img class="thumbnail" src="<?php echo CFS()->get('thumbnail') ?>" alt="">
    
      <div class="festival" style="margin: 30px 0 10px;">
        <p class="title">
          <?php the_title() ?>
          <?php if(CFS()->get('name') !== ""): ?>
            「<?php echo CFS()->get('name') ?>」
          <?php endif; ?>
        </p>
        <div class="flexbox">
          <img class="thumbnail" src="<?php echo CFS()->get('thumbnail'); ?>" alt="">
          <div class="text">
            <p class="date">日程: 
              <?php foreach($terms_schedule as $term_schedule): ?>
              <a class="tag" href="<?php echo get_term_link($term_schedule, "schedule"); ?>">
                <?php echo $term_schedule->name; ?>
              </a>
              <?php endforeach; ?>
            </p>
            <p class="erea">
              地域: 
              <a class="tag" href="<?php echo get_term_link($term_erea, "erea"); ?>">
                <?php echo $term_erea->name; ?>
              </a>
            </p>
            <div class="info">
              <?php 
                $has_free = has_term( "free", "requirements");
                $comment_count = get_comments(array(
                  'post_id' => $post->ID,
                  'count' => true
                ));
              ?>
              <div class="comment">
                <img src="<?php bloginfo("template_url") ?>/img/icon/comments.png" alt="">
                <p><?php echo $comment_count ?></p>
              </div>
              <div class="like">
                <?php echo do_shortcode('[wp_ulike]'); ?>
              </div>
              <?php if($has_free): ?>
                <a class="has_free" href="<?php bloginfo("url") ?>/requirements/free">
                  <img src="<?php bloginfo("template_url") ?>/img/icon/free.png" alt="">
                </a>
              <?php endif; ?>
            </div>
            <a class="readmore" href="<?php echo $args["permalink"] ?>">入場条件などを見る</a>
          </div>
        </div>
      </div>
      
      <div class="detail">
        <h2>入場条件</h2>
        <p class="requirements"><?php echo CFS()->get("requirements") ?></p>
        <h2>見どころ</h2>
        <p class="highlight"><?php echo CFS()->get("highlight") ?></p>
        <h2>その他情報</h2>
        <p class="info"><?php echo CFS()->get("info") ?></p>
        <h2>関連リンク<br><small>（去年の文化祭の様子、高校ホームページなど）</small></h2>
        <p class="link"><a href="<?php echo CFS()->get('instagram') ?>">
          <?php echo CFS()->get('instagram') ?>
        </a></p>
      </div>
      
      <div class="erea">
        <h2><?php the_title() ?>周辺の文化祭</h2>
        <ul class="festivals">
        <?php 
          $args = array(
            "post_type" => "festival",
            "posts_per_page" => 4,
            "taxonomy" => "erea",
            "term" => $term_erea->slug,
            'post__not_in'=> array(get_the_ID())
          );
          $my_query = new WP_Query($args);
          ?>
          <?php if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();
          get_template_part( "template-parts/festival") ?>
          <?php endwhile; endif;
          wp_reset_postdata(); ?>
          <a class="button" href="<?php echo get_term_link( $term_erea, "erea" ) ?>">
          <?php echo $term_erea->name ?>の文化祭をもっと見る
          </a>
        </ul>
      </div>

      <h2><?php the_title() ?>周辺のマップ</h2>
      <div class="googlemaps">
        <iframe src="https://maps.google.co.jp/maps?q=<?php echo CFS()->get('address') ?>&output=embed&t=m&z=14&hl=ja" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="400"></iframe>
      </div>
      <p class="update">更新日: <?php the_date("Y m/d") ?></p>
      <?php endwhile; endif; ?>
    </div>
    
    <?php comments_template(); ?>
  </div>
</main>
<?php get_footer() ?>