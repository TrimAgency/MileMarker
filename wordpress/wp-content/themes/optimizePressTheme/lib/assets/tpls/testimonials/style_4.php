<?php include('style.inc.php'); ?>

<blockquote id="<?php echo $id; ?>" class="testimonial testimonial-image-style-3 cf">
	<img alt="" src="<?php echo $image ?>" />
	<div class="testimonial-content">
		<?php echo op_texturize($content); ?>
		<cite><strong><?php echo $name ?></strong> <a href="<?php echo $href ?>" target="_blank"><?php echo $company ?></a></cite>
	</div>
</blockquote>