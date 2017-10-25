<?php

class LCO_Contact_Us_Widget extends WP_Widget
{
    // Set up the widget name and description.
    public function __construct()
    {
        $widget_options = array( 'classname' => 'lco-contact-us-widget', 'description' => __('LearnC Online contact us widget', LCO_THEME) );
        parent::__construct(
            'lco_contact_us_widget', // Base ID
            __('LearnC Online Contact Us Widget', LCO_THEME), // Name
            $widget_options );  // Args
    }

    // Create the widget output.
    public function widget($args, $instance)
    {
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        ob_start();
        ?>
        <div class="lco-contact-us-div">
            <a href="mailto:learnc.code.online@gmail.com" target="_blank">
                <img src="<?= get_stylesheet_directory_uri() . '/widgets/assets/email.svg' ?>" />
            </a>
            <a href="https://twitter.com/learnc_online" target="_blank">
                <img src="<?= get_stylesheet_directory_uri() . '/widgets/assets/twitter.svg' ?>" />
            </a>
            <a href="https://www.facebook.com/learnc.code.online/" target="_blank">
                <img src="<?= get_stylesheet_directory_uri() . '/widgets/assets/facebook.svg' ?>" />
            </a>
        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;

        echo $args['after_widget'];
    }

    // Create the admin area widget settings form.
    public function form($instance)
    {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p><?php
    }
    // Apply settings to the widget instance.
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }
}

// Register the widget.
function lco_contact_us_widget()
{
    register_widget( 'lco_contact_us_widget' );
}
add_action( 'widgets_init', 'lco_contact_us_widget' );
