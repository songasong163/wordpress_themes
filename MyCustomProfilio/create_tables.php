<?php
// create_tables.php

// 在主题激活时执行创建数据库表的操作
function create_glints_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'glints_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `glints_icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `glints_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_about_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'about_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL DEFAULT 1,
        `picture_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_skill_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'skill_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `skill_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `brief` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_work_expirence_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'work_expirence_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `timezone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_project_list_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'project_list_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `project_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `project_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        `start_time` date NULL DEFAULT NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_project_cases_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'project_cases_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `case_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `case_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_qualification_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'qualification_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `qua_imgurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_served_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'served_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `served_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `served_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

function create_foot_data_activation() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'foot_data'; // 替换成你的自定义表名
    $charset_collate = $wpdb->get_charset_collate();

    // 定义表结构
    $sql = "DROP TABLE IF EXISTS $table_name;
    CREATE TABLE $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
        `data_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        `data_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
        `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
        PRIMARY KEY (`id`) USING BTREE
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );  // 执行 SQL 语句来创建表
}

?>