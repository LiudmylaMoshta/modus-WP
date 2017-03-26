<?php wp_footer(); ?>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="brand-modus" >
                    <a href="<?php echo home_url();?>"><?php echo get_theme_mod('logo'); ?></a>
                </div>

                <?php if (is_active_sidebar('widget-footer')) : ?>
                    <?php dynamic_sidebar('widget-footer'); ?>
                <?php endif; ?>
                <div>
                    <span>Phone:</span>
                    <a href="tel:<?php echo get_theme_mod('contact_tel'); ?>" class="phone"><?php echo get_theme_mod('contact_tel'); ?></a>
                </div>
                <span>e-mail:</span>
                <a href="mailto:<?php echo get_theme_mod('contact_mail'); ?>" class="email">
                    <?php echo get_theme_mod('contact_mail'); ?>
                </a>
            </div>

            <?php if (is_active_sidebar('widget-menu-footer1')) : ?>
                <?php dynamic_sidebar('widget-menu-footer1'); ?>
            <?php endif; ?>

            <?php if (is_active_sidebar('widget-menu-footer2')) : ?>
                <?php dynamic_sidebar('widget-menu-footer2'); ?>
            <?php endif; ?>

            <article class="post-footer col-sm-4 col-md-4">
                <h3 class="title-footer-post">from the <span class="big-title-footer">BLOG</span></h3>
                <?php $wp_query = new WP_Query();
                $wp_query->query('showposts=2' . '&paged=' . $paged);
                while ($wp_query->have_posts()) :
                $wp_query->the_post(); ?>
                <?php the_post_thumbnail(); ?>
                <div class="content-post">
                    <h2><a href="<?php the_permalink(); ?>" title="Read more">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <span class="date-post">
                    <?php the_date('j F, Y'); ?>
                </span>
                </div>
                <?php endwhile; ?>
            </article>
        </div>
    </div>
    <div class="end-footer">
        <div class="container">
            <div class="row">
                <div class="year-title col-xs-6">
                    <?php echo get_theme_mod('year _footer'); ?>
                    <?php echo get_bloginfo( 'title' ) ?>
                </div>

                <?php
                $social_sites = ct_tribes_social_array();
                foreach ( $social_sites as $social_site => $profile ) {
                    if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
                        $active_sites[ $social_site ] = $social_site;
                    }
                }
                if ( ! empty( $active_sites ) ) {
                    echo '<ul class="col-xs-6 social-media-icons text-right">';
                    foreach ( $active_sites as $key => $active_site ) {
                        $class = 'fa fa-' . $active_site; ?>
                        <li>
                            <a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
                                <i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
                            </a>
                        </li>
                    <?php }
                    echo "</ul>";
                } ?>
            </div>
        </div>
    </div>
</footer>


