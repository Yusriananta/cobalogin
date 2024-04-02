
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>
              
              <div class="row">
               	<div class="col-lg-8">


               		<!-- Nav pills -->
					<ul class="nav nav-pills  mb-4">
					  <li class="nav-item">
					    <a class="nav-link active" data-toggle="pill" href="#kegiatan">Kegiatan</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#keterlibatan">Keterlibatan</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" data-toggle="pill" href="#save">Simpan</a>
					  </li>
					</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="kegiatan">


  					<?php echo form_open_multipart('laporan/pelaksanaan');?>
  					<form action="<?php echo base_url('laporan/pelaksanaan');?>" method="post">
  					<?php foreach ($approved as $key):?>
  					<div class="form-group row">
  					<div class="form-group row">
  					<input type="text" class="form-control" id="id" name="id" value="<?php echo $key['id'];?> ">
  					</div>
  					</div>
  					<?php endforeach ;?>
  					

					
					      <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_kegiatan;?>">

					<div class="form-group row">
					    <label for="change_agent" class="col-sm-4 col-form-label">Nama Change Agent*</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="change_agent" name="change_agent" value="<?php echo set_value('change_agent');?>" >
					      <?php echo form_error('change_agent', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>

					<div class="form-group row">
					    <label for="pemimpin" class="col-sm-4 col-form-label">Nama Pemimpin*</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="pemimpin" name="pemimpin" value="<?php echo set_value('pemimpin');?>">
					      <?php echo form_error('pemimpin', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>

					  <div class="form-group row">
					    <label for="kegiatan_budaya" class="col-sm-4 col-form-label">Nama Kegiatan Budaya*</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="kegiatan_budaya" name="kegiatan_budaya" value="<?php echo set_value('kegiatan_budaya');?>" >
					      <?php echo form_error('kegiatan_budaya', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>

					 <div class="form-group row">
					    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi dan Tujuan Kegiatan*</label>
					    <div class="col-sm-8">
					      <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" ><?php echo set_value('deskripsi');?></textarea>
					      <?php echo form_error('deskripsi', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>

					    <div class="form-group row">
					    <label for="tanggal" class="col-sm-4 col-form-label">Tanggal Pelaksanaan*</label>
					    <div class="col-sm-8">
					      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo set_value('tanggal');?>">
					      <?php echo form_error('tanggal', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>

					 

  </div>


  <div class="tab-pane container fade" id="keterlibatan">
  	
					 <div class="form-group">
					   <label for="q1">1. Apakah pimpinan Anda terlibat dan menghadiri kegiatan ini?*</label>
					    <select class="form-control" name="q1" id="q1"> 
					    <option value="">Pilih Ya/Tidak</option>
					      <option value="40">Ya</option>
					      <option value="0">Tidak</option>
					    </select>
					     <?php echo form_error('q1', '<small class="text-danger pl-3">', '</small>');?>
					 
					 		<div class="col-sm-9 mb-3">
					  				<div>
					  				<label>Foto bukti kegiatan:  </label>
									  <input type="file" id="image_q1" name="image_q1">
									</div>
					  			</div>
					  		</div>


					 <div class="form-group mb-5">
					   <label for="q2">2. Apakah kegiatan ini melibatkan peran serta unit lain?*</label>
					    <select class="form-control" name="q2" id="q2">
					    <option value="">Pilih Ya/Tidak</option>
					      <option value="15">Ya</option>
					      <option value="0">Tidak</option>
					    </select>
					     <?php echo form_error('q2', '<small class="text-danger pl-3">', '</small>');?>
					  
					  		<div class="col-sm-9 mb-3">
					  				<div>
					  				<label>Foto bukti kegiatan:  </label>
									  <input type="file" id="image_q2" name="image_q2">
									</div>
					  			</div>
					  		</div>
					  	

					   <div class="form-group mb-5">
					   <label for="q3">3. Apakah program yang diselenggarakan dihadiri sebanyak minimal 80% karyawan di unit kerja Anda?*</label>
					    <select class="form-control" name="q3" id="q3">
					      <option value="">Pilih Ya/Tidak</option>
					      <option value="10">Ya</option>
					      <option value="0">Tidak</option>
					    </select>
					     <?php echo form_error('q3', '<small class="text-danger pl-3">', '</small>');?>

					     <div class="col-sm-9 mb-3">
					  				<div>
					  				<label>Foto bukti kegiatan:  </label>
									  <input type="file" id="image_q3" name="image_q3">
									</div>
					  			</div>
					  		</div>

  </div>

  <div class="tab-pane container fade" id="save">
  	
 					<div class="form-group mb-3">
					   <label for="evidence">Evidence Lainnya</label>
					   </div>
					   			<div class="col-sm-9 mb-3">
					   			<div>
									<input type="file" id="evidence1" name="evidence1">
								</div>
								</div>
					  			
								<div class="col-sm-9 mb-3">
					  			<div>
									<input type="file" id="evidence2" name="evidence2">
								</div>
								</div>

								<div class="col-sm-9 mb-3">
					  			<div>
									<input type="file" id="evidence3" name="evidence3">
								</div>
								</div>

					    <div class="form-group row">
					  	<div class="col-sm-10">
					  		<a href="<?php echo base_url('laporan');?>" class="btn btn-danger">Cancel</a>
					  		<button  type="submit" class="btn btn-primary">Simpan</button>
					  	</div>
					  </div>
					  </form>
					  <?php echo form_close();?>
					 

  </div>

 






 						
					</div>

				</div>

			</div>


  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



           