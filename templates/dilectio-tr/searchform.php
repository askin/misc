<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" class="key"  value="Ara..." name="s" id="s" onfocus="if(this.value=='Search...')this.value=''" onblur="if(this.value=='')this.value='Ara...'" />
<div class="bt">
<input name="submit" type="image" class="search" title="Ara" src="<?php bloginfo('template_url'); ?>/images/ButtonTransparent.png" alt="Search" />
</div>
</form>