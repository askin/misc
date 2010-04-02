<?php get_header(); ?>

<div id="container">

	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">

<div class="post_header">
     <div class="the_date">
        <div class="date_m"><?php the_time('M') ?></div>
        <div class="date_d"><?php the_time('jS') ?></div>
     </div><!-- the_date -->

     <div class="post_headerr">
        <div class="post_title">
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </div>
        <div class="details">
      <span class="files"><?php _e('Files under'); ?> <?php the_category(', ') ?></span> | 
      <span><?php _e('Posted by'); ?> <?php  the_author(); ?></span>
 
        </div>
     </div><!-- post_headerr -->
</div><!-- post_header -->

			<div class="entry">


				<?php the_content(); ?>

			</div>

		</div>

	<?php endwhile; ?>
<?php edit_post_link('| Edit', '', ' | '); ?>
<?php comments_template(); ?>
		
	<?php else : ?>

		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>