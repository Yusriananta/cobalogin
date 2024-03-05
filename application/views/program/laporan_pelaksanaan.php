
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>
              
              <div class="row g-0">
                <div class="col-md-5 ">
                  <?php echo $this->session->flashdata('message');?>
                </div>
              </div>



                    <div class="card shadow mb-5">
                    <div class="card-header py-2">
                       <h4 class="m-0 font-weight-bold text-dark">Kegiatan Unit Kerja</h6>              
                  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Unit Kerja</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $no = 1?>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($user_unit as $unit):?>
                                        <tr class = "text-left">
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $unit['unit'];?></td>
                                            <td>
                                            <a href="<?php echo base_url();?>program/kegiatan_terlaksana/<?php echo $unit['id'];?>" class="btn btn-info">
                                              <i class="fas fa-eye"></i>
                                            Lihat Kegiatan</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        





        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           