
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>
              
              <div class="row g-0 mb-3">
              	<div class="col-md-5">
              		<?php echo $this->session->flashdata('message');?>
              	</div>
				<div class="col text-right">
					<span class="badge badge-primary">Today is <?php echo date('l, d F Y');?></span>
				</div>
              </div>


              <!-- Tabel kegiatan Approved -->
              <div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Approved</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                    	<table class="table table-hover">
                    	<thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Nama Kegiatan</th>
						      <th scope="col">Deskripsi</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
					  <tbody>
					  		<?php $no = 1;?>
						 	<?php foreach ($approved as $ap):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $ap['kegiatan'];?></td>
						      <td><?php echo $ap['deskripsi'];?></td>
						      <td>
						      	<a href="<?php echo base_url('laporan');?>" class="badge badge-info">Laksanakan</a>
						      </td>
						    </tr>
							<?php endforeach;?>
						  </tbody>
						</table>
						 </div>
                        </div>
                    </div>


                 <!-- Tabel Kegiatan Pending -->
             	<div class="card shadow mb-5 lg">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Pending</h6>
                        </div>

                        <?php echo form_error('kegiatan',  '<div class="alert alert-danger" role="alert">','</div>');?>
                        <?php echo form_error('deskripsi', '<div class="alert alert-danger" role="alert">','</div>');?>
					                    

                        <div class="card-body">
                            <div class="table-responsive">
                    	<table class="table table-hover">
                    	<thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Nama Kegiatan</th>
						      <th scope="col">Deskripsi</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php $no = 1;?>
						 <?php foreach ($planning as $p):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $p['kegiatan'];?></td>
						      <td><?php echo $p['deskripsi'];?></td>
						      <td>
						      	<a href="" class="badge badge-success" data-toggle="modal" data-target="#editplan<?php echo $p['id'];?>">Edit</a>
						      	<a href="<?php echo base_url();?>user/deleteplanning/<?php echo $p['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus kegiatan <?php echo $p['kegiatan'] ?>?');">Delet</a>
						      </td>
						    </tr>
						<?php endforeach;?>
						  </tbody>
						</table>
						 </div>
                        </div>
                            <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#Addplan"><i class="far fa-plus-square"></i> Tambah Kegiatan </a>
                    </div>

                   <!--  Modal Tambah Action Plan -->
                    <div class="modal fade" id="Addplan" tabindex="-1" aria-labelledby="AddplanLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title font-weight-bold text-dark" id="AddplanLabel">Tambah Kegiatan </h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>


					      <form action="<?php echo base_url('user/planning');?>" method="post">
					      <div class="modal-body">

					          <div class="form-group">
					            <input type="text" class="form-control form-control-user" id="kegiatan" name="kegiatan" placeholder="Nama Kegiatan" value="">
					          </div>

					          <div class="form-group">
					             <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Kegiatan" value=""></textarea>
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



					<!-- Modal edit Planing -->
					<?php foreach ($planning as $p):?>
					 <div class="modal fade" id="editplan<?php echo $p['id'];?>" tabindex="-1" aria-labelledby="editplanLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title font-weight-bold text-dark" id="editplanLabel">Edit Kegiatan <?php echo $p['kegiatan'];?></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>


					      <form action="<?php echo base_url('user/editPlan');?>" method="post">
					      <div class="modal-body">

					          <div class="form-group">
					            <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?php echo $p['id'];?>" required="">
					          </div>

					          <div class="form-group">
					            <input type="text" class="form-control form-control-user" id="kegiatan" name="kegiatan" value="<?php echo $p['kegiatan'];?>" required="">
					          </div>

					          <div class="form-group">
					             <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"  required=""><?php echo $p['deskripsi'];?></textarea>
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


  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           