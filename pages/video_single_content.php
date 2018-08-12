<?php
    $video_id=$_GET['id'];
    $video_result=$obj_app->select_video_info_by_id($video_id);
    $video_info=mysqli_fetch_assoc($video_result);
    $query_result=$obj_app->select_all_recent_video_info();
   
?>
<div class="main_content single ">

    <h2 class="page-title"><?php echo $video_info['video_title']; ?></h2>
    <div id="post_content" class="post_content" role="main">
        <article class="post format-video hentry ">

            <div class="pic">
                <iframe class="video_frame" src="<?php echo $video_info['embed_link']; ?>" width="620" height="295" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            </div>
            <div class="post_content">
                
                <p><?php echo $video_info['video_content']; ?></p>
            </div>

        </article>

        <div id="recent_posts">
            <h3 class="section_title"> Recent videos </h3>
            <div class="posts_wrapper">
                <?php while ($video_info=  mysqli_fetch_assoc($query_result)) { ?>
                <article class="item_left">
                    <div class="pic"><a href="video_single.php?id=<?php echo $video_info['video_id']; ?>" class="w_hover img-link img-wrap"><img src="assets/<?php echo $video_info['video_thumb']; ?>" alt="<?php echo $video_info['video_title']; ?>"></a></div>
                    <h3><a href="video_single.php?id=<?php echo $video_info['video_id']; ?>"><?php echo $video_info['video_title']; ?></a></h3>
                    
                </article>
                <?php } ?>
            </div>
        </div>

    </div>
</div>