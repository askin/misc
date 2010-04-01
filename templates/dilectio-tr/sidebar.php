<div class="SR">

<!-- Start SideBar1 -->
<div class="SRL">


<!-- Start Search -->
<div class="Search">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="s" class="keyword" />
<div class="bt">
<input name="submit" type="image" class="search" title="Ara" src="<?php bloginfo('template_url'); ?>/images/ButtonTransparent.png" alt="Ara" />
</div>
</form>
<div class="Syn">
 <ul>
  <li><a href="<?php bloginfo('rss2_url'); ?>">Yazılar</a> (RSS)</li>
  <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Yorumlar</a> (RSS)</li>
 </ul>
</div>
</div>
<!-- End Search -->


<!-- Start About This Blog -->
<?php include (TEMPLATEPATH . "/about-blog.php"); ?>
<!-- End About This Blog -->


<!-- Start Recent Comments/Articles -->
<div class="Recent">
<ul class="TabMenu">
 <li class="TabLink"><a href="#" id="tab0" onclick="ShowTab(0)"><span>Son Yorumlar</span></a></li>
 <li class="TabLink"><a href="#" id="tab1" onclick="ShowTab(1)"><span>Son Yazılar</span></a></li>
 <li class="NavLinks" id="paging0"><div style="display:none"></div></li>
 <li class="NavLinks" id="paging1"><div style="display:none"></div></li>
</ul>
<?php if (function_exists('mdv_recent_comments')) { ?>
<div class="TabContent" style="display:none" id="div0">
 <ul>
 <?php mdv_recent_comments(); ?>
 </ul>
</div>
<?php } ?>
<?php if (function_exists('mdv_recent_posts')) { ?>
<div class="TabContent" style="display: none" id="div1">	
 <ul>
  <?php mdv_recent_posts(); ?>
 </ul>
</div>
<?php } ?>
<script type="text/javascript">ShowTab(0);</script>
</div>
<!-- End Recent Comments/Articles -->

<br clear="all" />

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
</div>
<!-- End SideBar1 -->


<!-- Start SideBar2 -->
<div class="SRR">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

<!-- Start Hayat -->
<div class="hayat">
   <a href="http://www.hayattv.net/">
      <img src="http://blog.yollu.com/images/hayat.png" alt="Hayat Susturulamaz!!!" />
   </a>
</div>
<!-- End Hayat    -->	

<!-- Start Categories -->
<div class="widget widget_categories">
   <h2>Kategoriler</h2>
   <ul>
      <?php wp_list_cats('show_count=1'); ?>
   </ul>
</div>
<!-- End Categories -->

<div id="twitter_div">
<h2 class="sidebar-title">Twitter</h2>
<ul id="twitter_update_list"></ul>
</div>
<!-- Start Links -->
<div class="widget widget_links">
<h2>Bağlantılar</h2>
 <ul><?php get_links('-1', '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
</ul>
</div>
<!-- End Links -->

<!-- Start Ubuntu -->
<center>
   <img src="<?php echo get_option('home'); ?>/images/ubuntu.png" width="150px" alt="Ubuntu" />
</center>
<!-- Stop  Ubuntu -->

<!-- Start Debian -->
<center>
   <img src="<?php echo get_option('home'); ?>/images/debian.png" width="150px" alt="Debian" />
</center>
<!-- Stop  Debian -->

<?php endif; ?>
</div>
<!-- End SideBar2 -->

</div>