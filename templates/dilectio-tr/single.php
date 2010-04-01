<?php get_header(); ?>
<!-- Container -->
<div class="CON">

<!-- Start SC -->
<div class="SC">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="Post" id="post-<?php the_ID(); ?>" style="padding-bottom: 20px;">
<div class="PostHead">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?> için kalıcı bağlantı"><?php the_title(); ?></a></h2>
<small class="PostTime">
<strong class="day"><?php the_time('j') ?></strong><strong class="month"><?php the_time('M') ?></strong><strong class="year"><?php the_time('Y') ?></strong>
</small>
<small class="PostCat">Kategori: <?php the_category(', ') ?></small>
<small class="PostAuthor">Yazar: <?php the_author() ?></small>

</div>
  
<div class="PostContent">
<?php the_content('<p class="serif">Devamını okuyun &raquo;</p>'); ?>
<?php wp_link_pages(array('before' => '<p><strong>Sayfalar:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>
<?php if (function_exists('the_tags')) { ?> <?php the_tags('<div class="PostCom"><ul><li class="Tags">Etiketler: ', ', ', '</li> </ul></div>'); ?> <?php } ?>
</div>

<!-- Similar Post Start -->
<div>
     <?php similar_posts(); ?>
</div>
<!-- Similar Post End   -->
<span class="Note">Bu yazıya yapılan yorumları <?php comments_rss_link('RSS 2.0'); ?> beslemesi ile takip edebilirsiniz.

<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Both Comments and Pings are open ?>
Cevap <a href="#respond">yazabilirsiniz</a>, veya sitenizden <a href="<?php trackback_url(); ?>" rel="trackback">geri bildirim</a> gönderebilirsiniz.

<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Only Pings are Open ?>Yorumlar şuan kapalı. Sitenizden <a href="<?php trackback_url(); ?> " rel="trackback">geri bildirimde</a> bulunabilirsiniz.

<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Comments are open, Pings are not ?>
En alta atlayarak hemen yorum yazabilirsiniz. Ping şuan kapalı.

<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Neither Comments, nor Pings are open ?>
Yorumlar ve pingler aktif.
<?php } edit_post_link('Yazıyı düzenleyin.','',''); ?>
</span>

<?php if ( comments_open() ) comments_template(); ?>
<?php endwhile; else: ?>

<p>Üzgünüm, aradığınız kriterde yazı bulunamadı.</p>

<?php endif; ?>

</div>
<!-- End SC -->

<?php get_sidebar(); ?>
</div>
<!-- End CON -->

<?php get_footer(); ?>