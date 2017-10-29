<?php

class LCO_Master_with_Practice_Widget extends WP_Widget
{
    /**
     * Practice page link
     */
    private $link;

    // Set up the widget name and description.
    public function __construct()
    {
        // Set the link to the page practice
        $this->link = get_permalink( get_page_by_path( 'practice' ) );

        $widget_options = array( 'classname' => 'lco-master-with-practice-widget', 'description' => __('LearnC Online Master with practice widget', LCO_THEME) );
        parent::__construct(
            'lco_master_with_practice_widget', // Base ID
            __('LearnC Online Master with Practice Widget', LCO_THEME), // Name
            $widget_options );  // Args
    }

    // Create the widget output.
    public function widget($args, $instance)
    {
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        ob_start();
        ?>
            <p><?= __('When you are learning to code, you really learnc by practicing.', LCO_THEME) ?></p>
            <div class="lco-mwp-widget-flex">
                <a href="<?= $this->link ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <?= __('Let\'s do it', LCO_THEME) ?>
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
function lco_register_master_with_practice_widget()
{
    register_widget( 'lco_master_with_practice_widget' );
}
add_action( 'widgets_init', 'lco_register_master_with_practice_widget' );
