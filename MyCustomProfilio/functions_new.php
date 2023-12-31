<?php

function load_bootstrap() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
}
add_action('admin_enqueue_scripts', 'load_bootstrap');


//添加媒体库
function about_data_menu_page_scripts() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'about_data_menu_page_scripts');


//admin_menu_set
function BDM_menu_pages() {
    add_menu_page('Profilio Data', 'Profilio Data', 'manage_options', 'profilio_data_menu', 'glints_data_menu_page_content', 'dashicons-admin-generic');
    add_submenu_page('profilio_data_menu', 'Photo Set', 'Photo Set', 'manage_options', 'photo_submenu', 'photo_set_menu_page_content');
    //add_submenu_page('profilio_data_menu', 'About Me', 'About Me', 'manage_options', 'about_submenu', 'about_data_menu_page_content');
    remove_submenu_page('profilio_data_menu', 'profilio_data_menu');
}
add_action('admin_menu', 'BDM_menu_pages');


function photo_set_menu_page_content(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'photo_set_data';
    
    // 添加新数据
    if (isset($_POST['add'])) {
        $photo_type = $_POST['photo_type'];
        $photo_url = wp_kses_post($_POST['photo_url']);
        $photo_description = $_POST['photo_description'];
        
        $wpdb->insert($table_name, array(
            'photo_type' => $photo_type,
            'photo_url' => $photo_url,
            'photo_description' => $photo_description,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $photo_type = $_POST['photo_type'];
        $photo_url = wp_kses_post($_POST['photo_url']);
        $photo_description = $_POST['photo_description'];
        
        $wpdb->update($table_name, array(
            'photo_type' => $photo_type,
            'photo_url' => wp_kses_post($photo_url),
            'photo_description' => $photo_description,
        ), array(
            'id' => $id,
        ));
    }
    
    // 删除数据
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        
        $wpdb->delete($table_name, array(
            'id' => $id,
        ));
    }
    
   
    echo '
    <nav class="navbar bg-danger bg-opacity-25 mb-4" data-bs-theme="primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Photo Set</a>
        </div>
    </nav>
    <table class="table w-100">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo Type</th>
        <th scope="col">Photo Url</th>
        <th scope="col">Photo Description</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>';

    // 获取数据列表
    $data_list = $wpdb->get_results("SELECT * FROM $table_name");
    foreach ($data_list as $index => $data) {
    echo '
      <tr><form method="post">
        <th scope="row" class="align-middle">'. ($index+1) .'</th>
        <td class="align-middle">
            <select class="form-select m-1" name="photo_type" aria-label=".form-select-lg example">
                <option value="0" '. ($data->photo_type=="0"?"selected":"") .'>About Me</option>
                <option value="1" '. ($data->photo_type=="1"?"selected":"") .'>Expirence Head</option>
                <option value="2" '. ($data->photo_type=="2"?"selected":"") .'>Banner</option>
                <option value="3" '. ($data->photo_type=="3"?"selected":"") .'>Qualification</option>
                <option value="4" '. ($data->photo_type=="4"?"selected":"") .'>Served Brand</option>
            </select>
        </td>
        <td class="align-middle">
            <div class="input-group">
                <input type="text" class="form-control" aria-describedby="button-addon2" name="photo_url" value="'. htmlspecialchars_decode($data->photo_url) .'">
                <button class="btn img_upload btn-outline-secondary" type="button" id="button-addon2">From Media Library</button>
            </div>
        </td>
        <td class="align-middle"><input type="text" class="form-control m-1" name="photo_description" value="'. $data->photo_description .'"></td>
        <td class="align-middle"><input type="submit" name="update" class="btn btn-warning m-1" value="Update"><input type="submit" name="delete" class="btn btn-danger m-1" value="Delete"></td>
      </tr></form>';
    }
    echo '
      <tr><form method="post">
        <th scope="row"></th>
        <td class="align-middle">
            <select class="form-select m-1" name="photo_type" aria-label=".form-select-lg example">
                <option value="0">About Me</option>
                <option value="1">Expirence Head</option>
                <option value="2">Banner</option>
                <option value="3">Qualification</option>
                <option value="4">Served Brand</option>
            </select>
        </td>
        <td class="align-middle">
            <div class="input-group">
            <input type="text" class="form-control" aria-describedby="button-addon2" name="photo_url" value="">
            <button class="btn img_upload btn-outline-secondary" type="button">From Media Library</button>
            </div>
        </td>
        <td class="align-middle"><input type="text" class="form-control m-1" name="photo_description"></td>
        <td class="align-middle"><input type="submit" name="add" class="btn btn-success" value="Add"></td>
      </tr></form>';

    echo '</tbody></table>';

    echo "<script>
    jQuery(document).ready(function($) {
        
        $('.img_upload').click(function(e) {
            var input_set = $(this).prev('input');
            e.preventDefault();
            var imageUploader = wp.media({
                title: '选择图片',
                button: {
                    text: '插入图片'
                },
                multiple: false
            }).on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                input_set.val(attachment.url);
            }).open();
        });
    });
    </script>";
}

function profiliotransforter() {
    load_theme_textdomain( 'profilio', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'profiliotransforter' );

?>