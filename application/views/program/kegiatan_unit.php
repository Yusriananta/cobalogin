
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">kegiatan <?php echo $nama_unit['unit'];?></h1>
              
              <div class="row g-0">
              	<div class="col-md-5 ">
              		<?php echo $this->session->flashdata('message');?>
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
						      	<a href="" class="badge badge-success">Edit</a>
						      	<a href="<?php echo base_url();?>program/deleteplanning/<?php echo $ap['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus kegiatan <?php echo $ap['kegiatan'] ?>?');">Delet</a>
						      </td>
						    </tr>
						<?php endforeach;?>
						  </tbody>
						</table>
						 </div>
                        </div>
                    </div>


                 <!-- Tabel Kegiatan Pending -->
             	<div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Pending</h6>
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
						   <?php foreach ($planning as $p):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $p['kegiatan'];?></td>
						      <td><?php echo $p['deskripsi'];?></td>
						      <td>
						      	<a href="<?php echo base_url();?>program/approve/<?php echo $p['id']."/".$p['id_unit'];?>" class="badge badge-primary">Approve</a>
						      	<a href="" class="badge badge-success">Edit</a>
						      	<a href="<?php echo base_url();?>program/deleteplanning/<?php echo $p['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus kegiatan <?php echo $p['kegiatan'] ?>?');">Delet</a>
						      </td>
						    </tr>
						<?php endforeach;?>
						  </tbody>
						</table>
						 </div>
                        </div>
                       </div>

                      <a href="<?php echo base_url('program');?>" class="btn btn-danger">Keluar</a>

  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           