<?php

    $query_result=$obj_app->select_all_recent_post_info();
    $politics=$obj_app->select_published_homepage_post_by_category_id(14);
    $health=$obj_app->select_published_homepage_post_by_category_id(9);
    $environment=$obj_app->select_published_homepage_post_by_category_id(8);
    $economy= $obj_app->select_published_homepage_post_by_category_id(3);
    $video_gallery=$obj_app->select_all_recent_video_info();
    $video_single=$obj_app->select_single_video_info();
    $photo_gallery=$obj_app->select_all_photo_gallery_info();
    
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
    <div class="maruf_add">
          <a href="#"><img src="assets/front_end_assets/images/gp.gif" alt="Advertisement"></a>
    </div>
    
    <aside class="widget widget_recent_reviews" >
        <div class="widget_header">
            <div class="widget_subtitle"><a class="lnk_all_posts" href="category.php?id=14">আরো পড়ুন</a></div>
            <h3 class="widget_title">রাজনীতি</h3>
        </div>
        <div class="widget_body">
            <div class="recent_reviews">
                <ul class="slides">
                    <?php while ($category_post=  mysqli_fetch_assoc($politics)) { ?>
                    <li>
                        <div class="img_wrap"><a class="w_hover img_wrap" href="post.php?id=<?php echo $category_post['post_id']; ?>"><img alt="" src="assets/<?php echo $category_post['featured_image']; ?>"></a></div>
                        <div class="extra_wrap">
                            <div class="review-title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                           
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </aside>
    <!--Video Widget-->
    <aside class="widget widget_recent_video">
        <div class="widget_header">
            <div class="widget_subtitle"><a class="lnk_all_posts" href="videos.php">আরো দেখুন</a></div>
            <h3 class="widget_title">ভিডিও ফুটেজ</h3>
        </div>
        <div class="widget_body">
            <div id="video_carousel" class="thumb_carousel jcarousel-container jcarousel-container-vertical">
                <div class="jcarousel-container">
                    <div class="jcarousel-clip jcarousel-clip-vertical" >
                        <ul class="jcarousel-list">
                            <?php while ($video=  mysqli_fetch_assoc($video_gallery)) { ?>
                            <li> <a data-content="#" data-href="assets/<?php echo $video['video_thumb']; ?>" title="<?php echo $video['video_title']; ?>" href="<?php echo $video['video_link']; ?>"> <img alt="<?php echo $video['video_title']; ?>" src="assets/<?php echo $video['video_thumb']; ?>"> </a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="jcarousel-prev jcarousel-prev-vertical jcarousel-prev-disabled jcarousel-prev-disabled-vertical"><span></span></div>
                <div class="jcarousel-next jcarousel-next-vertical" ><span></span></div>
            </div>
             <?php while ($video=  mysqli_fetch_assoc($video_single)) { ?>
            <div id="carousel_target" class="video-thumb"> <a class="w_hover img-link img-wrap prettyPhoto" href="<?php echo $video['video_link']; ?>"><img alt="" src="assets/<?php echo $video['video_thumb']; ?>"><span class="v_link"></span></a>
                <div class="post_title"><a class="post_name" href="post-youtube.html"><?php echo $video['video_title']; ?></a></div>
            </div>
             <?php } ?>
        </div>
    </aside>
    <!--Video Widget-->
            <div class="maruf_add">
                <a href="#"><img src="assets/front_end_assets/images/robi.gif" alt="Advertisement"></a>
            </div>
    <aside class="widget widget_recent_video">
        <div class="widget_header">
            <h3 class="widget_title">ফেসবুক পেজে লাইক করুন</h3>
        </div>
        <div class="widget_body">
            <div class="fb-page" data-href="https://www.facebook.com/bdnews24/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bdnews24/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bdnews24/?fref=ts">মূলধারা ৭১</a></blockquote></div>
        </div>
    </aside>
    <aside class="widget widget_recent_blogposts">
        <div class="widget_header blue">
            <div class="widget_subtitle"><a class="lnk_all_posts" href="category.php?id=3">আরো পড়ুন</a></div>
            <h3 class="widget_title">অর্থনীতি</h3>
        </div>
        <div class="widget_body">
            <ul class="slides">
                <li>
                     <?php while ($category_post=  mysqli_fetch_assoc($economy)) { ?>
                    <div class="article">
                        <div class="pic"> <a class="w_hover img-link img-wrap" href="post.php?id=<?php echo $category_post['post_id']; ?>"><img  alt=""  src="pages/<?php echo $category_post['featured_image']; ?>"> </a> </div>
                        <div class="text">
                            <p class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></p>
                            
                        </div>
                    </div>
                     <?php } ?>
                </li>
            </ul>
        </div>
    </aside>
    
    <aside class="widget widget_recent_reviews" >
        <div class="widget_header">
            <div class="widget_subtitle"><a class="lnk_all_posts" href="category.php?id=9">আরো পড়ুন</a></div>
            <h3 class="widget_title">স্বাস্থ্য</h3>
        </div>
        <div class="widget_body">
            <div class="recent_reviews">
                <ul class="slides">
                    <?php while ($category_post=  mysqli_fetch_assoc($health)) { ?>
                    <li>
                        <div class="img_wrap"><a class="w_hover img_wrap" href="post.php?id=<?php echo $category_post['post_id']; ?>"><img alt="" src="assets/<?php echo $category_post['featured_image']; ?>"></a></div>
                        <div class="extra_wrap">
                            <div class="review-title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                           
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </aside>
    <aside class="widget widget_recent_blogposts">
        <div class="widget_header blue">
            <div class="widget_subtitle"><a class="lnk_all_posts" href="category.php?id=8">আরো পড়ুন</a></div>
            <h3 class="widget_title">পরিবেশ</h3>
        </div>
        <div class="widget_body">
            <ul class="slides">
                <li>
                     <?php while ($category_post=  mysqli_fetch_assoc($environment)) { ?>
                    <div class="article">
                        <div class="pic"> <a class="w_hover img-link img-wrap" href="post.php?id=<?php echo $category_post['post_id']; ?>"><img  alt=""  src="pages/<?php echo $category_post['featured_image']; ?>"> </a> </div>
                        <div class="text">
                            <p class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></p>
                            
                        </div>
                    </div>
                     <?php } ?>
                </li>
            </ul>
        </div>
    </aside>
    
    
    
</div>