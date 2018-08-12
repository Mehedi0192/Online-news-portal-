<?php
    $query_result=$obj_app->select_all_recent_video_info();
?>
<div class="main_content page">
    <h2 class="page-title">All Videos</h2>
    <section id="video_header" >

        <div class="recent_video_posts">
            <?php while ($video_info=  mysqli_fetch_assoc($query_result)) { ?>
            <article>
                <div class="pic"><a class="w_hover img-link img-wrap" href="video_single.php?id=<?php echo $video_info['video_id']; ?>"><img alt="<?php echo $video_info['video_title']; ?>" src="assets/<?php echo $video_info['video_thumb']; ?>"> <span class="link-video"></span> </a> </div>
                <h3><a href="video_single.php?id=<?php echo $video_info['video_id']; ?>"><?php echo $video_info['video_title']; ?></a><span>video</span></h3>
                
            </article>
            <?php } ?>
        </div>
    </section>
    <section id="video_body">

        <div id="nav_pages">
            <div class="prev_first"></div>
            <a class="next" href="#">Next</a>
            <div class="pages">
                <ul>
                    <li class="current"><a title="" href="#">1</a></li>
                    <li><a title="2" href="#">2</a></li>
                    <li><a title="3" href="#">3</a></li>
                    <li><a title="3" href="#">4</a></li>
                    <li><a title="3" href="#">5</a></li>
                </ul>
            </div>
            <div class="page_x_of_y">Page <span>1</span> of <span>5</span></div>
        </div>
    </section>
</div>