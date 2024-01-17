<?php get_header(); ?>

<main>
  <div id="mainvisual">
    <div class="wrapper">
      <?php get_search_form(); ?>
      <p class="search">現在<span style="font-weight: bold;"><?php echo wp_count_posts('festival')->publish; ?>校</span>の文化祭の情報を掲載しています。※情報提供募集中！</p>

      <div class="ranking">
        <h2>注目度ランキング</h2>
        <ul>
        <?php 
        $args = array(
          $post__in = wp_ulike_get_popular_items_ids(array(
            'type'       => 'post',
            'rel_type'   => 'festival',
            'status'     => 'like',
            'period'     => 'all',
          )),     
          'posts_per_page' => 5, // 10件表示
          'post__in' => $post__in,
          'post_type' => 'festival', // カスタム投稿名（例:newsの場合）
          'orderby' => 'post__in',
          'order' => 'DESC' // いいねの降順
          );
          $my_query = new WP_Query($args);
          $rank = 0;
        ?>
        <?php if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post(); ?>
        <?php
        $rank = $rank + 1;
        $comment_count = get_comments(array(
          'post_id' => $post->ID,
          'count' => true
        )); ?>
        <li>
          <a class="title" href="<?php the_permalink(); ?>"><span><?php echo $rank ?>位</span><?php the_title() ?></a>
          <div class="info">
            <div class="comment">
              <img src="<?php bloginfo("template_url") ?>/img/icon/comments.png" alt="">
              <p><?php echo $comment_count ?></p>
            </div>
            <div class="like">
              <?php echo do_shortcode('[wp_ulike]'); ?>
          </div>
          </li>
        <?php endwhile; endif;
        wp_reset_postdata(); ?>
        </ul>
        <a class="button" href="<?php bloginfo("url") ?>/ranking">ランキングをもっと見る</a>
      </div>

      <div class="tomorrow ranking">
        <?php
        $tomorrow = wp_date("m-d", strtotime("1 day"));
        $tomorrow = str_replace("0", "", $tomorrow);
        ?>
        <?php $term = get_terms("schedule", array("slug" => $tomorrow))[0]; ?>
        <h2>明日(<?php echo $term->name ?>)開催の文化祭</h2>
        <ul>
        <?php 
        $args = array(
          'posts_per_page' => -1, // 10件表示
          'post_type' => 'festival', // カスタム投稿名（例:newsの場合）
          "taxonomy" => "schedule",
          "term" => $term->slug
          );
          $my_query = new WP_Query($args);
        ?>
        <?php if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post(); ?>
        <li>
          <a class="title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
          <div class="info">
            <div class="comment">
              <img src="<?php bloginfo("template_url") ?>/img/icon/comments.png" alt="">
              <p><?php echo $comment_count ?></p>
            </div>
            <div class="like">
              <?php echo do_shortcode('[wp_ulike]'); ?>
          </div>
          </li>
        <?php endwhile; endif;
        wp_reset_postdata(); ?>
        </ul>
        <a class="button" href="<?php echo get_term_link(  $term, "schedule"  ) ?>">明日の文化祭を見る</a>
      </div>

      <div class="description">
        <p>
          <img src="<?php bloginfo("template_url") ?>/img/aifes-logo.png" alt="">
          は愛知県内の高校生６人が運営する県内の文化祭の日程や魅力・特色などが見れるサイトです。
        </p>
      </div>

      <!-- <?php
      $post = get_posts(['posts_per_page' => 1])[0];
      setup_postdata( $post );
      ?>
      <a href="<?php the_permalink() ?>" class="news">
        <p><span>最新のお知らせ:</span> <?php the_title() ?></p>
      </a>
      <?php wp_reset_postdata(); ?> -->

      <ul class="tabs">
        <li class="active" data-id="latest">
          <img src="<?php bloginfo("template_url") ?>/img/icon/latest.png" alt="">
          <p>文化祭</p>
        </li>
        <li data-id="comments">
          <img src="<?php bloginfo("template_url") ?>/img/icon/comments.png" alt="">
          <p>コメント</p>
        </li>
        <li data-id="news">
          <img src="<?php bloginfo("template_url") ?>/img/icon/news.png" alt="">
          <p>お知らせ</p>
        </li>
      </ul>
    </div>
  </div>

  <div class="wrapper tab-content">
    <section id="latest" class="active">
      <p class="description" style="font-size: 14px;">
        日程や地域、入場条件などで文化祭を検索できます。
      </p>
      <div id="buttons">
        <ul>
          <li>
            <a href="<?php bloginfo("url") ?>/schedule">
              <img src="<?php bloginfo("template_url") ?>/img/icon/schedule.png" alt="">
              <p>日程別で検索</p>
            </a>
          </li>
          <li>
            <a href="<?php bloginfo("url") ?>/erea">
              <img src="<?php bloginfo("template_url") ?>/img/icon/erea.png" alt="">
              <p>地域別で検索</p>
            </a>
          </li>
          <li class="free">
            <a href="<?php bloginfo("url") ?>/requirements/free">
              <img src="<?php bloginfo("template_url") ?>/img/icon/free.png" alt="">
              <p>自由入場の文化祭を検索</p>
            </a>
          </li>
        </ul>
      </div>

      <div class="weekly">
        <h2>今週の文化祭</h2>
        <?php $term = get_terms("schedule", array("slug" => "9w1"))[0]; ?>
        <a class="week" href="<?php get_term_link( $term, "schedule" ); ?>" class="week"><?php echo $term->name; ?></a>
        <ul>
        <?php 
        $args = array(
          'posts_per_page' => -1, // 10件表示
          'post_type' => 'festival', // カスタム投稿名（例:newsの場合）
          "taxonomy" => "schedule",
          "term" => $term->slug
          );
          $my_query = new WP_Query($args);
        ?>
        <?php if($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post(); ?>
        <?php
        $comment_count = get_comments(array(
          'post_id' => $post->ID,
          'count' => true
        )); ?>
        <li>
          <a class="title" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
        </li>
        <?php endwhile; endif;
        wp_reset_postdata(); ?>
        </ul>
        <a class="button" href="<?php echo get_term_link(  $term, "schedule"  ) ?>">今週の文化祭を見る</a>
      </div>


      <p class="description">
        掲載日時順に文化祭が表示されます。
      </p>
      <ul class="festivals">
        <?php 
          $args = array(
            "post_type" => "festival",
            "posts_per_page" => 6
          );
          $my_query = new WP_Query($args);
        ?>
        <?php while($my_query->have_posts()): $my_query->the_post(); ?>
        <?php
        // $post_term_erea = get_the_terms( get_the_ID(), "erea" )[0];
        // $post_terms_schedule = get_the_terms( get_the_ID(), "schedule" );
        // $has_free = has_term( "free", "requirements");
        // $comment_count = get_comments(array(
        //   'post_id' => $post->ID,
        //   'count' => true
        // ));
        // $festival = array(
        //   "title" => get_the_title(),
        //   "permalink" => get_the_permalink(),
        //   "thumbnail" => CFS()->get("thumbnail"),
        //   "name" => CFS()->get("name"),
        //   "terms_schedule" => $post_terms_schedule,
        //   "term_erea" => $post_term_erea,
        //   "has_free" => $has_free,
        //   "comment_count" => $comment_count
        // );
        // get_template_part( "template-parts/festival", null, $festival ) ?>
        <?php get_template_part( "template-parts/festival") ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(  ); ?>
      </ul>
      <a class="button" href="<?php bloginfo("url") ?>/festival/page/2/">文化祭をもっと見る</a>
    </section>
    
    <section id="comments">
      <p class="description">
        最新の書き込み順にコメントが表示されます。
      </p>

      <div class="comments">
        <ul>
          <?php $comments = get_comments(["number"=>9]);?>
          <?php foreach($comments as $comment): ?>
            <?php $post = get_post( $comment->comment_post_ID); ?>
            <li>
              <a href="<?php comment_link() ?>">
              <div class="comment-author">
                <img src="<?php bloginfo( "template_url") ?>/img/icon/person.png" alt="">
                <p class="fn"><?php echo $comment->comment_author ?></p>
              </div>
              <div class="comment-meta"><?php echo $comment->comment_date ?> 高校: <span><?php the_title() ?></div>
              <p><?php echo $comment->comment_content ?></p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <a class="button" href="<?php bloginfo("url") ?>/comments">コメントをもっと見る</a>

      </div>
    </section>

    <section id="news">
      <p class="description">
        運営からのお知らせ記事が表示されます。
      </p>

      <ul>
        <?php if(have_posts()): while(have_posts()): the_post() ?>
        <li>
          <a href="<?php the_permalink() ?>">
            <div class="text">
              <p class="title"><?php the_title() ?></p>
              <p class="date">更新日: <?php echo get_the_date("Y m/d") ?> | 投稿者: <?php the_author() ?></p>
            </div>
          </a>
        </li>
        <?php endwhile; endif; ?>
      </ul>
      <a class="button" href="<?php bloginfo("url") ?>/archive">過去のお知らせを見る</a>

    </section>
  </div>
</main>
<?php get_footer(); ?>
