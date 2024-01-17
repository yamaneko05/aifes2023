<?php get_header() ?>
<main>
  <div class="wrapper">
    <?php $term = get_queried_object(); ?>
    <p class="breadcrumbs">
      <a href="<?php bloginfo("url") ?>">TOP</a>>
      <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
    </p>
    <div id="head">
      <h1><?php the_title() ?></h1>
      <p class="description">コメントをクリックするとコメントの文化祭ページに飛びます。</p>
    </div>

    <div class="comments">
      <ul>
        <?php $comments = get_comments();?>
        <?php foreach($comments as $comment): ?>
          <?php $post = get_post( $comment->comment_post_ID); ?>
          <li>
            <a href="<?php comment_link() ?>">
            <div class="comment-author">
              <img src="<?php bloginfo( "template_url") ?>/img/icon/person.png" alt="">
              <p class="fn"><?php echo $comment->comment_author ?></p>
            </div>
            <div class="comment-meta"><?php echo $comment->comment_date ?>from: <span><?php the_title() ?></span></div>
            <p><?php echo $comment->comment_content ?></p>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</main>
<?php get_footer() ?>