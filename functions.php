<?php

require_once 'libs/enqueue_scripts.php';
require_once  'libs/sendComments.php';
require_once 'libs/likePost.php';   
require_once 'libs/ajaxMainPage.php';


function theme_register_nav_menu()
{
    register_nav_menus(array(
        'primary' => 'Main menu',
    ));
}

add_action('after_setup_theme', 'theme_register_nav_menu');



if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}


/**
 * @param $template
 * @return mixed
 * 
 * 
 * Count Views posts
 * 
 * 
 */

function my_template($template)
{
    global $post;
    

    if($post->post_type == 'post'){

        if(!isset($_COOKIE['post_'.$post->ID])){


            setcookie('post_'.$post->ID, 1, time()+60*60*24*365*10, COOKIEPATH, COOKIE_DOMAIN, false);


            $countViews = get_post_meta($post->ID, 'views_post')[0];


            if($countViews){

                $countViews = $countViews +1;

                update_post_meta($post->ID, 'views_post', $countViews);
                
            }else{

                update_post_meta($post->ID, 'views_post', 1);

            }
            
        }
        
    }
    
    return $template;
}

add_filter('template_include', 'my_template');


/**
 * @return mixed
 *
 *
 *
 *  Group posts for year on main page
 *
 */



function archivPosts(){


    $args = array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );


    $posts = get_posts( $args );




    foreach ($posts as $post){

        $year = substr($post->post_date, 0, 4);

        $month = substr($post->post_date, 5, 2);



          if(isset( $arrDate[$year][$month])){

              $counter = $arrDate[$year][$month];

              $arrDate[$year][$month] = $counter + 1;

        }else{

              $arrDate[$year][$month] = 1;
        }



    }


    return $arrDate;

}



function groupCategories(){

    $args = array(

        'type' => 'post',
        'child_of' => 23,
        'orderby' => 'count',
        'order' => 'DESC',
        'hide_empty' => 0,
        'hierarchical' => 0,
        'taxonomy' => 'category'

    );


    $categories = get_categories($args);



    $first_count = 0;

    $boolSubMeny = false;

    for ( $i=0; $i<count($categories); $i++){

        if($categories[$i]->category_parent == 23){

            echo    '<li class="' . (($first_count == 0) ? 'open' : '') . '">';
            echo     '<i class="icon-Pattern4"></i>';
            echo     '<span class="title">' . $categories[$i]->name . '</span>';


            $secomd_count = 0;

            for($j=0; $j<count($categories); $j++) {

                if($categories[$j]->category_parent == $categories[$i]->term_id){


                    if($secomd_count == 0){

                        echo    '<ul class="subMenu">';

                        $boolSubMeny = true;

                    }

                    echo '<li><a href ="' . get_category_link($categories[$j]->term_id) . '">#'.$categories[$j]->name . '</a></li>';


                    $secomd_count++;

                }


            }

            if($boolSubMeny){

                echo  '</ul>';

                $boolSubMeny = false;

            }


            echo    '</li>';

            $first_count++;
        }

    }

    
}



function groupTag(){




    $args = array(

        'taxonomy' => 'post_tag'

    );

    $myterms = get_tags( $args );



    for ($i=0; $i<count($myterms); $i++){
        echo    '<a href="' . get_tag_link($myterms[$i]->term_id) . '">';
        echo    '<li class="' . (($i == 0) ? 'open' : '') . '">';
        echo       '<i class="icon-Pattern4"></i>';
        echo       '<span class="title"><a href="' . get_tag_link($myterms[$i]->term_id) . '">' . $myterms[$i]->name . '</a></span>';
        echo    '</li>';
        echo    '</a>';
    }
    
    
    
}


function editSearch($query)
{

    if (isset($query->query['s'])) {

        $query->set('post_type', 'post');

    }

}

add_action('pre_get_posts', 'editSearch');




function get_the_custom_excerpt($content, $cnt=300, $after='...'){
    if($content){
        mb_internal_encoding("utf8");
        $excerpt = strip_shortcodes($content);
        $excerpt = strip_tags($excerpt);
        $the_str = $excerpt;
        if(mb_strlen($excerpt) > $cnt){

            $the_str = mb_substr(html_entity_decode($excerpt, NULL, 'UTF-8'), 0, $cnt, 'utf8');
            $the_str = trim(preg_replace( '/\s+/', ' ', $the_str));

            $the_str = htmlentities($the_str);
            $the_str = str_replace("&nbsp;",' ',$the_str);

            $the_str .=  $after;
        }
        return $the_str;

    }
}


function register_left_widget()
{
    register_sidebar(array(
        'name' => 'Контакты (слева)',
        'id' => 'contacts-footer-left',
        'description' => 'Контакты в футере слева',
        'before_widget' => '',
        'after_widget' => '',
    ));
}

add_action('widgets_init', 'register_left_widget');


function register_right_widget()
{
    register_sidebar(array(
        'name' => 'Контакты (справа)',
        'id' => 'contacts-footer-right',
        'description' => 'Контакты в футере справа',
        'before_widget' => '',
        'after_widget' => '',
    ));
}

add_action('widgets_init', 'register_right_widget');


function register_center_widget()
{
    register_sidebar(array(
        'name' => 'Кнопки социальных сетей',
        'id' => 'contacts-footer-center',
        'description' => 'Кнопки социальных сетей в футере',
        'before_widget' => '',
        'after_widget' => '',
    ));
}

add_action('widgets_init', 'register_center_widget');


function register_email_widget()
{
    register_sidebar(array(
        'name' => 'E-mail',
        'id' => 'contacts-footer-email',
        'description' => 'E-mail над кнопками социальных сетей в футере',
        'before_widget' => '',
        'after_widget' => '',
    ));
}

add_action('widgets_init', 'register_email_widget');


function register_description_widget()
{
    register_sidebar(array(
        'name' => 'Описание',
        'id' => 'contacts-footer-desc',
        'description' => 'Описание под кнопками социальных сетей в футере',
        'before_widget' => '',
        'after_widget' => '',
    ));
}

add_action('widgets_init', 'register_description_widget');




add_action('wp_print_styles', 'remove_style', 100);
function remove_style()
{
    wp_deregister_style('contact-form-7');

}

add_filter('rest_enabled', '__return_false');
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );