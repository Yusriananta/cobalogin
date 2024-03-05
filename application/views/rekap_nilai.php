<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rekap Nilai</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<style>
    .line-title{
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }
</style>
</head>

<body>
<!-- <img src="asset/img/logo/LogoSemenGresik.png" style="position: absolute; width: 60px; height: auto;"> -->
  <table>
      <tr>
          <td align="left">
              <span style="line-height: 1.6; font-weight: bold;">
                  Rekap nilai monitor budaya bulan <?php echo $bulan['nama_bulan']; echo " ";echo $tahun;?>
                  <br>PT. SEMEN GRESIK
              </span>
          </td>
      </tr>
  </table>

  <hr class="line-title">

  <table class="table table-bordered">
      <tr>
          <th>No</th>
          <th>Unit kerja</th>
          <th>Kegiatan</th>
          <th>Keterlibatan Pemimpin</th>
          <th>Kerjasama Tim</th>
          <th>Partisipasi Karyawan</th>
          <th>Nilai</th>                    
      </tr>
      <?php $no = 1?>
      <?php foreach ($nilai as $key):?>
      <tr>
       <td><?php echo $no++;?></td>
       <td><?php echo $key['unit'];?></td>
       <td><?php echo $key['kegiatan'];?></td>
       <td><?php echo $key['tQ1'];?></td>
       <td><?php echo $key['tQ2'];?></td>
       <td><?php echo $key['tQ3'];?></td>
       <td><?php echo $key['total'];?></td>
      </tr>
      <?php endforeach;?>
  </table>


 

</body>
</html>