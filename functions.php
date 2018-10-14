<?php 

// Funções para Limpar o Header
// https://www.youtube.com/watch?v=dwxIdLSK22o Color Picker
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar Menus
add_theme_support('menus');
add_theme_support( 'post-thumbnails' ); 

// Habilitar Custom Logo
function theme_prefix_setup() {	
	add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );





// Add Customers ID Site
function affair_custom_function( $wp_customize ) {
    //All our sections, settings, and controls will be added here

    $wp_customize->add_section( 'affair-custom' , array(
        'title'      => 'Customização Affair'
    ) );

	$wp_customize->add_setting('affair-custom-logo-negativo');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-custom-logo-negativo-control', array(
			'label' => 'Logotipo Negativo',
			'section' => 'affair-custom',
            'settings' => 'affair-custom-logo-negativo'
    )));

 
    $wp_customize->add_setting('affair-custom-svg-dark', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-custom-svg-dark-control', array(
			'label' => 'SVG Dark: (remover o escrito "<svg"  por conta da classe',
			'section' => 'affair-custom',
			'settings' => 'affair-custom-svg-dark',
			'type' => 'textarea'
    )));
    
    $wp_customize->add_setting('affair-custom-svg-clean', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-custom-svg-clean-control', array(
			'label' => 'SVG clean: (remover o escrito "<svg"  por conta da classe',
			'section' => 'affair-custom',
			'settings' => 'affair-custom-svg-clean',
			'type' => 'textarea'
    )));
}
add_action( 'customize_register', 'affair_custom_function' );


// Add menufs callout section to admin appearance customize screen
function affair_menufs_callout($wp_customize) {
	$wp_customize->add_section('affair-menufs-section', array(
		'title' => 'Edit: Menu FullScreen'
	));

    //  *  ------------  LINK 1
	$wp_customize->add_setting('affair-menufs-link-name1', array());
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link-name1-control', array(
			'label' => 'Nome do Link 1',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link-name1'
		)));
	$wp_customize->add_setting('affair-menufs-link1', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link1-control', array(
			'label' => 'Link 1',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link1'
        )));
        
	$wp_customize->add_setting('affair-menufs-image1');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-menufs-image1-control', array(
			'label' => 'Image 1',
			'section' => 'affair-menufs-section',
            'settings' => 'affair-menufs-image1'
	)));

    //  *  ------------  LINK 2
	$wp_customize->add_setting('affair-menufs-link-name2', array());
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link-name2-control', array(
			'label' => 'Nome do Link 2',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link-name2'
		)));
	$wp_customize->add_setting('affair-menufs-link2', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link2-control', array(
			'label' => 'Link 2',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link2'
        )));
        
	$wp_customize->add_setting('affair-menufs-image2');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-menufs-image2-control', array(
			'label' => 'Image 2',
			'section' => 'affair-menufs-section',
            'settings' => 'affair-menufs-image2'
	)));


    //  *  ------------  LINK 3
	$wp_customize->add_setting('affair-menufs-link-name3', array());
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link-name3-control', array(
			'label' => 'Nome do Link 3',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link-name3'
		)));
	$wp_customize->add_setting('affair-menufs-link3', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link3-control', array(
			'label' => 'Link 3',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link3'
        )));
        
	$wp_customize->add_setting('affair-menufs-image3');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-menufs-image3-control', array(
			'label' => 'Image 3',
			'section' => 'affair-menufs-section',
            'settings' => 'affair-menufs-image3'
	)));

    //  *  ------------  LINK 4
	$wp_customize->add_setting('affair-menufs-link-name4', array());
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link-name4-control', array(
			'label' => 'Nome do Link 4',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link-name4'
		)));
	$wp_customize->add_setting('affair-menufs-link4', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link4-control', array(
			'label' => 'Link 4',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link4'
        )));
        
	$wp_customize->add_setting('affair-menufs-image4');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-menufs-image4-control', array(
			'label' => 'Image 4',
			'section' => 'affair-menufs-section',
            'settings' => 'affair-menufs-image4'
	)));



    //  *  ------------  LINK 5
	$wp_customize->add_setting('affair-menufs-link-name5', array());
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link-name5-control', array(
			'label' => 'Nome do Link 5',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link-name5'
		)));
	$wp_customize->add_setting('affair-menufs-link5', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link5-control', array(
			'label' => 'Link 5',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link5'
        )));
        
	$wp_customize->add_setting('affair-menufs-image5');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-menufs-image5-control', array(
			'label' => 'Image 5',
			'section' => 'affair-menufs-section',
            'settings' => 'affair-menufs-image5'
	)));


    //  *  ------------  LINK 6
	$wp_customize->add_setting('affair-menufs-link-name6', array());
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link-name6-control', array(
			'label' => 'Nome do Link 6',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link-name6'
		)));
	$wp_customize->add_setting('affair-menufs-link6', array( ));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'affair-menufs-link6-control', array(
			'label' => 'Link 6',
			'section' => 'affair-menufs-section',
			'settings' => 'affair-menufs-link6'
        )));
        
	$wp_customize->add_setting('affair-menufs-image6');
	$wp_customize->add_control( new WP_Customize_Image_Control ($wp_customize, 'affair-menufs-image6-control', array(
			'label' => 'Image 6',
			'section' => 'affair-menufs-section',
            'settings' => 'affair-menufs-image6'
	)));
}
add_action('customize_register', 'affair_menufs_callout');




