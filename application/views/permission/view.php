
    
<div class="row">
    <div class="col-lg-12">           
        <h2>Permissions View           
            <div class="pull-right">

            <?php foreach ($this->session->user_permission as $key => $value) {
                
                if($key == 11 ){ // check  permission 
                    ?>
                     <a class="btn btn-success" href="<?php echo base_url('permissionCreate') ?>"><span class="glyphicon glyphicon-plus"></span>Add</a>
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
          <th>Permission Name</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->permissions; ?></td>      
      <td>

            <?php foreach ($this->session->user_permission as $key => $value) {
                
                if($key == 12 ){ // check  permission 
                    ?>
                       <a class="btn btn-primary" href="<?php echo base_url('permissionEdit/'.$d->permission_id) ?>">
             <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <?php }
            }  ?>
    
             <?php foreach ($this->session->user_permission as $key => $value) {
                
                if($key == 19 ){ // check  permission 
                    ?>
                        <a class="btn btn-danger" href='<?php echo base_url("permissionDelete/".$d->permission_id)?>' onclick="return confirm('Are you sure want to Delete ?')">
                        <span class="glyphicon glyphicon-remove"></span>Delete</a>
                <?php }
            }  ?>
       
         </td>
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>

