 
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800"><?php echo $title;?></h1>

                   <h5 class="mb-4 text-gray-800">Haii... <?php echo $user['name'];?></h5>  
                </div>
                <!-- /.container-fluid -->
                
           

            <!-- Begin Page Content -->
                <div class="container-fluid">
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-5">
                        <div class="card-header py-2">

                            <?php echo form_error('unit', '<div class="alert alert-danger" role="alert">','</div>');?>
                            <?php echo form_error('name',  '<div class="alert alert-danger" role="alert">','</div>');?>
                            <?php echo form_error('email', '<div class="alert alert-danger" role="alert">','</div>');?>
                            <?php echo form_error('unit_agent', '<div class="alert alert-danger" role="alert">','</div>');?>

                              <?php echo $this->session->flashdata('message');?>

                            <h4 class="m-0 font-weight-bold text-dark">Unit Kerja</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kerja</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $no = 1?>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($user_unit as $unit):?>
                                        <tr class = "text-left">
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $unit['unit'];?></td>
                                           
                                            <td>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditUnit<?php echo $unit['id'];?>">Edit</a>
                                            <a href="<?php echo base_url();?>admin/deleteUnit/<?php echo $unit['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus <?php echo $unit['unit'] ?>?');">Delet</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#AddUnit"><i class="far fa-plus-square"></i> Tambah Unit Kerja</a>
                    </div>


                      <!-- DataTales Example -->
                    <div class="card shadow mb-5">
                        <div class="card-header py-2">
                            <h4 class="m-0 font-weight-bold text-dark">Change Agent</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Unit Kerja</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $no = 1?>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($AllUser as $all):?>
                                        <tr class = "text-left">
                                            <td><?php echo $no++;?><input type="hidden" id="id" value="<?php echo $all['id'];?>"/></td>
                                            <td><?php echo $all['email'];?></td>
                                            <td><?php echo $all['name'];?></td>
                                            <td><?php echo $all['unit'];?></td>
                                            <td><?php echo date('d F Y', $user['date_created']);?></td>
                                            <td>
                                            <?php if ($all['is_active']==1):?>
                                              <span class="badge badge-primary">Aktif</span>
                                            <?php else:?>
                                              <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php endif;?>
                                            

                                            
                                            <td>
                                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#EditAgent<?php echo $all['id'];?>">Edit</a>
                                            <a href="<?php echo base_url();?>admin/deleteUser/<?php echo $all['id'];?>" class="badge badge-danger" onclick="return confirm(' Yakin ingin menghapus <?php echo $all['name'] ?>?');">Delet</a>
                                            <a href="<?php echo base_url();?>admin/resetPassword/<?php echo $all['id'];?>" class="badge badge-info" onclick="return confirm(' Yakin ingin mengatur ulang password <?php echo $all['name'] ?>?');">Reset Password</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#AddAgent"><i class="fas fa-user-plus"></i> Tambah Change Agent</a>
                    </div>


                 </div>
            <!-- End of Main Content -->

                </div>
                <!-- /.container-fluid -->

                            <!-- Modal Add Unit Kerja -->
<div class="modal fade" id="AddUnit" tabindex="-1" aria-labelledby="AddUnitLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddUnitLabel">Tambah Unit Kerja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('admin/user_list');?>" method="post">
      <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="unit" name="unit" placeholder="Nama Unit Kerja" value="<?php echo set_value('name');?>">
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


               
               <!-- Modal Add Change Agent -->
<div class="modal fade" id="AddAgent" tabindex="-1" aria-labelledby="AddAgentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddAgentLabel">Tambah Change Agent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="<?php echo base_url('admin/registration');?>" method="post">
      <div class="modal-body">

          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?php echo set_value('name');?>">
          </div>

          <div class="form-group">
           <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?php echo set_value('email');?>">
          </div>

           <div class="form-group">
            <select name="unit_agent" id="unit_agent" class="form-control">
            <option value="">Pilih unit kerja</option>
            <<?php foreach ($user_unit as $unit): ?>
                <option value="<?php echo $unit['id'];?>"><?php echo $unit['unit'];?></option>
            <?php endforeach ?> 
            </select>
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





                   
               <!-- Modal Edit Change Agent -->
            <?php $no = 0;
            foreach ($AllUser as $all) : $no++;?>
            <div class="modal fade" id="EditAgent<?php echo $all['id'];?>" tabindex="-1" aria-labelledby="EditAgentLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="EditAgentLabel">Edit Change Agent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  <form action="<?php echo base_url();?>admin/EditAgent" method="post">
                  <div class="modal-body">

                      <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $all['id'];?>">
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?php echo $all['name'];?>">
                      </div>


                       <div class="form-group">
                        <select name="unit_agent" id="unit_agent" class="form-control">
                        <option value="<?php echo $all['id_unit'];?>"><?php echo $all['unit'];?></option>
                        <<?php foreach ($user_unit as $unit): ?>
                            <option value="<?php echo $unit['id'];?>"><?php echo $unit['unit'];?></option>
                        <?php endforeach ?> 
                        </select>
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





                 <!-- Modal Edit Unit Kerja -->
            <?php $no = 0;
            foreach ($user_unit as $unit):?>
            <div class="modal fade" id="EditUnit<?php echo $unit['id'];?>" tabindex="-1" aria-labelledby="EditAgentLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="EditAgentLabel">Edit Unit Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  <form action="<?php echo base_url();?>admin/editunit" method="post">
                  <div class="modal-body">

                      <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?php echo $unit['id'];?>">
                      </div>

                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="unit" name="unit" value="<?php echo $unit['unit'];?>">
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


