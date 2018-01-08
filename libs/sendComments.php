<?php

if (defined('DOING_AJAX') && DOING_AJAX)
{
    add_action('wp_ajax_send_comments', 'send_comments');
    add_action('wp_ajax_nopriv_send_comments', 'send_comments');
}


function send_comments()
{

    $id_post = $_POST['id_post'];

    $name = $_POST['name'];

    $comment = $_POST['comment'];


    if(isset($_POST['id_comment']) && !empty($_POST['id_comment'])){

        $id_comment = $_POST['id_comment'];

    }else{

        $id_comment = '';

    }


//    echo '111111111111111';
//
//
//    die();


    $commentdata = array(
        'comment_post_ID'      => $id_post,
        'comment_author'       => $name,
        'comment_content'      => $comment,
        'comment_type'         => 'participant',
        'comment_parent'       => $id_comment
    );

      echo  wp_new_comment( $commentdata );



    die();



}