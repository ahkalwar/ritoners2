<?php
/* Custom Colors: Natural */

//Background
add_color_rule( 'bg', '#edead6', array(
	array( 'body', 'background-color' ),
) );

add_color_rule( 'txt', '#504741', array(
	//No contrast
	array( '#comments #respond input#submit:hover,
			#navigation,
			#nextLink a:hover,
			#prevLink a:hover,
			#searchsubmit:hover,
			#submit:hover,
			.container .gform_wrapper input.button:hover,
			.menu ul.children,
			.menu ul.sub-menu,
			.more-link:hover,
			.reply a:hover,
			a.button:hover', 'background-color' ),

	array( 'a.button,
			.reply a,
			#searchsubmit,
			#prevLink a,
			#nextLink a,
			.more-link,
			#submit,
			#comments #respond input#submit,
			.container .gform_wrapper input.button', 'background-color', '-0.5' ),

	//Contrast against white content area
	array( 'h1, h2, h3, h4, h5, h6', 'color', '#fff' ),
	array( 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:link, h2 a:link, h3 a:link, h4 a:link, h5 a:link, h6 a:link, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited', 'color', '#fff' ),

	array( '#header .site-description', 'color', 'bg' ),
) );

add_color_rule( 'link', '#99cc33', array(

	array( '.natural-header-inactive #header .site-title a', 'color', 'bg' ),

	//Contrast against white content area
	array( 'a, .widget ul.menu li a', 'color', '#fff' ),

	//No contrast
	array( 'a:focus, a:hover, a:active', 'color', '-0.5' ),

	array( 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus, h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active', 'color', '-0.5' ),

	array( '.flex-control-nav li a.flex-active,
			.flex-control-nav li.flex-active a', 'border-top-color' ),
) );

add_color_rule( 'fg1', '#fff', array(
) );

add_color_rule( 'fg2', '#ffffff', array(
) );

//Extra rules
add_color_rule( 'extra', '#ffffff', array(
	//No contrast
	array( '#navigation .menu li.sfHover:hover a,
			#navigation .menu li.sfHover:hover a:hover', 'color' ),
	// Contrast against txt
	array( '.menu li li a,
			.menu li li a:link', 'color', 'txt' ),

	array( '#navigation .menu li.sfHover .sub-menu li a', 'color', 'txt' ),

	array( '#navigation .menu li .current_page_item a,
			#navigation .menu li .current_page_item a:hover,
			#navigation .menu li .current-menu-item a,
			#navigation .menu li .current-menu-item a:hover,
			#navigation .menu li .current-cat a,
			#navigation .menu li .current-cat a:hover', 'color' ),

	array( '#navigation .menu li.current-menu-ancestor a,
			#navigation .menu li.current_page_ancestor a,
			#navigation .menu .current_page_item ul li a:hover,
			#navigation .menu .current-menu-item ul li a:hover,
			#navigation .menu .current-menu-ancestor ul li a:hover,
			#navigation .menu .current_page_ancestor ul li a:hover,
			#navigation .menu .current-menu-ancestor ul .current_page_item a,
			#navigation .menu .current_page_ancestor ul .current-menu-item a,
			#navigation .menu .current-cat ul li a:hover', 'color', 'txt' ),

	array( 'a.button', 'color', 'txt' ),

	array( 'a.button:hover, .reply a:hover, #searchsubmit:hover, #prevLink a:hover, #nextLink a:hover, .more-link:hover, #submit:hover, #comments #respond input#submit:hover, .container .gform_wrapper input.button:hover', 'color', 'txt' ),

	array( '.sf-arrows .sf-with-ul:after', 'border-top-color', 'txt' ),

	array( '#navigation .menu a', 'color', 'txt' ),
) );

add_color_rule( 'extra', '#000000', array(
	array( 'a.button, .reply a, #searchsubmit, #prevLink a, #nextLink a, .more-link, #submit, #comments #respond input#submit, .container .gform_wrapper input.button', 'border-color', 0.25 ),
) );

// Extra CSS
function natural_extra_css() { ?>
	.menu a {
		border-right: 1px solid rgba(0, 0, 0, 0.25);
		text-shadow: none;
	}
	.menu li li a {
		border-top: 1px solid rgba(0, 0, 0, 0.25);
	}
	.menu a:focus, .menu a:hover, .menu a:active {
		background: rgba(0, 0, 0, 0.25);
	}
	.menu li.sfHover:hover {
		background: rgba(0, 0, 0, 0.25);
	}
}
<?php }
add_theme_support( 'custom_colors_extra_css', 'natural_extra_css' );

//Additional palettes
add_color_palette( array(
    '#6f6866',
    '#413e4a',
    '#e4844a',
), 'Brown and Orange' );

add_color_palette( array(
    '#f6f6f6',
    '#333333',
    '#f13f43',
), 'Greay and Red' );

add_color_palette( array(
    '#11644d',
    '#94af45',
    '#f2c94e',
), 'Green and Yellow' );

add_color_palette( array(
    '#e7edea',
    '#131557',
    '#fb0c06',
), 'Navy and Red' );

add_color_palette( array(
    '#554236',
    '#f77825',
    '#02c31f',
), 'Orange and Green' );

add_color_palette( array(
    '#001029',
    '#c28302',
    '#f61e67',
), 'Brown and Pink' );
