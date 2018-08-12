<?php
if(isset($_GET['status'])) {
        $post_id=$_GET['id'];
        if($_GET['status'] == 'unpublished') {
            $meassage=$obj_sup_admin->unpublished_post_by_id($post_id); 
        }
        else if($_GET['status'] == 'published') {
            $meassage=$obj_sup_admin->published_post_by_id($post_id); 
        }
        else if($_GET['status'] == 'delete') {
            $meassage=$obj_sup_admin->delete_post_by_id($post_id); 
        }
    }    
$post_id=$_GET['id'];
    $query_result=$obj_sup_admin->select_post_info_by_id($post_id);
    $post_info=mysqli_fetch_assoc($query_result);
    
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Post Details goes here</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>        
        <div class="box-content">
            <h2>
            <?php
                if(isset($meassage)) {
                    echo $meassage;
                }
                unset($meassage);
            ?>
            </h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <tr>
                        <th>Post ID</th>
                        <td><?php echo $post_info['post_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Post Title</th>
                        <td><?php echo $post_info['post_title']; ?></td>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                        <td><?php echo $post_info['category_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <td>
                            <img src="<?php echo $post_info['featured_image']; ?>" alt="<?php echo $post_info['post_title']; ?>" width="300px">
                        </td>
                    </tr>
                    <tr>
                        <th>Post Content</th>
                        <td><?php echo $post_info['post_content']; ?></td>
                    </tr>
                    <tr>
                        <th>Publication Status</th>
                        <td>
                            <?php
                                if( $post_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else { echo 'Unpublished'; }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td class="center" style="text-align: center">
                            <?php if($post_info['publication_status'] == 1) { ?>
                            <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $post_info['post_id']; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-up"></i>
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-danger" href="?status=published&&id=<?php echo $post_info['post_id']; ?>" title="Published">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php } ?>
                            <a class="btn btn-info" href="edit_post.php?id=<?php echo $post_info['post_id'];?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $post_info['post_id']; ?>" title="Delete" onclick="return check_delete_info(); ">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align: center; font-size: 20px;"><a href="manage_post.php">Back to Manage Post Page &rarr;</a></td>
                    </tr>
            </table>            
        </div>
    </div><!--/span-->
</div>