<?php
    
    if(isset($_GET['status'])) {
        $post_id=$_GET['id'];
        if($_GET['status'] == 'unpublished') {
            $meassage=$obj_sup_admin->unpublished_video_by_id($post_id); 
        }
        else if($_GET['status'] == 'published') {
            $meassage=$obj_sup_admin->published_video_by_id($post_id); 
        }
        else if($_GET['status'] == 'delete') {
            $meassage=$obj_sup_admin->delete_video_by_id($post_id); 
        }
    }
    
    $query_result=$obj_sup_admin->select_all_video_info();
  
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Videos</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2>
            <?php
                if(isset($meassage)) {
                    echo $meassage;
                }
                unset($meassage);
            ?>
        </h2>
        <h2>
            <?php
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                
            ?>
        </h2>
        
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Video Title</th>
                        <th>Video Thumbnail</th>
                        <th>Video Link</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
    <?php while ( $video_info=mysqli_fetch_assoc($query_result) ) { ?>
                    <tr>
                        <td><?php echo $video_info['video_title'];?></td>
                        <td><img src="<?php echo $video_info['video_thumb'];?>" width="200px"><?php echo $video_info['video_thumb'];?></td>
                        <td class="center"><?php echo $video_info['video_link'];?></td>
                        <td class="center">
                            <?php
                                if( $video_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else { echo 'Unpublished'; }
                                ?>
                        </td>
                        <td class="center">
                            <a class="btn btn-info" href="<?php echo $video_info['video_link'];?>" target="_blank" title="View Video">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                            <?php if($video_info['publication_status'] == 1) { ?>
                            <a class="btn btn-success" href="?status=unpublished&&id=<?php echo $video_info['video_id']; ?>" title="Unpublished">
                                <i class="halflings-icon white arrow-up"></i>  
                            </a>
                            <?php } else { ?>
                            <a class="btn btn-danger" href="?status=published&&id=<?php echo $video_info['video_id']; ?>" title="Published">
                                <i class="halflings-icon white arrow-down"></i>  
                            </a>
                            <?php } ?>
                            <a class="btn btn-info" href="edit_video.php?id=<?php echo $video_info['video_id'];?>" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="?status=delete&&id=<?php echo $video_info['video_id']; ?>" title="Delete" onclick="return check_delete_info(); ">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>