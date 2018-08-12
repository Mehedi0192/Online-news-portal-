<?php
    //$menu_active='';
    $query_result=$obj_app->select_all_published_category_info();
    $title_info=$obj_app->select_site_title_info();
    $add_info=$obj_app->select_advertise_info();
    $latest=$obj_app->select_all_recent_post_info();
    $social=$obj_app->select_all_social_info();
    $social_info=  mysqli_fetch_assoc($social);
?>

    <!-- header begin -->
    <header role="banner" class="site-header" id="header">
        <div>

            <section class="section2">
                <div class="inner">
                    <div class="section-wrap clearboth">
                        <div class="block_social_top">
                            <div class="icons-label">:</div>
                            <ul>
                                <li><a class="tw" href="<?php echo $social_info['twitter']; ?>" title="Twitter">Twitter</a></li>
                                <li><a class="fb" href="<?php echo $social_info['facebook']; ?>" title="Facebook">Facebook</a></li>
                                
                                <li><a class="gplus" href="<?php echo $social_info['google_plus']; ?>" title="Google+">Google+</a></li>
                                
                            </ul>
                        </div>
                        <div class="newsletter">
                            <div id="jclock1" class="simpleclock"></div>
                        </div>
                        <!--            <div class="form_search">
                                      <form role="search" class="searchform" id="searchform" method="get">
                                        <input type="search" placeholder="Search …" id="search" value="" name="" class="field">
                                        <input type="submit" value="Search" id="submit" class="submit">
                                      </form>
                                    </div>-->

                    </div>
                </div>
        
        </section>
        <section class="section3">
            <div class="section-wrap clearboth">
                <div class="banner-block">
                    <?php while ($advertise_info=  mysqli_fetch_assoc($add_info)) { ?>
                    <div class="banner"> <a href="<?php echo $advertise_info['company_link']; ?>"><img alt="banner" src="assets/<?php echo $advertise_info['add_image']; ?>"></a> </div>
                    <?php } ?>
                </div>
                <div class="name-and-slogan">
                    <?php while ($site_title_info=  mysqli_fetch_assoc($title_info)) { ?>
                    <h1 class="site-title"><a rel="home" title="<?php echo $site_title_info['site_title']; ?>" href="index.php"> <img alt="logo" src="assets/<?php echo $site_title_info['site_logo']; ?>"> </a></h1>
                    <?php } ?>
                    <!--<h2 class="site-description">Responsive CMS Theme</h2>-->
                </div>
            </div>
        </section>
        <div class="headStyleMenu">
            <section class="section-nav">
                <nav role="navigation" class="navigation-main">
                    <ul class="clearboth mainHeaderMenu">
                        <li class="home"><a href="index.php"></a></li>
                        
                        <?php while ($category_info=  mysqli_fetch_assoc($query_result)) { ?>
                        <li class="blue"><a href="category.php?id=<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></a></li>
                        <?php } ?>
                        <!--<li class="blue"><a href="category.php">Category</a>
                            <ul>
                                <li><a href="category.php">Category Page Style 1</a></li>
                                <li><a href="category.php">Category Page Style 2</a></li>
                                <li><a href="category.php">Category Page Style 3</a></li>
                            </ul>
                        </li>-->
                        
                    </ul>
                </nav>
            </section>
            <!-- /#site-navigation --> 
            <!-- mobile menu -->
            <section class="section-navMobile">
                <div class="mobileMenuSelect"><span class="icon"></span>Menu</div>
                <ul class="clearboth mobileHeaderMenuDrop">
                    <li><a href="index.php">হোম</a></li>
                    <li><a href="category.php?id=1">জাতীয়</a></li>
                    <li><a href="category.php?id=2">বিশ্ব</a></li>
                    <li><a href="category.php?id=3">অর্থনীতি</a></li>
                    <li><a href="category.php?id=4">খেলাধুলা</a></li>
                    <li><a href="category.php?id=5">বিনোদন</a></li>
                    <li><a href="category.php?id=6">প্রযুক্তি</a></li>
                    <li><a href="category.php?id=7">লাইফ স্টাইল</a></li>
                    <li><a href="category.php?id=9">স্বাস্থ্য</a></li>
                    <li><a href="category.php?id=10">মানাবাধিকার</a></li>
                    <li><a href="category.php?id=15">রাজনীতি</a></li>
                    <li><a href="category.php?id=16">চাকরির খবর</a></li>
                    <li><a href="category.php?id=17">ম্যাগাজিন</a></li>
                    <li><a href="category.php?id=18">ক্যাম্পাস</a></li>
                    <li><a href="category.php?id=19">পড়াশুনা</a></li>
                    <li><a href="category.php?id=20">সাহিত্য</a></li>
                    <li><a href="category.php?id=21">ইসলাম</a></li>
                    <li><a href="category.php?id=23">প্রবাস</a></li>
                    <li><a href="category.php?id=24">সারাদেশ</a></li>
                    <li><a href="category.php?id=25">ক্রাইম</a></li>
                    <li><a href="category.php?id=26">কবিতা ও ছোট গল্প</a></li>
                    <li><a href="category.php?id=27">সম্পাদকীয়</a></li>
                    
                </ul>
            </section>
            <!-- /mobile menu --> 
        </div>
        <section class="news-ticker"> 
            <!-- Recent News slider -->
            <div id="flexslider-news" class="header_news_ticker">
                
                <ul class="news slides">
                    <?php while ($latest_post=  mysqli_fetch_assoc($latest)) { ?>
                    <li><a href="post.php?id=<?php echo $latest_post['post_id']; ?>"><?php echo $latest_post['post_title'];?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /Recent News slider --> 
        </section>
</div>
    </header>
