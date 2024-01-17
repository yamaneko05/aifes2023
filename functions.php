<?php
// festivalカスタム投稿タイプの登録
function create_post_type() {
register_post_type(
  'festival',
  array(
    'label' => '文化祭',
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'menu_position' => 5,
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'revisions',
      'comments'
    ),
  )
);
}
add_action( "init", "create_post_type");

// CSSキャッシュ
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('my_style',bloginfo('template_url').'/css/style.css');
  // wp_enqueue_style('my_style',bloginfo('template_url').'/css/style.css');
  // wp_enqueue_style('my_style',bloginfo('template_url').'/css/style.css');
  // wp_enqueue_style('my_style',bloginfo('template_url').'/css/style.css');
  // wp_enqueue_style('my_style',bloginfo('template_url').'/css/style.css');
}, 11);


// コメントフォームの内容カスタマイズ
function comment_fields_control($defaults){
  $defaults['comment_notes_before'] = ''; // コメント上部の文章（メールアドレスが公開されることはありません。）
  $defaults['fields']['email'] = ''; // メールアドレス
  $defaults['fields']['url'] = ''; // ウェブサイト
  $defaults['label_submit'] = '送信'; // 送信ボタンのラベル
  return $defaults;
}
add_filter( 'comment_form_defaults', 'comment_fields_control');

  ?>