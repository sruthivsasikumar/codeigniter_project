
<div class="container">  
	<div class="row"> 
		<h1>Edit User</h1>
		<div class="col-xs-4">
				
		<?php echo validation_errors(); ?> 

		<?php echo form_open('studentUpdate/'.$student->student_id);?>

			<div class="form-group">
				<span style="color:red">*</span>
                <label for="name">Student Name:</label>
                <input type="text" name="student_name" class="form-control" value="<?php echo $student->student_name; ?>">
            </div>
            
            <div class="form-group">
				<span style="color:red">*</span><label for="name">DOB:</label>
				<input type="date" name="dob" class="form-control" value="<?php echo $student->dob; ?>" >
               
            </div>
            
            <div class="form-group">
				<span style="color:red">*</span><label for="name">Class:</label>
				<input type="text" name="class" class="form-control" value="<?php echo $student->class; ?>" >
			</div>

			<div>
            <div class="form-group">
			<div class="form-group">
			<span style="color:red">*</span>
			<label for="permission">Select Batch</label>
                    <select required name="batch[]" class="form-control" size="<?php echo count($batch); ?>" multiple="multiple" tabindex="1">
                             <?php foreach ($batch as $data) { ?>
                           
                            <option value="<?php echo $data->batch_id ;?>"><?php echo $data->batch_name ;?></option>
                                          
                            <?php }  ?>
                    </select>     
                </div>
            </div>
        
			
			<div class="form-group"><input class="btn btn-success" type="submit"/> </div>
			<?php echo  form_close();?>
		</div>
	</div>
</div>