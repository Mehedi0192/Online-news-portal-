<?php
    $lead_news=$obj_app->select_published_homepage_post_by_category_id(11);
    $national=$obj_app->select_published_homepage_post_by_category_id(1);
    $international= $obj_app->select_published_homepage_post_by_category_id(2);
    $sports= $obj_app->select_published_homepage_post_by_category_id(4);
    $entertainment= $obj_app->select_published_homepage_post_by_category_id(5);
    $life_style= $obj_app->select_published_homepage_post_by_category_id(7);
    $technology= $obj_app->select_published_homepage_post_by_category_id(6);
    $national_big= $obj_app->select_published_homepage_big_post_by_category_id(1);
    $international_big= $obj_app->select_published_homepage_big_post_by_category_id(2);
    $technology_big= $obj_app->select_published_homepage_big_post_by_category_id(6);
    $life_style_big= $obj_app->select_published_homepage_big_post_by_category_id(7);
    $query_result= $obj_app->select_all_recent_post_info();
    $photo_gallery= $obj_app->select_all_photo_gallery_info();

?>

<div class="main_content">
    <div class="content-area" id="primary">
        <div role="main" class="site-content" id="content"> 

            <!--slider1-->
            <div class="block_home_slider style1">
                <div class="slider-wrapper">
                    <div class="flexslider" id="home_slider1">
                        <ul class="slides">
                            <?php while ($slider_post=  mysqli_fetch_assoc($query_result)) { ?>
                            <li>
                                <div class="slide"><a href="post.php?id=<?php echo $slider_post['post_id']; ?>"><img alt="<?php echo $slider_post['post_title'];?>" src="assets/<?php echo $slider_post['featured_image'];?>"></a>
                                    <div class="caption">
                                        <p class="title"><?php echo $slider_post['post_title'];?></p>
                                        <p class="body"><?php echo $obj_app->textShorten($slider_post['post_content']); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <ul id="paging_controls">
                            <li>
                              <div class="inner">
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent News -->
            <div class="recent_news_home clearboth">
                <?php while ($category_post=  mysqli_fetch_assoc($lead_news)) { ?>
                <div class="block_home_post">
                    <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img alt="<?php echo $category_post['post_title'];?>" src="assets/<?php echo $category_post['featured_image'];?>"> <span class="link-icon"></span> </a> </div>
                    <div class="post-content">
                        <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title'];?></a></div>
                    </div>
                    
                </div>
                <?php } ?>
            </div>
            <!-- /end Recent News --> 
            
            <!-- Recent News -->
            <div class="home_category_news clearboth">
                <div class="border-top"></div>
                <h2 class="block-title">জাতীয়</h2>
                <div class="maruf">
                <div class="items-wrap">
                    <?php while ($category_post=  mysqli_fetch_assoc($national_big)) { ?>
                     <div class="block_home_post first-post">
                        <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                        <div class="post-content">
                            <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                        </div>
                        <div class="post-info">
                            <div class="post-body">
                                <?php echo $obj_app->textShorten($category_post['post_content']); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php while ($category_post=  mysqli_fetch_assoc($national)) { ?>
                     <div class="block_home_post bd-bot">
                        <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                        <div class="post-content">
                            <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                </div>
                <div class="view-all"><a href="category.php?id=1">সকল জাতীয় সংবাদ এখানে</a></div>
            </div>
            <div class="home_category_news clearboth">
                <div class="border-top"></div>
                <h2 class="block-title">আন্তর্জাতিক</h2>
                <div class="maruf">
                <div class="items-wrap">
                    <?php while ($category_post=  mysqli_fetch_assoc($international_big)) { ?>
                     <div class="block_home_post first-post">
                        <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                        <div class="post-content">
                            <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                        </div>
                        <div class="post-info">
                            <div class="post-body">
                                <?php echo $obj_app->textShorten($category_post['post_content']); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php while ($category_post=  mysqli_fetch_assoc($international)) { ?>
                     <div class="block_home_post bd-bot">
                        <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                        <div class="post-content">
                            <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                </div>
                <div class="view-all"><a href="category.php?id=2">সকল আন্তর্জাতিক সংবাদ এখানে</a></div>
            </div>
            
            <!-- /Recent News -->
<!--            <div class="maruf_add">
                <a href="#"><img src="assets/front_end_assets/images/gp.gif" alt="Advertisement"></a>
            </div>-->
            
            <div class="home_category_news clearboth">
                <div class="border-top"></div>
                <h2 class="block-title">খেলাধুলা</h2>
                <div class="items-wrap">
                    <?php while ($category_post=  mysqli_fetch_assoc($sports)) { ?>
                    <div class="block_home_post bd-bot">
                        <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                        <div class="post-content">
                            <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="view-all"><a href="category.php?id=4">সকল খেলাধুলার সংবাদ এখানে</a></div>
            </div>
            <!-- /Recent News -->
            <div class="home_category_news clearboth">
                <div class="border-top"></div>
                <h2 class="block-title">বিনোদন</h2>
                <div class="items-wrap">
                    <?php while ($category_post=  mysqli_fetch_assoc($entertainment)) { ?>
                    <div class="block_home_post first-post">
                        <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_titlle']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                        <div class="post-content">
                            <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                        </div>
                        <div class="post-body">
                            <?php echo $obj_app->textShorten($category_post['post_content']); ?>
                        </div>
                            
                    </div>
                    <?php } ?>
                </div>
                <div class="view-all"><a href="category.php?id=5">সকল বিনোদন সংবাদ এখানে</a></div>
            </div>
            
            <div class="two_columns_news clearboth"> 

                <!-- Recent News -->
                <div class="home_category_news_small clearboth">
                    <div class="border-top"></div>
                    <h2 class="block-title">লাইফ স্টাইল</h2>
                    <div class="items-wrap">
                        <?php while ($category_post=  mysqli_fetch_assoc($life_style_big)) { ?>
                    <div class="block_home_post first-post">
                      <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                      <div class="post-content">
                        <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                      </div>
                    </div>
                    <?php } ?>
                    
                        <?php while ($category_post=  mysqli_fetch_assoc($life_style)) { ?>
                        <div class="block_home_post">
                            <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                            <div class="post-content">
                                <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="view-all"><a href="category.php?id=7">সকল লাইফ স্টাইল সংবাদ এখানে</a></div>
                </div>
                
                
                <!-- /Recent News --> 
                <div class="home_category_news_small clearboth">
                    <div class="border-top"></div>
                    <h2 class="block-title">বিজ্ঞান ও প্রযুক্তি</h2>
                    <div class="items-wrap">
                    <?php while ($category_post=  mysqli_fetch_assoc($technology_big)) { ?>
                    <div class="block_home_post first-post">
                      <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                      <div class="post-content">
                        <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                      </div>
                    </div>
                    <?php } ?>
                    
                        <?php while ($category_post=  mysqli_fetch_assoc($technology)) { ?>
                        <div class="block_home_post">
                            <div class="post-image"><a class="img-link img-wrap w_hover" href="post.php?id=<?php echo $category_post['post_id']; ?>"> <img  alt="<?php echo $category_post['post_title']; ?>"  src="assets/<?php echo $category_post['featured_image']; ?>"> <span class="link-icon"></span> </a> </div>
                            <div class="post-content">
                                <div class="title"><a href="post.php?id=<?php echo $category_post['post_id']; ?>"><?php echo $category_post['post_title']; ?></a></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="view-all"><a href="category.php?id=6">সকল প্রযুক্তি সংবাদ এখানে</a></div>
                </div>
                </div>
                <!------------------------------------------- /Technology News------------------------------------------------------->
            
            
             
            
            <!-- /Recent News -->
            
            <!-- Homepage gallery -->
            <div class="homepage_gallery" id="home-gallery">
                <div class="border-top"></div>
                <h2>ছবি গ্যালারি</h2>
                <div id="home-gallery-wrapper" class="es-carousel-wrapper">
                    <div class="es-carousel">
                        <ul class="slides">
                            <?php while ($gallery_info=  mysqli_fetch_assoc($photo_gallery)) { ?>
                            <li class="gallery-item"><a href="assets/<?php echo $gallery_info['photo_link']; ?>" class="gal_link  prettyPhoto"><span class="link-icon"></span><img src="assets/<?php echo $gallery_info['photo_link']; ?>"  alt="<?php echo $gallery_info['photo_title']; ?>" /></a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Homepage Gallery --> 
        </div>
        <!-- /#content --> 
    </div>
    <!-- /#primary --> 
</div>