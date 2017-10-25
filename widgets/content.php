<?php

class LCO_Content_Widget extends WP_Widget
{
    private $content;

    // Set up the widget name and description.
    public function __construct()
    {
        $this->content = array (
            array(
                "unit_id" => 'Programming Basics',
                "lessons" => array(
                    array(
                        'title' => 'Our 1st program in C',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Variables',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Arithmetic operators',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Print information with <code>printf</code>',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Read information with <code>scanf</code>',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Comments',
                        'link' => 'https://www.google.com'
                    ),
                )
            ),
            array(
                "unit_id" => 'Decisions',
                "lessons" => array(
                    array(
                        'title' => 'Logical expressions and the <code>if</code> statement',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => '<code>else</code>',
                        'link' => 'https://www.google.com'
                    ),
                )
            ),
            array(
                "unit_id" => 'Loops',
                "lessons" => array(
                    array(
                        'title' => 'Increment and decrement operators',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => '<code>while</code>',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => '<code>do while</code>s',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => '<code>for</code>',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Counters and Accumulators',
                        'link' => 'https://www.google.com'
                    ),
                )
            ),
            array(
                "unit_id" => 'Arrays y Strings',
                "lessons" => array(
                    array(
                        'title' => 'Arrays',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Strings',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => '<code>do while</code>s',
                        'link' => 'https://www.google.com'
                    ),
                    array(
                        'title' => 'Strings operations (<code>strcpy</code>, <code>strlen</code>, <code>strcat</code>, <code>strcmp</code>) ',
                        'link' => 'https://www.google.com'
                    )
                )
            ),
        );

        $widget_options = array( 'classname' => 'lco-content-widget', 'description' => __('LearnC Online content widget', LCO_THEME) );
        parent::__construct(
            'lco_content_widget', // Base ID
            __('LearnC Online Content Widget', LCO_THEME), // Name
            $widget_options );  // Args
    }

    // Create the widget output.
    public function widget($args, $instance)
    {
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        ob_start();

        ?>
        <div class="mdl-grid">
            <?php
            foreach ($this->content as $index => $unit):
            ?>
                <div class="lco-content-widget-unit mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                    <h5><?= __('Unit', LCO_THEME).' '.($index+1).'. '.$unit['unit_id'] ?></h5>
                    <ul>
                        <?php
                        foreach ($unit['lessons'] as $index_lesson => $lesson):
                        ?>
                            <li>
                                <a href="<?=$lesson['link']?>"> <?= ($index_lesson+1).' '.$lesson['title'] ?> </a>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            <?php
            endforeach;
            ?>
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
function lco_content_widget()
{
    register_widget( 'lco_content_widget' );
}
add_action( 'widgets_init', 'lco_content_widget' );
