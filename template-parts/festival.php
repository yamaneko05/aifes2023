<li class="festival">
  <?php
    $post_term_erea = get_the_terms( get_the_ID(), "erea" )[0];
    $post_terms_schedule = get_the_terms( get_the_ID(), "schedule" );
    $has_free = has_term( "free", "requirements");
    $comment_count = get_comments(array(
      'post_id' => $post->ID,
      'count' => true
    ));
    $festival = array(
      "title" => get_the_title(),
      "permalink" => get_the_permalink(),
      "thumbnail" => CFS()->get("thumbnail"),
      "name" => CFS()->get("name"),
      "terms_schedule" => $post_terms_schedule,
      "term_erea" => $post_term_erea,
      "has_free" => $has_free,
      "comment_count" => $comment_count
    );
    $args = $festival;
  ?>

  <p class="title">
    <?php echo $args["title"] ?>
    <?php if($args["name"] !== ""): ?>
      「<?php echo $args["name"] ?>」
    <?php endif; ?>
  </p>
  <div class="flexbox">
    <img class="thumbnail" src="<?php echo $args["thumbnail"]; ?>" alt="">
    <div class="text">
      <p class="date">日程: 
        <?php foreach($args["terms_schedule"] as $term_schedule): ?>
        <a class="tag" href="<?php echo get_term_link($term_schedule, "schedule"); ?>">
          <?php echo $term_schedule->name; ?>
        </a>
        <?php endforeach; ?>
      </p>
      <p class="erea">
        地域: 
        <a class="tag" href="<?php echo get_term_link($args["term_erea"], "erea"); ?>">
          <?php echo $args["term_erea"]->name; ?>
        </a>
      </p>
      <div class="info">
        <div class="comment">
          <img src="<?php bloginfo("template_url") ?>/img/icon/comments.png" alt="">
          <p><?php echo $args["comment_count"] ?></p>
        </div>
        <div class="like">
          <?php echo do_shortcode('[wp_ulike]'); ?>
        </div>
        <?php if($args["has_free"]): ?>
          <a class="has_free" href="<?php bloginfo("url") ?>/requirements/free">
            <img src="<?php bloginfo("template_url") ?>/img/icon/free.png" alt="">
          </a>
        <?php endif; ?>
      </div>
      <a class="readmore" href="<?php echo $args["permalink"] ?>">入場条件などを見る</a>
    </div>
  </div>
</li>


