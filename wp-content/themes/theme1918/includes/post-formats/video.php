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
	<?php $embed = get_post_meta(get_the_ID(), 'tz_video_embed', TRUE); ?>
	
	<div class="video"><?php echo stripslashes(htmlspecialchars_decode($embed)); ?></div>
	<div class="entry-content">
		<?php the_content(''); ?>
	</div> <!--END .entry-content -->
</article> <!--END .hentry-->