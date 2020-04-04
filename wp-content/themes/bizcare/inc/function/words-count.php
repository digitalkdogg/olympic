<?php
/**
* Returns word count of the sentences.
*
* @since bizcare 1.0.0
*/
if ( ! function_exists( 'bizcare_words_count' ) ) :
	function bizcare_words_count( $length = 25, $bizcare_content = null ) {
		$length = absint( $length );
		$more = esc_html__( '&hellip;','bizcare' );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $bizcare_content );
		$trimmed_content = wp_trim_words( $source_content, $length, $more );
		return $trimmed_content;
	}
endif;