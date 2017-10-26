<?php
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action('genesis_before_loop', 'lco_render_about_page');

function lco_render_about_page () {
    ob_start();
    ?>
        <div class="lco-about-page-container">
            <h1 class="text-center">Here you will Learn C Online by doing</h1>
            <h4>Since our 1st line of code we knew that the best way to learn how to code is always by doing.
                Here you can find tutorials to Learn C programming language with a lot of coding exercises.</h4>

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col">
                    <h3 class="text-center">Mission</h3>
                    <h6 class="mdl-typography--title">Teach in a pragmatic way how to start to code using C language.</h6>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <h3 class="text-center">Vision</h3>
                    <h6 class="mdl-typography--title">Be the starred website for the beginners who wants to learn how to code by its own using C.</h6>
                </div>
                <div class="mdl-cell mdl-cell--8-col">
                    <h3>Characteristics</h3>
                    <ul>
                        <li>
                            <h6 class="mdl-typography--title">Beginners</h6>
                        </li>
                        <li>
                            <h6 class="mdl-typography--title">People without code experience</h6>
                        </li>
                        <li>
                            <h6 class="mdl-typography--title">Programmer Students of 1st Semester</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
}

genesis();