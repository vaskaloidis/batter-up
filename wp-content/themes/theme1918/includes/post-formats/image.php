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
	<?php if (has_post_thumbnail() ):
		$lightbox = get_post_meta(get_the_ID(), 'tz_image_lightbox', TRUE); 

		if($lightbox == 'yes') {$lightbox = TRUE;}
		else {$lightbox = FALSE;}

		$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' );  ?>

		<div class="post-thumb clearfix">
			<?php $thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = aq_resize( $img_url, 471, 281, true ); //resize & crop img

			if($lightbox) : ?>
				<figure class="image-post-format">
					<a class="image-wrap" rel="prettyPhoto" title="<?php the_title(); ?>" href="<?php echo $src[0]; ?>">
						<img src="<?php echo $image ?>" alt="<?php the_title(); ?>">
						<span class="zoom-icon"></span>
					</a>
				</figure>
				<div class="clear"></div>
				<span class="overlay">
					<span class="arrow"></span>
				</span>
			<?php else: ?>
				<figure class="image-post-format">
					<img src="<?php echo $image ?>" alt="<?php the_title(); ?>">
				</figure>
				<div class="clear"></div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(''); ?>
	</div> <!--END .entry-content -->
</article> <!--// .post-holder-->  