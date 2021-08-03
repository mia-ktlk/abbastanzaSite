
( function( $, api ) {
    /* === Repeater Text Control === */
    api.controlConstructor['repeater-text'] = api.Control.extend({

        ready: function() {

            'use strict';

            var control = this;

            control.initCustomControl();
        },

        initCustomControl: function() {

            'use strict';

            var control = this;

            control.populate(control);

            control.container.on( 'click', '.btn-add-field', control, function(event) {
                control.add(event);
            } );
            control.container.on( 'change', '.repeater-text-single-field', control, function() {
                control.updateValue();
            } );
            control.container.on( 'click', '.btn-remove-field', control, function(event) {
                control.remove(event);
                control.updateValue();
            } );
        },

        populate: function() {

            'use strict';

            var wrapper = this.selector;
            var multi_saved_value = jQuery(wrapper).find( '.repeater-text-value' ).val();
            if ( multi_saved_value.length > 0 ) {
                var multi_saved_values = multi_saved_value.split( '|' );
                jQuery(wrapper).find( '.repeater-text-fields' ).empty();
                jQuery.each(multi_saved_values, function( i, value ) {
                    jQuery(wrapper).find( '.repeater-text-fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="repeater-text-single-field" /><span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
                });
            }
        },

        add: function(event) {
            'use strict';

            event.preventDefault();
            jQuery(event.target).parent('.repeater-text-input').find('.repeater-text-fields').append( '<div class="set"><input type="text" value="" class="repeater-text-single-field" /><span class="btn-remove-field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
        },

        remove: function(event) {
            'use strict';

            event.preventDefault();
            jQuery(event.target).parent().parent().remove();
        },

        updateValue: function() {
            'use strict';

            var values = '';
            var wrapper = this.selector;
            jQuery(wrapper).find( '.repeater-text-fields .repeater-text-single-field' ).each(function() {
                values += jQuery(this).val() + '|';
            });

            jQuery(wrapper).find( '.repeater-text-value' ).val( values.slice( 0, -1 ) ).change();
        }

    });

        // upsell 
    api.sectionConstructor['upsell'] = api.Section.extend( {
        // No events for this type of section.
        attachEvents: function () {},
        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
    
} )( jQuery, wp.customize );
/**
* Custom Js for image select in customizer
*
* @package Safar Lite
*/

/**
* Custom Js for image select in customizer
*
* @package businessbiz
*/
 jQuery(document).ready(function($) {
    $('#businessbiz-img-container li label img').click(function(){      
        $('#businessbiz-img-container li').each(function(){
            $(this).find('img').removeClass ('businessbiz-radio-img-selected') ;
        });
        $(this).addClass ('businessbiz-radio-img-selected') ;
    }); 

    //Switch Control
    $('body').on('click', '.onoffswitch', function(){
        var $this = $(this);
        if($this.hasClass('switch-on')){
            $(this).removeClass('switch-on');
            $this.next('input').val( false ).trigger('change')
        }else{
            $(this).addClass('switch-on');
            $this.next('input').val( true ).trigger('change')
        }
    });

    $( document ).on( 'click', '.customize_multi_add_field', businessbiz_customize_multi_add_field )
        .on( 'change', '.customize_multi_single_field', businessbiz_customize_multi_single_field )
        .on( 'click', '.customize_multi_remove_field', businessbiz_customize_multi_remove_field )

    /********* Multi Input Custom control ***********/
    $( '.customize_multi_input' ).each(function() {
        var $this = $( this );
        var multi_saved_value = $this.find( '.customize_multi_value_field' ).val();
        if (multi_saved_value.length > 0) {
            var multi_saved_values = multi_saved_value.split( "|" );
            $this.find( '.customize_multi_fields' ).empty();
            var $control = $this.parents( '.customize_multi_input' );
            $.each(multi_saved_values, function( index, value ) {
                $this.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            });
        }
    });

    function businessbiz_customize_multi_add_field(e) {
        var $this = $( e.currentTarget );
        e.preventDefault();
            var $control = $this.parents( '.customize_multi_input' );
            $control.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            businessbiz_customize_multi_write( $control );
    }

    function businessbiz_customize_multi_single_field() {
        var $control = $( this ).parents( '.customize_multi_input' );
        businessbiz_customize_multi_write( $control );
    }

    function businessbiz_customize_multi_remove_field(e) {
        e.preventDefault();
        var $this = $( this );
        var $control = $this.parents( '.customize_multi_input' );
        $this.parent().remove();
        businessbiz_customize_multi_write( $control );
    }

    function businessbiz_customize_multi_write( $element) {
        var customize_multi_val = '';
        $element.find( '.customize_multi_fields .customize_multi_single_field' ).each(function() {
            customize_multi_val += $( this ).val() + '|';
        });
        $element.find( '.customize_multi_value_field' ).val( customize_multi_val.slice( 0, -1 ) ).change();
    }       
});    
 jQuery(document).ready(function($) {
    $('#customize-control-theme_options-layout_options_blog #blogbell-img-container li label img').click(function(){      
        $('#customize-control-theme_options-layout_options_blog #blogbell-img-container li').each(function(){
            $(this).find('img').removeClass ('blogbell-radio-img-selected') ;
        });
        $(this).addClass ('blogbell-radio-img-selected') ;
    });  

    $('#customize-control-theme_options-layout_options_archive #blogbell-img-container li label img').click(function(){       
        $('#customize-control-theme_options-layout_options_archive #blogbell-img-container li').each(function(){
            $(this).find('img').removeClass ('blogbell-radio-img-selected') ;
        });
        $(this).addClass ('blogbell-radio-img-selected') ;
    });  

    $('#customize-control-theme_options-layout_options_page #blogbell-img-container li label img').click(function(){      
        $('#customize-control-theme_options-layout_options_page #blogbell-img-container li').each(function(){
            $(this).find('img').removeClass ('blogbell-radio-img-selected') ;
        });
        $(this).addClass ('blogbell-radio-img-selected') ;
    });  

    $('#customize-control-theme_options-layout_options_single #blogbell-img-container li label img').click(function(){        
        $('#customize-control-theme_options-layout_options_single #blogbell-img-container li').each(function(){
            $(this).find('img').removeClass ('blogbell-radio-img-selected') ;
        });
        $(this).addClass ('blogbell-radio-img-selected') ;
    });                 
});

