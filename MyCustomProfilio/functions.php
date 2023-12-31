<?php
//创建自定义表
require_once get_template_directory() . '/create_tables.php';

function create_custom_tables_on_theme_activation() {
    create_glints_data_activation();
    create_about_data_activation();
    create_skill_data_activation();
    create_work_expirence_data_activation();
    create_project_list_data_activation();
    create_project_cases_data_activation();
    create_qualification_data_activation();
    create_served_data_activation();
    create_foot_data_activation();

}
add_action( 'after_switch_theme', 'create_custom_tables_on_theme_activation' );

// // 处理回复表单提交
// function handle_reply_form_submit() {
//     if (isset($_POST['reply_submit'])) {
//         $comment_id = isset($_POST['comment_id']) ? intval($_POST['comment_id']) : 0;
//         $reply_content = isset($_POST['reply_content']) ? sanitize_textarea_field($_POST['reply_content']) : '';

//         // 检查评论ID和回复内容是否有效
//         if ($comment_id && $reply_content) {
//             $comment = get_comment($comment_id);

//             // 创建回复评论
//             $reply_data = array(
//                 'comment_post_ID' => $comment->comment_post_ID,
//                 'comment_author' => wp_get_current_user()->display_name,
//                 'comment_author_email' => wp_get_current_user()->user_email,
//                 'comment_author_url' => wp_get_current_user()->user_url,
//                 'comment_content' => $reply_content,
//                 'comment_parent' => $comment_id,
//                 'user_id' => wp_get_current_user()->ID,
//                 'comment_approved' => 1, // 设置为已审核状态
//             );

//             $reply_id = wp_insert_comment($reply_data);

//             if ($reply_id) {
//                 // 回复成功，可以进行其他操作，例如发送邮件通知等
                
//                 // 重定向到当前页面
//                 wp_redirect(get_permalink());
//                 exit;
//             } else {
//                 // 回复失败，处理错误逻辑
//             }
//         }
//     }
// }
// add_action('init', 'handle_reply_form_submit');

require_once get_template_directory() . '/admin_custom_site.php';

function glints_menu_pages() {
    add_menu_page('Profilio Data', 'Profilio Data', 'manage_options', 'profilio_data_menu', 'glints_data_menu_page_content', 'dashicons-admin-generic');
    add_submenu_page('profilio_data_menu', 'Glints', 'Glints', 'manage_options', 'glints_submenu', 'glints_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'About Me', 'About Me', 'manage_options', 'about_submenu', 'about_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'My Skill', 'My Skill', 'manage_options', 'skill_submenu', 'skill_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'Work Expirence', 'Work Expirence', 'manage_options', 'expirence_submenu', 'work_expirence_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'Project List', 'Project List', 'manage_options', 'project_submenu', 'project_list_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'Project cases', 'Project cases', 'manage_options', 'case_submenu', 'cases_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'Qualifications', 'Qualifications', 'manage_options', 'qualification_submenu', 'qualification_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'Companies Served', 'Companies Served', 'manage_options', 'served_submenu', 'served_data_menu_page_content');
    add_submenu_page('profilio_data_menu', 'Foot Block', 'Foot Block', 'manage_options', 'foot_block', 'foot_data_menu_page_content');
    remove_submenu_page('profilio_data_menu', 'profilio_data_menu');
}
add_action('admin_menu', 'glints_menu_pages');


// 设置文章摘要的长度
function custom_excerpt_length($length) {
    return 12;
}
add_filter('excerpt_length', 'custom_excerpt_length');


//文章评论回复
function custom_process_comment() {
    if ( isset( $_POST['comment_content'] ) ) {
        $commentdata = array(
            'comment_post_ID' => $_POST['comment_post_ID'],
            'comment_content' => $_POST['comment_content'],
            'comment_parent' => $_POST['comment_parent']
        );
        wp_insert_comment( $commentdata );
    }
}

add_action( 'admin_post_nopriv_custom_process_comment', 'custom_process_comment' );
add_action( 'admin_post_custom_process_comment', 'custom_process_comment' );
?>