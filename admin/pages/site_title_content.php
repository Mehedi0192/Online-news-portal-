<?php

    $query_result=$obj_sup_admin->select_site_title_info();
    $site_title_info=mysqli_fetch_assoc($query_result);

    if(isset($_POST['btn'])) {
        $obj_sup_admin->update_site_title_info($_POST);
    }

?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Site Title</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2><?php if(isset($message)) { echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Site Title </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $site_title_info['site_title']; ?>" name="site_title" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Site Description </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $site_title_info['site_description']; ?>" name="site_description" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Logo </label>
                        <div class="controls">
                            <img src="<?php echo $site_title_info['site_logo']; ?>" alt="<?php echo $site_title_info['site_title']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Change Logo </label>
                        <div class="controls">
                            <input type="file" name="site_logo" class="span6 typeahead" id="typeahead" >
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