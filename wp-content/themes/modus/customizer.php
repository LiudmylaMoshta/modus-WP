<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 22.03.17
 * Time: 21:07
 */
function modus_customize_register( $wp_customize ) {
    /*******************************************
    Color scheme
     ********************************************/

// add the section to contain the settings
    $wp_customize->add_section( 'font_style' , array(
        'title' =>  'Fonts style',
    ) );

    $OptionsFonts[] = array(
        'slug'=>'header_font_style',
        'default' => '#76c7c0',
        'label' => 'Header Background Color'
    );


    $wp_customize->add_section( 'OptionsColors' , array(
        'title' =>  'Colors Scheme',
    ) );

    $OptionsColors[] = array(
        'slug'=>'header_bg_color',
        'default' => '#76c7c0',
        'label' => 'Header Background Color'
    );

    $OptionsColors[] = array(
        'slug'=>'footer_bg_color',
        'default' => '#76c7c0',
        'label' => 'Footer Background Color'
    );

    $OptionsColors[] = array(
        'slug'=>'title_color',
        'default' => '#7f8c8c',
        'label' => 'Title Color'
    );
    $OptionsColors[] = array(
        'slug'=>'text_color',
        'default' => '#777777',
        'label' => 'text_color'
    );

    // add the settings and controls for each color
    foreach( $OptionsColors as $txtcolor ) {

        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'], array(
                'default' => $txtcolor['default'],
                'type' => 'option',
                'capability' =>  'edit_theme_options'
            )
        );
// CONTROLS color-picker
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $txtcolor['slug'],
                array('label' => $txtcolor['label'],
                      'section' => 'OptionsColors',
                      'settings' => $txtcolor['slug'])
            )
        );

    }


    /*-----------------------------------------------------------*/
    /*Customize Phone number*/

    $wp_customize->add_setting( 'contact_tel' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );


    $wp_customize->add_section( 'tel' , array(
        'title'      => __( 'Phone', 'modus' ),
        'priority'   => 30,
    ) );


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_tel', array(
        'label'        => __( 'Number of your phone', 'modus' ),
        'section'    => 'tel',
        'settings'   => 'contact_tel',
    ) ) );


    /*Customize Email*/

    $wp_customize->add_setting( 'contact_mail' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );


    $wp_customize->add_section( 'mail' , array(
        'title'      => __( 'E-mail', 'modus' ),
        'priority'   => 30,
    ) );


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_mail', array(
        'label'        => __( 'Your email', 'modus' ),
        'section'    => 'mail',
        'settings'   => 'contact_mail',
    ) ) );


    /*Customize logo-text*/

    $wp_customize->add_setting( 'logo' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );


    $wp_customize->add_section( 'logo' , array(
        'title'      => __( 'logo', 'modus' ),
        'priority'   => 30,
    ) );


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo', array(
        'label'        => __( 'logo', 'modus' ),
        'section'    => 'logo',
        'settings'   => 'logo',
    ) ) );
}

add_action('customize_register', 'modus_customize_register');

/*------------------------------------------------------------------------------------------------*/

function wptutsplus_customize_colors() {
    $header_bg_color = get_option( 'header_bg_color' ); /*витягаємо значення*/
    $footer_bg_color = get_option( 'footer_bg_color' );
    ?>
    <style>

        /* color scheme */

        #header {
            background-color: <?php echo $header_bg_color; ?>;
        }

        .navbar-default .navbar-nav>li>a {
            color: #ffffff;
        }

        footer {
            background-color: <?php echo $footer_bg_color ?>;
        }

    </style>

    <?php
}
add_action( 'wp_head', 'wptutsplus_customize_colors' );
/*******************************************************************************
add class to body if backgrounds turned on using the body_class filter
// ********************************************************************************/
//function wptutsplus_add_background_color_style( $classes ) {
//
//    // set the header background
//    $header_background = get_theme_mod( 'header-background' );
//    $classes[] = $header_background;
//
//    // set the footer background
//    $footer_background = get_theme_mod( 'footer-background' );
//    $classes[] = $footer_background;
//
//    return $classes;
//
//}
//add_filter('body_class', 'wptutsplus_add_background_color_style');
