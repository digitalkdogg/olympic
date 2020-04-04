<?php

if ( !function_exists('bizcare_feature_slider_array') ) :
  /**
     * Featured Slider array creation
     *
     * @since Bizcare 1.0.0
     *
     * @param  $from_slider
     * @return array
     *
     */
    function bizcare_feature_slider_array($from_slider)
    {
      global $bizcare_customizer_all_values;
      $slider_excerpt_length      = absint($bizcare_customizer_all_values['bizcare-excerpt-length']);

      $reapeated_pages      = array('bizcare-page-id');
      $feature_slider_args  = array(); 
      $feature_slideer_array = array();

      if('form-category' == $from_slider){
        $bizcare_slider_cat = $bizcare_customizer_all_values['bizcare-select-from-cat'];
        if(0 != $bizcare_slider_cat){
          $feature_slider_args = array(
                'post_type'             => 'post',
                'posts_per_page'        => 3,
                'cat'                   => absint($bizcare_slider_cat),
                'ignore_sticky_posts'   => true
            );
        }
      }
      else{
        $feature_slider_post_page = evision_customizer_get_repeated_all_value(3,$reapeated_pages);
        if (null !=$feature_slider_post_page ){
          foreach ($feature_slider_post_page as $feature_slider_post_pages){
            if ( 0 !=  $feature_slider_post_pages['bizcare-page-id']){
              $feature_slider_page_ids[] = $feature_slider_post_pages['bizcare-page-id'];
            }
          }
          if (!empty($feature_slider_page_ids ) ){
            $feature_slider_args = array(
              'post_type'             => 'page',
              'post__in'              => $feature_slider_page_ids,
              'order_by'              => 'post__in',
              'order'                 => 'ASC' 
            );
          }
        }
      }
      
      if( !empty( $feature_slider_args )){
          // the query
          $bizcare_feature_slider_args = new WP_Query( $feature_slider_args );

          if ( $bizcare_feature_slider_args->have_posts() ) :
            while ( $bizcare_feature_slider_args->have_posts() ) : 
              $bizcare_feature_slider_args->the_post();
                $url ='';
                if(has_post_thumbnail()){
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bizcare-slider-banner-image' );
                    $url = $thumb['0'];
                }
                else {

                    $url = '';
                }

                  $feature_slideer_array[]  =  array(
                    'bizcare-feature-title'    => get_the_title(),
                    'bizcare-feature-content'  => has_excerpt() ? get_the_excerpt() : bizcare_words_count($slider_excerpt_length, get_the_content() ),
                    'bizcare-feature-image'    => esc_url( $url ),
                    'bizcare-feature-url'      => esc_url( get_permalink() )

                  );
            endwhile;
            wp_reset_postdata();
          endif;
      }
      return $feature_slideer_array;

    }
endif;

if (!function_exists('bizcare_feature_slider')) :
   /**
     * Featured Slider
     *
     * @since Bizcare 1.0.0
     *
     * @param null
     * @return null
     *
     */
 function bizcare_feature_slider()
 {

  global $bizcare_customizer_all_values;
  if(  !$bizcare_customizer_all_values['bizcare-enbale-slider'] )
  {
    return null;
  }
  $fetaure_slider_select_post   	   = $bizcare_customizer_all_values['bizcare-select-post-form'];
  $feature_slide_arrays         	   = bizcare_feature_slider_array($fetaure_slider_select_post);
  $feature_slider_button_text   	   = $bizcare_customizer_all_values['bizcare-slider-button-text'];
  $feature_slider_button_text2  	   = $bizcare_customizer_all_values['bizcare-slider-button-text2'];
  $feature_slider_button_text2_url     = $bizcare_customizer_all_values['bizcare-slider-button-text2-url'];

  if ( is_array($feature_slide_arrays) ) { ?>

    <!-- nav bar section end -->
	<section class="banner-section">
		<div class="bt-banner-init">
			<?php
			foreach ( $feature_slide_arrays as $feature_slide_array ){
				if( !empty( $feature_slide_array['bizcare-feature-image'] ) ){
					$bizcare_slider_image = $feature_slide_array['bizcare-feature-image'];
				}else{
					$bizcare_slider_image  = '';
				}
			?>
			<div class="bt-banner-slider bt-has-overlay" style="background-image: url('<?php echo esc_url($bizcare_slider_image); ?>');">
				<div class="container z-index position-relative h-100 d-flex align-items-center p-0">
					<div class="bt-banner-caption">
						<?php if( !empty( $feature_slide_array['bizcare-feature-title'] ) ) { ?>
							<h2 class="mb-4"><?php echo esc_html( $feature_slide_array['bizcare-feature-title'] ); ?></h2>
						<?php } ?>
						<?php if( !empty( $feature_slide_array['bizcare-feature-content'] ) ) { ?>
							<p class="text-white"><?php echo wp_kses_post( $feature_slide_array['bizcare-feature-content'] ); ?></p>
						<?php } ?>
						<?php if( !empty( $feature_slider_button_text ) || !empty( $feature_slider_button_text2 ) )  { ?>
							<div class="bt-btn-group mt-5">
								<?php if( !empty( $feature_slider_button_text ) ) { ?>
								    <a href="<?php echo esc_url($feature_slide_array['bizcare-feature-url']);?>" class="bt-small-btn bt-btn-primary bt-bg-primary fs-8"><?php echo esc_html( $feature_slider_button_text ); ?></a>
								<?php } ?>
								<?php if( !empty( $feature_slider_button_text2 ) ) { ?>
								    <a href="<?php echo esc_url( $feature_slider_button_text2_url ); ?>" class="bt-small-btn bt-btn-primary bt-btn-transparent fs-8 ml-3"><?php echo esc_html( $feature_slider_button_text2 ); ?></a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } 
			?>
		</div>
	</section>

  <?php
  }
 }
endif;
add_action('bizcare_homepage_slider','bizcare_feature_slider',10);
