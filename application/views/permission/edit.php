
<div class="container">  
	<div class="row"> 
		<h1>Edit Permission</h1>
		<div class="col-xs-4">
				
		<?php echo validation_errors(); ?> 

		    <?php echo form_open('permissionUpdate/'.$permission->permission_id);?>

                <div class="form-group">
                    <span style="color:red">*</span>
                    <label for="name">Permission Name:</label>
                    <input type="text" name="permissions" class="form-control" value="<?php echo $permission->permissions; ?>">
                </div>
                
                <div class="form-group"><input class="btn btn-success" type="submit"/> </div>
			<?php echo  form_close();?>


		</div>
	</div>
</div>