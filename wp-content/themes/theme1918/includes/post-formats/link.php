<article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
	<?php $url =  get_post_meta(get_the_ID(), 'tz_link_url', true); ?>
	<header class="entry-header">
		<div class="clearfix">
			<?php $post_meta = of_get_option('post_meta');
			if ($post_meta=='true') {?>
				<time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('j M'); ?></time> 
			<?php }?>
			<div class="extra-wrap">
				<h3 class="entry-title"><?php the_title(); ?></h3>
				<?php get_template_part('includes/post-formats/post-meta'); ?>
			</div>
		</div>
	</header>

	<div class="content">
		<?php the_content(''); ?>
	</div> <!--// .content -->
</article> <!--//.post-holder-->  