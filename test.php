<?php
// Define a custom function to delete user posts and categories
function delete_user_posts_and_categories($user_id) {
    // Delete user's posts
    $args = array(
        'author' => $user_id,
        'post_type' => 'post', // Change this to match your custom post types
        'posts_per_page' => -1,
    );

    $user_posts = get_posts($args);

    foreach ($user_posts as $user_post) {
        wp_delete_post($user_post->ID, true); // Set the second parameter to true for force delete
    }

    // Delete user's categories (custom taxonomy terms)
    $categories = get_terms(array(
        'taxonomy' => 'category', // Change this to match your custom taxonomy
        'hide_empty' => false,
    ));

    foreach ($categories as $category) {
        $term_user_id = get_term_meta($category->term_id, 'user_id', true); // Replace 'user_id' with the actual metadata key

        if ($term_user_id == $user_id) {
            wp_delete_term($category->term_id, 'category'); // Change 'category' to match your custom taxonomy
        }
    }
}

// Hook the custom function to run when a user is deleted
add_action('delete_user', 'delete_user_posts_and_categories');

// To delete the user and trigger the action, you can use:
// wp_delete_user($user_id, true); // Set the second parameter to true for force delete
