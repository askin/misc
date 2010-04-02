<div class="Comments">
<div class="List">
<!-- Start CommentsList-->
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Bu yazı parola korumalıdır. Yorumları görebilmek için parolayı girmelisiniz.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to <?php the_title('&#8220;','&#8221;'); ?></h3>

<ol id="commentlist">

<?php foreach ($comments as $comment) : ?>

<li id="comment-<?php comment_ID() ?>">

<p class="LUsr"><strong><?php comment_author_link() ?></strong><br />
 <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></p>
<small class="LGrav"><?php if (function_exists('gravatar')) { ?>
<img src="<?php gravatar('X', '27', get_bloginfo('template_url')."/images/AvatarReplace.png"); ?>" alt="<?php //_e('Gravatar'); ?>" />
<?php } ?></small>
<div class="LCon">
<?php comment_text() ?>
</div>
<small style="color:#FF0000;"><?php if ($comment->comment_approved == '0') : ?>Yorumunuz onay bekliyor.Onay beklemeden görüntülenemez<?php endif; ?></small>
</li>

<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';	?>
<?php endforeach; /* end for each comment */ ?>

</ol>


<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments">Yorumlar kapalı.</p>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
</div>



<h3 id="respond">Yorum Yaz</h3> 
<div class="Form"><div class="FormTop"></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Yorum yapabilmek için <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">giriş</a> yapmalısınız.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p style="display: block; margin-top: 5px; font-size: 10px; font-weight: bold;"><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> olarak giriş yapılmış. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Çıkış">Çıkış &raquo;</a>
</p>
<br clear="all" />
<?php else : ?>
<p>
<label for="author">
<small>İsminiz <?php if ($req) _e('(<strong>*</strong>)'); ?></small>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="TextField Name" style="width: 384px; background: #e9f8ff url(<?php bloginfo('template_url'); ?>/images/FormName.png) no-repeat left top" />
</label>
</p>
		
<p>
<label for="email">
<small>E-Postanız (<?php if ($req) _e('<strong>*</strong>'); ?>)</small>
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="TextField"  style="width: 384px; background: #e9f8ff url(<?php bloginfo('template_url'); ?>/images/FormEmail.png) no-repeat left top" />
</label>
</p>
		
<p>
<label for="url">
<small><abbr title="Uniform Resource Identifier">Web Siteniz</abbr></small>
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="TextField URI" style="width: 384px; background: #e9f8ff url(<?php bloginfo('template_url'); ?>/images/FormURI.png) no-repeat left top" />
</label>
</p>
<?php endif; ?>
<p>
<label><small>Mesajlar</small>
<textarea name="comment" id="comment" rows="6" tabindex="4" class="TextArea" style="width: 409px;" cols="7"></textarea>
</label>
</p>
<p><input name="SubmitComment" type="image" class="SubmitComment" onmouseover="javascript:changeSty('SubmitCommentIE');" onmouseout="javascript:changeSty('SubmitComment');"  title="Post Your Comment" src="<?php bloginfo('template_url'); ?>/images/ButtonTransparent.png" alt="Post Your Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
<?php do_action('comment_form', $post->ID); ?></form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>
<div class="FormBottom"></div>

</div>