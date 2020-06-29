
    
<div class="row">
    <div class="col-lg-12">           
        <h2>Batch View           
            <div class="pull-right">

            <?php foreach ($this->session->user_permission as $key => $value) {
        
                if($key == 4){ //get check batch permission
                    ?>
                    <a class="btn btn-success" href="<?php echo base_url('batchCreate') ?>"><span class="glyphicon glyphicon-plus"></span>Add</a>
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
          <th>Batch Name</th>
      <th>Action</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->batch_name; ?></td>      
      <td>

      <?php foreach ($this->session->user_permission as $key => $value) {
        
        if($key == 5){ //get check batch permission
            ?>
             <a class="btn btn-primary" href="<?php echo base_url('batchEdit/'.$d->batch_id) ?>">
             <span class="glyphicon glyphicon-pencil"></span> Edit</a>
          <?php }
        }  ?>

        <?php foreach ($this->session->user_permission as $key => $value) {
        
        if($key == 8){ //get check batch permission
            ?>
             <a class="btn btn-danger" href='<?php echo base_url("batchDelete/".$d->batch_id)?>' onclick="return confirm('Are you sure want to Delete ?')">
         <span class="glyphicon glyphicon-remove"></span>Delete</a>
         
          <?php }
        }  ?>
    
         </td>
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>

