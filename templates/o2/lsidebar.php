<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>


	<li><h2><?php _e('Categories'); ?></h2>
		<ul>
			<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=1'); ?>
		</ul>
	</li>


	<?php wp_list_pages('depth=3&title_li=<h2>Pages</h2>'); ?>


	<?php get_links_list(); ?>

<?php endif; ?>

</ul>