// Color Scheme
function affair_customize_register( $wp_customize ) {
	$wp_customize->add_section('affair_standard_colors', array(
		'title' => __('Cores do Site', 'affair'),
		'priority' => 30,
	));

	$wp_customize->add_setting('affair_primary_color', array(
		'default' => '#c7a25e',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('affair_strong_color', array(
		'default' => '#b48a3e',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('affair_max_strong_color', array(
		'default' => '#685024',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'affair_primary_color_control', array(
		'label' => __('Cor principal', 'affair'),
		'section' => 'affair_standard_colors',
		'settings' => 'affair_primary_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'affair_strong_color_control', array(
		'label' => __('Cor forte', 'affair'),
		'section' => 'affair_standard_colors',
		'settings' => 'affair_strong_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'affair_max_strong_color_control', array(
		'label' => __('Cor mais forte', 'affair'),
		'section' => 'affair_standard_colors',
		'settings' => 'affair_max_strong_color',
	) ) );

}

add_action('customize_register', 'affair_customize_register');




// Output Customize CSS
function affair_customize_css() { ?>

	<style type="text/css">
		.t-color,
		.box-footer h1.title-footer {
			color: <?php echo get_theme_mod('affair_primary_color'); ?> !important;
		}

		/* Color */
		.e-color,
		.box-links-desk a.link-menu-desk:before,
		.box-scroll-down:hover,
		{
			background-color: <?php echo get_theme_mod('affair_primary_color'); ?> !important;
		}
		.box-scroll-down,button.btn-cta:hover {
			border-color: <?php echo get_theme_mod('affair_primary_color'); ?> !important;
		}
		.ctn-cta button.btn-cta:hover {
			border-color:<?php echo get_theme_mod('affair_primary_color'); ?> !important;
		}
		*:before {
			background-color: <?php echo get_theme_mod('affair_primary_color'); ?> !important;
		}
		.slide-home .border-slide {
        box-shadow: 0px 0px 0px 0vh inset <?php echo get_theme_mod('affair_primary_color'); ?>; }

		/* Color Strong */
		.go-page
		 {
			background-color: <?php echo get_theme_mod('affair_strong_color'); ?> !important;
		}

		.box-trg-slide:hover{
			border-color: <?php echo get_theme_mod('affair_strong_color'); ?> !important;
		}
        /* Max Color 
		.box-img-slide-home,*/
		.reveal-btn {
			background-color: <?php echo get_theme_mod('affair_max_strong_color'); ?> !important;
		}
		
	</style>

	<script>
		$('.e-color').css('background-color','<?php echo get_theme_mod('affair_primary_color'); ?>');	
	</script>
<?php }

add_action('wp_footer', 'affair_customize_css');


function wpb_adding_scripts() {
	wp_register_script('main', get_template_directory_uri() . '/js-compiled/main.js','','1.1', true);
	wp_enqueue_script('main');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );




