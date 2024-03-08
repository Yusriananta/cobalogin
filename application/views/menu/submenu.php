
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

                   

                    <dir class="row">
                    	<div class="col-lg">
                      <?php if (validation_errors()):?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors();?>
                      </div>
                      <?php endif;?>
                    	 
                    	 <?php echo $this->session->flashdata('message');?>



                    	<a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#AddNewSubMenu"><i class="far fa-plus-square"></i> Add new Submenu</a>



                    	<table class="table table-hover">
                    	<thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Title</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Url</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Active</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php $no = 1;?>
						  <?php foreach ($SubMenu as $sm):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
                  <td><?php echo $sm['title'];?></td>
                  <td><?php echo $sm['menu'];?></td>
                  <td><?php echo $sm['url'];?></td>
                  <td><?php echo $sm['icon'];?></td>
						      <td>
                      <?php if ($sm['is_active']==1):?>
                        <span class="badge badge-primary">Aktif</span>
                      <?php else:?>
                        <span class="badge badge-danger">Tidak Aktif</span>
                      <?php endif;?>      
                  </td>
						      <td>
						      	<a href="" class="badge badge-success" data-toggle="modal" data-target="#editSubMenu<?php echo $sm['id'];?>">Edit</a>
						      	<a href="<?php echo base_url();?>menu/deleteSubMenu/<?php echo $sm['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus sub menu <?php echo $sm['title'] ?>?');">Delet</a>
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



<!-- ModalAdd -->
<div class="modal fade" id="AddNewSubMenu" tabindex="-1" aria-labelledby="AddNewSubMenuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewSubMenuLabel">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('Menu/submenu');?>" method="post">
      <div class="modal-body">

		   <div class="form-group">
        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title">
      </div>

       <div class="form-group">
        <select name="menu_id" id="menu_id" class="form-control">
        <option value="">Select Menu</option>
        <<?php foreach ($menu as $m): ?>
            <option value="<?php echo $m['id'];?>"><?php echo $m['menu'];?></option>
        <?php endforeach ?>
        

        </select>
      </div>

       <div class="form-group">
        <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu Url">
      </div>

       <div class="form-group">
        <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon">
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
          <label class="form-check-label" for="is_active">
            Active?
          </label>
        </div>
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


<!-- ModalEdit -->
<?php foreach ($SubMenu as $sm):?>
<div class="modal fade" id="editSubMenu<?php echo $sm['id'];?>" tabindex="-1" aria-labelledby="editSubMenuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSubMenuLabel">Edit Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('Menu/editSubMenu');?>" method="post">
      <div class="modal-body">

      <div class="form-group">
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $sm['id'];?>">
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $sm['title'];?>">
      </div>

       <div class="form-group">
        <select name="menu_id" id="menu_id" class="form-control">
        <option value="<?php echo $sm['menu_id'];?>"><?php echo $sm['menu'];?></option>
        <<?php foreach ($menu as $m): ?>
            <option value="<?php echo $m['id'];?>"><?php echo $m['menu'];?></option>
        <?php endforeach ?>
        

        </select>
      </div>

       <div class="form-group">
        <input type="text" class="form-control" id="url" name="url" value="<?php echo $sm['url'];?>">
      </div>

       <div class="form-group">
        <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $sm['icon'];?>">
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
          <label class="form-check-label" for="is_active">
            Active?
          </label>
        </div>
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

            