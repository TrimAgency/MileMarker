<?php include('style.inc.php'); ?>

<blockquote id="<?php echo $id; ?>" class="testimonial testimonial-image-style-6 cf">
	<div class="testimonial-image-content">
		<?php echo $content ?>
		<div class="cite-container">
			<cite>
				<img alt="" src="<?php echo $image ?>" />
				<span class="testimonial-image-style-6-cite-container">
					<strong><?php echo $name ?></strong><br />	<a href="<?php echo $href ?>" target="_blank"><?php echo $company ?></a>
				</span>
			</cite>
		</div>
	</div>
</blockquote>