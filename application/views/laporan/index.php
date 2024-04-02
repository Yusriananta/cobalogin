
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>
				<div class="row">
					<div class="col text-right mb-3">
					<span class="badge badge-primary">Today is <?php echo date('l, d F Y');?></span>
					</div>
				</div>
              
              <div class="row">
               	<div class="col-lg">

               	<?php echo $this->session->flashdata('message');?>
			


               	<div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Mandatori</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                    	<table class="table table-hover">
                    	<thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Action Plan</th>
						      <th scope="col">Deskripsi</th>
						      <th scope="col">Rentang Kegiatan</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
					  <tbody>
						  <?php $no = 1;?>
						 <?php foreach ($mandatori as $md):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $md['kegiatan'];?></td>
						      <td><?php echo $md['deskripsi'];?></td>
						      <td>01 - <?php echo date('t F Y');?></td>
						      <td>
						      	<a href="<?php echo base_url();?>laporan/pelaksanaan/<?php echo $md['id'];?>" class="btn btn-sm btn-info">
						      		<i class="fas fa-edit"></i>
						      	Tambah Pelaksanaan</a>
						      </td>
						    </tr>
						<?php endforeach;?>
						  </tbody>
						</table>
						 </div>
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
						      <th scope="col">Action Plan</th>
						      <th scope="col">Deskripsi</th>
						      <th scope="col">Rentang Kegiatan</th>
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
						      <td>01 - <?php echo date('t F Y');?></td>
						      <td>
						      	<a href="<?php echo base_url();?>laporan/pelaksanaan/<?php echo $ap['id'];?>" class="btn btn-sm btn-info">
						      		<i class="fas fa-edit"></i>
						      	Tambah Pelaksanaan</a>
						      </td>
						    </tr>
						<?php endforeach;?>
						  </tbody>
						</table>
						 </div>
                        </div>
                    </div>

                    
              		
				</div>

			</div>


  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           







