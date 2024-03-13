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
          <span class="btn btn-sm btn-success"><i class="far fa-calendar-alt"></i>  <?php echo date('l, d F Y');?></span>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col">
        <h5>Selamat datang di aplikasi <b>Digital Cultur Monitoring,</b> yaitu Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, fuga dolorum debitis ut placeat earum.</h5>
        </div> 
      </div>
      <div class="row">
        <div class="col">
          <table class="table table-bordered">
            <tr class="font-weight-bold">
              <td>Kegiatan</td>
              <td>Kehadiran Pemimpin</td>
              <td>Kerjasama Tim</td>
              <td>Partisipatif Aktif Karyawan</td>
            </tr>
            <tr>
              <td>35%</td>
              <td>40%</td>
              <td>15%</td>
              <td>10%</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="justify-content-center">

                <div id="demo" class="carousel slide" data-ride="carousel">
                  <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                  </ul>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?php echo base_url('assets/img/content/')."air.jpg";?>" width="1100" height="500">
                      <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>We had such a great time in LA!</p>
                      </div>   
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo base_url('assets/img/content/')."kolaboratif.jpg";?>" width="1100" height="500">
                      <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                      </div>   
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo base_url('assets/img/content/')."air.jpg";?>" width="1100" height="500">
                      <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                      </div>   
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>

                

      </div>
    </div>
    </div>
  </div>
</div>
        <!-- End of Content Wrapper -->
