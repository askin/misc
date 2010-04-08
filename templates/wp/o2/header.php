<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<script type="text/javascript" src="http://www.bobrektasi.org/wp-content/scripts/nicetitle.js"></script>
<link rel="stylesheet" href="http://www.bobrektasi.org/wp-content/scripts/nicetitle.css" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body>


<div id="outer">

<div id="wrapper">

<div id="header">
<div id="header_l">


<a href="<?php bloginfo('url'); ?>">
<br/>
<b>
<font color=#b24ff8 size="15">Böbrektaşı</font>
</b>
<br/>
<font color="white">Aşkın Yollu'nun Web Günlüğü</font>
</a>
</div>



   <div id="header_r">

        <?php include (TEMPLATEPATH . "/searchform.php"); ?>  

   </div><!-- header_r -->





</div><!-- header -->





<div id="nav">


     <div id="nav_l">   


        <div class="menu">


        <ul>


<li class="home"><a href="<?php bloginfo('url'); ?>">Anasayfa/Home</a></li>


<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>

<li><a href="<?php bloginfo('url'); ?>/category/scheme/">Scheme</a></li>


</ul>


        </div> <!-- menu -->


  


        <div class="rss">


        <ul>


        <li><a href="<?php bloginfo('rss2_url'); ?>">Entries</a> (RSS)</li>


        <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a> (RSS)</li>


        </ul>


        </div><!-- rss -->


     </div><!-- nav_l -->


</div><!-- nav -->
