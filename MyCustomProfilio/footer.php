
    <section class="footer p-4" id="connect">
        <div class="container text-center">

            <div class="row align-items-center">
                <div class="col-3"></div>
                <div class="col-6">
                <?php
                    $table_name = $wpdb->prefix . 'foot_data';
                    $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='fhead'" );
                    foreach($data_list as $data){
                    echo '<h1 class="fw-bolder text-white m-4">';
                    echo $data->data_content;
                    echo '</h1>';
                    }
                    $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='fcontent'" );
                    foreach($data_list as $data){
                        echo '<p class="text-light">';
                        echo $data->data_content;
                        echo '</p>';
                    }
                ?>
                    
                </div>
                <div class="col-3"></div>
                <div class="col-12 m-2"></div>
                <?php 
                $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='maininfo'" );
                foreach($data_list as $data){
                    echo '<div class="col-sm-12 col-md-4 text-white">';
                    echo  htmlspecialchars_decode($data->icon);
                    echo '<p>'.$data->data_content.'</p>';
                    echo'</div>';
                }

                echo '<div class="col-12 m-2">';
                $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE data_type='extendinfo'" );
                //var_dump($data_list);
                foreach($data_list as $data){
                    echo htmlspecialchars_decode($data->icon);
                }
                echo '</div>';
                ?>
            </div>
          </div>
    </section>
    <i class="bi bi-arrow-up-square-fill text-primary text-opacity-75 fs-1 shadow" onclick="scrollToTop()" id="scrollToTopBtn"></i>
</body>
<script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
</html>
