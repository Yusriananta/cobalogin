
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Kegiatan <?php echo $nama_unit['unit'];?></h1>

                     <div class="col-lg-5">
          
		           <table class="table">
              <thead>
                
                  <th scope="col">Bulan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col"></th>
              </thead>
              <tbody>
                  <th scope="row">
                    <form action="<?php echo base_url('program/kegiatan_terlaksana/'.$nama_unit['id']);?>" method="post">       
                      <select name="bulan" id="bulan" class="form-control">
                        <option value="<?php echo date('m');?>"><?php echo date('F');?></option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">JSeptember</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
         
                      </select>
                    
                  
                  <td>
                         
                      <select name="tahun" id="tahun" class="form-control">
                        <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                        <?php foreach ($tahun as $th):?>
                        <option value="<?php echo $th['tahun'];?>"><?php echo $th['tahun'];?></option>
                      <?php endforeach;?>
                      </select>
                    
                  </td>
                  <td>
                    <button type="submit" class="btn btn-sm btn-dark"><i class="fas fa-search"></i></button>
                  </td>
                
              </tbody>
            </table>
            </form>
        </div>


                    
              
              <div class="row">
               	<div class="col-lg">

               	<?php echo $this->session->flashdata('message');?>
               		
               		  <!-- Tabel kegiatan Approved -->
              <div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Terlaksana</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                    	<table class="table table-hover">
                    	<thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Kegiatan</th>
						      <th scope="col">Tanggal</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
					  <tbody>
						  <?php $no = 1;?>
						 <?php foreach ($terlaksana as $tl):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $tl['kegiatan_budaya'];?></td>
						      <td>
						      	<?php
								$date=date_create($tl['tanggal']); 
								echo date_format($date,"d F Y");
								?>
						      </td>
						      <td>
						      	<a  class="btn btn-sm btn-info" href="<?php echo base_url();?>program/detail/<?php echo $tl['id'];?>">
						      		<i class="fas fa-info-circle"></i>
						      	Detail</a>
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





           