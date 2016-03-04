<?php
// =============================== My Post Cycle widget ======================================
class MY_CycleWidget extends WP_Widget {
	/** constructor */
	function MY_CycleWidget() {
		parent::WP_Widget(false, $name = 'My - Post Cycle');	
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$limit = apply_filters('widget_limit', $instance['limit']);
		$category = apply_filters('widget_category', $instance['category']);
		$count = apply_filters('widget_count', $instance['count']);
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title; 
		
		if($category=="testi"){?>
			<script type="text/javascript">
				jQuery(function(){
					jQuery('#slides').slides({
						effect: 'fade',
						crossfade: true,
						preload: true,
						generateNextPrev: true,
						autoHeight: true
					});
				});
			</script>
			
			<div id="slides">
				<div class="slides_container">
					<?php $limittext = $limit;
					global $more;	$more = 0;
					query_posts("posts_per_page=". $count ."&post_type=" . $category);
					
					while (have_posts()) : the_post(); 
						$custom = get_post_custom($post->ID);
						$testiname = $custom["my_testi_caption"][0];
						$testiurl = $custom["my_testi_url"][0];
						$testiinfo = $custom["my_testi_info"][0]; ?>

						<div class="testi_item">
							<blockquote>
								<?php if($limittext=="" || $limittext==0){ 
									the_excerpt();
								}else{
									$excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,$limittext);
								} ?>
							</blockquote>

							<div class="name-testi">
								<span class="user"><?php echo $testiname; ?></span>,<br>
								<span class="info"><?php echo $testiinfo; ?></span><br>
								<a href="http://<?php echo $testiurl; ?>"><?php echo $testiurl; ?></a><br>
							</div>
						</div>
					<?php endwhile;
					wp_reset_query(); ?>
				</div>
			</div> <!-- end of testimonials -->
		<?php } elseif($category=="portfolio"){ ?>
			<script type="text/javascript">
				jQuery(function(){
					jQuery('#slides').slides({
						effect: 'fade',
						crossfade: true,
						preload: true,
						generateNextPrev: true,
						autoHeight: true
					});
				});
			</script>
			<div id="slides">
				<div class="slides_container">
					<?php $limittext = $limit;
					global $more;	$more = 0;
					query_posts("posts_per_page=". $count ."&post_type=" . $category);
					
					while (have_posts()) : the_post(); 
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 270, 170, true ); //resize & crop img ?>

						<div class="item">
							<figure class="featured-thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"></a>
							</figure>
							<?php if($limittext!="" || $limittext!=0){ ?>
								<?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,$limittext);
							} ?>
						</div>
					<?php endwhile;
					wp_reset_query(); ?>
				</div>
			</div> <!-- end of portfolio_cycle -->
		<?php } else { ?>
			<script type="text/javascript">
				jQuery(function(){
					jQuery('#slides').slides({
						effect: 'fade',
						crossfade: true,
						preload: true,
						generateNextPrev: true,
						autoHeight: true
					});
				});
			</script>
			<div id="slides">
				<div class="slides_container">
					<?php $limittext = $limit;
					global $more;	$more = 0;
					query_posts("posts_per_page=" . $count . "&post_type=" . $category);
					
					while (have_posts()) : the_post(); 
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 270, 170, true ); //resize & crop img ?>

						<div class="cycle_item">
							<figure class="featured-thumbnail small"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>"></a></figure>
							<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							<?php if($limittext=="" || $limittext==0){
								the_excerpt();
							}else{ 
								$excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,$limittext);
							} ?>
						</div>
					<?php endwhile;
					wp_reset_query(); ?>
				</div>
			</div><!-- end of post_cycle -->
		<?php }
		echo $after_widget; 
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$title = esc_attr($instance['title']);
		$limit = esc_attr($instance['limit']);
		$category = esc_attr($instance['category']);
		$count = esc_attr($instance['count']); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'theme1918'); ?> 
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>">
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>">
				<?php _e('Limit Text:', 'theme1918'); ?> 
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>">
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">
				<?php _e('Posts per page:', 'theme1918'); ?> 
				<input class="widefat" style="width:30px; display:block; text-align:center" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>">
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>">
				<?php _e('Show profile link:', 'theme1918'); ?><br>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" style="width:150px;" > 
					<option value="testi" <?php echo ($category === 'testi' ? ' selected="selected"' : ''); ?>>Testimonials</option>
					<option value="portfolio" <?php echo ($category === 'portfolio' ? ' selected="selected"' : ''); ?> >Portfolio</option>
					<option value="" <?php echo ($category === '' ? ' selected="selected"' : ''); ?>>Blog</option>
				</select>
			</label>
		</p>
	<?php }
} // class Cycle Widget ?>