<?php


function modus() {
    wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('media-style', get_template_directory_uri().'/media-style.css');

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
            'before_widget' => '<div class="col-sm-2 col-md-2 nav-footer-modus">',   // по умолчанию виджеты выводятся <li>-списком
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
            'before_widget' => '<div class="col-sm-2 col-md-2 nav-footer-modus">',   // по умолчанию виджеты выводятся <li>-списком
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title-footer">',      // по умолчанию заголовки виджетов в <h2>
            'after_title'   => '</h3>'
        )
    );
    /*  текстовый виджет заголовок секции галереи*/
    register_sidebar(
        array(
            'id' => 'title-section-gallery',            // уникальный id
            'name' => 'title-gallery',         // название сайдбара
            'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',   // описание
            'before_widget' => '<div class="prev-gallery">',   // по умолчанию виджеты выводятся <li>-списком
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="title-gallery">',      // по умолчанию заголовки виджетов в <h2>
            'after_title'   => '</h2>'
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

function my_custom_post_gallery()
{
    $labels = array(
        'name'              => _x('gallery', 'our gallery'),
        'singular_name'     => _x('gallery', 'post type singular name'),
        'add_new'           => _x('added new', 'img'),
        'add_new_item'      => __('added new'),
        'edit_item'         => __('edit img'),
        'new_item'          => __('new'),
        'all_items'         => __('all img'),
        'view_item'         => __('view_item'),
        'search_items'      => __('search'),
        'not_found'         => __('Кnot_found'),
        'parent_item_colon' => '',
        'menu_name'         => 'gallery'
    );
    $args   = array(
        'labels'        => $labels,
        'description'   => 'Holds our products and product specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array(
            'title',
            'custom-fields',
            'thumbnail',
        ),
        'has_archive'   => true,
    );
    register_post_type('gallery', $args);
}

add_action( 'init', 'my_custom_post_gallery' );
//------------------------------------------------------SOCIAL ICON-----------------------------------------------------
function ct_tribes_social_array() {

    $social_sites = array(

        'facebook'      => 'tribes_facebook_profile',
        'google-plus'   => 'tribes_googleplus_profile',
        'twitter'       => 'tribes_twitter_profile',
        'linkedin'      => 'tribes_linkedin_profile',
        'youtube'       => 'tribes_youtube_profile',
        'vimeo'         => 'tribes_vimeo_profile',
        'tumblr'        => 'tribes_tumblr_profile',
        'instagram'     => 'tribes_instagram_profile',
        'flickr'        => 'tribes_flickr_profile',
        'dribbble'      => 'tribes_dribbble_profile',
        'rss'           => 'tribes_rss_profile',
        'reddit'        => 'tribes_reddit_profile',
        'soundcloud'    => 'tribes_soundcloud_profile',
        'spotify'       => 'tribes_spotify_profile',
        'vine'          => 'tribes_vine_profile',
        'yahoo'         => 'tribes_yahoo_profile',
        'behance'       => 'tribes_behance_profile',
        'codepen'       => 'tribes_codepen_profile',
        'delicious'     => 'tribes_delicious_profile',
        'stumbleupon'   => 'tribes_stumbleupon_profile',
        'deviantart'    => 'tribes_deviantart_profile',
        'digg'          => 'tribes_digg_profile',
        'github'        => 'tribes_github_profile',
        'hacker-news'   => 'tribes_hacker-news_profile',
        'steam'         => 'tribes_steam_profile',
        'vk'            => 'tribes_vk_profile',
        'weibo'         => 'tribes_weibo_profile',
        'tencent-weibo' => 'tribes_tencent_weibo_profile',
        '500px'         => 'tribes_500px_profile',
        'foursquare'    => 'tribes_foursquare_profile',
        'slack'         => 'tribes_slack_profile',
        'slideshare'    => 'tribes_slideshare_profile',
        'qq'            => 'tribes_qq_profile',
        'whatsapp'      => 'tribes_whatsapp_profile',
        'skype'         => 'tribes_skype_profile',
        'wechat'        => 'tribes_wechat_profile',
        'xing'          => 'tribes_xing_profile',
        'paypal'        => 'tribes_paypal_profile',
        'email-form'    => 'tribes_email_form_profile'
    );

    return apply_filters( 'ct_tribes_social_array_filter', $social_sites );
}

function my_add_customizer_sections( $wp_customize ) {

    $social_sites = ct_tribes_social_array();

    // set a priority used to order the social sites
    $priority = 5;

    // section
    $wp_customize->add_section( 'ct_tribes_social_media_icons', array(
        'title'       => __( 'Social Media Icons', 'tribes' ),
        'priority'    => 25,
        'description' => __( 'Add the URL for each of your social profiles.', 'tribes' )
    ) );

    // create a setting and control for each social site
    foreach ( $social_sites as $social_site => $value ) {

        $label = ucfirst( $social_site );

        if ( $social_site == 'google-plus' ) {
            $label = 'Google Plus';
        } elseif ( $social_site == 'rss' ) {
            $label = 'RSS';
        } elseif ( $social_site == 'soundcloud' ) {
            $label = 'SoundCloud';
        } elseif ( $social_site == 'slideshare' ) {
            $label = 'SlideShare';
        } elseif ( $social_site == 'codepen' ) {
            $label = 'CodePen';
        } elseif ( $social_site == 'stumbleupon' ) {
            $label = 'StumbleUpon';
        } elseif ( $social_site == 'deviantart' ) {
            $label = 'DeviantArt';
        } elseif ( $social_site == 'hacker-news' ) {
            $label = 'Hacker News';
        } elseif ( $social_site == 'whatsapp' ) {
            $label = 'WhatsApp';
        } elseif ( $social_site == 'qq' ) {
            $label = 'QQ';
        } elseif ( $social_site == 'vk' ) {
            $label = 'VK';
        } elseif ( $social_site == 'wechat' ) {
            $label = 'WeChat';
        } elseif ( $social_site == 'tencent-weibo' ) {
            $label = 'Tencent Weibo';
        } elseif ( $social_site == 'paypal' ) {
            $label = 'PayPal';
        } elseif ( $social_site == 'email-form' ) {
            $label = 'Contact Form';
        }
        // setting
        $wp_customize->add_setting( $social_site, array(
            'sanitize_callback' => 'esc_url_raw'
        ) );
        // control
        $wp_customize->add_control( $social_site, array(
            'type'     => 'url',
            'label'    => $label,
            'section'  => 'ct_tribes_social_media_icons',
            'priority' => $priority
        ) );
        // increment the priority for next site
        $priority = $priority + 5;
    }
}
add_action( 'customize_register', 'my_add_customizer_sections' );

//-----------------------------------------------------END SOCIAL ICON-----------------------------------------------------

//------------------------------------------META-BOX-----------------------------------------------------------------------
$prefix = 'dbt_';

$meta_box = array(
    'id' => 'my-meta-box',
    'title' => 'Section Progress Bars(Modus Vernus)',
    'page' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Title',
            'desc' => 'Enter something here',
            'id' => $prefix . 'text',
            'type' => 'text',
            'std' => 'Default value 1'
        ),
        array(
            'name' => 'Text',
            'desc' => 'Enter big text here',
            'id' => $prefix . 'textarea',
            'type' => 'textarea',
            'std' => 'Default value 2'
        ),
        array(
            'name' => 'Text',
            'desc' => 'Enter big text here',
            'id' => $prefix . 'textarea',
            'type' => 'textarea',
            'std' => 'Default value 3'
        ),
    )
);


add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
    global $meta_box;

    add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
    global $meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table">';

    foreach ($meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);

        echo '<tr>',
        '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
        '<td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', $field['desc'];
                break;
            case 'textarea':
                echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
                break;
            case 'select':
                echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                foreach ($field['options'] as $option) {
                    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                }
                echo '</select>';
                break;
            case 'radio':
                foreach ($field['options'] as $option) {
                    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                }
                break;
            case 'checkbox':
                echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;
        }
        echo     '</td><td>',
        '</td></tr>';
    }

    echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
    global $meta_box;

    // verify nonce
    if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}


//-----------------------------------------end-META-BOX-----------------------------------------------------------------------
?>


