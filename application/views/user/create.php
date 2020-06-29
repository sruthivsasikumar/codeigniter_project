
<div class="container">  
	<div class="row"> 
		<h1>Add User</h1>
		<div class="col-xs-4">

		<?php echo form_open('userAdd');?>

			<div class="form-group">
				<span style="color:red">*</span><label for="name">Name:</label>
                <input type="text" name="name" class="form-control"?> 
				<?php echo form_error('name'); ?>
				
            </div>
            
            <div class="form-group">
				<span style="color:red">*</span><label for="name">DOB:</label>
				<input type="date" name="dob" class="form-control"  ?>
				<?php echo form_error('dob'); ?>
            </div>
            
            <div class="form-group">
				<span style="color:red">*</span><label for="name">User Name:</label>
				<input type="text" name="user_name" class="form-control" >
				<?php echo form_error('user_name'); 
				echo form_error('exists_in_database');?>

			</div>
			
			<div class="form-group">
				<span style="color:red">*</span><label for="password">Password:</label>
				<input type="password" name="password" class="form-control"  /><span><h6>The Password field must be at least 5 characters in length</h6></span>
				<?php echo form_error('password'); ?>
			</div>
			<div class="form-group">
				<span style="color:red">*</span><label for="cpassword">Confirm Password:</label>
				<input type="password" name="confirm_password" class="form-control" />
				<?php echo form_error('confirm_password'); ?>
			</div>


			<div>
            <div class="form-group">
			<div class="form-group">
			<span style="color:red">*</span>
			<label for="permission">Select Permission</label>
                    <select required name="permission[]" class="form-control" size="<?php echo count($permission); ?>" multiple="multiple" tabindex="1">
                        <?php foreach ($permission as $data) { ?>
                           
                            <option value="<?php echo $data->permission_id ;?>"><?php echo $data->permissions ;?></option>
                                          
                            <?php }  ?>
                    </select>    
                </div>
				
            </div>
        
			
			<div class="form-group"><input class="btn btn-success" type="submit"/> </div>
			<?php echo  form_close();?>
		</div>
	</div>
</div>