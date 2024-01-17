<div class="wrapper">
  <div id="application">
    <p class="head">あいフェスは<br>高校生６人のチームによって<br>制作、運営されています！！</p>
    <a href="<?php bloginfo("url") ?>/about_us">あいフェスについて</a>
    <div class="text">
      <p>現在愛知県内の高校<span><?php echo wp_count_posts('festival')->publish; ?>件</span>の情報を掲載しています。</p>
    </div>
  </div>
</div>

<footer>
  <div class="wrapper">
    <div class="content">
      <a href="<?php bloginfo("url") ?>" class="logo">
        <img src="<?php bloginfo("template_url") ?>/img/aifes-logo.png" alt="">
      </a>
      <a href="https://www.instagram.com/aifes_2023/" class="instagram" style="font-size: 14px;">
        <img src="<?php bloginfo("template_url") ?>/img/icon/instagram.png" alt="">
        <p>
          <strong>あいフェス公式インスタ @ aifes_2023</strong><br>
          愛知県の文化祭を盛り上げるための発信やサイトの制作風景を投稿しています！！
        </p>
      </a>

      <ul>
        <li><a href="<?php bloginfo("url") ?>/about_us">私たちについて</a></li>
        <li><a href="<?php bloginfo("url") ?>/service">情報の修正、削除の依頼</a></li>
        <li><a href="<?php bloginfo("url") ?>/privacy_policy">プライバシーポリシー</a></li>
        <li><a href="<?php bloginfo("url") ?>/contact">お問い合わせ</a></li>
      </ul>
    </div>
    <p class="copyright">@ aifes_2023</p>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="<?php bloginfo("template_url") ?>/js/main.js?<?php echo date('YmdHis'); ?>"></script>
<?php wp_footer(); ?>
</body>
</html>