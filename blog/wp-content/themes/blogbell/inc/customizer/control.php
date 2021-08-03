<?php 

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class BlogBell_Dropdown_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="blogbell-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

//Custom control for horizontal line
Class BlogBell_Customize_Horizontal_Line extends WP_Customize_Control {
    public $type = 'hr';

    public function render_content() {
        ?>
        <div>
            <hr style="border: 2px solid #72777c;" />
        </div>
        <?php
    }
}

class BlogBell_Multi_Input_Custom_Control extends WP_Customize_Control {
    /**
     * Control type
     *
     * @var string
     */
    public $type = 'multi-input';

    /**
     * Control button text.
     *
     * @var string
     */
    public $button_text;

    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <label class="customize_multi_input">
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p><?php echo esc_html( $this->description ); ?></p>
            <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize_multi_value_field" <?php $this->link(); ?> />
            <div class="customize_multi_fields">
                <div class="set">
                    <input type="text" value="" class="customize_multi_single_field"/>
                    <span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span>
                </div>
            </div>
            <a href="#" class="button button-primary customize_multi_add_field"><?php echo esc_html( $this->button_text ); ?></a>
        </label>
        <?php
    }
}

//Custom control for any note, use label as output description
class BlogBell_Note_Control extends WP_Customize_Control {
    public $type = 'description';

    public function render_content() {
        if ( 'custom-html' === $this->type ) {
            echo wp_kses_post( $this->label );
        } else {
            echo '<h2 class="description">' . esc_html( $this->label ) . '</h2>';
        }
    }
}

 ?>