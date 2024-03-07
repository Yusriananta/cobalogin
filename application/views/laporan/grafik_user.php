
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
                          <div class="card shadow mb-4">
                            <div id="myPlot" style="width:100%;"></div>
                          </div>
                                
                    	
                    </dir>

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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            