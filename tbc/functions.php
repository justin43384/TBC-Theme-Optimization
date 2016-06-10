<?php

function header_enqueue_scripts_styles() {
	wp_enqueue_style( 'reset', get_stylesheet_directory_uri() . '/reset.css' );
    wp_enqueue_style( 'typography', get_stylesheet_directory_uri() . '/typography.css' );
	wp_enqueue_style( '3c-fixed', get_stylesheet_directory_uri() . '/3c-fixed.css' );
	wp_enqueue_style( 'images', get_stylesheet_directory_uri() . '/images.css' );
	wp_enqueue_style( 'default', get_stylesheet_directory_uri() . '/default.css' );
	wp_enqueue_style( 'plugins', get_stylesheet_directory_uri() . '/plugins.css' );
    wp_enqueue_script( 'custom-accordion', get_stylesheet_directory_uri() . '/js/accordion.js', array('jquery') );
    wp_enqueue_script( 'custom-popup', get_stylesheet_directory_uri() . '/js/popup.js', array('jquery') );
    wp_enqueue_script( 'custom-tabca', get_stylesheet_directory_uri() . '/js/tab.js', array('jquery') );
    wp_enqueue_script( 'custom-slideshow', get_stylesheet_directory_uri() . '/js/slideshow.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'header_enqueue_scripts_styles' );

remove_filter( 'the_content', 'wpautop' );

function childtheme_siteinfo(){ ?>

	<div id="socialfoot">

				<a href="https://www.facebook.com/TriCityBandCorps"><div style="background: url('http://tricitybandcorps.org/wp-content/themes/tbc/images/facebook.png') no-repeat"></div></a>
				<a href="https://instagram.com/tricitybandcorps/"><div style="background: url('http://tricitybandcorps.org/wp-content/themes/tbc/images/insta.png') no-repeat"></div></a>
				<a href="https://www.youtube.com/channel/UCBlEZ_2XcQ0hykh3PIn_ftQ"><div style="background: url('http://tricitybandcorps.org/wp-content/themes/tbc/images/youtube.png') no-repeat">	</div></a>
				<a href="https://plus.google.com/108562125453550362832/about"><div style="background: url('http://tricitybandcorps.org/wp-content/themes/tbc/images/gplus.png') no-repeat"></div></a>
				<a href="http://tricitybandcorps.org/contact/"><div style="background: url('http://tricitybandcorps.org/wp-content/themes/tbc/images/mail.png') no-repeat"></div></a>	

    </div>



<?php }


//Allow external shortcodes in forms build via ContactForm 7
add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

	function mycustom_wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );

	return $form;
}

add_action('thematic_footer', 'childtheme_siteinfo', 30);

 

function childtheme_menu_args($args) {

    $args = array(

        'show_home' => 'Home',

        'menu_class' => 'menu',

        'echo' => true

    );

    return $args;

}

add_filter('wp_page_menu_args', 'childtheme_menu_args');



//Replace Blog Title with Your Logo



 

function remove_thematic_blogtitle() {

     remove_action('thematic_header','thematic_blogtitle', 3);

}

add_action('init','remove_thematic_blogtitle');

 

function child_logo_image() {

     //Add your own logo image code

     //Here's an example

    ?>

    <h1><a href="/" title=""><div id="logo"></div></a></h1>

   <?php

   // End Example

}

add_action('thematic_header','child_logo_image', 3);



// First we remove the thematic_brandingopen() .. we're going to make one addition for this one.

// And we remove thematic_access() .. will be added later unchanged with a priority of 10.

function remove_branding() {

		remove_action('thematic_header','thematic_brandingopen',1);

		remove_action('thematic_header','thematic_access',9);

}

add_action('init', 'remove_branding');



// We wrap #branding and #header-aside with #header-box

function childtheme_brandingopen() { ?>

	<div id="header_box">

    	<div id="branding">

<?php }

add_action('thematic_header','childtheme_brandingopen',1);



// Now we need to close #header-box

function header_box_close() { ?>

		</div>
	</div>

<?php }

add_action('thematic_header', 'header_box_close', 9);



// And we add the unchanged thematic_access() with the new priority 10

add_action('thematic_header','thematic_access', 10);



function add_header_aside($content) {

	$content['Header Aside'] = array(

		'admin_menu_order' => 50,

		'args' => array (

			'name' => 'Header Aside',

			'id' => 'header-aside',

			'before_widget' => thematic_before_widget(),

			'after_widget' => thematic_after_widget(),

			'before_title' => thematic_before_title(),

			'after_title' => thematic_after_title(),

		),

		'action_hook'	=> 'thematic_header',

		'function'		=> 'thematic_header_aside',

		'priority'		=> 8,

	);

	return $content;

}
?>
<?php

add_action('wp_head', 'insert_analytics_script');

function insert_analytics_script() {

?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34368348-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php

}

?>