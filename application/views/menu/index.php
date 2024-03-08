
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

                   

                    <dir class="row">
                    	<div class="col-lg-6">
                    	 <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>

                    	 <?php echo $this->session->flashdata('message');?>



                    	<a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#AddNewMenu"><i class="far fa-plus-square"></i> Add new menu</a>



                    	<table class="table table-hover">
                    	<thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Menu</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php $no = 1;?>
						  <?php foreach ($menu as $m):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $m['menu'];?></td>
						      <td>
						      	<a href="" class="badge badge-success" data-toggle="modal" data-target="#editMenu<?php echo $m['id'];?>">Edit</a>
						      	<a href="<?php echo base_url();?>menu/deleteMenu/<?php echo $m['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus menu <?php echo $m['menu'] ?>?');">Delet</a>
						      </td>
						    </tr>
						<?php endforeach;?>
						  </tbody>
						</table>



                    		
                    	</div>
                    	
                    </dir>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



<!-- Modal ADD -->
<div class="modal fade" id="AddNewMenu" tabindex="-1" aria-labelledby="AddNewMenuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewMenuLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('Menu');?>" method="post">
      <div class="modal-body">

		  <div class="form-group">
		    <input type="text" class="form-control" id="menu" name="menu" placeholder="Name Menu">
		  </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>


    </div>
  </div>
</div>


<!-- Modal Edit -->
<?php foreach ($menu as $m):?>
<div class="modal fade" id="editMenu<?php echo $m['id'];?>" tabindex="-1" aria-labelledby="editMenuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMenuLabel">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('menu/editMenu');?>" method="post">
      <div class="modal-body">

      <div class="form-group">
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $m['id'];?>">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="menu" name="menu" value="<?php echo $m['menu'];?>">
      </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>
            