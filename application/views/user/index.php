
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>
              
              <div class="row g-0">
              	<div class="col-md-5 ">
              		<?php echo $this->session->flashdata('message');?>
              	</div>
              </div>

                <div class="card mb-3" style="max-width: 540px;">
				  <div class="row g-0">
				    <div class="col-md-4 bg-gradient-light">
				      <img src="<?php echo base_url('assets/img/profile/').$user['image'];?>" class="img-fluid rounded-start">
				    </div>
				    <div class="col-md-8 bg-gradient-light">
				      <div class="card-body">
				        <h5 class="card-title text-gray-900"><?php echo $user['name'];?></h5>
				        <p class="card-text"><?php echo $user['email'];?></p>
				        <p class="card-text"><?php echo $unit['unit'];?></p>
				        <p class="card-text"><small class="text-body-secondary text-gray-900">Member Since <?php echo date('d F Y', $user['date_created']);?></small></p>
				      </div>
				    </div>
				  </div>
				</div>


  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           