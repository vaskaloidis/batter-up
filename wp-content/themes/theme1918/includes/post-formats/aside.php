<article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
	<header class="entry-header">
		<?php get_template_part('includes/post-formats/post-meta'); ?>
	</header>
		
	<div class="entry-content">
		<?php the_content('<span>Continue Reading</span>'); ?>
	</div> <!--END .entry-content -->
</article> <!--END .hentry-->