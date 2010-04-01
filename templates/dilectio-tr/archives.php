<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<!-- Container -->
<div class="CON">

<!-- Start SC -->
<div class="SC">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Aya Göre Arşiv:</h2>

<ul>
 <?php wp_get_archives('type=monthly'); ?>
</ul>

<h2>Kategoriye Göre Arşiv Konusu:</h2>
 <ul>
 <?php wp_list_categories(); ?>
</ul>

</div>
<!-- End SC -->

<?php get_sidebar(); ?>
</div>
<!-- End CON -->

<?php get_footer(); ?>