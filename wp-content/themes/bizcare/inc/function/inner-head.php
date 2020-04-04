<?php 

if (!function_exists('bizcare_single_page_title')) :

	/**
	* bizcare_inner_head_section
	*
	* @since bizcare 1.0.0
	*
	* @hooked null
	*/

    function bizcare_single_page_title() {
		global $bizcare_customizer_all_values;

		$bizcare_inner_baner_image = get_header_image();
	    ?>
		<div class="wrapper page-inner-title <?php if( empty( $bizcare_inner_baner_image ) ) {  echo 'no-inner-img' ; }  ?>" <?php if( !empty( $bizcare_inner_baner_image ) ) { ?> style="background-image: url('<?php echo esc_url($bizcare_inner_baner_image); ?>');"<?php } ?>>
		
			<div class="overlay-for-img">
            	<div class = "thumb-overlay">
					<div class="container inner-heade-content">
					    <div class="row">
					        <div class="col-md-12 col-sm-12 col-xs-12">
								<header class="entry-header">
									<?php if (is_singular()){ ?>
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									<?php if (! is_page() ){?>
										<header class="entry-header">
											<div class="entry-meta entry-inner">
												<?php bizcare_posted_on(); ?>
											</div><!-- .entry-meta -->
										</header><!-- .entry-header -->
									<?php } }
									elseif (is_404()) { ?>
										<h2 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bizcare' ); ?></h2>
									<?php }
									elseif (is_archive()) {
										the_archive_title( '<h2 class="entry-title">', '</h2>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									}
									elseif (is_search()) { ?>
    								<?php /* translators: %s: search page result */ ?>
										<h2 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'bizcare' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
									<?php }
									else{ ?>
										<h2 class="entry-title"><?php  echo (esc_html__( 'Latest Blog', 'bizcare' )); ?></h2>
								<?php }
									?>
								</header><!-- .entry-header -->
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<?php 
	}
endif;
add_action( 'bizcare_page_inner_title', 'bizcare_single_page_title', 15 );