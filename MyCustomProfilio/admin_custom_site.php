<?php
//glints

function glints_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'glints_data';
    
    // 添加新数据
    if (isset($_POST['add'])) {
        $glints_icon = wp_kses_post($_POST['glints_icon']);
        $glints_text = $_POST['glints_text'];
        
        $wpdb->insert($table_name, array(
            'glints_icon' => $glints_icon,
            'glints_text' => $glints_text,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $glints_icon = wp_kses_post($_POST['glints_icon']);
        $glints_text = $_POST['glints_text'];
        
        $wpdb->update($table_name, array(
            'glints_icon' => $glints_icon,
            'glints_text' => $glints_text,
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
    
    // 获取数据列表
    $data_list = $wpdb->get_results("SELECT * FROM $table_name");
    
    // 显示表格和表单
    echo '<h2>Glints Data</h2>';
    echo '<table style="width:100%;">';
    echo '<tr><th>ID</th><th>Glints Icon</th><th>Glints Text</th><th>Action</th></tr>';
    foreach ($data_list as $index => $data) {
        echo '<tr><form method="post">';
        echo '<input type="hidden" name="id" value="' . $data->id . '">';
        echo '<td>' . ($index+1) . '</td>';
        echo "<td><input style='width:100%;' type='text' name='glints_icon' value='" . htmlspecialchars_decode($data->glints_icon) . "'></td>";
        echo '<td><textarea style="width:100%;" type="text" name="glints_text">'. $data->glints_text .'</textarea></td>';
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
    }
    echo '<tr><form method="post">';
    echo '<td>#</td>';
    echo '<td><input style="width:100%;" type="text" name="glints_icon"></td>';
    echo '<td><textarea style="width:100%;" type="text" name="glints_text"></textarea></td>';
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';
}


//media
function about_data_menu_page_scripts() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'about_data_menu_page_scripts');
//about me
function about_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'about_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $picture_url = wp_kses_post($_POST['picture_url']);
        $content = wp_kses_post($_POST['content']);
        
        $wpdb->insert($table_name, array(
            'picture_url' => $picture_url,
            'content' => $content,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $picture_url = wp_kses_post($_POST['picture_url']);
        $content = wp_kses_post($_POST['content']);
        
        $wpdb->update($table_name, array(
            'picture_url' => $picture_url,
            'content' => $content,
        ), array(
            'id' => $id,
        ));
    }

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");
    if(empty($data_list)){
        echo '<form method="post" style="width:100%;">';
        echo '<input type="hidden" name="id"  value="">';
        echo "<label>Photo Url：</label>";
        echo "</br><input style='width:80%;' type='text' id='yourphoto' name='picture_url' readonly placeholder='Click to select image' value=''>";
        echo "</br>";
        echo "<label>Content：</label>";
        echo "</br><textarea style='width:80%;min-height:400px;' type='text' name='content'></textarea>";
        echo "</br>";
        echo '<input type="submit" name="add" value="Save">';
    }else{
        echo '<form method="post">';
        echo '<input type="hidden" name="id"  value="' . $data_list[0]->id . '">';
        echo "<label>Photo Url：</label>";
        echo "</br><input style='width:80%;' type='text' id='yourphoto' name='picture_url' readonly placeholder='Click to select image' value='". $data_list[0]->picture_url ."'>";
        echo "<p></p>";
        echo "<label>Content：</label>";
        echo "</br><textarea style='width:80%;min-height:400px;' type='text' name='content'>". htmlspecialchars_decode($data_list[0]->content) ."</textarea>";
        echo "</br>";
        echo '<input type="submit" name="update" value="Update">';
    }
        echo '</form>';
    

    echo "<script>
    jQuery(document).ready(function($) {
        $('#yourphoto').click(function(e) {
            e.preventDefault();
            
            var imageUploader = wp.media({
                title: '选择图片',
                button: {
                    text: '插入图片'
                },
                multiple: false
            }).on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                $('#yourphoto').val(attachment.url);
            }).open();
        });
    });
    </script>";
}


//skill
function skill_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'skill_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $skill_name = $_POST['skill_name'];
        $brief = $_POST['brief'];
        $thumbnail = wp_kses_post($_POST['thumbnail']);
        $link = wp_kses_post($_POST['link']);
        
        $wpdb->insert($table_name, array(
            'skill_name' => $skill_name,
            'brief' => $brief,
            'thumbnail' => $thumbnail,
            'link' => $link,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $skill_name = $_POST['skill_name'];
        $brief = $_POST['brief'];
        $thumbnail = wp_kses_post($_POST['thumbnail']);
        $link = wp_kses_post($_POST['link']);
        
        $wpdb->update($table_name, array(
            'skill_name' => $skill_name,
            'brief' => $brief,
            'thumbnail' => $thumbnail,
            'link' => $link,
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

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<table>';
    echo '<tr><th>ID</th><th>Skill Name</th><th>Brief</th><th>Thumbnail</th><th>Link</th><th>Action</th></tr>';
    foreach ($data_list as $index=>$data) {
        echo '<tr><form method="post">';
        echo '<input type="hidden" name="id" value="' . $data->id . '">';
        echo '<td>'. ($index+1) .'</td>';
        echo "<td><input type='text' name='skill_name' value='" . $data->skill_name . "'></td>";
        echo '<td><input type="text" name="brief" value="'. $data->brief .'"></td>';
        echo '<td><input type="text" class="thumb" name="thumbnail" value="'. $data->thumbnail .'"></td>';
        echo '<td><input type="text" name="link" value="'. $data->link .'"></td>';
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
        
    }
    echo '<tr><form method="post">';
    echo '<input type="hidden" name="id" value="">';
    echo '<td></td>';
    echo '<td><input type="text" name="skill_name"></td>';
    echo '<td><input type="text" name="brief"></td>';
    echo '<td><input type="text" class="thumb" name="thumbnail"></td>';
    echo '<td><input type="text" name="link"></td>';
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';

    echo "<script>
    jQuery(document).ready(function($) {
        $('.thumb').click(function(e) {
            e.preventDefault();
            var current_tag = $(this);
            var imageUploader = wp.media({
                title: '选择图片',
                button: {
                    text: '插入图片'
                },
                multiple: false
            }).on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                current_tag.val(attachment.url);
            }).open();
        });
    });
    </script>";
}

//work expirence
function work_expirence_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'work_expirence_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $company_name = $_POST['company_name'];
        $position = $_POST['position'];
        $timezone = $_POST['timezone'];
        
        $wpdb->insert($table_name, array(
            'company_name' => $company_name,
            'position' => $position,
            'timezone' => $timezone,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $company_name = $_POST['company_name'];
        $position = $_POST['position'];
        $timezone = $_POST['timezone'];
        
        $wpdb->update($table_name, array(
            'company_name' => $company_name,
            'position' => $position,
            'timezone' => $timezone,
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

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<table>';
    echo '<tr><th>ID</th><th>Company Name</th><th>Position</th><th>Timezone</th><th>Action</th></tr>';
    foreach ($data_list as $index => $data) {
        echo '<tr><form method="post">';
        echo '<input type="hidden" name="id" value="' . $data->id . '">';
        echo '<td>'. $index .'</td>';
        echo "<td><input type='text' name='company_name' value='" . $data->company_name . "'></td>";
        echo '<td><input type="text" name="position" value="'. $data->position .'"></td>';
        echo '<td><input type="text" name="timezone" value="'. $data->timezone .'"></td>';
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
        
    }
    echo '<tr><form method="post">';
    echo '<input type="hidden" name="id" value="">';
    echo '<td></td>';
    echo '<td><input type="text" name="company_name"></td>';
    echo '<td><input type="text" name="position"></td>';
    echo '<td><input type="text" name="timezone"></td>';
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';


}

//project list
function project_list_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'project_list_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $project_name = $_POST['project_name'];
        $project_content = $_POST['project_content'];
        $start_time = $_POST['start_time'];
        
        $wpdb->insert($table_name, array(
            'project_name' => $project_name,
            'project_content' => $project_content,
            'start_time' => $start_time,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $project_name = $_POST['project_name'];
        $project_content = $_POST['project_content'];
        $start_time = $_POST['start_time'];
        
        $wpdb->update($table_name, array(
            'project_name' => $project_name,
            'project_content' => $project_content,
            'start_time' => $start_time,
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

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");
    echo '<table style="width:100%">';
    echo '<tr><th>ID</th><th>Project Name</th><th>Project content</th><th>Start Time</th><th>Action</th></tr>';
    foreach ($data_list as $index => $data) {
        echo '<tr><form method="post">';
        echo '<input type="hidden" name="id" value="' . $data->id . '">';
        echo '<td>'. ($index+1) .'</td>';
        echo "<td><input style='width:100%;height:100px;' type='text' name='project_name' value='" . $data->project_name . "'></td>";
        echo "<td><textarea style='width:100%;height:100px;' type='text' name='project_content'>" . $data->project_content . "</textarea></td>";
        echo "<td><input style='width:100%;height:100px;' type='text' name='start_time' value='" . $data->start_time . "'></td>";
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
    }
    echo '<tr><form method="post">';
    echo '<input type="hidden" name="id" value="">';
    echo '<td>#</td>';
    echo "<td><input style='width:100%;height:100px;' type='text' name='project_name' value=''></td>";
    echo "<td><textarea style='width:100%;height:100px;' type='text' name='project_content'></textarea></td>";
    echo "<td><input style='width:100%;height:100px;' type='text' name='start_time' value=''></td>";
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';
}


//project cases
function cases_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'project_cases_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $case_type = $_POST['case_type'];
        $case_content = wp_kses_post($_POST['case_content']);
        
        $wpdb->insert($table_name, array(
            'case_type' => $case_type,
            'case_content' => $case_content,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $case_type = $_POST['case_type'];
        $case_content = wp_kses_post($_POST['case_content']);
        
        $wpdb->update($table_name, array(
            'case_type' => $case_type,
            'case_content' => $case_content,
            
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

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<table style="width:100%;">';
    foreach ($data_list as $index => $data) {
        echo '<tr><form method="post">';
        echo '<td><input type="hidden" name="id" value="' . $data->id . '"></td>';
        echo '<td>'. ($index+1) .'</td>';
        echo "<td><select style='width:100%;height:50px;' type='text' class='case_type_$index' name='case_type'>
                <option value='preface' ". ($data->case_type=='preface'?'selected':'') .">前言</option>
                <option value='bannerimg' ". ($data->case_type=='bannerimg'?'selected':'') .">轮播图</option>
            </select></td>";
        echo "<td><textarea style='width:100%;height:50px;' type='text' class='case_content_$index' name='case_content'>". htmlspecialchars_decode($data->case_content) ."</textarea></td>";
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
    }
    echo '<tr><form method="post">';
    echo '<td><input type="hidden" name="id" value=""></td>';
    echo '<td>#</td>';
    echo "<td><select style='width:100%;height:50px;' class='case_type_o' name='case_type'>
            <option value='preface'>前言</option>
            <option value='bannerimg'>轮播图</option>
        </select></td>";
    echo "<td><textarea style='width:100%;height:50px;' type='text' class='case_content_o' name='case_content'></textarea></td>";
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';
    
    echo "<script>
    jQuery(document).ready(function($) {
        function handleImageUpload(index) {
            var imageUploader = wp.media({
                title: '选择图片',
                button: {
                    text: '插入图片'
                },
                multiple: false
            }).on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                $('textarea[class^=\"case_content_'+ index +'\"]').val(attachment.url);
            }).open();
        }
    
        $('textarea[class^=\"case_content_\"]').click(function(){
            var index = $(this).attr('class').split('_')[2];
            var selectval = $('select[class^=\"case_type_'+index+'\"]').val();
            if(selectval === 'bannerimg'){
                handleImageUpload(index);
            }
        })
    });
    
    </script>";
    
}


//Qualifications
function qualification_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'qualification_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $qua_imgurl = $_POST['qua_imgurl'];
        
        $wpdb->insert($table_name, array(
            'qua_imgurl' => $qua_imgurl,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $qua_imgurl = $_POST['qua_imgurl'];
        
        $wpdb->update($table_name, array(
            'qua_imgurl' => $qua_imgurl, 
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

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<table style="width:100%;">';
    foreach ($data_list as $index => $data) {
        echo '<tr><form method="post">';
        echo '<td><input type="hidden" name="id" value="'. $data->id .'"></td>';
        echo '<td>'. $index .'</td>';
        echo "<td><input style='width:100%;' type='text' class='yourphoto' name='qua_imgurl' value='" .$data->qua_imgurl. "'></td>";
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
    }
    echo '<tr><form method="post">';
    echo '<td><input type="hidden" name="id" value=""></td>';
    echo '<td>#</td>';
    echo "<td><input style='width:100%;' type='text' class='yourphoto' name='qua_imgurl' readonly placeholder='Click to select image' value=''></td>";
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';

    echo "<script>
    jQuery(document).ready(function($) {
        $('.yourphoto').click(function(e) {
            e.preventDefault();
            
            var imageUploader = wp.media({
                title: '选择图片',
                button: {
                    text: '插入图片'
                },
                multiple: false
            }).on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                $('.yourphoto').val(attachment.url);
            }).open();
        });
    });
    </script>";
}


//Companies Served
function served_data_menu_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'served_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $served_type = $_POST['served_type'];
        $served_content = wp_kses_post($_POST['served_content']);
        
        $wpdb->insert($table_name, array(
            'served_type' => $served_type,
            'served_content' => $served_content,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $served_type = $_POST['served_type'];
        $served_content = wp_kses_post($_POST['served_content']);
        
        $wpdb->update($table_name, array(
            'served_type' => $served_type,
            'served_content' => $served_content,
            
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

    $data_list = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<table style="width:100%;">';
    foreach ($data_list as $index => $data) {
        echo '<tr><form method="post">';
        echo '<td><input type="hidden" name="id" value="' . $data->id . '"></td>';
        echo '<td>'. ($index+1) .'</td>';
        echo "<td><select style='width:100%;height:50px;' type='text' class='served_type_$index' name='served_type'>
                <option value='preface' ". ($data->served_type=='preface'?'selected':'') .">前言</option>
                <option value='brand' ". ($data->served_type=='brand'?'selected':'') .">轮播图</option>
            </select></td>";
        echo "<td><textarea style='width:100%;height:50px;' type='text' class='served_content_$index' name='served_content'>". htmlspecialchars_decode($data->served_content) ."</textarea></td>";
        echo '<td><input type="submit" name="update" value="Update"> <input type="submit" name="delete" value="Delete"></td>';
        echo '</form></tr>';
    }
    echo '<tr><form method="post">';
    echo '<td><input type="hidden" name="id" value=""></td>';
    echo '<td>#</td>';
    echo "<td><select style='width:100%;height:50px;' class='served_type_o' name='served_type'>
            <option value='preface'>前言</option>
            <option value='brand'>轮播图</option>
        </select></td>";
    echo "<td><textarea style='width:100%;height:50px;' type='text' class='served_content_o' name='served_content'></textarea></td>";
    echo '<td><input type="submit" name="add" value="Add"></td>';
    echo '</form></tr>';
    echo '</table>';
    
    echo "<script>
    jQuery(document).ready(function($) {
        function handleImageUpload(index) {
            var imageUploader = wp.media({
                title: '选择图片',
                button: {
                    text: '插入图片'
                },
                multiple: false
            }).on('select', function() {
                var attachment = imageUploader.state().get('selection').first().toJSON();
                $('textarea[class^=\"served_content_'+ index +'\"]').val(attachment.url);
            }).open();
        }
    
        // $('select[class^=\"served_type_\"]').change(function() {
        //     var index = $(this).attr('class').split('_')[2];
        //     var contentInput = $('textarea[class^=\"served_content_'+ index +'\"]');
        //     if ($(this).val() === 'brand') {
        //         contentInput.addClass(' served_content');
        //         contentInput.off('click').on('click', function(e) {
        //             e.preventDefault();
        //             handleImageUpload(index);
        //         });
        //     } else {
        //         contentInput.removeClass('served_content');
        //         contentInput.off('click');
        //     }
        // });
        $('textarea[class^=\"served_content_\"]').click(function(){
            var index = $(this).attr('class').split('_')[2];
            var selectval = $('select[class^=\"served_type_'+index+'\"]').val();
            if(selectval === 'brand'){
                handleImageUpload(index);
            }
        })
    });
    
    </script>";
}


//foot block
function foot_data_menu_page_content(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'foot_data';

    // 添加新数据
    if (isset($_POST['add'])) {
        $data_type = $_POST['data_type'];
        $data_content = wp_kses_post($_POST['data_content']);
        $icon = wp_kses_post($_POST['icon']);
        
        $wpdb->insert($table_name, array(
            'data_type' => $data_type,
            'data_content' => $data_content,
            'icon' => $icon,
        ));
    }
    
    // 更新数据
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $data_type = $_POST['data_type'];
        $data_content = $_POST['data_content'];
        $icon = wp_kses_post($_POST['icon']);
        
        $wpdb->update($table_name, array(
            'data_type' => $data_type,
            'data_content' => $data_content,
            'icon' => $icon,
            
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
    echo '</br><h1>Base Infomation</h1></br>';
    $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='fhead'"); 
    echo '<form method="post">';
    foreach($data_list as $data){  
        echo '<label>Foot Title:</label></br>';
        echo '<input type="hidden" name="id" value="'. $data->id .'">';
        echo '<input type="hidden" name="data_type" value="fhead">';
        echo '<input type="text" name="data_content" value="'. htmlspecialchars_decode($data->data_content) .'" style="width:50%;">';
        echo '<input type="hidden" name="icon" value="">';    
        echo '</br><input type="submit" name="update" value="Update"/> <input type="submit" name="delete" value="Delete">';  
    }
    if (!count($data_list)){
        echo '<label>Foot Title:</label></br>';
        echo '<input type="hidden" name="id" value="">';
        echo '<input type="hidden" name="data_type" value="fhead">';
        echo '<input type="text" name="data_content" value="" style="width:50%;">';
        echo '<input type="hidden" name="icon" value="">';
        echo '</br><input type="submit" name="add" value="Add"/>';
    }
    echo '</form>';
    echo '</p>';

    $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='fcontent'"); 
    echo '<form method="post">';
    foreach($data_list as $data){ 
        echo '<label>Foot Content:</label></br>';
        echo '<input type="hidden" name="id" value="'. $data->id .'">';
        echo '<input type="hidden" name="data_type" value="fcontent">';
        echo '<textarea name="data_content" style="width:50%;">'. htmlspecialchars_decode($data->data_content) .'</textarea>';
        echo '<input type="hidden" name="icon" value="">';
        echo '</br><input type="submit" name="update" value="Update"/><input type="submit" name="delete" value="Delete" />';    
    }
    if (!count($data_list)){
        echo '<label>Foot Content:</label></br>';
        echo '<input type="hidden" name="id" value="">';
        echo '<input type="hidden" name="data_type" value="fcontent">';
        echo '<textarea name="data_content" style="width:50%;"></textarea>';
        echo '<input type="hidden" name="icon" value="">';
        echo '</br><input type="submit" name="add" value="Add"/>';
    }
    echo '</form>';

    echo '</br><h1>Foot Infomation</h1></br>';
    $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='maininfo' OR data_type='extendinfo'"); 
    echo '<table style="width:100%;">';
    echo '<th><td>Col</td><td>Data Type</td><td>Data Content</td><td>icon</td><td>Action</td></th>';
    echo '<tr><form method="post">';
    foreach($data_list as $index => $data){
        echo '<tr><form method="post">';
        echo '<td><input type="hidden" name="id" value="'. $data->id .'"></td>';
        echo '<td>'. ($index+1) .'</td>';
        echo "<td><select style='width:100%;' type='text' class='data_type' name='data_type'>
            <option value='maininfo' ". ($data->data_type=='maininfo'?'selected':'') .">通讯信息</option>
            <option value='extendinfo' ". ($data->data_type=='extendinfo'?'selected':'') .">扩展信息</option>
            </select></td>";
        echo '<td><input style="width:100%;" type="text" name="data_content" value="'. $data->data_content .'"></td>';
        echo '<td><input style="width:100%;" type="text" name="icon" value="'. htmlspecialchars($data->icon) .'"></td>'; 
        echo '<td><input type="submit" name="update" value="Update"/><input type="submit" name="delete" value="Delete" /></td>';
        echo '</form></tr>';
    }
    echo '<tr><form method="post">';
    echo '<td><input type="hidden" name="id" value=""></td>';
    echo '<td>#</td>';
    echo "<td><select style='width:100%;' type='text' class='data_type' name='data_type'>
            <option value='maininfo' >通讯信息</option>
            <option value='extendinfo'>扩展信息</option>
            </select></td>";
    echo '<td><input style="width:100%;" type="text" name="data_content" value=""></td>';
    echo '<td><input style="width:100%;" type="text" name="icon" value=""></td>'; 
    echo '<td><input type="submit" name="add" value="Add"/></td>';    
    echo '</form></tr>';
    echo '</table>';
}

?>