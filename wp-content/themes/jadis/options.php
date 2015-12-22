<?php

/**
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
    function of_get_option($name, $default = false) {

        $optionsframework_settings = get_option('optionsframework');

        // Gets the unique option id
        $option_name = $optionsframework_settings['id'];

        if ( get_option($option_name) ) {
            $options = get_option($option_name);
        }

        if ( isset($options[$name]) ) {
            return $options[$name];
        } else {
            return $default;
        }
    }
}

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */
function optionsframework_option_name() {
    // This gets the theme name from the stylesheet (lowercase and without spaces)
    $themename = get_option( 'stylesheet' );
    $themename = preg_replace("/\W/", "_", strtolower($themename) );
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
    // echo $themename;
}
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */
function optionsframework_options() {
//    // Test data
//    $test_array = array(
//        'one' => __('One', 'options_check'),
//        'two' => __('Two', 'options_check'),
//        'three' => __('Three', 'options_check'),
//        'four' => __('Four', 'options_check'),
//        'five' => __('Five', 'options_check')
//    );
//    // Multicheck Array
//    $multicheck_array = array(
//        'one' => __('French Toast', 'options_check'),
//        'two' => __('Pancake', 'options_check'),
//        'three' => __('Omelette', 'options_check'),
//        'four' => __('Crepe', 'options_check'),
//        'five' => __('Waffle', 'options_check')
//    );
//    // Multicheck Defaults
//    $multicheck_defaults = array(
//        'one' => '1',
//        'five' => '1'
//    );
//    // Background Defaults
//    $background_defaults = array(
//        'color' => '',
//        'image' => '',
//        'repeat' => 'repeat',
//        'position' => 'top center',
//        'attachment'=>'scroll' );
//    // Typography Defaults
//    $typography_defaults = array(
//        'size' => '15px',
//        'face' => 'georgia',
//        'style' => 'bold',
//        'color' => '#bada55' );
//    // Typography Options
//    $typography_options = array(
//        'sizes' => array( '6','12','14','16','20' ),
//        'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
//        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
//        'color' => false
//    );
//    // Pull all the categories into an array
//    $options_categories = array();
//    $options_categories_obj = get_categories();
//    foreach ($options_categories_obj as $category) {
//        $options_categories[$category->cat_ID] = $category->cat_name;
//    }
//    // Pull all tags into an array
//    $options_tags = array();
//    $options_tags_obj = get_tags();
//    foreach ( $options_tags_obj as $tag ) {
//        $options_tags[$tag->term_id] = $tag->name;
//    }
//    // Pull all the pages into an array
//    $options_pages = array();
//    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
//    $options_pages[''] = 'Select a page:';
//    foreach ($options_pages_obj as $page) {
//        $options_pages[$page->ID] = $page->post_title;
//    }
//    // If using image radio buttons, define a directory path
//    $imagepath =  get_template_directory_uri() . '/dist/images/';


    $options = array();


    $options[] = array(
        'name' => __('Text on Homepage', 'options_check'),
//        'desc' => __('Textarea description.', 'options_check'),
        'id' => 'gb_text_homepage',
        'std' => '',
        'type' => 'textarea');
    $options[] = array(
        'name' => __('Address on Footer', 'options_check'),
//        'desc' => __('Textarea description.', 'options_check'),
        'id' => 'gb_adress_footer',
        'std' => '',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Url on footer', 'options_check'),
        'desc' => __('The contact email address', 'options_check'),
        'id' => 'gb_url_footer',
        'std' => '',
        'type' => 'text');
    return $options;
}