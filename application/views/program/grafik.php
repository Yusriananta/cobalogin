<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">

            <table class="table col-lg-7">
              <thead>
                  <th scope="col">Unit Kerja</th>
                  <th scope="col">Tahun</th>
                  <th scope="col"></th>

              </thead>
              <tbody>
                    <form action="<?php echo base_url('program/grafik');?>" method="post">
                <td>
                    <select name="id" id="id" class="form-control">
                        <?php foreach ($user_unit as $unit):?>
                        <option value="<?php echo $unit['id'];?>"><?php echo $unit['unit'];?></option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td>   
                    <select name="tahun" id="tahun" class="form-control">
                    <option value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                    <?php foreach ($tahun as $th):?>
                    <option value="<?php echo $th['tahun'];?>"><?php echo $th['tahun'];?></option>
                    <?php endforeach;?>
                    </select>
                </td>
                <td>
                    <!-- <a id="grafik" onclick="grafik()" class="btn btn-primary" target="_blank"><i class="fas fa-search"></i></a> -->
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </td>
                
              </tbody>
            </table>
            </form>
       

                <!-- /.container-fluid -->
           
             <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>

                <div class="card-header py-2">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
          

            </div>
            </div>
            </div>
            <!-- End of Main Content -->
   
        </div>
        <!-- End of Content Wrapper -->
