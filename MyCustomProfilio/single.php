<?php get_header(); ?>

<section class="bg-custom-color3 pb-2">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<img src="<?php echo has_post_thumbnail()?get_the_post_thumbnail_url(get_the_ID()):get_template_directory_uri().'/img/headimg2.jpg'; ?>" class="img-fluid post-head-img" alt="...">
    <div class="article-content mt-2">
        <div class="container bg-white rounded">
            <div class="row p-4 pb-0">
                <h3 class="text-center"><?php the_title(); ?></h3>
                <p class="text-end">
                    <i class="bi bi-person-workspace post_list_icon"></i><?php the_author(); ?>
                    <i class="bi bi-calendar2-week post_list_icon"></i><?php echo get_the_date('m/d/Y'); ?>
                    <i class="bi bi-bookmark-check post_list_icon"></i><?php the_category(','); ?>
                </p>
                <hr class="border border-3 border-primary">
            </div>
            <div class="row p-2 content_text post_content align-items-start">
                <div class="col">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-block mt-2">
        <div class="container bg-white rounded">
            <div class="row p-4">
                <h5><i class="bi bi-chat-left-text-fill post_list_icon text-primary"></i> A total of <em class="text-primary"><?php echo get_comments_number(); ?></em> comments!</h5>
            </div>
            <?php 
                $comments = get_comments(array(
                    'post_id' => get_the_ID(),
                    'status' => 'approve', 
                    'parent'=>0
                ));
                foreach ($comments as $comment) {
                    //var_dump($comment);
            ?>
            <div class="row p-4 ">
                <div class="col-4 col-xs-4 col-sm-3 col-md-2 col-lg-1 p-0">
                    <?php 
                        echo get_avatar($comment, 30); 
                        echo "<span class='author_name' title='".$comment->comment_author."'>".substr($comment->comment_author,0,9).":</span>";
                    ?>
                    <?php  ?>
                </div>
                <div class="col-4 col-xs-4 col-sm-6 col-md-8 col-lg-10 comment-list">
                    <p class="border border-secondary-subtle rounded m-0 p-2">
                        <?php echo $comment->comment_content; ?>
                    </p>
                    <?php 
                       comment_custom_reply($comment->comment_ID); 
                    ?>
                </div>
                <div class="col-4 col-xs-4 col-sm-3 col-md-2 col-lg-1">
                    <!-- <a href="javascript:void();" class="text-decoration-none reply-btn">reply</a> -->
                    <button type="button" class="btn btn-primary reply-btn" data-cname="<?php echo $comment->comment_author ?>" data-info="<?php echo $comment->comment_ID ?>" data-bs-toggle="modal" data-bs-target="#replyModal">reply</button>
                </div>
            </div>
            <?php } ?>

            <div class="modal " id="replyModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Comments reply</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?php echo esc_url( home_url( '/comment_submit' ) ); ?>">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="comment_post_ID" value="<?php echo get_the_ID(); ?>">
                                    <input type="hidden" class="form-control" id="parent-val" name="comment_parent" value="">
                                    <label for="exampleFormControlTextarea1" id="reply-to-name" class="form-label"> </label>
                                    <textarea class="form-control" name="comment_content" id="exampleFormControlTextarea1" rows="5" required></textarea>
                                    <?php if ( ! is_user_logged_in() ) : ?>
                                        <input type="text" class="form-control mt-2" name="comment_author" placeholder="tom" required>
                                        <input type="email" class="form-control email-input mt-2" name="comment_author_email" placeholder="www.xxx@email.com" required>
                                    <?php endif; ?>
                                    <div class="text-center m-2">
                                        <button type="submit" class="btn submit-btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="comment-reply mt-2">
        <div class="container bg-white rounded p-4">
        <?php  

    comment_form( array(
        'class_form' => 'border border-secondary-subtle p-4 mb-2 rounded bg-primary-subtle',
        'title_reply' => '<h5><i class="bi bi-flag-fill post_list_icon text-primary"></i> Leave a comment!</h5>',
        'fields' => array(
            'author' =>
                '<div class="mb-3 row">' .
                '<label for="staticNick" class="col-sm-2 col-form-label">Nick：</label> ' .
                '<div class="col-sm-10">' .
                '<input id="author" name="author" type="text" class="form-control" placeholder="Jonny\'s cat" />' .
                '</div></div>',
            'email' =>
                '<div class="mb-3 row">' .
                '<label for="staticEmail" class="col-sm-2 col-form-label">Email：</label> ' .
                '<div class="col-sm-10">' .
                '<input id="email" name="email" type="text" class="form-control" placeholder="name@example.com" />' .
                '</div></div>',
            'url' =>
                '<div class="mb-3 row">' .
                '<label for="inputPassword" class="col-sm-2 col-form-label">Web Site：</label> ' .
                '<div class="col-sm-10">' .
                '<input id="url" name="url" type="text" class="form-control" placeholder="www.example123.com" />' .
                '</div></div>'
        ),
        'comment_field' =>
            '<div class="mb-3">' .
            '<label for="exampleFormControlTextarea1" class="form-label">Please write down your opinion：</label>' .
            '<textarea id="comment" name="comment" class="form-control" rows="5"></textarea>' .
            '</div>',
        'submit_button' =>
            '<div class="mb-3 col-12 text-center">' .
            '<input name="submit" type="submit" id="submit" class="btn btn-primary submit" value="report" />' .
            '</div>',
    ) );
?>
        </div>
    </div>
    <?php endwhile; endif; ?>

</section>
<?php
    function comment_custom_reply($comment_id, $depth = 0) {
        // 设置查询参数
        $args = array(
            'post_id' => get_the_ID(),
            'status' => 'approve',
            'parent' => $comment_id,
            'number' => 5, // 限制每次查询的数量
            'offset' => 0, // 设置查询偏移量
        );
    
        // 查询子评论
        $child_comments = get_comments($args);
    
        // 如果有子评论，则递归输出
        if ($child_comments) {
            if ($depth < 5) { // 设置递归深度
                echo '<div class="row p-4">
                ';
                foreach ($child_comments as $child_comment) {
                echo '    
                    <div class="col-4 col-xs-4 col-sm-3 col-md-2 p-0">
                        '.get_avatar($child_comment, 30).' 
                        <span class="author_name" title="'.$child_comment->comment_author.'">'.substr($child_comment->comment_author,0,9).'\'s reply:</span>
                    </div>
                <div class="col-4 col-xs-4 col-sm-6 col-md-8 comment-list">
                    <p class="border border-secondary-subtle rounded m-0 p-2">
                        '.$child_comment->comment_content.' 
                    </p>
                </div>
                <div class="col-4 col-xs-4 col-sm-3 col-md-2">
                    <button type="button" class="btn btn-primary reply-btn" data-cname="'.$child_comment->comment_author .'" data-info="'.$child_comment->comment_ID.'" data-bs-toggle="modal" data-bs-target="#replyModal">reply</button>
                </div>';
            
                    //echo $child_comment->comment_content;
                    comment_custom_reply($child_comment->comment_ID, $depth + 1);
                }
                echo '</div>';
            } else {
                echo '<p>子评论太多，已经折叠</p>';
            }
        }
    }
?>
            
          
<?php get_footer(); ?>