<?php

add_action('rest_api_init', 'faveRoutes');
function faveRoutes() {
    register_rest_route('golf/v1', 'manageFave', array(
        'methods' => 'POST',
        'callback' => 'createFave'
    ));
}

function createFave($data) {
    if(is_user_logged_in()) {
        $post = $data['postId'];
        $postTitle = $data['title'];
        $postContent = $data['content'];

        $existsQuery = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => 'favorites',
            'meta_query' => array(
                array(
                    'key' => 'liked_post_id',
                    'compare' => '=',
                    'value' => $post
                )
            )
            
                ));

    if($existsQuery->found_posts == 0) {
        return wp_insert_post(array(
            'post_type' => 'favorites',
            'post_status' => 'publish',
            'meta_input' => array(
                'liked_post_id' => $post
            ),
            'post_title' => $postTitle,
            'post_content' => $postContent,
        ));
    } else {
        die("This was already added to your favorites.");
    }
    } else {
        die("You must login to Add to Favorites.");
    }
}