( function( api ) {

	// Extends our custom "ample-blog" section.
	api.sectionConstructor['ample-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
