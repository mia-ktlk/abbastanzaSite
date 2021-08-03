<?php $wb_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" autocomplete="off" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $wb_unique_id ); ?>" placeholder="<?php echo esc_attr_x( 'press enter to search', 'placeholder', 'shiny-blog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>