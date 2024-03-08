 		<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800"><?php echo $title;?></h1>
                </div>
                <!-- /.container-fluid -->
                
           

            <!-- Begin Page Content -->
                <div class="container-fluid">

               <!--  Fiter Berdasarkan Bulan -->
        <div class="col-lg-5">
          
           <table class="table">
              <thead>
                
                  <th scope="col">Bulan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col"></th>
              </thead>
              <tbody>
                  <th scope="row">
                    <form action="<?php echo base_url('program');?>" method="post">       
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
                        <option value="9">September</option>
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
                    <a id="rekap_nilai" onclick="data_mandatori()" class="btn btn-sm btn-dark" target="_blank"><i class="fas fa-search"></i></a>
                    <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button> -->
                  </td>
                
              </tbody>
            </table>
            </form>
        </div>

       


        


                <div class="lg-8">
                	<?php echo form_error('kegiatan',  '<div class="alert alert-danger" role="alert">','</div>');?>
                    <?php echo form_error('deskripsi', '<div class="alert alert-danger" role="alert">','</div>');?>
					       <?php echo $this->session->flashdata('message');?>   
                </div>
                   		
                 <!--  Tabel Mandatori -->
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
						      <th scope="col">Nama Kegiatan</th>
						      <th scope="col">Deskripsi</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody id="tbMandatori">
						 <!--  <?php $no = 1;?>
						 <?php foreach ($mandatori as $md):?>
						    <tr>
						      <th scope="row"><?php echo $no ++ ;?></th>
						      <td><?php echo $md['kegiatan'];?></td>
						      <td><?php echo $md['deskripsi'];?></td>
						      <td>
						      	<a href="" class="badge badge-success" data-toggle="modal" data-target="#editMandatori<?php echo $md['id'];?>">Edit</a>
						      	<a href="<?php echo base_url();?>program/deleteMandatori/<?php echo $md['id'];?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus kegiatan <?php echo $md['kegiatan'] ?>?');">Delet</a>
						      </td>
						    </tr>
						<?php endforeach;?> -->
						  </tbody>
						</table>
						 </div>
                        </div>
                            <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#Addmandat"><i class="far fa-plus-square"></i> Tambah Kegiatan </a>
                    </div>


                   


                  <!--   Tabel Unit kerja -->
                    <div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Unit Kerja</h6>              
                	
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr class = "text-center">
                                            <th>No</th>
                                            <th>Unit Kerja</th>
                                            <th>Jumlah Approved</th>
                                            <th>Jumlah Pending</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $no = 1?>
                                    </thead>
                                    <tbody id="tbjumlahApprove">
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                   



              		
			


        </div>
  			</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            		<!-- Modal Form mandatori -->
 					<div class="modal fade" id="Addmandat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddmandatLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="AddmandatLabel">Tambah Mandatori</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>


					      <form action="<?php echo base_url('program');?>" method="post">
					      <div class="modal-body">


					          <div class="form-group">
					            <input type="text" class="form-control form-control-user" id="kegiatan" name="kegiatan" placeholder="Nama Kegiatan" value="" required="">
					          </div>

					          <div class="form-group">
					             <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Kegiatan" value="" required=""></textarea>
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


                       <!--  Modal edit mandatori -->
                       <?php foreach ($mandatori as $md):?>
                        <div class="modal fade" id="editMandatori<?php echo $md['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editMandatoriLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editMandatoriLabel">Edit <?php echo $md['kegiatan'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                                    <form action="<?php echo base_url('program/editMandatori');?>" method="post">
                                    <div class="modal-body">

                                       <div class="form-group">
                                           <input type="hidden" id="id" name="id" value="<?php echo $md['id'];?>">
                                        </div>

                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="kegiatan" name="kegiatan" placeholder="Nama Kegiatan" value="<?php echo $md['kegiatan'];?>" required="">
                                      </div>

                                      <div class="form-group">
                                       <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required=""><?php echo $md['deskripsi'];?></textarea>
                                      </div>
                               
                                    </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endforeach;?>





                          <!--  Modal edit Lihat Kegiatan Approved -->
                       
                        <div class="modal fade" id="lihatKegiatan1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="lihatKegiatanLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="lihatKegiatanLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                                    <div class="modal-body">

                                      <!-- Tabel kegiatan Approved -->
                                        <div class="card shadow mb-5">
                                            <div class="card-header py-2">
                                               <h4 class="m-0 font-weight-bold text-dark">Kegiatan Approved</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="thApproved">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">No</th>
                                                          <th scope="col">Nama Kegiatan</th>
                                                          <th scope="col">Deskripsi</th>
                                                          <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="tbApproved">
                                                        <!-- <tr>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                               
                                    </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                       



                          <!--  Modal edit Lihat Kegiatan Notapproved -->
                       
                        <div class="modal fade" id="lihatKegiatan2" tabindex="-1" aria-labelledby="lihatKegiatanLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="lihatKegiatanLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                                    <div class="modal-body">

                                      <!-- Tabel kegiatan Approved -->
                                        <div class="card shadow mb-5">
                                            <div class="card-header py-2">
                                               <h4 class="m-0 font-weight-bold text-dark">Kegiatan Pending</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="thNotapproved">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">No</th>
                                                          <th scope="col">Nama Kegiatan</th>
                                                          <th scope="col">Deskripsi</th>
                                                          <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="tbNotapproved">
                                                        <!-- <tr>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                               
                                    </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>


                        <!--  Modal edit Planing -->
                       <?php foreach ($planning as $key):?>
                        <div class="modal fade" id="editPlan<?php echo $key['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editMandatoriLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editMandatoriLabel">Edit <?php echo $key['kegiatan'];?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                                    <form action="<?php echo base_url('program/editMandatori');?>" method="post">
                                    <div class="modal-body">

                                       <div class="form-group">
                                           <input type="hidden" id="id" name="id" value="<?php echo $key['id'];?>">
                                        </div>

                                      <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="kegiatan" name="kegiatan" value="<?php echo $key['kegiatan'];?>" required="">
                                      </div>

                                      <div class="form-group">
                                       <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required=""><?php echo $key['deskripsi'];?></textarea>
                                      </div>
                               
                                    </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endforeach;?>
                       