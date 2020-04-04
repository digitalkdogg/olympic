<?php
if( !function_exists('bizcare_blog_section') ) :
	/**
	*
	* Blog Section
	*
	* @since Bizacre 1.0.0
	* 
	* @param null
	* @return null
	*
	*/
	function bizcare_blog_section(){
		global $bizcare_customizer_all_values;

		$blog_title 			 = $bizcare_customizer_all_values['bizcare-blog-section-title-text'];
		$blog_single_number_word = $bizcare_customizer_all_values['bizcare-blog-excerpt-length'];
		$blog_button_text 		 = $bizcare_customizer_all_values['bizcare-blog-button-text'];
		$bolg_category 			 = $bizcare_customizer_all_values['bizcare-blog-select-category'];

		if( 1 != $bizcare_customizer_all_values['bizcare-blog-section-enable'] ){
			return null;
		} ?>
		<?php if( !empty( $blog_title ) || !empty( $bolg_category ) ) { ?>
		<section class="bt-blog-section py-7 wow fadeIn" data-wow-duration="1.2s">
			<?php if( !empty( $blog_title ) ) { ?>
				<div class="section-title-wrappe text-center">
					<h2 class="bt-section-title"><?php echo esc_html($blog_title);?></h2>
				</div>
			<?php }  ?>	
			<div class="container">
				<div class="row pt-5">
					<?php
					if( 0 != $bolg_category ){
						$blog_args = array(
							'post_type'				=> 'post',
							'posts_per_page' 		=> 3,
							'cat'					=> absint($bolg_category),
							'ignore_sticky_posts' 	=> 1
						);

						/*query start*/
						$bolg_args_query = new WP_Query( $blog_args );
						if( $bolg_args_query->have_posts() ) :
							while( $bolg_args_query->have_posts() ) : 
								$bolg_args_query->the_post() ;
								$thumb_img = '' ;
								if( has_post_thumbnail() ){
									$url_img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'bizcare_blog_image' );
									$thumb_img = $url_img[0];
								}
								$img_attr_id = get_post_thumbnail_id( get_the_ID() );
								$img_attr    =  get_post_meta($img_attr_id,'_wp_attachment_image_alt',true)

								?>
								<article class="post blog-gird mb-4 mb-md-0 col-12 col-md-4">
									<?php if( !empty( $thumb_img ) ) { ?>
									<div class="entry-thumb">
										<a href="<?php the_permalink(); ?>" class="img-has-effect d-block">
											<img src="<?php echo esc_url( $thumb_img ); ?>" alt="<?php echo esc_attr( $img_attr );?>">
										</a>
									</div> <!-- .entry-thumb -->
									<?php } ?>
									<div class="entry-content-wrapper">									
										<header class="entry-header">
											<h2 class="entry-title mb-0 pb-0"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h2>    
										</header><!-- .entry-header -->
										<div class="entry-meta my-3">
											<?php 
												$archive_year   = get_the_time( 'Y' );
												$archive_month  = get_the_time( 'm' );
												$archive_day 	= get_the_time( 'd' );
											?>
											<span class="posted-on">
												<a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day) ); ?>"><?php echo esc_html(get_the_date('M j , Y') );?></a>
											</span>
											<?php 
												$post_id = get_the_category();
												foreach ( $post_id as $post_ids ){
													$category_link = get_category_link( $post_ids->cat_ID );
												 ?>
													<span class="cat-links"><a href="<?php echo esc_url( $category_link );?>" rel="category tag"><?php echo esc_html( $post_ids->cat_name ); ?></a></span> 
												<?php }

											?>
										</div><!-- .entry-meta -->
										<div class="entry-content">
											<p><?php 
											if( has_excerpt() ){
												the_excerpt();
											}else{
												$blog_content = get_the_content();
												echo wp_kses_post(bizcare_words_count( $blog_single_number_word, $blog_content) );
											}
											 ?></p>
											<?php if( !empty( $blog_button_text ) ) { ?> 
												<div class="bt-btn-group pb-3 pt-2">
													<a href="<?php the_permalink(); ?>" class="bt-small-btn bt-btn-bg-transparent"><?php echo esc_html( $blog_button_text );?></a>
												</div>
											<?php } ?>
										</div>
									</div><!-- .entry-content-wrapper -->
								</article><!-- article -->	

							<?php endwhile;
							wp_reset_postdata();
						endif;
					}

					?>
				</div><!-- row -->
			</div><!-- container -->
		</section>
		<!-- from our blog end -->	
		<?php } ?>
	<?php }
endif;
add_action('bizcare_homepage','bizcare_blog_section',80);