( function( api ) {

	// Extends our custom "bizcare" section.
	api.sectionConstructor['bizcare'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
