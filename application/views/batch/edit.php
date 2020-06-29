
<div class="container">  
	<div class="row"> 
		<h1>Edit Batch</h1>
		<div class="col-xs-4">
				
		<?php echo validation_errors(); ?> 

		    <?php echo form_open('batchUpdate/'.$batch->batch_id);?>

                <div class="form-group">
                    <span style="color:red">*</span>
                    <label for="name">Batch Name:</label>
                    <input type="text" name="batch_name" class="form-control" value="<?php echo $batch->batch_name; ?>">
                </div>
                
                <div class="form-group"><input class="btn btn-success" type="submit"/> </div>
			<?php echo  form_close();?>


		</div>
	</div>
</div>