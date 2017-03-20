


<?php get_header(); ?>
<section class="section-sliders">
    <?php
    echo do_shortcode('[smartslider3 slider=2]');
    ?>
</section>
<section class="section-services">
    <div class="container">
        <div class="prev-services">
            <div>
                <?php if (is_active_sidebar('widget-post')) : ?>
                    <?php dynamic_sidebar('widget-post'); ?>
                <?php endif; ?>
            </div>

            <div class="prev-button btn-top-widget"><a href="#" class="link-button">VIEW MORE</a></div>
        </div>
        <ul class="list-services">
            <?php
            $query = new WP_Query( array('post_type' => 'services'  , 'posts_per_page' => 100 ) );
            if ($query->have_posts()):?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="li-services col-md-3">
                        <div class="content-services">
                            <?php $meta_value = get_post_meta($post->ID, 'img', true);
                            if(!empty($meta_value)) {
                                echo '<p>' . $meta_value . '</p>';
                            } ?>
                            <?php the_title('<h3 class="title-services">','</h3>'); ?>
                            <?php the_content('<p class="text-services">','</p>'); ?>

                            <?php $meta_value = get_post_meta($post->ID, 'button', true);
                            if(!empty($meta_value)) {
                                echo '<p>' . $meta_value . '</p>';
                            } ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>

<section class="section-progress-bar">
    <div class="container">
        <div class="row">
            <?php the_content('<p>','</p>'); ?>
        </div>
    </div>
</section>

<section class="section-client">
    <div class="container">
        <?php echo do_shortcode ('[logo_carousel_slider slider_title = "Our Happy Clients"]'); ?>
    </div>
</section>


<?php get_footer(); ?>
