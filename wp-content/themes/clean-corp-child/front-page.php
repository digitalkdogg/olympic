<?php
/**
 * The template for displaying home page.
 * @package bizcare
 */
global $bizcare_customizer_all_values;

get_header();
if ( 'posts' == get_option( 'show_on_front' ) )
{
    include( get_home_template() );
}
    else
    {
		/**
		 * bizcare_homepage hook
		 * @since bizcare 1.0.0
		 *
		 * @hooked bizcare_homepage -  10
		 * @sub_hooked bizcare_homepage - 20
         * @hooked bizcare_homepage_slider -30
		 */
          
        do_action( 'bizcare_homepage_slider' );
        do_action( 'bizcare_homepage' );

        $bizcare_static_page = absint($bizcare_customizer_all_values['bizcare-enable-static-page']);
        do_action('bizcare_link');
        if (1 == $bizcare_static_page ) { ?>
            <section class="section fp-auto-height">
                <div class="evt-img-overlay">
                    <div class="container pt-4">
                        <div class="row">
                            <div id="primary" class="content-area">
                                <main id="main" class="site-main" role="main">

                                    <?php
                                    while ( have_posts() ) : the_post();

                                        get_template_part( 'template-parts/content', 'page' );

                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;

                                    endwhile; // End of the loop.
                                    ?>

                                </main><!-- #main -->
                            </div><!-- #primary -->
                            <?php get_sidebar(); ?>
                        </div>
                        
                    </div>
                </div>
            </section>
        <?php }
    }
get_footer();