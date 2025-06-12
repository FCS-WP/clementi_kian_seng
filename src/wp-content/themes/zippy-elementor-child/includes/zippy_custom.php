<?php
add_action('wp_enqueue_scripts', 'shin_scripts');

function shin_scripts()
{
    $version = time();

    wp_enqueue_style('main-style-css', THEME_URL . '-child' . '/assets/dist/css/main.min.css', array(), $version, 'all');

    wp_enqueue_script('main-scripts-js', THEME_URL . '-child' . '/assets/dist/js/main.min.js', array('jquery'), $version, true);
}

function myContentFooter() {
    ?>
    <div class="ppocta-ft-fix">
        <a id="whatsappButton" href="https://wa.me/6585959411" target="_blank"><span>Whatsapp: +65 85959411</span></a>
    </div>
    <?php
}
add_action( 'wp_footer', 'myContentFooter' );