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
                        <?php foreach ($user_unit as $key):?>
                        <option value="<?php echo $key['id'];?>"><?php echo $key['unit'];?></option>
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
                    <button type="submit" class="btn btn-sm btn-dark"><i class="fas fa-search"></i></button>
                </td>
                
              </tbody>
            </table>
            </form>
       

                <!-- /.container-fluid -->
           
             <!-- Area Chart -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Area Chart <?php print_r($unit['unit']);?></h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div> -->

                <!-- <div class="card-header py-2">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div> -->

                
                <div class="card shadow mb-4">
                    <div id="myPlot" style="width:100%;"></div>
                </div>

                <script src="<?php echo base_url('assets/');?>js/plotly-latest.min.js"></script>


                <script>
                    const xArray = ["Jan", "Feb", "Mar", "Apr", "May","jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                    
                    const y1Array = <?php echo $valueChart['total'];?>;
                    const y2Array = <?php echo $valueChart['kegiatan'];?>;
                    const y3Array = <?php echo $valueChart['valueq1'];?>;
                    const y4Array = <?php echo $valueChart['valueq2'];?>;
                    const y5Array = <?php echo $valueChart['valueq3'];?>;

                    const data = [
                        {x:xArray, y:y1Array,type:"line", name:"Total"},
                        {x:xArray, y:y2Array,type:"line", name:"Kegiatan"},
                        {x:xArray, y:y3Array,type:"line", name:"Kehadiran Pemimpin"},
                        {x:xArray, y:y4Array,type:"line", name:"Kerjasama Tim"},
                        {x:xArray, y:y5Array,type:"line", name:"Dihadiri 80% anggota Unit"}
                    ];

                    const layout = {title:"Grafik kegiatan <?php echo $unit['unit'];?> <?php echo $tahun_grp;?>"};

                    Plotly.newPlot("myPlot", data, layout);
                </script>

            </div>
            </div>
            </div>
            <!-- End of Main Content -->
   
        </div>
        <!-- End of Content Wrapper -->
