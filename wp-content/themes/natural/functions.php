<?php
/**
 * This file contains the theme functions.
 *
 * @package Natural
 * @since Natural 1.0
 */

/*
-----------------------------------------------------------------------------------------------------//
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_setup' ) ) :

	function natural_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'natural', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add page excerpts.
		add_post_type_support( 'page', 'excerpt' );

		// Add title tag.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'featured-large', 2400, 1800, true ); // Large Featured Image.
		add_image_size( 'featured-medium', 1800, 1200, true ); // Medium Featured Image.
		add_image_size( 'featured-small', 640, 640 ); // Small Featured Image.

		// Add Custom Logo support.
		$args = array(
			'header-text' => array( 'site-title' ),
			'height'      => 1096,
			'width'       => 493,
			'flex-width'  => true,
			'flex-height' => true,
		);
		add_theme_support( 'custom-logo', $args );

		// Create Menus.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header Menu', 'natural' ),
			'social-menu' => esc_html__( 'Social Menu', 'natural' ),
		));

		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

		// Custom Header.
		register_default_headers( array(
			'default' => array(
				'url'           => get_template_directory_uri() . '/images/natural-default-header.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/natural-default-header.jpg',
				'description'   => esc_html__( 'Default Custom Header', 'natural' ),
			),
		));
		$defaults = array(
			'width'              => 1600,
			'height'             => 480,
			'default-image'      => get_template_directory_uri() . '/images/natural-default-header.jpg',
			'flex-height'        => true,
			'flex-width'         => true,
			'default-text-color' => '333333',
			'header-text'        => false,
			'uploads'            => true,
		);
		add_theme_support( 'custom-header', $defaults );

		// Custom Background.
		$defaults = array(
			'default-color'          => '827768',
			'default-image'          => get_template_directory_uri() . '/images/natural-default-pattern.png',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif; // End natural_setup.
add_action( 'after_setup_theme', 'natural_setup' );

/*
-----------------------------------------------------------------------------------------------------//
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

function natural_cat_id_to_name( $id ) {
	$term = get_term( $id, 'category' );
	if ( is_wp_error( $term ) ) {
		return false; }
	return $name = $term->name;
}

/*
-----------------------------------------------------------------------------------------------------//
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_enqueue_scripts' ) ) {
	function natural_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'natural-style', get_stylesheet_uri() );
		wp_enqueue_style( 'natural-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'natural-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'natural-style' ), '1.0' );

		// Register Scripts.
		wp_register_script( 'natural-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'natural-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'natural-hover' ), '20130729' );
		wp_register_script( 'natural-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array( 'jquery' ), '20130729' );

		// Enqueue Scripts.
		wp_enqueue_script( 'natural-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'natural-superfish', 'natural-isotope', 'masonry' ), '20130729', true );
		wp_enqueue_script( 'natural-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );

		// Load Flexslider on front page and slideshow page template.
		if ( is_home() || is_front_page() || is_single() || is_page_template( 'template-slideshow.php' ) ) {
			wp_enqueue_script( 'natural-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20130729' );
		}

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'natural_enqueue_scripts' );
}

/*
-------------------------------------------------------------------------------------------------------
	Gutenberg Editor Styles
-------------------------------------------------------------------------------------------------------
*/

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function natural_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style(
		'natural-gutenberg',
		get_theme_file_uri( '/css/gutenberg.css' ),
		false,
		'1.0',
		'all'
	);
	wp_enqueue_style(
		'font-awesome',
		get_template_directory_uri() . '/css/font-awesome.css',
		array( 'natural-gutenberg' ),
		'1.0'
	);
	if ( class_exists( 'Woocommerce' ) ) {
		wp_enqueue_style(
			'natural-editor-woocommerce',
			get_theme_file_uri( '/css/woocommerce.css' ),
			false,
			'1.0',
			'all'
		);
	}
}
add_action( 'enqueue_block_editor_assets', 'natural_gutenberg_styles' );

/*
-----------------------------------------------------------------------------------------------------//
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

function natural_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Right Sidebar', 'natural' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Left Sidebar', 'natural' ),
		'id' => 'left-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widgets', 'natural' ),
		'id' => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	));
}
add_action( 'widgets_init', 'natural_widgets_init' );

/*
----------------------------------------------------------------------------------------------------//
	Set The Initial Content Width
------------------------------------------------------------------------------------------------------
*/

