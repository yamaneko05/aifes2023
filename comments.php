<div id="comments" class="comments">
  <?php if(have_comments()): ?>
    <h2>コメント</h2>
    <ul>
      <?php wp_list_comments(); ?>
    </ul>
 　<?php else: ?>
    <p class="no-comment">まだ最初のコメントはありません</p>
  <?php endif; ?>
  <p class="lets-comment">
    こんなことをコメントしてね！<br>
    <span>文化祭の宣伝、文化祭に関する質問、情報の間違いの指摘、利用者同士の交流</span>もご自由に！！
  </p>
  <?php $args = array(
    'title_reply' => 'コメントする',
		'comment_notes_before' => '<p>特定の人物、団体に対する誹謗中傷や荒らし行為等は運営が削除いたします。</p>',
    'label_submit' => '送信'
  );
  comment_form($args); ?>
</div>