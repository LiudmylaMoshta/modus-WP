


<?php get_header(); ?>
<section class="section-sliders">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators carousel-indicators-modus">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
              <?php
                $query = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => 100));
                if ($query->have_posts()):?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php $meta_value = get_post_meta($post->ID, 'img', true);
                if ( ! empty($meta_value)) {
                    echo '<p>' . $meta_value . '</p>';
                } ?>
                    <?php the_post_thumbnail(); ?>
                <div class="carousel-caption content-slider">
                    <?php the_title('<h3 class="title-slider-top">', '</h3>'); ?>

                    <?php the_content(); ?>
                </div>
                <?php $meta_value = get_post_meta($post->ID, 'button', true);
                if ( ! empty($meta_value)) { echo '<p>' . $meta_value . '</p>'; } ?>
                <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>
</section>

<section class="section-services">
    <div class="container">
        <div class="prev-services">
            <div>
                <?php if (is_active_sidebar('widget-post')) : ?>
                    <?php dynamic_sidebar('widget-post'); ?>
                <?php endif; ?>
            </div>
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
                            <?php the_content(); ?>

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