function natural_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'natural_content_width', 698 );
}
add_action( 'after_setup_theme', 'natural_content_width', 0 );

/*
----------------------------------------------------------------------------------------------------//
	Adjust Content Width
------------------------------------------------------------------------------------------------------
*/

function natural_adjust_content_width() {
	global $content_width;

	if ( is_page_template( 'template-full.php' ) || ( ! is_page_template( 'template-three-column.php' ) && ! is_active_sidebar( 'sidebar-1' ) ) || ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'left-sidebar' ) ) ) {
			$content_width = 1024;
	} elseif ( is_page_template( 'template-three-column.php' ) && is_active_sidebar( 'sidebar-1' ) && is_active_sidebar( 'left-sidebar' ) ) {
		$content_width = 442;
	}

}
add_action( 'template_redirect', 'natural_adjust_content_width', 0 );

/*
-----------------------------------------------------------------------------------------------------//
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'natural_comment' ) ) :
	function natural_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'natural' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'natural' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
			default :
		?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
					if ( '0' != $comment->comment_parent ) {
						$avatar_size = 48; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'natural' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s', 'natural' ), get_comment_date(), get_comment_time() )
							)
						);
						?>
					</div><!-- .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'natural' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'natural' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( 'Edit', 'natural' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

		<?php
		break;
		endswitch;
	}
endif; // Ends check for natural_comment().

/*
-----------------------------------------------------------------------------------------------------//
	Custom Excerpt Length
-------------------------------------------------------------------------------------------------------
*/

function natural_excerpt_length( $length ) {
	return 44;
}
add_filter( 'excerpt_length', 'natural_excerpt_length', 999 );

function natural_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	if ( is_archive() || is_search() ) {
		$link = sprintf(
			'<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue Reading<span class="screen-reader-text"> "%s"</span>', 'natural' ), get_the_title( get_the_ID() ) )
		);
		return '&hellip; ' . $link;
	} else {
		return '... ';
	}
}
add_filter( 'excerpt_more', 'natural_excerpt_more' );

/*
-----------------------------------------------------------------------------------------------------//
	Pagination Function
-------------------------------------------------------------------------------------------------------
*/

function natural_get_pagination_links() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'prev_text' => esc_html__( '&laquo;', 'natural' ),
		'next_text' => esc_html__( '&raquo;', 'natural' ),
		'total' => $wp_query->max_num_pages,
	) );
}

/*
-----------------------------------------------------------------------------------------------------//
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

function natural_wp_link_pages_args_prevnext_add( $args ) {
	global $page, $numpages, $more, $pagenow;

	if ( ! $args['next_or_number'] == 'next_and_number' ) {
		return $args; }

	$args['next_or_number'] = 'number'; // Keep numbering for the main part.
	if ( ! $more ) {
		return $args; }

	if ( $page -1 ) { // There is a previous page.
		$args['before'] .= _wp_link_page( $page -1 )
			. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'; }

	if ( $page < $numpages ) { // There is a next page.
		$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

	return $args;
}

add_filter( 'wp_link_pages_args', 'natural_wp_link_pages_args_prevnext_add' );

/*
-----------------------------------------------------------------------------------------------------//
	Body Class
-------------------------------------------------------------------------------------------------------
*/

function natural_body_class( $classes ) {

	$header_image = get_header_image();

	if ( ! empty( $header_image ) ) {
		$classes[] = 'natural-header-active'; }

	if ( empty( $header_image ) ) {
		$classes[] = 'natural-header-inactive'; }

	if ( is_singular() ) {
		$classes[] = 'natural-singular'; }

	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-full.php' ) && ! class_exists( 'Woocommerce' ) || is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-full.php' ) && ( class_exists( 'Woocommerce' ) && ! is_woocommerce() ) || class_exists( 'Woocommerce' ) && is_woocommerce() && is_active_sidebar( 'shop-sidebar' ) ) {
		$classes[] = 'natural-sidebar-active';
	} else {
		$classes[] = 'natural-sidebar-inactive';
	}

	if ( class_exists( 'Woocommerce' ) && is_woocommerce() && is_active_sidebar( 'shop-sidebar' ) ) {
		$classes[] = 'natural-shop-sidebar-active';
	} else {
		$classes[] = 'natural-shop-sidebar-inactive';
	}

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'natural-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ) ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'natural-relative-text';
	}

	// Style logo.
	if ( 'left' == get_theme_mod( 'title_align', 'center' ) ) {
		$classes[] = 'natural-logo-left';
	} elseif ( 'right' == get_theme_mod( 'title_align', 'center' ) ) {
		$classes[] = 'natural-logo-right';
	} else {
		$classes[] = 'natural-logo-center';
	}

	if ( get_theme_mod( 'header_text', true ) ) {
		$classes[] = 'natural-header-text';
	} else {
		$classes[] = 'natural-no-header-text';
	}

	return $classes;
}
add_action( 'body_class', 'natural_body_class' );

