<?php


function modus() {
    wp_enqueue_style('style', get_template_directory_uri().'/style.css');

}
add_action('wp_enqueue_scripts', 'modus');

include_once( 'customizer.php' );

/*menu*/
register_nav_menus(array(
    'Menu1'=>__('Menu1'),
    'Company'=>__('Company'),
    'Community'=>__('Community'),

));

/*thumbnails*/
add_theme_support( 'post-thumbnails' ); // для всех типов постов


function true_register_wp_sidebars()
{
    /* В футер текстовый виджет */
    register_sidebar(
        array(
            'id' => 'widget-footer',            // уникальный id
            'name' => 'widget-footer',         // название сайдбара
            'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',   // описание
            'before_widget' => '<div id="%1$s" class="footer-text">',   // по умолчанию виджеты выводятся <li>-списком
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title-footer">',      // по умолчанию заголовки виджетов в <h2>
            'after_title'   => '</h3>'
        )
    );
    /*  текстовый виджет*/
    register_sidebar(
        array(
            'id' => 'widget-post',            // уникальный id
            'name' => 'widget-post',         // название сайдбара
            'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',   // описание
            'before_widget' => '<div class="post-text">',   // по умолчанию виджеты выводятся <li>-списком
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title-post">',      // по умолчанию заголовки виджетов в <h2>
            'after_title'   => '</h3>'
        )
    );
    /*  текстовый виджет футер меню-1*/
    register_sidebar(
        array(
            'id' => 'widget-menu-footer1',            // уникальный id
            'name' => 'menu-footer1',         // название сайдбара
            'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',   // описание
            'before_widget' => '<div class="col-md-2 nav-footer-modus">',   // по умолчанию виджеты выводятся <li>-списком
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title-footer">',      // по умолчанию заголовки виджетов в <h2>
            'after_title'   => '</h3>'
        )
    );
    /*  текстовый виджет футер меню-2*/
    register_sidebar(
        array(
            'id' => 'widget-menu-footer2',            // уникальный id
            'name' => 'menu-footer2',         // название сайдбара
            'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',   // описание
            'before_widget' => '<div class="col-md-2 nav-footer-modus">',   // по умолчанию виджеты выводятся <li>-списком
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title-footer">',      // по умолчанию заголовки виджетов в <h2>
            'after_title'   => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );





// Custom Post Type
function my_custom_post_services() {
    $labels = array(
        'name'               => _x( 'services', 'our services' ),
        'singular_name'      => _x( 'services', 'post type singular name' ),
        'add_new'            => _x( 'added new', 'services' ),
        'add_new_item'       => __( 'added new' ),
        'edit_item'          => __( 'edit services' ),
        'new_item'           => __( 'new' ),
        'all_items'          => __( 'all services' ),
        'view_item'          => __( 'view_item' ),
        'search_items'       => __( 'search' ),
        'not_found'          => __( 'Кnot_found' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'services'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our products and product specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'),
        'has_archive'   => true,
    );
    register_post_type( 'services', $args );




}
add_action( 'init', 'my_custom_post_services' );


function my_custom_post_slider()
{
    $labels = array(
        'name'              => _x('slider-top', 'our slider'),
        'singular_name'     => _x('slider', 'post type singular name'),
        'add_new'           => _x('added new', 'slider'),
        'add_new_item'      => __('added new'),
        'edit_item'         => __('edit slider'),
        'new_item'          => __('new'),
        'all_items'         => __('all slider'),
        'view_item'         => __('view_item'),
        'search_items'      => __('search'),
        'not_found'         => __('Кnot_found'),
        'parent_item_colon' => '',
        'menu_name'         => 'slider'
    );
    $args   = array(
        'labels'        => $labels,
        'description'   => 'Holds our products and product specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array(
            'title',
            'editor',
            'custom-fields',
            'thumbnail',
            'page-attributes'
        ),
        'has_archive'   => true,
    );
    register_post_type('slider', $args);
}

add_action( 'init', 'my_custom_post_slider' );








//add_action( 'customize_register', 'genesischild_register_theme_customizer' );
///*
// * Register Our Customizer Stuff Here
// */
//function genesischild_register_theme_customizer( $wp_customize ) {
//    // Create custom panel.
//    $wp_customize->add_panel( 'text_blocks', array(
//        'priority' => 500,
//        'theme_supports' => '',
//        'title' => __( 'Text Blocks', 'genesischild' ),
//        'description' => __( 'Set editable text for certain content.', 'genesischild' ),
//    ) );
//    // Add Footer Text
//    // Add section.
//    $wp_customize->add_section( 'custom_footer_text' , array(
//        'title' => __('Change Footer Text','genesischild'),
//        'panel' => 'text_blocks',
//        'priority' => 10
//    ) );
//    // Add setting
//    $wp_customize->add_setting( 'footer_text_block', array(
//        'default' => __( 'default text', 'genesischild' ),
//        'sanitize_callback' => 'sanitize_text'
//    ) );
//    // Add control
//    $wp_customize->add_control( new WP_Customize_Control(
//            $wp_customize,
//            'custom_footer_text',
//            array(
//                'label' => __( 'Footer Text', 'genesischild' ),
//                'section' => 'custom_footer_text',
//                'settings' => 'footer_text_block',
//                'type' => 'text'
//            )
//        )
//    );
//    // Sanitize text
//    function sanitize_text( $text ) {
//        return sanitize_text_field( $text );
//    }
//}
?>


