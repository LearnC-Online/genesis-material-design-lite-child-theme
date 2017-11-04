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
        $email_address = apply_filters( 'widget_email_address', $instance[ 'email-address' ] );
        $twitter_url = apply_filters( 'widget_twitter_url', $instance[ 'twitter-url' ] );
        $facebook_url = apply_filters( 'widget_facebook_url', $instance[ 'facebook-url' ] );

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        ob_start();
        ?>
        <div class="lco-contact-us-div">
            <a href="mailto:<?= $email_address ?>" target="_blank">
                <img src="<?= get_stylesheet_directory_uri() . '/widgets/assets/email.svg' ?>" />
            </a>
            <a href="<?= $twitter_url ?>" target="_blank">
                <img src="<?= get_stylesheet_directory_uri() . '/widgets/assets/twitter.svg' ?>" />
            </a>
            <a href="<?= $facebook_url ?>" target="_blank">
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $twitter_url = ! empty( $instance['twitter-url'] ) ? $instance['twitter-url'] : '';
        $facebook_url = ! empty( $instance['facebook-url'] ) ? $instance['facebook-url'] : '';
        $email_addres = ! empty( $instance['email-address'] ) ? $instance['email-address'] : '';
        ?>

        <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'twitter-url' ); ?>">Twitter Url:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'twitter-url' ); ?>" name="<?php echo $this->get_field_name( 'twitter-url' ); ?>" value="<?php echo esc_attr( $twitter_url ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'facebook-url' ); ?>">Facebook Url:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'facebook-url' ); ?>" name="<?php echo $this->get_field_name( 'facebook-url' ); ?>" value="<?php echo esc_attr( $facebook_url ); ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id( 'email-address' ); ?>">Email Address:</label>
          <input type="text" id="<?php echo $this->get_field_id( 'email-address' ); ?>" name="<?php echo $this->get_field_name( 'email-address' ); ?>" value="<?php echo esc_attr( $email_addres ); ?>" />
        </p>
        <?php
    }
    // Apply settings to the widget instance.
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'twitter-url' ] = strip_tags( $new_instance[ 'twitter-url' ] );
        $instance[ 'facebook-url' ] = strip_tags( $new_instance[ 'facebook-url' ] );
        $instance[ 'email-address' ] = strip_tags( $new_instance[ 'email-address' ] );
        return $instance;
    }
}

// Register the widget.
function lco_contact_us_widget()
{
    register_widget( 'lco_contact_us_widget' );
}
add_action( 'widgets_init', 'lco_contact_us_widget' );
