<?php
/*
Template Name: comment_submit
*/
if ( isset( $_POST['comment_content'] ) ) {
    $commentdata = array(
        'comment_post_ID' => $_POST['comment_post_ID'],
        'comment_content' => $_POST['comment_content'],
        'comment_parent' => $_POST['comment_parent'],
        'comment_author' => is_user_logged_in() ? wp_get_current_user()->display_name : $_POST['comment_author'],
        'comment_author_email' => is_user_logged_in() ? wp_get_current_user()->user_email : $_POST['comment_author_email']
    );
    wp_insert_comment( $commentdata );
    wp_safe_redirect( $_SERVER['HTTP_REFERER'] );
    exit;
}
?>