
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>



                     <div class="col-lg-5">
          
           <table class="table">
              <thead>
                
                  <th scope="col">Bulan</th>
                  <th scope="col">Tahun</th>
                  <th scope="col"></th>
              </thead>
              <tbody>
                  <th scope="row">
                    <form action="<?php echo base_url('program/generatePdf');?>" method="post">       
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
                    <a id="rekap_nilai" onclick="rekap_nilai()" class="btn btn-sm btn-dark" target="_blank"><i class="fas fa-search"></i></a>
                    <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-file-pdf"></i> Export PDF</button>
                  </td>
                
              </tbody>
            </table>
            </form>
        </div>
                    
              
              <div class="row">
               	<div class="col-lg">

                  

               		 <div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Unit Kerja</h6>              
                  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table id="thNilai" class="table table-hover">
                                    <thead>
                                        <tr class = "text-center">
                                            <th>No</th>
                                            <th>Unit Kerja</th>
                                            <th>Kegiatan</th>
                                            <th>Keterlibatan Pemimpin</th>
                                            <th>Kerjasama Tim</th>
                                            <th>Partisipasi Karyawan</th>
                                            <th>Nilai</th>
                                        </tr>
                                        <?php $no = 1?>
                                    </thead>
                                    <tbody id ="tbNilai">
                                       <?php foreach ($nilai as $key):?>
                                        <tr class = "text-center">
                                            <td><?php echo $no++;?></td>
                                            <td class = "text-left"><?php echo $key['unit'];?></td>
                                            <td><?php echo $key['kegiatan'];?></td>
                                            <td><?php echo $key['tQ1'];?></td>
                                            <td><?php echo $key['tQ2'];?></td>
                                            <td><?php echo $key['tQ3'];?></td>
                                            <td>
                                            	<i class="fas fa-star"></i>
                                              <?php echo $key['total'];?>
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





           