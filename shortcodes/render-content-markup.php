<?php

add_shortcode( 'lco_render_content_markup', 'lco_render_content_markup' );

function lco_render_content_markup ($atts = array()) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'div_big_container' => 'lco-content-widget-unit',
        ),
        $atts
    );

    $content = lco_get_content_structure();

    ob_start();
    ?>
    <div class="mdl-grid">
        <?php
        foreach ($content as $index => $unit):
        ?>
            <div class="<?= $atts['div_big_container'] ?> mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
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
    return $output;
}

/**
 * Get learnC content structrue: units and lessons titles
 */
function lco_get_content_structure () {
    return array (
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
}