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
            <div class="<?= $atts['div_big_container'] ?> mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
                <!-- h4 or h5 -->
                <<?=$atts['unit_title_mk_element']?>>
                    <?= __('Unit', LCO_THEME).' '.($index+1).'. '.$unit['unit_id'] ?>
                </<?=$atts['unit_title_mk_element']?>>
                <ul>
                    <?php
                    foreach ($unit['lessons'] as $index_lesson => $lesson):
                    ?>
                        <a href="<?=$lesson['link']?>">
                            <li>
                                <span class="<?=$atts['lesson_tittle_class']?>"> <?= ($index_lesson+1).' '.$lesson['title'] ?> </span>
                                <?php
                                if ($atts['display_lesson_desc']):
                                ?>
                                    <p> <?=$lesson['desc']?> </p>
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
 * Get learnC content structrue: units and lessons titles
 */
function lco_get_content_structure () {
    return array (
        array(
            "unit_id" => 'Programming Basics',
            "lessons" => array(
                array(
                    'title' => 'Our 1st program in C',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Variables',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Arithmetic operators',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Print information with <code>printf</code>',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Read information with <code>scanf</code>',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Comments',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
            )
        ),
        array(
            "unit_id" => 'Decisions',
            "lessons" => array(
                array(
                    'title' => 'Logical expressions and the <code>if</code> statement',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => '<code>else</code>',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
            )
        ),
        array(
            "unit_id" => 'Loops',
            "lessons" => array(
                array(
                    'title' => 'Increment and decrement operators',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => '<code>while</code>',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => '<code>do while</code>s',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => '<code>for</code>',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Counters and Accumulators',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
            )
        ),
        array(
            "unit_id" => 'Arrays y Strings',
            "lessons" => array(
                array(
                    'title' => 'Arrays',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Strings',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => '<code>do while</code>s',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                ),
                array(
                    'title' => 'Strings operations (<code>strcpy</code>, <code>strlen</code>, <code>strcat</code>, <code>strcmp</code>) ',
                    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at vulputate turpis. Suspendisse potenti. Lorem',
                    'link' => 'https://www.google.com'
                )
            )
        ),
    );
}