<?php

add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );

function filter_the_content_in_the_main_loop( $content ) {

  ob_start();
  ?>
    <div class="center-elements">
        <a href="https://www.google.com" class="lco-start-now-content-button mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
            <?= __('START NOW', LCO_THEME) ?>
        </a>
    </div>
  <?php
  $output = ob_get_contents();
  ob_end_clean();

   return $content.$output;
}


genesis();