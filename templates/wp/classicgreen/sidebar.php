<link href="style.css" rel="stylesheet" type="text/css" />
<div id="sidebar">
<ul>

  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

    <li>
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </li>

    <?php 
    global $notfound;
    if (is_page() and ($notfound != '1')) {
        $current_page = $post->ID;
        while($current_page) {
            $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
            $current_page = $page_query->post_parent;
        }
        $parent_id = $page_query->ID;
        $parent_title = $page_query->post_title;

        // if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) {
        if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_type != 'attachment'")) {
    ?>

    <li>
      <h2 class="sidebartitle"><?php echo $parent_title; ?> <?php _e('Subpages'); ?></h2>
      <ul class="list-page">
        <?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?>
      </ul>
    </li>

    <?php } } ?>
  <li>
    <h2 class="sidebartitle" >Yaz&#305;lar</h2>
  	<?php query_posts('showposts=5'); ?>
	<ul class="list-rec">
	<?php while (have_posts()) : the_post(); ?>
	<li>
	<strong><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></strong><br />
	<small><?php the_time('m-d-Y') ?></small>
	</li>
              <?php endwhile;?>
            </ul>
      <h2 class="sidebartitle"><?php _e('Katagoriler'); ?></h2>
      <ul class="list-cat">
        <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
      </ul>
    </li>
    <li>
      <h2 class="sidebartitle"><?php _e('Arsivler'); ?></h2>
      <ul class="list-archives">
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </li>
    <li>
      <h2 class="sidebartitle"><?php _e('Linkler'); ?></h2>
      <ul class="list-blogroll">
        <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
      </ul>
    </li>
<li>
<h2 class="sidebartitle"><?php _e('Meta'); ?></h2>
   <ul class="list-meta">
     <?php wp_register(); ?>
     <li><?php wp_loginout(); ?></li>
    <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
    <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
    <?php wp_meta(); ?>
      </ul>
    </li>
<?php endif; ?>
</ul>
</div>
<!--/sidebar -->