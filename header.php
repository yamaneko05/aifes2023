<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-7PWSKYZY8N"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7PWSKYZY8N');
  </script>
  <!-- Google AdSense -->
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1469734080972695"
     crossorigin="anonymous"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://unpkg.com/ress/dist/ress.min.css'>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?php bloginfo("template_url") ?>/img/aifes-icon.png" type="image/x-icon">
  <title>あいフェス（愛知の文化祭情報サイト）</title>
  <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/style.css?<?php echo date('YmdHis'); ?>">
  <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/archive-festival.css?<?php echo date('YmdHis'); ?>">
  <?php if(is_front_page()): ?>
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/front-page.css?<?php echo date('YmdHis'); ?>">
  <?php elseif(is_singular('festival')): ?>
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/single-festival.css?<?php echo date('YmdHis'); ?>">
  <?php elseif(is_page('about_us')): ?>
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/page-about_us.css?<?php echo date('YmdHis'); ?>">
  <?php elseif(is_page('erea') or is_page( "schedule" )): ?>
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/page-erea.css?<?php echo date('YmdHis'); ?>">
  <?php elseif(is_page("contact")): ?>
      <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/page-contact.css?<?php echo date('YmdHis'); ?>">
  <?php elseif(is_single() or is_page('privacy_policy')): ?>
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/single.css?<?php echo date('YmdHis'); ?>">
  <?php elseif(is_page('instagram-result') or is_page('instagram')): ?>
    <link rel="stylesheet" href="<?php bloginfo("template_url") ?>/css/instagram.css?<?php echo date('YmdHis'); ?>">

  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="container">
      <a href="https://www.instagram.com/aifes_2023/" class="instagram">
        <img src="<?php bloginfo("template_url") ?>/img/icon/instagram-mono.png" alt="">
      </a>
      <a href="<?php bloginfo("url") ?>" class="logo">
        <img src="<?php bloginfo("template_url") ?>/img/aifes-logo.png" alt="">
      </a>
      <div class="hamburger" style="position: absolute;">
        <div class="toggle_btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <p>MENU</p>
      </div>
      <nav style="display: none;">
        <ul>
          <li><a href="<?php bloginfo("url") ?>/schedule">日程別に検索</a></li>
          <li><a href="<?php bloginfo("url") ?>/erea">地域別に検索</a></li>
          <li><a href="<?php bloginfo("url") ?>/requirements/free">自由入場の文化祭を検索</a></li>
          <li><a href="<?php bloginfo("url") ?>/comments">最新のコメント</a></li>
          <li><a href="<?php bloginfo("url") ?>/instagram">非公開: インスタ投稿スクショ用</a></li>
        </ul>
      </nav>
    </div>
  </header>