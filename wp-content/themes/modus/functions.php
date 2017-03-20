<?php


function modus() {
    wp_enqueue_style('style', get_template_directory_uri().'/style.css');

}
add_action('wp_enqueue_scripts', 'modus');


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
    /*  текстовый виджет */
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




function modus_customize_register( $wp_customize ) {

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


?>


