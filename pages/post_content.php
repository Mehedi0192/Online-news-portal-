<?php
    $post_id=$_GET['id'];
    $query_result=$obj_app->select_post_info_by_id($post_id);
    $post_info=mysqli_fetch_assoc($query_result);
    $category_id=$post_info['category_id'];
    $related=$obj_app->select_related_post_by_category_id($category_id);
?>
<div class="main_content single ">
    
    <h2 class="page-title"><?php echo $post_info['post_title']; ?></h2>
    <div id="post_content" class="post_content" role="main">
        <article class="type-post hentry">
            
            <div class="pic post_thumb"> <img src="assets/<?php echo $post_info['featured_image']; ?>" alt="" > </div>
            <div class="post_content">
                <?php echo $post_info['post_content']; ?>                
            </div>
            <div class="block-social">
                <div class="soc_label">ফেসবুকে শেয়ার করুন</div>
                <ul id="post_social_share" class="post_social_share">
                    <li><a href="http://www.facebook.com/share.php?u=?id<?php echo $post_info['post_id']; ?>#" class="facebook_link" target="_blank"><img src="assets/front_end_assets/images/facebook-icon-big.png" class="facebook_icon" alt="facebook" ></a></li>
                </ul>
            </div>
        </article>
        
        <div id="recent_posts">
            <h3 class="section_title">এই সম্পর্কিত সংবাদ</h3>
            <div class="posts_wrapper">
                <?php while ($relatedpost=  mysqli_fetch_assoc($related)) { ?> 
                <article class="item_left">
                    <div class="pic"> 
                        <a href="post.php?id=<?php echo $relatedpost['post_id']; ?>" class="w_hover img-link img-wrap"> 
                            <img src="assets/<?php echo $relatedpost['featured_image']; ?>" alt="<?php echo $relatedpost['post_title']; ?>">
                        </a> 
                    </div>
                    <h3><a href="post.php?id=<?php echo $relatedpost['post_id']; ?>"><?php echo $relatedpost['post_title']; ?></a></h3>
                    
                </article>
                <?php } ?>
            </div>
           
        </div>        
    </div>
</div>