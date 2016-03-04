<article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
	<header class="entry-header">
		<div class="clearfix">
			<?php $post_meta = of_get_option('post_meta');
			if ($post_meta=='true') {?>
				<time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('j M'); ?></time> 
			<?php }?>
			<div class="extra-wrap">
				<?php if(!is_singular()) : ?>
					<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', 'theme1918');?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php else :?>
					<h3 class="entry-title"><?php the_title(); ?></h3>
				<?php endif;
				get_template_part('includes/post-formats/post-meta'); ?>
			</div>
		</div>
	</header>
	
	<div class="clearfix">
		<?php get_template_part('includes/post-formats/post-thumb'); 
		
		if(!is_singular()) : ?>
			<div class="post-content extra-wrap">
				<?php $post_excerpt = of_get_option('post_excerpt');
				if ($post_excerpt=='true' || $post_excerpt=='') { ?>
					<div class="excerpt">
						<?php $content = get_the_content();
						$excerpt = get_the_excerpt();
	
						if (has_excerpt()) {
							the_excerpt();
						} else {
							if(!is_search()) {
								echo my_string_limit_words($content,33);
							} else {
								echo my_string_limit_words($excerpt,33);
							}
						} ?>
					</div>
				<?php } ?>
				<a href="<?php the_permalink() ?>" class="link"><?php _e('Read more', 'theme1918'); ?></a>
			</div>
		<?php else :?>
			<div class="content">
				<?php the_content(''); ?>
			</div> <!--// .content -->
		<?php endif; ?>
	</div>
</article>