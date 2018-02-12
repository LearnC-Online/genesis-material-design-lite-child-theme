<?php

add_shortcode( 'lco_render_content_markup', 'lco_render_content_markup' );

function lco_render_content_markup ($atts = array()) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'div_big_container' => 'lco-content-widget-unit',
            'unit_title_mk_element' => 'h5',
            'lesson_tittle_class' => '',
            'display_lesson_desc' => false
        ),
        $atts
    );

    $content = lco_get_content_structure();

    ob_start();
    ?>
    <div class="mdl-grid <?= $atts['div_big_container'].'-grid' ?> ">
        <?php
        foreach ($content as $index => $unit):
        ?>
            <div class="<?= $atts['div_big_container'] ?> mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                <!-- h4 or h5 -->
                <<?=$atts['unit_title_mk_element']?>>
                    <?= __('Unit', LCO_THEME).' '.($index+1).'. '.$unit->title ?>
                </<?=$atts['unit_title_mk_element']?>>
                <ul>
                    <?php
                    foreach ($unit->lessons as $index_lesson => $lesson):
                    ?>
                        <a href="<?=$lesson->link?>">
                            <li>
                                <span class="<?=$atts['lesson_tittle_class']?>"> <?= ($index_lesson+1).' '.$lesson->title ?> </span>
                                <?php
                                if ($atts['display_lesson_desc']):
                                ?>
                                    <p> <?=$lesson->desc?> </p>
                                <?php
                                endif;
                                ?>
                            </li>
                        </a>
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
    return $output;
}

/**
 * Class to structure a lesson in LearnC Online
 */
class lco_lesson {
    # Lesson's title
    public $title;
    # Lesson's short description
    public $desc;
    # Lesson's permalink
    public $link;

    /**
     * Simple constructor with all the values
     */
    function __construct($title, $desc, $link) {
        $this->title = $title;
        $this->desc = $desc;
        $this->link = $link;
    }

    /**
     * Class to structure a lesson in LearnC Online
     */
    public static function construct_from_post(WP_Post $post) {
        // Get lesson short desc
        $lesson_short_desc = get_post_meta($post->ID, learnconline\Lessons_Creation::LESSON_META_SHORT_DESC, true);
        // If the lesson doesn't have description, set a default one
        $lesson_short_desc = $lesson_short_desc ? $lesson_short_desc : __('<i>No description available</i>', LCO_THEME);

        $intance = new self(
            $post->post_title,
            $lesson_short_desc,
            get_permalink($post)
        );

        return $intance;
    }
}

/**
 * Class to structure a unit in LearnC Online
 */
class lco_unit {
    # Lesson's title
    public $title;
    # Lesson's lessons
    public $lessons;

    /**
     * Constructor
     */
    function __construct($title) {
        $this->title = $title;
        $this->lessons = array();
    }

    /**
     * Add a lesson to the array of lessons
     */
    public function add_lesson(lco_lesson $lesson) {
        array_push($this->lessons, $lesson);
    }
}

/**
 * Get learnC content structrue: units and lessons titles
 */
function lco_get_content_structure () {
    # Variable to sotre all the units
    $units = array();

    # All the units
    $all_units_taxonomy = get_terms( array(
        'taxonomy' => learnconline\Units_Creation::UNIT_TAXONOMY,
        // 'hide_empty' => false,
    ));

    # Iterate all the units
    foreach ($all_units_taxonomy as $unit_tax) {
        # Create the unit
        $current_unit = new lco_unit($unit_tax->name);

        # Query all the lessons of this unit
        $args = array(
            'post_type' => learnconline\Lessons_Creation::LESSON_CPT,
            'orderby'   => 'menu_order',
            'order'     => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => learnconline\Units_Creation::UNIT_TAXONOMY,
                    'field' => 'slug',
                    'terms' => $unit_tax->slug
                )
            )
        );
        $lessons_post_on_tax = (new WP_Query($args))->posts;

        # Create all the lessons
        foreach ($lessons_post_on_tax as $lesson_post)
            $current_unit->add_lesson(lco_lesson::construct_from_post($lesson_post));

        # Store the unit created
        array_push($units, $current_unit);
    }

    # Return the units
    return $units;
}