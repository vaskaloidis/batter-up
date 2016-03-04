<?php
/**
 * Template Name: Home Page
 */ ?>

<?php get_header(); ?>
			<?php if( is_active_sidebar( 'content-area1' ) || is_active_sidebar( 'content-area2' ) || is_active_sidebar( 'content-area3' )) { ?>
				<div class="before-content-area">
					<div class="bg clearfix">
						<div class="grid_4">
							<div class="widget-area1">
								<div class="circle">1</div>
								<div class="extra-wrap">
									<?php if ( ! dynamic_sidebar( '1st Content Area' ) ) : ?>
										<!--Widgetized '1st Content Area' for the home page-->
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="widget-area2">
								<div class="circle">2</div>
								<div class="extra-wrap">
									<?php if ( ! dynamic_sidebar( '2nd Content Area' ) ) : ?>
										<!--Widgetized '2nd Content Area' for the home page-->
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="grid_4 last-col">
							<div class="widget-area3">
								<div class="circle">3</div>
								<div class="extra-wrap">
									<?php if ( ! dynamic_sidebar( '3d Content Area' ) ) : ?>
										<!--Widgetized '3d Content Area' for the home page-->
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }
			
			if (have_posts()) : while (have_posts()) : the_post();
				the_content();
			endwhile; endif; ?>
<?php get_footer(); ?>