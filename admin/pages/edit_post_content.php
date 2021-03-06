<?php
$category_id=$_GET['id'];
$query_result=$obj_sup_admin->select_post_info_by_id($category_id);
$category_result=$obj_sup_admin->select_all_category_info();
$post_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])) {
    $obj_sup_admin->update_post_info($_POST);
}
    
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category Form</h2>
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
                        <label class="control-label" for="typeahead">Post Title</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $post_info['post_title']; ?>" name="post_title" class="span6 typeahead" id="typeahead" >
                            <input type="hidden" value="<?php echo $post_info['post_id']; ?>" name="post_id" class="span6 typeahead" id="typeahead" >
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
                            <select id="selectError3" name="category_id">
                                <option>---Select Category Name---</option>
                                <?php while ($post=  mysqli_fetch_assoc($category_result)) { ?>
                                <option value="<?php echo $post['category_id']; ?>"><?php echo $post['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label"  for="textarea2">Post Content</label>
                        <div class="controls">
                            <textarea class="cleditor" name="post_content" id="textarea2" rows="3"><?php echo $post_info['post_content']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Featured Image </label>
                        <div class="controls">
                            <img src="<?php echo $post_info['featured_image']; ?>" width="200px">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Change Image </label>
                        <div class="controls">
                            <input type="file" name="featured_image" class="span6 typeahead" id="typeahead" >
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
                        <button type="submit" name="btn" class="btn btn-primary">Update Category</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
<script>
    document.forms['edit_post_form'].elements['publication_status'].value='<?php echo $post_info['publication_status']; ?>';
</script>








