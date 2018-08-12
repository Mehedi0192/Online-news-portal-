<?php
$video_id=$_GET['id'];
$query_result=$obj_sup_admin->select_all_video_info($video_id);
$video_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])) {
    $obj_sup_admin->update_video_info($_POST);
}
    
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Video</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form name="edit_post_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Video Title</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $video_info['video_title']; ?>" name="video_title" class="span6 typeahead" id="typeahead" >
                            <input type="hidden" value="<?php echo $video_info['video_id']; ?>" name="video_id" class="span6 typeahead" id="typeahead" >
                        </div>
                    </div> 
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label"  for="textarea2">Video Content</label>
                        <div class="controls">
                            <textarea class="cleditor" name="video_content" id="textarea2" rows="3"><?php echo $video_info['video_content']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Video Link </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $video_info['video_link']; ?>" name="video_link" class="span6 typeahead" id="typeahead" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Video Thumbnail </label>
                        <div class="controls">
                            <img src="<?php echo $video_info['video_thumb']; ?>" width="200px">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Change Image </label>
                        <div class="controls">
                            <input type="file" name="video_thumb" class="span6 typeahead" id="typeahead" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>








