<?php

    //$query_result=$obj_app->select_all_recent_post_info();
$con=  mysqli_connect('localhost', 'root', '', 'db_the_independent');
    if(!$con){
        die('Connection Fail'.mysqli_error($con));
    }
    $page=0;
    if(isset($_GET['page'])){
        if($_GET['page']==1){
            $page=0;
        } else{
            $page=$_GET['page']*10-10;
        }
    }
    $sql= "SELECT * FROM tbl_post ORDER BY post_id DESC LIMIT $page, 10";
    $query_result=  mysqli_query($con, $sql);
    
?>
<div class="main_content">
    <h2 class="page-title">সর্বশেষ সংবাদ</h2>
    <section id="blog_posts">
        <?php while ($post_info=mysqli_fetch_assoc($query_result)) { ?>
        <article>
            <div class="pic"><a href="post.php?id=<?php echo $post_info['post_id']; ?>" class="w_hover img-link img-wrap"><img src="pages/<?php echo $post_info['featured_image']; ?>" alt=""> <span class="link-icon"></span> </a></div>
            <h3><a href="post.php?id=<?php echo $post_info['post_id']; ?>"><?php echo $post_info['post_title']; ?></a></h3>
            <div class="text"><?php echo $obj_app->textShorten($post_info['post_content']); ?></div>
            <a href="post.php?id=<?php echo $post_info['post_id']; ?>" class="more-link">আরো পড়ুন<span></span></a> 
        </article>
        <?php }?>
        
 <?php 
    $sql= "SELECT * FROM tbl_post ORDER BY post_id DESC";
    $query_result=  mysqli_query($con, $sql);
    $total_row=mysqli_num_rows($query_result);
    //echo $total_row;
    $total_page=  ceil($total_row/10);
    echo "<span class='pagination'><a href='?page=1' style='text-decoration: none; background: #ddd; padding: 10px; margin: 5px;'>".'&larrhk; First page'."</a>";
    for($i=1; $i<=$total_page; $i++){
        ?><a href="?page=<?php echo $i;?>" style="text-decoration: none; background: #ddd; padding: 10px; margin: 5px;"><?php echo $i.' ';?></a><?php
    }
    echo "<a href='?page=$total_page' style='text-decoration: none; background: #ddd; padding: 10px; margin: 5px;'>".'Last page &rarrhk;'."</a></span>";

?>
    </section>
</div>
<!-- .main_content --> 

<!--/ .main_content --> 
<!--/Post Blogs--> 