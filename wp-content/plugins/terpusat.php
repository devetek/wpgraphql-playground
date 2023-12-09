<?php

// use WPGraphQL;

/**
 * @package Terpusat Redirect
 * @version 0.0.1
 */
/*
Plugin Name: Terpusat Post Type
Plugin URI: https://terpusat.com/
Description: Thi is just simple plugin.
Author: Prakasa
Version: 0.0.1
Author URI: https://terpusat.com/
*/

add_filter('register_post_type_args', function ($args, $post_type) {

    // Change this to the post type you are adding support for
    if ('mobil' === $post_type) {
        $args['show_in_graphql'] = true;
        $args['graphql_single_name'] = 'mobil';
        $args['graphql_plural_name'] = 'mobils'; # Don't set, and it will default to `all${graphql_single_name}`, i.e. `allDocument`.
    }

    return $args;
}, 10, 2);
