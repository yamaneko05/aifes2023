<?php get_header() ?>
<script>
  function copyToClipboard() {
    var copyTarget = document.getElementById("textarea");
    copyTarget.select();
    document.execCommand("Copy");
  }
</script>
<main>
  <h2><?php the_title(); ?></h2>
  <?php
  $schedule = $_GET['schedule'];
  $term = get_term( $schedule, "schedule");
  $w = wp_date("w", strtotime("2023-".$term->slug));

  $week = array( "日", "月", "火", "水", "木", "金", "土" );
  ?>
  <p><?php echo $term->name ?></p>

  <section>
    <h3>テキスト</h3>
    <textarea id="textarea">
<?php echo $term->name ?>（<?php echo $week[$w] ?>）に開催される愛知県内の高校の文化祭情報をお届け𓂃💖
👆の文化祭をあいフェスで見る
<?php echo get_term_link( $term, "schedule" ) ?>

<?php 
$args = array(
  "post_type" => "festival",
  "posts_per_page" => -1,
  "taxonomy" => "schedule",
  "term" => $term->slug,
);
$my_query = new WP_Query($args);
$count = $my_query->post_count;
?>
<?php while($my_query->have_posts()): $my_query->the_post(); ?>
・<?php the_title() ?>
<?php endwhile; ?>

この<?php echo $count ?>校で開催されるようです☺️
この機会に自分の近くの高校文化祭などを調べてはいかがですか？

愛知県内の文化祭開催情報をまとめたホームページはこちら👇
aifes.net

#文化祭 #文化祭準備 #文化祭1日目 #文化祭シーズン #高校 #高校生 #高校メンバー #高校生活 #愛知県
    </textarea>
    <button onclick="copyToClipboard()">テキストをコピー</button>
  </section>

  <section>
    <h3>表紙</h3>
    <div class="insta0 frame">
      <p class="title"><span><?php echo $term->name ?>(<?php echo $week[$w] ?>)</span>開催<br>愛知県の文化祭</p>
      <p class="count"><strong><?php echo $count ?></strong>選</p>
    </div>
  </section>
  
  <section>
    <h3>文化祭</h3>
    <ul class="insta1">
      <?php
      $my_query = new WP_Query($args);
      $count = $my_query->post_count;
      ?>
      <?php while($my_query->have_posts()): $my_query->the_post();
      $post_term_erea = get_the_terms( get_the_ID(), "erea" )[0];
      $post_terms_schedule = get_the_terms( get_the_ID(), "schedule" );
      $has_free = has_term( "free", "requirements"); ?>

      <li class="frame">
        <p class="title"><?php the_title() ?></p>
        <?php if(CFS()->get("name") !== ""): ?>
        <p class="name">「<?php echo CFS()->get("name") ?>」</p>
        <?php endif; ?>
        <p class="tags">
          <?php foreach($post_terms_schedule as $term_schedule): ?>
          <a class="tag" href="<?php echo get_term_link($term_schedule, "schedule"); ?>">
            <?php echo $term_schedule->name; ?>
          </a>
          <?php endforeach; ?>
          <a class="tag" href="<?php echo get_term_link($post_term_erea, "erea"); ?>">
            <?php echo $post_term_erea->name; ?>
          </a>
        </p>
        <?php if(CFS()->get("highlight") == "" && CFS()->get("info") == ""): ?>
          <div class="spacer" style="height: 130px;"></div>
          <img src="<?php echo CFS()->get("thumbnail") ?>" alt="">
        <?php else: ?>
          <p class="detail">
            <?php echo CFS()->get("highlight"); ?>
            <?php echo CFS()->get("info"); ?>
          </p>
        <?php endif; ?>
      </li>
      <?php endwhile; ?>

    </ul>
  </section>
</main>
<?php get_footer() ?>