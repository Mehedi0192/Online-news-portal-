<?php

$query_result=$obj_sup_admin->select_footer_info();
$footer_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn'])) {
    $obj_sup_admin->update_footer_info($_POST);
}

?>
<div class="row-fluid sortable">
    <div class="box span12">       
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Footer Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group hidden-phone">
                        <label class="control-label"  for="textarea2">Footer Left Content</label>
                        <div class="controls">
                            <textarea class="cleditor" name="footer_left" id="textarea2" rows="3"><?php echo $footer_info['footer_left']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label"  for="textarea2">Footer Right Content</label>
                        <div class="controls">
                            <textarea class="cleditor" name="footer_right" id="textarea2" rows="3"><?php echo $footer_info['footer_right']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label"  for="textarea2">Copyright Text</label>
                        <div class="controls">
                            <textarea class="cleditor" name="copyright_text" id="textarea2" rows="3"><?php echo $footer_info['copyright_text']; ?></textarea>
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
        