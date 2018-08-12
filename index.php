<?php
    require './classes/application.php';
    $obj_app=new Application();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php 
                if(isset($pages)){
                    
                    switch ($pages) {
                        case 'category': 
                            $category_id=$_GET['id'];
                            $category_result=$obj_app->select_category_name_by_category_id($category_id);
                            $category=  mysqli_fetch_assoc($category_result);
                            echo $category['category_name'].' | The Independent';
                            break;
                        case 'post_single': 
                            $post_id=$_GET['id'];
                            $postresult=$obj_app->select_post_info_by_id($post_id);
                            $post=  mysqli_fetch_assoc($postresult);
                            echo $post['post_title'].' | The Independent';
                            break;
                        case 'recent_post': 
                            echo 'Recent News'.' | The Independent';
                            break;
                        case 'videos': 
                            echo 'All Videos'.' | The Independent';
                            break;
                        case 'video_single': 
                            $video_id=$_GET['id'];
                            $video_result=$obj_app->select_video_info_by_id($video_id);
                            $video_info=mysqli_fetch_assoc($video_result);
                            echo $video_info['video_title'].' | The Independent';
                            break;

                       
                    }
                   
                }
                else {
                    echo 'The Independent';
                }
            ?> </title>

        <link rel="stylesheet" href="assets/front_end_assets/style/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="assets/front_end_assets/style/responsive.css" type="text/css" media="all">
    </head>
    <body class="wide">
        

        <div id="page"> 
        <?php include './includes/header.php';?>
        <div class="right_sidebar" id="main">
    <div class="inner">
        <div class="general_content clearboth">
            
            
            <?php 
                if(isset($pages)){
                    
                    switch ($pages) {
                        case 'category': 
                            include './pages/category_content.php';
                            break;
                        case 'post_single': 
                            include './pages/post_content.php';
                            break;
                        case 'recent_post': 
                            include './pages/recent_post_content.php';
                            break;
                        case 'videos': 
                            include './pages/video_content.php';
                            break;
                        case 'video_single': 
                            include './pages/video_single_content.php';
                            break;

                       
                    }
                    include './includes/category_sidebar.php';
                }
                else {
                    include './pages/home_content.php';
                    include './includes/sidebar.php';
                }
            ?> 
            <!--main_content--> 
            

            
            
            

        </div>
        <!-- /.general_content --> 
    </div>
    <!-- /.inner --> 
</div>
        <?php include './includes/footer.php';?>

        <a id="toTop" href="#"><span></span></a> </div>
    <!--page--> 

    <script type="text/javascript" src="assets/front_end_assets/js/jquery.min.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/jquery-ui-1.9.2.custom.min.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/superfish.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/jquery.jclock.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/jquery.flexslider-min.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/jquery.prettyPhoto.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/jquery.jcarousel.min.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/jquery.elastislide.js"></script> 
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/googlemap_init.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/mediaelement.min.js"></script> 
    <script type="text/javascript" src="assets/front_end_assets/js/lib.js"></script>
    <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=237488553257107";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
</body>

<!-- Mirrored from primehtml.themerex.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Jul 2016 14:37:35 GMT -->
</html> 