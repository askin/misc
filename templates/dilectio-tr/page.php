<?php get_header(); ?>
<!-- Container -->
<div class="CON">

<!-- Start SC -->
<div class="SCS">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="Post" id="post-<?php the_ID(); ?>">
<h2 class="pagetitle"><?php the_title(); ?></h2>
<?php the_content('<p class="serif">Devamını okuyun &raquo;</p>'); ?>
<?php wp_link_pages(array('before' => '<p><strong>Sayfalar:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<?php if ( comments_open() ) comments_template(); ?>
<?php endwhile; endif; ?>
<?php edit_post_link('Yazıyı düzenleyin.', '<p>', '</p>'); ?>
</div>
<!-- End SC -->

<?php get_sidebar(); ?>
</div>
<!-- End CON -->

<?php get_footer(); ?>