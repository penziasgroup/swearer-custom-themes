<?php

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 *
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "swearer" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "swearer".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
/* -- Delete this line to enable.
function swearer_preprocess_html(&$vars) {
  global $theme_key;

  // Two examples of adding custom classes to the body.

  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  // $vars['classes_array'][] = css_browser_selector();

}
// */


/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function swearer_process_html(&$vars) {
}
// */


/**
 * Override or insert variables for the page templates.
 */
/* -- Delete this line if you want to use these functions
function swearer_process_page(&$vars) {
}
*/
function swearer_preprocess_page(&$vars) {
    drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' . file_create_url(path_to_theme()) . '" });', 'inline'); 
}

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function swearer_process_node(&$vars) {
}
// */
function swearer_preprocess_node(&$vars) {
    $type = $vars['type'];
    $mode = $vars['view_mode'];
    
    if($mode == 'teaser' || $mode == 'mini_teaser' || $mode == 'large_feature'){
        $vars['title'] = '';
    }
    if($mode == 'full' && $type == 'story'){
        if(!empty($vars['content']['field_author'])){
            $vars['content']['field_author'][0]['#markup'] = 'by ' . $vars['content']['field_author'][0]['#markup'];
        }
        if(!empty($vars['content']['field_youtube_url']) || !empty($vars['content']['field_photo_essay'])){
            hide($vars['content']['field_featured_image']);
            hide($vars['content']['field_featured_image_caption']);
        }
    }
}

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function swearer_preprocess_comment(&$vars) {
}
function swearer_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function swearer_preprocess_block(&$vars) {
}
function swearer_process_block(&$vars) {
}
// */

function swearer_preprocess_taxonomy_term(&$vars){
    if($vars['view_mode'] == 'taxonomy_card'){
        $vars['term_name'] = '';
    }
}