/*
-----------------------------------------------------------------------------------------------------//
	Post Class
-------------------------------------------------------------------------------------------------------
*/

function natural_post_classes( $classes, $class, $post_id ) {

	if ( is_archive() && ! is_author() ) {
		$classes[] = 'archive-holder';
	}

	return $classes;

}
add_filter( 'post_class', 'natural_post_classes', 10, 3 );

/*
-----------------------------------------------------------------------------------------------------//
	Render Post Meta Information & Featured Image
-------------------------------------------------------------------------------------------------------
*/

function natural_render_post_meta( $featured_img = true ) {

	?>
	<div class="post-author">

		<p class="align-left">

			<?php $posted_on = sprintf(
				esc_html_x( 'Posted on %s', 'post date', 'natural' ),
				get_the_date()
			);
			$posted_by = sprintf(
				esc_html_x( 'by %s', 'post author', 'natural' ),
				get_the_author_posts_link()
			); ?>

			<span class="organic-meta-post-date"><i class="fa fa-calendar"></i><?php echo $posted_on . ' '; ?></span>
			<span class="organic-meta-post-author"><?php echo $posted_by; ?></span>

		</p>

		<p class="align-right">
			<i class="fa fa-comment"></i>
			<a href="<?php the_permalink(); ?>#comments">
				<?php comments_number( esc_html__('Leave a Comment', 'natural'), esc_html__('1 Comment', 'natural'), esc_html__('% Comments', 'natural') ); ?>
			</a>
		</p>

	</div>

	<?php if ( $featured_img && has_post_thumbnail() ) { ?>
		<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'natural' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'featured-large' ); ?></a>
	<?php }

}

/*
-----------------------------------------------------------------------------------------------------//
	Render Categories and Tags
-------------------------------------------------------------------------------------------------------
*/

function natural_render_cats_tags() {
	?>

	<!-- BEGIN .post-meta -->
	<div class="post-meta radius-full">

		<p>
			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'natural' ) );
			printf( '<i class="fa fa-reorder"></i>' . esc_html__( 'Category: %1$s', 'natural' ) , $categories_list );

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'natural' ) );
			if ( ! empty( $tags_list ) ) {
				printf( '<i class="fa fa-tags"></i>' . esc_html__( 'Tags: %1$s', 'natural' ) , $tags_list );
			} ?>
		</p>

	<!-- END .post-meta -->
	</div>

	<?php
}

/*
-----------------------------------------------------------------------------------------------------//
	Remove First Gallery
-------------------------------------------------------------------------------------------------------
*/

function natural_remove_gallery( $content ) {

	if ( is_page_template( 'template-slideshow.php' ) ) {
		$content = preg_replace( '/\[gallery(.*?)ids=[^\]]+\]/', '', $content, 1 );
		$content = wp_kses_post( $content );
	}
	return $content;
}
add_filter( 'the_content', 'natural_remove_gallery' );

/*
-----------------------------------------------------------------------------------------------------//
	Show Jetpack Sharing Buttons & Likes
-------------------------------------------------------------------------------------------------------
*/

function natural_button_post_flair() {

	// Sharing buttons
	if ( function_exists( 'sharing_display' ) ) {
		sharing_display( '', true );
	}

	// Likes
	if ( class_exists( 'Jetpack_Likes' ) ) {
		$custom_likes = new Jetpack_Likes;
		echo $custom_likes->post_likes( '' );
	}

}

/*
-----------------------------------------------------------------------------------------------------//
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/jetpack.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );

/*
-------------------------------------------------------------------------------------------------------
	Load WooCommerce File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Woocommerce' ) ) {
	require get_template_directory() . '/includes/woocommerce-setup.php';
}
