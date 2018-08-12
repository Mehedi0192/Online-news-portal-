<?php
    //$menu_active='';
    $query_result=$obj_app->select_all_published_category_info();
    $result=$obj_app->select_all_footer_info();
    $footer_info=  mysqli_fetch_assoc($result);
    $social=$obj_app->select_all_social_info();
    $social_info=  mysqli_fetch_assoc($social);
    $title_info=$obj_app->select_site_title_info();
?>
<footer role="contentinfo" class="site-footer" id="footer">
    <section class="ft_section_2">
        <div class="footer-wrapper">
            <ul id="footer_menu">
                <li><a href="index.php">হোম</a></li>
                <?php while ($category_info=  mysqli_fetch_assoc($query_result)) { ?>
                        <li><a href="category.php?id=<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <section class="ft_section_1">
        <div class="footer-wrapper">
            <div class="col1">
                <?php while ($site_title_info=  mysqli_fetch_assoc($title_info)) { ?>
                <div id="footer_logo"><a href="index.php"><img title="<?php echo $site_title_info['site_title']; ?>" alt="<?php echo $site_title_info['site_title']; ?>" src="assets/<?php echo $site_title_info['site_logo']; ?>"></a></div>
                <?php } ?>
                <div class="footer_text">
                    <?php echo $footer_info['footer_left']; ?>
                </div>
                <div class="block_social_footer">
                    <ul>
                        <li><a class="fb" href="<?php echo $social_info['facebook']; ?>" title="Facebook">Facebook</a></li>
                        <li><a class="tw" href="<?php echo $social_info['twitter']; ?>" title="Twitter">Twitter</a></li>
                        <li><a class="gplus" href="<?php echo $social_info['google_plus']; ?>" title="Google+">Google+</a></li>
                    </ul>
                </div>
            </div>
            <div class="col2">
                <div class="block_footer_widgets">
                    <?php echo $footer_info['footer_right']; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="ft_section_2">
        <div class="footer-wrapper">
            <div class="copyright">
                <div class="footer_text">
                    
                    <?php echo $footer_info['copyright_text']; ?>
                </div>
            </div>
        </div>
    </section>
</footer>