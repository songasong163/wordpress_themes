<?php
/*
Template Name: custom
*/
?>
<?php get_header(); ?>
<section class="p-4">
    <div class="container-lg">
        <div class="row align-items-center">
            <?php
                if(isset($_GET['search_form']) && $_GET['search_form']==='true'){
                    $search_keyword = sanitize_text_field($_GET['search_val']);
                    $args = array(
                        'post_type' => 'post', // 文章类型
                        'posts_per_page' => 10, // 每页显示的文章数
                        's' => $search_keyword
                    );
                }else{
                    $args = array(
                        'post_type' => 'post', // 文章类型
                        'posts_per_page' => 10, // 每页显示的文章数
                        
                    );
                }
            
                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
            ?>
            <div class="col-sm-12 col-lg-6">
                <div class="card mb-3 h-100">
                    <div class="row g-0">
                        <div class="col-md-4">    
                            <img src="<?php echo has_post_thumbnail()?get_the_post_thumbnail_url():get_template_directory_uri().'/img/headimg2.jpg';?>" class="img-fluid w-100 rounded-start" style="height:160px;" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body h-100">
                            <h5 class="card-title fw-bold mb-3"><i class="bi bi-link-45deg"></i><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <div class="card-text card-abstract">
                                <?php the_excerpt(); ?>
                            </div>
                            <p class="card-text ">
                                <small class="text-muted">
                                    <i class="bi bi-person-workspace post_list_icon"></i><?php  the_author(); ?>
                                    <i class="bi bi-calendar2-week post_list_icon"></i><?php echo get_the_date('m/d/Y'); ?>
                                    <i class="bi bi-chat-left-dots post_list_icon"></i><?php comments_number('暂无评论', '1 条评论', '% 条评论'); ?>
                                </small> 
                            </p>
                            
                        </div>
                        </div>
                        <!-- <div class="col-md-1" style="background-color:#<?php echo substr(md5(rand()), 0, 6); ?>;"></div> -->
                    </div>
                </div>
            </div>
            
            
            <?php
                    }
                }
                
                wp_reset_postdata();
            ?>
    </div>
    
    
   
</section>

<?php get_footer(); ?>