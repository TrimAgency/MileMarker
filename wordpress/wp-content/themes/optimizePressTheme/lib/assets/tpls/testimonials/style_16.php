<?php include('style.inc.php'); ?>

<blockquote id="<?php echo $id; ?>" class="testimonial-style-7">
	<p><span><?php echo $content ?></span></p>
	<div class="tip-border"></div><div class="tip"></div>
	<?php echo (!empty($image) ? '<div class="testimonial-style-7-img-container"><img src="'.$image.'" alt="' . $name . '"></div>' : ''); ?>
	<cite><strong><?php echo $name ?></strong><a href="<?php echo $href ?>" target="_blank"><?php echo $company ?></a></cite>
</blockquote>