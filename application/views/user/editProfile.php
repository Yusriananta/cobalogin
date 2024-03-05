
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>
               
               <div class="row">
               		<div class="col-lg-8">

               		<?php echo form_open_multipart('user/editProfile');?>
               		<div class="form-group row">
					    <label for="email" class="col-sm-2 col-form-label">Email</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email'];?>" readonly>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name'];?>">
					      <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="unit" class="col-sm-2 col-form-label">Work Unit</label>
					    <div class="col-sm-10">
					       <select name="unit" id="unit" class="form-control" value="">
					            <option value="<?php echo $user['id_unit'];?>">Pilih jika akan merubah unit saja</option>
					            <<?php foreach ($user_unit as $unit): ?>
					                <option value="<?php echo $unit['id'];?>"><?php echo $unit['unit'];?></option>
					            <?php endforeach ?> 
					            </select>
					             <?php echo form_error('unit', '<small class="text-danger pl-3">', '</small>');?>
					    </div>
					  </div>

					  <div class="form-group row">
					  	<div class="col-sm-2">Picture</div>
					  	<div class="col-sm-10">
					  		<div class="row">
					  			<div class="col-sm-3">
					  				<img src="<?php echo base_url('assets/img/profile/').$user['image'];?>" class="img-thumbnail">
					  			</div>
					  			<div class="col-sm-9">
					  				<input type="file" id="image" name="image">
					  			</div>
					  		</div>
					  	</div>
					  </div>

					  <div class="form-group row justify-content-end">
					  	<div class="col-sm-10">
					  		<a href="<?php echo base_url('user');?>" class="btn btn-danger">Cancel</a>
					  		<button type="submit" class="btn btn-primary">Edit</button>
					  	</div>
					  </div>

               			
               		</div>
               	
               </div>
              </div>

                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

           