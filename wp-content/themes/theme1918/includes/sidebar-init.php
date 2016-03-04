<?php
function elegance_widgets_init() {
	// Content Area 1
	// Location: at the top of the content
	register_sidebar(array(
		'name'				=> '1st Content Area',
		'id' 				=> 'content-area1',
		'description'		=> __( 'Located at the top of the content.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h2>',
		'after_title'		=> '</h2>',
	));
	// Content Area 5
	// Location: at the top of the content
	register_sidebar(array(
		'name'				=> '2nd Content Area',
		'id' 				=> 'content-area2',
		'description'		=> __( 'Located at the top of the content.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h2>',
		'after_title'		=> '</h2>',
	));

	// Content Area 3
	// Location: at the top of the content
	register_sidebar(array(
		'name'				=> '3d Content Area',
		'id' 				=> 'content-area3',
		'description'		=> __( 'Located at the top of the content.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h2>',
		'after_title'		=> '</h2>',
	));
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'				=> 'Sidebar',
		'id' 				=> 'main-sidebar',
		'description'		=> __( 'Located at the right side of pages.'),
		'before_widget'		=> '<div id="%1$s" class="widget">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h2>',
		'after_title'		=> '</h2>',
	));
	// Footer Area 1
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'				=> '1st Footer Area',
		'id' 				=> 'footer-area1',
		'description'		=> __( 'Located at the bottom of pages.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4>',
		'after_title'		=> '</h4>',
	));
	// Footer Area 2
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'				=> '2nd Footer Area',
		'id' 				=> 'footer-area2',
		'description'		=> __( 'Located at the bottom of pages.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4>',
		'after_title'		=> '</h4>',
	));
	// Footer Area 3
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'				=> '3d Footer Area',
		'id' 				=> 'footer-area3',
		'description'		=> __( 'Located at the bottom of pages.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4>',
		'after_title'		=> '</h4>',
	));
	// Footer Area 4
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'				=> '4th Footer Area',
		'id' 				=> 'footer-area4',
		'description'		=> __( 'Located at the bottom of pages.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4>',
		'after_title'		=> '</h4>',
	));
	// Footer Area 5
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'				=> '5th Footer Area',
		'id' 				=> 'footer-area5',
		'description'		=> __( 'Located at the bottom of pages.'),
		'before_widget'		=> '<div id="%1$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4>',
		'after_title'		=> '</h4>',
	));
}
/** Register sidebars by running elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'elegance_widgets_init' ); ?>