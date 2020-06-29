  
<div class="row">
    <div class="col-lg-12">           
        <h2>User View           
            <div class="pull-right">

            <?php foreach ($this->session->user_permission as $key => $value) {
                
                if($key == 20){ //get check user permission
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url('userCreate') ?>"><span class="glyphicon glyphicon-plus"></span>Add</a>

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
          <th>User Name</th>
          <th>DOB</th>
          <th>User Login Name</th>
          <th>User permissions</th>
         
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->name; ?></td> 
          <td><?php echo $d->dob; ?></td>  
          <td><?php echo $d->user_name; ?></td>  
          
          <td>
             <?php foreach ($permission as $value) {

                if($d->user_id == $value->user_id){
                    echo $value->permissions;
                    echo"<br>";
                }
            }
             ?>
          </td>         
            
          <td>
          <?php foreach ($this->session->user_permission as $key => $value) {
                
                if($key == 21){ //get check user permission
                    ?>
                    <a class="btn btn-primary" href="<?php echo base_url('userEdit/'.$d->user_id) ?>">
                    <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                
                <?php }
            }  ?>

         <?php foreach ($this->session->user_permission as $key => $value) {
                
                if($key == 22){ //get check user permission
                    ?>
                    <a class="btn btn-danger" href='<?php echo base_url("userDelete/".$d->user_id)?>' onclick="return confirm('Are you sure want to Delete ?')">
                    <span class="glyphicon glyphicon-remove"></span>Delete</a>
        
                <?php }
            }  ?>

            
              </td>

      </tr>
      <?php } ?>
  </tbody>
</table>
</div>

