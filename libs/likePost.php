<?php

if (defined('DOING_AJAX') && DOING_AJAX)
{
    add_action('wp_ajax_like_posts', 'like_posts');
    add_action('wp_ajax_nopriv_like_posts', 'like_posts');
}


function like_posts()
{

    (int) $like = $_POST['like'];

    (int) $id_post = $_POST['id_post'];



    if($like == 1){

            setcookie('like_'.$id_post, 1, time()+60*60*24*365*10, COOKIEPATH, COOKIE_DOMAIN, false);

            $countLike = get_post_meta($id_post, 'like_post')[0];


            if($countLike){

                $countLike = $countLike +1;

                update_post_meta($id_post, 'like_post', $countLike);


            }else{

                $countLike = 1;

                update_post_meta($id_post, 'like_post', 1);

            }

    }else{

        setcookie('like_'.$id_post, 0, time()+60*60*24*365*10, COOKIEPATH, COOKIE_DOMAIN, false);

        $countLike = get_post_meta($id_post, 'like_post')[0];

        
        if($countLike && $countLike != 0){

            $countLike = $countLike - 1;

            update_post_meta($id_post, 'like_post', $countLike);


        }else{



        }


    }


    echo $countLike;

    die();


}