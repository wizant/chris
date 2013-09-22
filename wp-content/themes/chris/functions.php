<?php
//import helper functions
include 'helper-functions.php';

//uncomment to enable syntax highlighting when using the dump function
//highlight();

//disable admin bar from showing when logged in
add_filter('show_admin_bar', '__return_false');

// filter the Gravity Forms button type
add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<input type='submit' id='gform_submit_button_{$form["id"]}' class='btn btn-default' value='{$form['button']['text']}' />";
}
?>