<?php
if (array_key_exists('submit_shortcode', $_POST)) {
    update_option('swa_shortcode', $_POST['shortcode']);

}
$shortcode = get_option('swa_shortcode', 'Studio Web Art');
