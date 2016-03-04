				</div> <!--/container_12-->
			</div><!--/container-->
			<footer id="footer">
				<a href="#top" id="back-top"><span></span><?php _e('Back to Top', 'theme1918'); ?></a>
				<?php if( is_active_sidebar( 'footer-area1' ) || is_active_sidebar( 'footer-area2' ) || is_active_sidebar( 'footer-area3' ) || is_active_sidebar( 'footer-area4' ) || is_active_sidebar( 'footer-area5' )) { ?>
					<div id="widget-footer">
						<div class="container_12 clearfix">
							<div class="grid_4 clearfix">
								<div class="dgrid_2 alpha">
									<?php if ( ! dynamic_sidebar( '1st Footer Area' ) ) : ?>
										<!--Widgetized 1st Footer Area-->
									<?php endif ?>
								</div>
								<div class="dgrid_2 omega">
									<?php if ( ! dynamic_sidebar( '2nd Footer Area' ) ) : ?>
										<!--Widgetized 2nd Footer Area-->
									<?php endif ?>
								</div>
							</div>
							<div class="grid_4 clearfix">
								<div class="dgrid_2 alpha">
									<?php if ( ! dynamic_sidebar( '3d Footer Area' ) ) : ?>
										<!--Widgetized 3d Footer Area-->
									<?php endif ?>
								</div>
								<div class="dgrid_2 omega">
									<?php if ( ! dynamic_sidebar( '4th Footer Area' ) ) : ?>
										<!--Widgetized 4th Footer Area-->
									<?php endif ?>
								</div>
							</div>
							<div class="grid_4 last-col">
								<?php if ( ! dynamic_sidebar( '5th Footer Area' ) ) : ?>
									<!--Widgetized 5th Footer Area-->
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php }?>
				<div id="copyright" class="clearfix">
					<div class="container_12 clearfix">
						<div class="grid_12">
							<div class="clearfix">
								<?php if ( of_get_option('footer_menu') == 'true') { ?>
									<nav class="footer-nav hide-mp">
										<?php wp_nav_menu( array(
											'container'			=> 'ul', 
											'menu_class'		=> 'footer-nav', 
											'depth'				=> 0,
											'theme_location'	=> 'footer_menu' 
										)); ?>
									</nav>
								<?php } ?>
								<div id="footer-text">
									<?php $myfooter_text = of_get_option('footer_text'); 
									
									if($myfooter_text){
										echo of_get_option('footer_text');
									} else { ?>
										<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a> 
										&copy; <?php echo date( 'Y' ); ?> &bull;
										<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy"><?php _e('Privacy Policy', 'theme1918'); ?></a>
									<?php }
									if( is_front_page() ) { ?>
									<!-- {%FOOTER_LINK} -->
									<?php } ?>
								</div> <!--/footer-text-->
							</div>
						</div><!--/grid_12-->
					</div><!--/copyright-->
				</div><!--/container-->
			</footer>
	</div><!--/main-->
	<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
	<?php if(of_get_option('ga_code')) { ?>
		<script type="text/javascript">
			<?php echo stripslashes(of_get_option('ga_code')); ?>
		</script>
		<!-- Show Google Analytics -->
	<?php } ?>
</body>
</html>