
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Detail Kegiatan <?php echo $detail['kegiatan_budaya'];?></h1>
              
              <div class="row">
               	<div class="col-lg-8">


               	<table class="table">
               		<tr>
               			<th >Nama Change Agent</th>
               			<td class = "text-left"><?php echo $detail['change_agent'];?></td>
               		</tr>

               		<tr>
               			<th >Nama Pemimpin</th>
               			<td class = "text-left"><?php echo $detail['pemimpin'];?></td>
               		</tr>

               		<tr>
               			<th >Nama Kegiatan Budaya</th>
               			<td class = "text-left"><?php echo $detail['kegiatan_budaya'];?></td>
               		</tr>

               		<tr>
               			<th >Deskripsi Kegiatan</th>
               			<td class = "text-left"><?php echo $detail['deskripsi'];?></td>
               		</tr>

               		<tr>
               			<th >Tanggal Pelaksanaan</th>
               			<td class = "text-left">
                                   <?php
                                   $date=date_create($detail['tanggal']); 
                                   echo date_format($date,"d F Y");?>
               		</tr>

               		<tr>
               			<th >Keterlibatan Pemimpin</th>
               			<td class = "text-left">
               				<?php if ($detail['q1']==40):?>
                                        <span class="badge badge-primary">Ya</span>
                                   <?php else:?>
                                        <span class="badge badge-danger">Tidak</span>
                                   <?php endif ;?>
               			</td>
               			
               		</tr>
                         <?php if ($detail['image_q1']):?>
               		<tr>
               			<th ></th>
               			<td class = "text-left">
               				<div class="col-sm-8">
					  				<img src="<?php echo base_url('assets/img/kegiatan/').$detail['image_q1'];?>" width="500">
					  			</div>
               			</td>
               		</tr>
                         <?php endif;?>
               		<tr>
               			<th >keterlibatan Unit lain</th>
               			<td class = "text-left">
               				<?php if ($detail['q2']==15):?>
                                        <span class="badge badge-primary">Ya</span>
                                   <?php else:?>
                                        <span class="badge badge-danger">Tidak</span>
                                   <?php endif ;?>
               			</td>
               		</tr>
                         <?php if ($detail['image_q2']):?>
               		<tr>
               			<th ></th>
               			<td class = "text-left">
               				<div class="col-sm-8">
					  				<img src="<?php echo base_url('assets/img/kegiatan/').$detail['image_q2'];?>" width="500">
					  			</div>
               			</td>
               		</tr>
                         <?php endif;?>
               		<tr>
               			<th >Dihadiri 80% karyawan dari unit kerja anda</th>
               			<td class = "text-left">
               				<?php if ($detail['q3']==10):?>
                                        <span class="badge badge-primary">Ya</span>
                                   <?php else:?>
                                        <span class="badge badge-danger">Tidak</span>
                                   <?php endif ;?>
               			</td>
               		</tr>
                         <?php if ($detail['image_q3']):?>
               		<tr>
               			<th ></th>
               			<td class = "text-left">
               				<div class="col-sm-8">
					  				<img src="<?php echo base_url('assets/img/kegiatan/').$detail['image_q3'];?>" width="500">
					  			</div>
               			</td>
               		</tr>
                         <?php endif;?>
               		<tr>
               			<th >Evidence lain</th>
               			<td class = "text-left"></td>
               		</tr>
                         <?php if ($detail['evidence1']):?>
               		<tr>
               			<th ></th>
               			<td class = "text-left">
               				<div class="col-sm-8">
					  				<img src="<?php echo base_url('assets/img/kegiatan/').$detail['evidence1'];?>" width="500">
					  			</div>
               			</td>
               		</tr>
                         <?php endif;?>

                         <?php if ($detail['evidence2']):?>
               		<tr>
               			<th ></th>
               			<td class = "text-left">
               				<div class="col-sm-8">
					  				<img src="<?php echo base_url('assets/img/kegiatan/').$detail['evidence2'];?>" width="500">
					  			</div>
               			</td>
               		</tr>
                         <?php endif;?>

                         <?php if ($detail['evidence3']):?>
               		<tr>
               			<th ></th>
               			<td class = "text-left">
               				<div class="col-sm-8">
					  				<img src="<?php echo base_url('assets/img/kegiatan/').$detail['evidence3'];?>" width="500">
					  			</div>
               			</td>
               		</tr>
                         <?php endif;?>

               	</table>
               	<a href="<?php echo base_url('laporan/laporan_pelaksanaan');?>" class="btn btn-danger">Kembali</a>

  					




 						
				</div>

			</div>


  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



    