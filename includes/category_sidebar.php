<?php

    $query_result=$obj_app->select_all_recent_post_info();
    
?>

<div role="complementary" class="main_sidebar right_sidebar" id="secondary">
    <aside class="widget widget_recent_blogposts">
        <div class="widget_header">
            <div class="widget_subtitle"><a class="lnk_all_posts" href="recent_post.php">আরো পড়ুন</a></div>
            <h3 class="widget_title">সর্বশেষ সংবাদ</h3>
        </div>
        <div class="widget_body">
            <ul class="slides">
                <li>
                     <?php while ($post_info=  mysqli_fetch_assoc($query_result)) { ?>
                    <div class="article">
                        <div class="pic"> <a class="w_hover img-link img-wrap" href="post.php?id=<?php echo $post_info['post_id']; ?>"><img  alt=""  src="pages/<?php echo $post_info['featured_image']; ?>"> </a> </div>
                        <div class="text">
                            <p class="title"><a href="post.php?id=<?php echo $post_info['post_id']; ?>"><?php echo $post_info['post_title']; ?></a></p>
                            
                        </div>
                    </div>
                     <?php } ?>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Recent posts -->
    <aside class="widget widget_recent_video">
        <div class="widget_header">
            <h3 class="widget_title">ফেসবুক পেজে লাইক করুন</h3>
        </div>
        <div class="widget_body" style="max-height: 200px;">
            <div class="fb-page" data-href="https://www.facebook.com/bdnews24/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bdnews24/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bdnews24/?fref=ts">মূলধারা ৭১ নিউজ</a></blockquote></div>
        </div>
    </aside>
</div>