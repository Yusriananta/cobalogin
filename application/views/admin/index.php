<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
  <div id="content">
  

                <!-- Begin Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-6">
        <h1 class="h3 mb-1 text-gray-800">Hallo <b><?php echo $user['name'];?></b></h1>
        </div>
        <div class="col-6 text-right">
          <span class="badge badge-dark"><i class="far fa-calendar-alt"></i> Today is  <?php echo date('l, d F Y');?></span>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
        <h5>Selamat datang di aplikasi <b>Digital Cultur Monitoring,</b> yaitu Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, fuga dolorum debitis ut placeat earum.</h5>
        </div> 
      </div>
      <div class="row mt-4">
        <div class="card shadow mb-1">
        <div class="col">
          <div class="card-header py-2">
             <h4 class="m-0 font-weight-bold text-dark">Penilaian Kegiatan Budaya</h6>
          </div>
            <table class="table table-hover">
              <thead>
                <tr class="font-weight-bold text-center">
                  <td width="300">Pelaksanaan Kegiatan</td>
                  <td width="300">Kehadiran Pemimpin</td>
                  <td width="300">Kerjasama Tim</td>
                  <td width="300">Partisipatif Aktif Karyawan</td>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td>35%</td>
                  <td>40%</td>
                  <td>15%</td>
                  <td>10%</td>
                </tr>
              </tbody>
            </table>
        </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
            <div class="card-header py-2">
              <h4 class="m-0 font-weight-bold text-dark">Unit kerja yang belum melaksanakan program budaya bulan ini</h6>
            </div>
              <?php foreach($belum_melaksanakan as $key):?>
              <li><?php echo $key['unit'];?></li>
              <?php endforeach;?>
          </div>
      <div class="justify-content-center">

              

                

      </div>
    </div>
    </div>
  </div>
   </div>
</div>
        <!-- End of Content Wrapper -->
