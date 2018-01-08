<?php

function allisovski_scripts()
{
//
//    wp_enqueue_style('main1-css', get_template_directory_uri() . '/css/main.css');
//
//    wp_enqueue_style('a_sweet_css', get_stylesheet_directory_uri() . '/css/sweetalert.css');

    if (!is_admin()) {

        wp_deregister_script('jquery');

        wp_register_script('jquery', get_template_directory_uri().'/js/vendor.min.js', array(), '', true);

        wp_enqueue_script('jquery');

    }

    wp_enqueue_script('bild-js', get_template_directory_uri() . '/js/bild.js', array(), '', true);



    wp_enqueue_script('send-comments', get_template_directory_uri() . '/js/comments.js', array(), '', true);
    wp_localize_script('send-comments', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('a_sweet_js', get_stylesheet_directory_uri() . '/js/sweetalert.js', array(), '', true);


    if(is_single()){

        wp_enqueue_script('single_page', get_template_directory_uri() . '/js/single.js', array(), '', true);

    }

    wp_enqueue_script('like', get_template_directory_uri() . '/js/like.js', array(), '', true);


    if(is_page(8)){

        wp_enqueue_script('ajax-main', get_template_directory_uri() . '/js/ajaxMainPage.js', array(), '', true);
        wp_localize_script('ajax-main', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    }



}

add_action('wp_enqueue_scripts', 'allisovski_scripts');
