<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bizcare
 */

get_header();
?>

<section id="evt-page-banner">

	<div class="evt-banner-image evt-overlay position-relative">
		<div class="evt-banner-caption">
			<h2 class="evt-title mb-4"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'bizcare') ?></h2>
			<p><?php esc_html_e('It looks like nothing was found at this location.','bizcare') ?></p>
			<?php
			get_search_form();
			?>			
		</div>
	</div>

</section>


<?php
get_footer();
