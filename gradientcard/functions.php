<?php
/* Post menu add contents */
add_theme_support('post-thumbnails');

/* "index.php" pagination */
function pagination_bar() {
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;

	if ( $total_pages > 1 ) {
		$current_page = max(1, get_query_var('paged'));

		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => 'page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'prev_text' => __( '≪' ),
			'next_text' => __( '≫' ),
		));
	}
}

/* Custom menu register */
/* wp_nav_menu($arrayname = array('theme_location' => 'left name', 'menu' => 'right name' );) */
function register_menu() {
	register_nav_menus(array(
		'footer_menu' => __( 'Footer Menu' ),
		'footer_menu_bottom' => __( 'Footer Menu Bottom' ),
	));
}

add_action('init', 'register_menu');

/* Remove action */
function removed_scripts_styles(){
  if( !is_admin() ){
		remove_action( 'wp_head', 'wp_print_scripts' );
		remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
		remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
	  remove_action( 'wp_head', 'www-widgetapi' );
	  remove_action( 'wp_head', 'wp_generator' );
	  remove_action( 'wp_head', 'rsd_link' );
	  remove_action( 'wp_head', 'wlwmanifest_link' );
	  remove_action( 'wp_head', 'index_rel_link' );
	  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	  remove_action( 'wp_head', 'feed_links', 2 );
	  remove_action( 'wp_head', 'feed_links_extra', 3 );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );

		add_filter( 'emoji_svg_url', '__return_false' );
  }
}

add_action('wp_enqueue_scripts', 'removed_scripts_styles');

/* remove jQuery */
function dequeue_jquery( $scripts ){
    if(!is_admin()){
        $scripts->remove( 'jquery' );
    }
}

add_filter( 'wp_default_scripts', 'dequeue_jquery' );

/* leave quicktags */
function leave_quicktags( $qtInit ) {
	$qtInit['buttons'] = 'link,ul,ol,li,fullscreen';
	return $qtInit;
}

add_filter('quicktags_settings', 'leave_quicktags');

/* add again admin editor quicktags */
function add_quicktags() {
	if( wp_script_is('quicktags') ) {
?>
	<script type="text/javascript">
	  QTags.addButton( 'mystrong', 'strong', '<strong>', '</strong>' );
		QTags.addButton( 'h1', 'h1', '<h1>', '</h1>' );
		QTags.addButton( 'h2', 'h2', '<h2>', '</h2>' );
		QTags.addButton( 'h3', 'h3', '<h3>', '</h3>' );
		QTags.addButton( 'preHTML', 'preHTML', '<pre class="EnlighterJSRAW" data-enlighter-language="html" data-enlighter-group="" data-enlighter-title="">', '</pre>' );
		QTags.addButton( 'preCSS', 'preCSS', '<pre class="EnlighterJSRAW" data-enlighter-language="css" data-enlighter-group="" data-enlighter-title="">', '</pre>' );
		QTags.addButton( 'preSCSS', 'preSCSS', '<pre class="EnlighterJSRAW" data-enlighter-language="scss" data-enlighter-group="" data-enlighter-title="">', '</pre>' );
		QTags.addButton( 'dhline', 'dhline', 'data-enlighter-highlight=""', '' );
		QTags.addButton( 'style', 'style', '<style>', '</style>' );
	</script>
<?php
	}
}

add_action( 'admin_print_footer_scripts', 'add_quicktags' );
