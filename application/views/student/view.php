
    
<div class="row">
    <div class="col-lg-12">           
        <h2>Student View           
            <div class="pull-right">


    <?php foreach ($this->session->user_permission as $key => $value) {
        
        if($key == 3){ //get check student permission
            ?>
            <a class="btn btn-success" href="<?php echo base_url('studentCreate') ?>"><span class="glyphicon glyphicon-plus"></span>Add</a>

        <?php }
    }  ?>

            
   </div>
        </h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
          <th>Student Name</th>
          <th>DOB</th>
          <th>Age</th>
          <th>Class</th>
          <th>Created By</th>
          <th>Batch</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->student_name; ?></td> 
          <td><?php echo $d->dob; ?></td>  
          <td><?php echo $d->age; ?></td>  
          <td><?php echo $d->class; ?></td>  
          <td><?php 
          
          $userData =  $this->db->from('user_table')->where('user_id',$d->createdby_id)->get()->result();
          
           echo $userData[0]->name;
        
        //print_r($userData[0]->name);
        
        ?></td>

          <td>
             <?php foreach ($batch as $value) {

                if($d->student_id == $value->student_id){
                    echo $value->batch_name;
                    echo"<br>";
                }
            }
             ?>
          </td>       
            
          <td>

          <?php foreach ($this->session->user_permission as $key => $value) {
        
        if($key == 6){ //get check student permission
            ?>
            <a class="btn btn-primary" href="<?php echo base_url('studentEdit/'.$d->student_id) ?>">
            <span class="glyphicon glyphicon-pencil"></span> Edit</a>
        <?php }
    }  ?>


    <?php foreach ($this->session->user_permission as $key => $value) {
        
        if($key == 7){ //get check student permission
            ?>
            <a class="btn btn-danger" href='<?php echo base_url("studentDelete/".$d->student_id)?>' onclick="return confirm('Are you sure want to Delete ?')">
            <span class="glyphicon glyphicon-remove"></span>Delete</a>
        <?php }
    }  ?>

            
          </td>
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>

