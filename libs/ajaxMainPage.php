<?php

if (defined('DOING_AJAX') && DOING_AJAX)
{
    add_action('wp_ajax_main_posts', 'main_posts');
    add_action('wp_ajax_nopriv_main_posts', 'main_posts');
}


function main_posts()
{

    $paged = $_POST['page'];

    $args = array(

        'page' => $paged,
        'paged' => $paged,
        'posts_per_page' => 6,
        'post_type' => 'post',
        'post_status' => 'publish'

    );

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) { while ( $query->have_posts() ) {

                            $query->the_post();
        
                            $html[] =    '<a class="proj" href="' . get_permalink() .'" title="' . get_the_title() . '">';
                            $html[] =      '<div class="img-wrap">';
                            $html[] =       ' <img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
                            $html[] =   '</div>';
                            $html[] =   '<div class="disc-wrap">';
                            $html[] =       '<h3 class="p_title">' . get_the_title() . '</h3>';
                            $html[] =      '<div class="p_text">' . get_the_custom_excerpt(get_the_content(), 130 ) . '</div>';
                            $html[] =    '</div>';
                            $html[] =   '</a>';
        
        
                       }
                } 

                wp_reset_postdata();

      
                $html = implode('', $html);
    

                $args = array(
                    'base'         => home_url().'/%_%',
                    'format'       => '?page=%#%',
                    'total'        => $query->max_num_pages,
                    'current'      => $paged,
                    'show_all'     => False,
                    'end_size'     => 1,
                    'mid_size'     => 2,
                    'prev_next'    => True,
                    'prev_text'    => '',
                    'next_text'    => '',
                    'type'         => 'plain',
                    'add_args'     => False,
                    'add_fragment' => '',
                    'before_page_number' => '',
                    'after_page_number'  => ''
                );

    

                $paginate = paginate_links( $args );


                $arrResponce['posts'] = $html;

                $arrResponce['paginate'] = $paginate;


                echo json_encode($arrResponce);
    

        die();



}