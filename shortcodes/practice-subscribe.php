<?php

add_shortcode( 'lco_practice_subscribe', 'lco_render_subscribe_form' );

function lco_render_subscribe_form () {
    ob_start();
    ?>
    <div id="optinforms-form1-container">
        <form method="post"
            action="https://learnc-online.us17.list-manage.com/subscribe/post?u=393885e0ffd63041600e8c862&amp;id=9bb7f7120f"
            _lpchecked="1">
            <div id="optinforms-form1" class="lco_practice_subscribe_container">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
                        <!-- Email -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="EMAIL" type="email" id="mce-EMAIL">
                            <label class="mdl-textfield__label" for="mce-EMAIL"><?= __('Your Email', LCO_THEME) ?></label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                        <!-- Subscribe button -->
                        <input name="submit" id="optinforms-form1-button" value="SUBSCRIBE" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}