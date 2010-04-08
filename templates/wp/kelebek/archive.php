<?php get_header(); ?>
<!-- Container -->
<div class="CON">

<!-- Start SC -->

<div class="SC">
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="pagetitle"> &#8216;<strong><?php single_cat_title(); ?></strong>&#8217; Category</h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php the_time('F jS, Y'); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php the_time('F, Y'); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php the_time('Y'); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle">Yazarın Arşivi</h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="pagetitle">Blog Arşivi</h2>
<?php } ?>


<!-- Start Nav -->
<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
<!-- End Nav -->

<?php while (have_posts()) : the_post(); ?>
<div class="Post" id="post-<?php the_ID(); ?>" style="padding: 5px 0px;">
<div class="PostHead" style="margin-left: 0px;">
<h3><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<small class="PostAuthor">By: <?php the_author() ?> on: <?php the_time('M j,Y') ?></small>
<small class="PostCat">In: <?php the_category(', ') ?></small>
</div>

</div>
<?php endwhile; ?>

<!-- Start Nav -->
<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
<!-- End Nav -->

<?php else : ?>

<h2 class="pagetitle">Sayfa Bulunamadı<a href="http://www.domatessuyu.com">.</a></h2>
<?php endif; ?>

</div>
<!-- End SC -->

<?php get_sidebar(); ?>
</div>
<!-- End CON -->

<?php get_footer(); ?>