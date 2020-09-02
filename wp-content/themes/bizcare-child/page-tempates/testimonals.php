<?php
/*
 Template Name: Bizcare Testimonals
*/

 get_header(); ?>

 <div id="content" class="testimonals testimonal-template">
 <div class = "overlay" data-ele="testimonals"></div>
	<div class="review-wrapper">
	<div class="rerow">
		<div class = "review full-width">
	<?php
 if ( have_posts() ) {
		 	// Load posts loop.
		 	while ( have_posts() ){
		 		the_post(); 
		 		the_content();
		 	}
		 } ?>
		 </div>
	</div>	

		<?php 
		$args = array(
			'numberposts' => 10,
			'category'   => get_cat_ID ( 'review' )
		  );
		   $reviews = get_posts( $args );
			
		 	$i = 1;  
		   foreach ( $reviews as $post ) { 
			    if ($i % 2 == 1) { ?>
			   		<div class = "rerow">
					<?php echo $post->post_content; ?>
				<?php } else {?>
					
					<?php echo $post->post_content; ?>
					</div>
				<?php } ?>
			<?php
			$i = $i + 1;
			}?>

		
	</div>

 </div>
 <?php get_footer();