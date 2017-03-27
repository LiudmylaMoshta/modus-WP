


<?php get_header(); ?>
<section class="section-sliders">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators carousel-indicators-modus">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active li-indicator"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=" li-indicator"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=" li-indicator"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
                  <?php
                $query = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => 100));
                if ($query->have_posts()):?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="item <?php if (array_search($post, $query->get_posts()) === 0) {echo "active";}?>">
                    <?php the_post_thumbnail(); ?>
                <div class="carousel-caption content-slider">
                    <?php the_title('<h3 class="title-slider-top">', '</h3>'); ?>
                    <?php the_content(); ?>
                </div>
            </div>
                <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>

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
            <ul id="widget-post">
                <?php dynamic_sidebar( 'widget-post' ); ?>
            </ul>
        </div>
        <ul class="row list-services">
            <?php
            $query = new WP_Query( array('post_type' => 'services'  , 'posts_per_page' => 100 ) );
            if ($query->have_posts()):?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="li-services col-sm-6 col-md-3">
                        <div class="content-services">
                            <?php $meta_value = get_post_meta($post->ID, 'img', true);
                            if(!empty($meta_value)) {
                                echo '<p>' . $meta_value . '</p>';
                            } ?>
                            <?php the_title('<h3 class="title-services">','</h3>'); ?>
                            <?php the_content(); ?>

                            <?php $meta_value = get_post_meta($post->ID, 'button', true);
                            if(!empty($meta_value)) {
                                echo '<div class="prev-button"><a href="#" class="link-button">' . $meta_value . '</a></div>';
                            } ?>

                        </div>
                    </li>
                <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>

<section class="section-img">
    <ul id="title-section-gallery">
        <?php dynamic_sidebar( 'title-section-gallery' ); ?>
    </ul>
    <div class="container">
        <ul class="row list-img">
            <?php
            $query = new WP_Query( array('post_type' => 'gallery'  , 'posts_per_page' => 100 ) );
            if ($query->have_posts()):?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="li-img col-md-4">
                        <?php the_post_thumbnail( ); ?>
                    </li>
                <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</section>

<section class="section-progress-bar">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <?php $meta_value = get_post_meta($post->ID, 'title-progress-bar', true);
                if(!empty($meta_value)) {
                    echo '<h3 class="title-modus">' . $meta_value . '</h3>';
                } ?>
                <?php $meta_value = get_post_meta($post->ID, 'description', true);
                if(!empty($meta_value)) {
                    echo '<ul class="list-choose">' . $meta_value . '</ul>';
                } ?>
            </div>
            <div class="col-md-6">
                <?php $meta_value = get_post_meta($post->ID, 'text-progress-bar', true);
                if(!empty($meta_value)) {
                    echo '<p class="text-progress-bar">' . $meta_value . '</p>';
                } ?>
                <div class="content-progressbar">
                    <div class="col-xs-6 col-sm-3">
                        <div id="suspendisse"></div>
                        <script>
                            var bar = new ProgressBar.SemiCircle(suspendisse, {
                                strokeWidth: 6,
                                color: '#889494',
                                trailColor: '#76c7c0',
                                trailWidth: 6,
                                easing: 'easeInOut',
                                duration: 1400,
                                svgStyle: null,
                                text: {
                                    value: '',
                                    alignToBottom: false
                                },
                                from: {color: '#e2534b'},
                                to: {color: '#e2534b'},
                                step: function(state, bar) {
                                    bar.path.setAttribute('stroke', state.color);
                                    var value = Math.round(bar.value() * 100);
                                    if (value === 0) {
                                        bar.setText('');
                                    } else {
                                        bar.setText(value);
                                    }
                                    bar.text.style.color = state.color;
                                }
                            });

                            bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                            bar.text.style.fontSize = '2rem';

                            bar.animate(0.5);
                        </script>
                        SUSPENDISSE
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div id="maecenas"></div>
                        <script>
                            var bar = new ProgressBar.SemiCircle(maecenas, {
                                strokeWidth: 6,
                                color: '#889494',
                                trailColor: '#76c7c0',
                                trailWidth: 6,
                                easing: 'easeInOut',
                                duration: 1400,
                                svgStyle: null,
                                text: {
                                    value: '',
                                    alignToBottom: false
                                },
                                from: {color: '#e2534b'},
                                to: {color: '#e2534b'},
                                step: function(state, bar) {
                                    bar.path.setAttribute('stroke', state.color);
                                    var value = Math.round(bar.value() * 100);
                                    if (value === 0) {
                                        bar.setText('');
                                    } else {
                                        bar.setText(value);
                                    }
                                    bar.text.style.color = state.color;
                                }
                            });

                            bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                            bar.text.style.fontSize = '2rem';

                            bar.animate(0.7);
                        </script>
                        MAECENAS
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div id="aliquam"></div>
                        <script>
                            var bar = new ProgressBar.SemiCircle(aliquam, {
                                strokeWidth: 6,
                                color: '#889494',
                                trailColor: '#76c7c0',
                                trailWidth: 6,
                                easing: 'easeInOut',
                                duration: 1400,
                                svgStyle: null,
                                text: {
                                    value: '',
                                    alignToBottom: false
                                },
                                from: {color: '#e2534b'},
                                to: {color: '#e2534b'},
                                step: function(state, bar) {
                                    bar.path.setAttribute('stroke', state.color);
                                    var value = Math.round(bar.value() * 100);
                                    if (value === 0) {
                                        bar.setText('');
                                    } else {
                                        bar.setText(value);
                                    }
                                    bar.text.style.color = state.color;
                                }
                            });

                            bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                            bar.text.style.fontSize = '2rem';

                            bar.animate(0.8);
                        </script>
                        ALIQUAM
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div id="habitasse"></div>
                        <script>
                            var bar = new ProgressBar.SemiCircle(habitasse, {
                                strokeWidth: 6,
                                color: '#889494',
                                trailColor: '#76c7c0',
                                trailWidth: 6,
                                easing: 'easeInOut',
                                duration: 1400,
                                svgStyle: null,
                                text: {
                                    value: '',
                                    alignToBottom: false
                                },
                                from: {color: '#e2534b'},
                                to: {color: '#e2534b'},
                                step: function(state, bar) {
                                    bar.path.setAttribute('stroke', state.color);
                                    var value = Math.round(bar.value() * 100);
                                    if (value === 0) {
                                        bar.setText('');
                                    } else {
                                        bar.setText(value);
                                    }
                                    bar.text.style.color = state.color;
                                }
                            });

                            bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                            bar.text.style.fontSize = '2rem';

                            bar.animate(1);
                        </script>
                        HABITASSE
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <?php $meta_value = get_post_meta($post->ID, 'title-testimonials', true);
                    if(!empty($meta_value)) {
                        echo '<h3 class="title-modus">' . $meta_value . '</h3>';
                    } ?>
                <?php $meta_value = get_post_meta($post->ID, 'testimonials', true);
                if(!empty($meta_value)) {
                    echo '<p class="text-progress-bar text-border">' . $meta_value . '</p>';
                } ?>
                <?php $meta_value = get_post_meta($post->ID, 'author', true);
                if(!empty($meta_value)) {
                    echo '<span class="name-author">' . $meta_value . '</span>';
                } ?>



            </div>
        </div>
    </div>
</section>

<section class="section-client">
    <div class="container">
        <?php echo do_shortcode ('[logo_carousel_slider slider_title = "Our Happy Clients"]'); ?>
    </div>
</section>


<?php get_footer(); ?>
