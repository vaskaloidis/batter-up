<?php if(!is_singular()) : 
	$post_image_size = of_get_option('post_image_size');
	if($post_image_size=='' || $post_image_size=='normal'){
		if(has_post_thumbnail()) { ?>
			<figure class="featured-thumbnail fleft"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
		<?php } 
	} else {
		if(has_post_thumbnail()) {
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = aq_resize( $img_url, 471, 281, true ); //resize & crop img ?>
			<figure class="featured-thumbnail large">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
			</figure>
			<div class="clear"></div>
		<?php }
	}
else :
	$single_image_size = of_get_option('single_image_size');
	if($single_image_size=='' || $single_image_size=='normal'){
		if(has_post_thumbnail()) { ?>
			<figure class="featured-thumbnail fleft"><?php the_post_thumbnail(); ?></figure>
		<?php }
	} else {
		if(has_post_thumbnail()) {
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image = aq_resize( $img_url, 471, 281, true ); //resize & crop img ?>
			<figure class="featured-thumbnail large">
				<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
			</figure>
			<div class="clear"></div>
		<?php } 
	}
endif; ?>