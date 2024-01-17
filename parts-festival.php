<li class="festival">
  <p class="title"><?php the_title() ?>「<?php echo CFS()->get("name") ?>」</p>
  <div class="flexbox">
    <img class="thumbnail" src="<?php echo CFS()->get("thumbnail"); ?>" alt="">
    <div class="text">
      <p class="date">日程: <?php echo CFS()->get("date") ?>, <?php echo CFS()->get("date2") ?></p>
      <a href="<?php the_permalink() ?>">入場条件などを見る</a>
    </div>
  </div>
</li>
