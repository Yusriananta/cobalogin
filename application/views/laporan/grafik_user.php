
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"></h1>

                   

                    <dir class="row">
                    	<div class="col-lg">

                       
                            <table class="table-">
                          <thead>
                              <th scope="col">Tahun</th>
                              <th scope="col"></th>
                          </thead>
                          <tbody>
                              
                                  <form action="<?php echo base_url('laporan/grafik_user');?>" method="post"> 
                                  <td>
                                         
                                      <select name="tahun" id="tahun" class="form-control">
                                        <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                                        <?php foreach ($tahun as $th):?>
                                        <option value="<?php echo $th['tahun'];?>"><?php echo $th['tahun'];?></option>
                                      <?php endforeach;?>
                                      </select>
                                    
                                  </td>
                                  <td>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                  </td>
                                  </form>
                          </tbody>
                        </table>
                        
                        

                         <!-- /.container-fluid -->
                      <div class="card shadow mb-5 mt-5">
                          <div class="card-header py-2">
                              <figure class="highcharts-figure">
                                  <div id="container"></div>
                              </figure>
                          </div>
                      </div>
              
                    	
                    </dir>



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            