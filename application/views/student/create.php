<br>
<br>
<div>

<?php echo validation_errors(); ?> 

<form method="post" action="<?php echo base_url('studentAdd');?>" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
            <div class="col-md-9">
                <label class="col-md-3">Student Name</label>
                <div class="col-md-9">
                    <input type="text" name="student_name" class="form-control" autofocus required>
                </div>
            </div>
        </div>
        </div>

        
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
            <div class="col-md-9">
                <label class="col-md-3">DOB</label>
                <div class="col-md-9">
                    <input type="date" name="dob" class="form-control" required>
                </div>
            </div>
        </div>
        </div>


        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
             <div class="col-md-9"> 
                <label class="col-md-3">Class</label>
                <div class="col-md-9">
                    <input type="text" name="class" class="form-control" required >
                </div>
            </div>
        </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <div class="col-md-9">
                    <label class="col-md-3">Select Batch</label>
                    <div class="col-md-9">
                
                        <select required name="batch[]" class="form-control" size="<?php echo count($batch); ?>" multiple="multiple" tabindex="1">
                        <?php foreach ($batch as $data) { ?>
                           
                            <option value="<?php echo $data->batch_id ;?>"><?php echo $data->batch_name ;?></option>
                                          
                            <?php }  ?>
                        </select>    
                    </div>
                </div>
            </div>
        <div>
    
            <input type="submit" name="Save" class="btn">
        </div>
        </div>
    </div>
    
</form>
</div>