<?php 
  get_header(); 
  
  global $wpdb;
  $table_name = $wpdb->prefix . 'glints_data';
?>
<section class="glints p-4 mb-4">
        <div class="container p-4 text-center bg-secondary bg-opacity-25 rounded-3">
            <div class="row align-items-start">
              <?php 
                $data_list = $wpdb->get_results("SELECT * FROM $table_name"); 
                foreach ($data_list as $data) { 
                  echo "<div class='col p-2 mb-2'>";
                  echo "<p>". htmlspecialchars_decode($data->glints_icon) ."</p>";
                  echo "<textarea rows='3' class='pt-2 card-title text-warning rounded-3 fw-bold' readonly>". $data->glints_text ."</textarea>";
                  echo "</div>"; 
                }
              ?>
            </div>
          </div>
    </section>
    <section class="p-4 pt-0" id="aboutme">
        <div class="container text-center">
            <div class="row align-items-center bg-gradient1 bg-opacity-75">
              <?php
                $table_name = $wpdb->prefix . 'about_data';
                $data_list = $wpdb->get_results("SELECT * FROM $table_name");
              ?>
              <div class="col-sm-12 col-md-4 bg-white">
                <img src="<?php echo $data_list[0]->picture_url;?>" class="img-fluid" alt="...">
              </div>
              <div class="col-sm-12 col-md-8 p-4 text-start">
                <h3 class="font-am">About me...</h3>
                <hr class="border border-light mb-4">
                <?php echo htmlspecialchars_decode($data_list[0]->content); ?>
                <!-- <h1 class="fw-bolder mb-4">Hi,I am here to <span class="text-warning">help you.</span></h1>
                <p class="text-light fs-4">Hey, if you need to build a WordPress website or carry out secondary development on an existing WordPress site, you can connect me. I also possess strong skills in data analysis and can help you create visually appealing analytical dashboards. I will do my best to assist you. Check my portfolio. </p> -->
              </div>
            </div>
          </div>
    </section>
    <section class="myskills p-4" id="myskills">
        <h1 class="fw-bolder p-4 text-center">My Skills</h1>
        <div class="container">
            <div class="row justify-content-center">
               
                <?php 
                  $table_name = $wpdb->prefix . 'skill_data';
                  $data_list = $wpdb->get_results("SELECT * FROM $table_name");
                  foreach ($data_list as $data) {
                    echo '<div class="col-sm-12 col-md-6 col-lg-3 mb-4">';
                    echo '<div class="card w-100" style="width: 18rem;">';
                    echo '  <img src="'.$data->thumbnail.'" class="card-img-top custom-card-img" alt="...">';
                    echo '  <div class="card-body">';
                    echo '    <h5 class="card-title">'.$data->skill_name.'</h5>';
                    echo '    <p class="card-text">'.$data->brief.'</p>';
                    echo '    <a href="'.$data->link.'" class="btn btn-primary">Related Experience</a>';
                    echo '  </div>';
                    echo '</div>';
                    echo '</div>';
                  }
                ?>
            </div>
          </div>
          
    </section>
    <section class="work_expirence pt-4 pb-4" id="experience">
        <div class="row align-items-center text-center bg-custom-color1">
            <div class="col-sm-12 col-md-4 position-relative p-0">
                <img src="https://images.pexels.com/photos/1109543/pexels-photo-1109543.jpeg" class="img-fluid custom-height" alt="">
                <h1 class="position-absolute top-50 start-50 translate-middle bg-primary bg-opacity-50 text-white fw-bolder p-4 w-100">Work Experience</h1>
            </div>
            <div class="col-sm-12 col-md-8 p-4 mr-2">
                <table class="table bg-white">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company</th>
                        <th scope="col">position</th>
                        <th scope="col">time</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $table_name = $wpdb->prefix . 'work_expirence_data';
                      $data_list = $wpdb->get_results("SELECT * FROM $table_name");
                      foreach ($data_list as $data) {
                        echo "
                        <tr>
                          <th scope='row'>" .$data->id. "</th>
                          <td>" .$data->company_name. "</td>
                          <td>" .$data->position. "</td>
                          <td>" .$data->timezone. "</td>
                        </tr>
                        ";
                      }
                    ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </section>
    <section class="projectlist mt-4 mb-4 bg-light" id="projectlist">
        <div class="row">
            <div class="col-sm-2 col-md-1 bg-custom-color2 rounded-custom vertical-text">
                <p class="m-0">Project List</p>
            </div>
            <div class="col-sm-10 col-md-11 bg-light">
                <div class="main-timeline ">
                <?php
                    $table_name = $wpdb->prefix . 'project_list_data';
                    $data_list = $wpdb->get_results("SELECT * FROM $table_name");
                    foreach ($data_list as $data) {
                      echo '<div class="timeline">';
                      echo '    <div class="timeline-content">';
                      echo '       <span class="date">';
                      echo '            <span class="day">'. date("d", strtotime($data->start_time)) .'<sup>th</sup></span>';
                      echo '            <span class="month">'. strftime("%b", strtotime($data->start_time)) .'</span>';
                      echo '            <span class="year">'. date("Y", strtotime($data->start_time)) .'</span>';
                      echo '        </span>';
                      echo '        <h2 class="title">Web '. $data->project_name .'</h2>';
                      echo '        <p class="description" style="white-space: pre-line;">'. $data->project_content .'</p>';
                      echo '    </div>';
                      echo '</div>';
                    }
                ?>
                </div>
            </div>
        </div>   
    </section>
    <section class="mycases p-4" id="procase">
        <div class="carousel-card text-center bg-white border-top border-bottom border-primary m-4 p-4">
            <i class="bi bi-box-seam-fill fs-1 text-danger"></i>
            <h1 class="p-4 fw-bolder">My Project Cases</h1>
            <?php
                $table_name = $wpdb->prefix . 'project_cases_data';
                $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE case_type='preface'");
                foreach ($data_list as $data) {
                  echo $data->case_content;
                }
            ?>
            <div id="carouselExampleInterval" class="carousel slide w-75" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3">
                <?php
                  $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE case_type='bannerimg'");
                  foreach ($data_list as $index => $data){
                    echo '<div class="carousel-item'. ($index==1?" active":"") .'"  data-bs-interval="10000">';
                    echo '  <img src="'. $data->case_content .'" class="d-block w-100 banner-img" alt="...">';
                    echo '</div>';  
                  }
                ?>
                 

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            <button type="button" class="btn bg-gradient1 mt-4 text-light">Read More</button>
        </div>
    </section>
    <section class="certification text-center bg-custom-color1 p-4 mb-4" id="certification">
        <h1 class="fw-bolder p-4">Some Qualifications</h1>
        <div class="container text-center rounded-3 ">
            <div class="row align-items-start">
            <?php
                $table_name = $wpdb->prefix . 'qualification_data';
                $data_list = $wpdb->get_results("SELECT * FROM $table_name");
                foreach ($data_list as $data) {
                  echo '<div class="col-sm-12 col-md-4 p-2 ">';
                  echo '<img src="'. $data->qua_imgurl .'" class="img-fluid w-100 img-custom-effect" data-bs-toggle="modal" data-bs-target="#myModal" alt="...">';
                  echo '</div>';
                }
              ?>
            </div>
          </div>
          <div class="modal " id="myModal">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <img src="..." class="img-fluid w-100 h-75" id="modal-img" alt="...">
                </div>
              </div>
            </div>
          </div>
    </section>
    <div class="m-2"></div>
    <section class="companies-served p-4 text-center" id="companies">
        <h1 class="fw-bolder bg-secondary shadow-lg bg-opacity-25 p-4"><span class="p-4 rounded-3  text-light">Companies Served</span></h1>
        <div class="p-4 mt-4 d-flex justify-content-center">
        <?php
                $table_name = $wpdb->prefix . 'served_data';
                $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE served_type='preface'" );
                foreach ($data_list as $data) {
                  echo $data->served_content;
                }
        ?>
        </div>
        <div class="container">
            <div class="masonry-container mt-4">
              <?php
              $data_list = $wpdb->get_results("SELECT * FROM $table_name WHERE served_type='brand'" );
                foreach ($data_list as $data) {
                  echo '<div class="masonry-item bg-light  rounded-3 border border-secondary-2 shadow p-1">';
                  echo '  <img class="img-fluid w-100" src="'. $data->served_content .'" alt=""/>';
                  echo '</div>';
                }
              ?>
            </div>
          </div>
          <hr class="border border-secondary border-2">
          

          
    </section>
<?php get_footer(); ?>