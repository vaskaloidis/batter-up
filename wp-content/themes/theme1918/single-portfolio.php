<?php get_header(); ?>
			<div class="grid_12">
				<div class="page-header">
					<h2 class="page-title"><?php the_title(); ?></h2>
				</div>
				<?php // get the media elements
				$mediaType = get_post_meta($post->ID, 'tz_portfolio_type', true); ?>
			
				<div id="primary" class="hfeed <?php echo $mediaType; ?>">
					<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<div class="clearfix">
								<div class="grid_7 alpha">
									<?php switch( $mediaType ) {
										case "Image": ?>
											<figure class="image-holder featured-thumbnail <?php echo $mediaType; ?>"><?php tz_image($post->ID, 'portfolio-main');?> </figure>
											<?php break;
										case "Slideshow": ?>
											<figure class="image-holder featured-thumbnail <?php echo $mediaType; ?>"><?php tz_gallery($post->ID, 'portfolio-main');?> </figure>
											<?php break;
										case "Grid Gallery":
											tz_grid_gallery($post->ID, 'portfolio-main');
											break;
										case "Video": ?>
											<figure class="image-holder featured-thumbnail <?php echo $mediaType; ?>"><?php $embed = get_post_meta($post->ID, 'tz_portfolio_embed_code', true);
											echo "<span class='video-holder'>";
											echo stripslashes(htmlspecialchars_decode($embed));
											echo "</span>";?> </figure>
											<?php break;
										case "Audio":
											tz_audio($post->ID);
											break;
										default:
											break;
									} ?>
								</div>
	
								<div class="entry-content last grid_5 omega">
									<div class="entry-meta">
										<?php // get the meta information and display if supplied
										$portfolioClient = get_post_meta($post->ID, 'tz_portfolio_client', true);
										$portfolioDate = get_post_meta($post->ID, 'tz_portfolio_date', true); 
										$portfolioInfo = get_post_meta($post->ID, 'tz_portfolio_info', true); 
										$portfolioURL = get_post_meta($post->ID, 'tz_portfolio_url', true);
	
										if (!empty($portfolioClient) || !empty($portfolioDate) || !empty($portfolioInfo) || !empty($portfolioURL)){
											echo '<ul class="portfolio-meta-list rlist">';
										}
	
										if( !empty($portfolioClient) ) {
											echo '<li>';
											echo '<strong class="portfolio-meta-key">' . __('Client:', 'framework') . '</strong>';
											echo '<span>' . $portfolioClient . '</span>';
											echo '</li>';
										}
			
										if( !empty($portfolioDate) ) {
											echo '<li>';
											echo '<strong class="portfolio-meta-key">' . __('Date:', 'framework') . '</strong>';
											echo '<span>' . $portfolioDate . '</span>';
											echo '</li>';
										}
										
										if( !empty($portfolioInfo) ) {
											echo '<li>';
											echo '<strong class="portfolio-meta-key">' . __('Info:', 'framework') . '</strong>';
											echo '<span>' . $portfolioInfo . '</span>';
											echo '</li>';
										}
			
										
										if (!empty($portfolioClient) || !empty($portfolioDate) || !empty($portfolioInfo) || !empty($portfolioURL)){
											echo '</ul>';
										}
										
										if( !empty($portfolioURL) ) {
											echo "<a href='$portfolioURL' class='link'>" . __('Launch Project', 'framework') . "</a>";
										}
										?>
									</div> <!-- /entry-meta -->
									<?php the_content(); ?>
								</div> <!-- /entry-content -->
							</div> <!-- clearfix -->
				
							<nav class="oldernewer single-oldernewer">
								<?php if( get_previous_post() ) : ?>
									<div class="older"><?php previous_post_link('&larr; %link <span>(previous entry)</span>') ?></div>
								<?php endif; ?>
								<?php if( get_next_post() ) : ?>
									<div class="newer"><?php next_post_link('<span>(next entry)</span> %link &rarr;') ?></div>
									<?php endif; ?>
							</nav> <!-- /oldernewer .single-oldernewer -->
						</div>
					<?php endwhile; endif; ?>
				</div> <!--/primary .hfeed-->
			</div> <!--/grid_12-->
<?php get_footer(); ?>