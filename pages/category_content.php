<?php
    $category_id=$_GET['id'];
    $query_result=$obj_app->select_published_post_by_category_id($category_id);
    $category_result=$obj_app->select_category_name_by_category_id($category_id);
    $category_name=  mysqli_fetch_assoc($category_result);
?>

<div class="main_content">
    <h2 class="page-title"><?php echo $category_name['category_name']; ?></h2>
    <section id="news_style3_body" class="news_body">
        <div class="posts_wrapper">
            <?php while ($category_post=  mysqli_fetch_assoc($query_result)) { ?>
            <article>
                <div class="pic"><a href="post.php?id=<?php echo $category_post['post_id']; ?>" class="w_hover img-link img-wrap"><img src="pages/<?php echo $category_post['featured_image']; ?>" alt="" ><span class="link-icon"></span></a></div>
                <div class="field_group">
                    <h3><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></h3>
                    <div class="text"><?php echo $obj_app->textShorten($category_post['post_content']); ?></div>
                    
                </div>
            </article>
            <?php } ?>
            
        </div>
        
        
        <div id="nav_pages">
            <div class="prev_first"></div>
            <a href="#" class="next">Next</a>
            <div class="pages">
                <ul>
                    <li class="current"><a href="#" title="">1</a></li>
                    <li><a href="#" title="2">2</a></li>
                    <li><a href="#" title="3">3</a></li>
                    <li><a href="#" title="3">4</a></li>
                    <li><a href="#" title="3">5</a></li>
                </ul>
            </div>
            <div class="page_x_of_y">Page <span>1</span> of <span>5</span></div>
        </div>
    </section>
</div>
