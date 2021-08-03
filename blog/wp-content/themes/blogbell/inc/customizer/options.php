<?php 


if ( ! function_exists( 'blogbell_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogbell_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Show', 'blogbell' ),
            'off'       => esc_html__( 'Hide', 'blogbell' )
        );
        return apply_filters( 'blogbell_switch_options', $arr );
    }
endif;
 
 ?>