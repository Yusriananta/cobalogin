
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

                   

                    <dir class="row">
                        <div class="col-lg-6">
                         <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');?>

                         <?php echo $this->session->flashdata('message');?>



                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#AddNewRole">Add new Role</a>



                        <table class="table table-hover">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Role</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          <?php foreach ($role as $r):?>
                            <tr>
                              <th scope="row"><?php echo $no ++ ;?></th>
                              <td><?php echo $r['role'];?></td>
                              <td>
                                <a href="<?php echo base_url('admin/roleaccess/').$r['id'];?>" class="badge badge-warning">Access</a>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="" class="badge badge-danger">Delet</a>
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



<!-- Modal -->
<div class="modal fade" id="AddNewRole" tabindex="-1" aria-labelledby="AddNewRoleLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewRoleLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('role');?>" method="post">
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

            