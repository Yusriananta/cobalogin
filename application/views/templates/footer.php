 <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ananta <?php echo date('Y');?> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('auth/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/');?>js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/');?>js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('assets/');?>js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url('assets/');?>js/demo/chart-bar-demo.js"></script>
    <script src="<?php echo base_url('assets/');?>js/highcharts.js"></script>
   
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="<?php echo base_url('assets/');?>js/plotly-latest.min.js"></script>

    

    
    <script>
        

        $('.custom-file-input').on('chnage',function() {
            let filenmae = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filenmae);
        });



        function detailApproved(id){
            // alert(id);
                var bulanValue = $( "#bulan" ).val();
                var tahunValue = $( "#tahun" ).val();
                $("#tbApproved").html("");
                var no=1;
                $.ajax({
                    method: 'POST',
                    url: '<?php echo base_url('program/kegiatan_approved');?>',
                    data: { idUnit: id, bulan: bulanValue, tahun: tahunValue},
                    success: function (response) {
                        var todos = JSON.parse(response);
			            todos.forEach(function(value, index){
                            
                            var html="<tr>";
                            html+="<td>"+value.approved.no+"</td>";
                            html+="<td>"+value.approved.kegiatan+"</td>";
                            html+="<td>"+value.approved.deskripsi+"</td>";
                            html+="<td><a href='' data-toggle='modal' data-target='#editPlan"+value.approved.id+"' class='badge badge-success'>Edit</a> <a href='program/deletePlanning/"+value.approved.id+"' class='badge badge-danger'>Delete</a></td>";
                            html+="</tr>";
                            $("#tbApproved").append(html);

                        })
                    }
                });
        }


         function detailNotapproved(id){

                var bulanValue = $( "#bulan" ).val();
                var tahunValue = $( "#tahun" ).val();
                $("#tbNotapproved").html("");
                // var no=1;
                $.ajax({
                    method: 'POST',
                    url: '<?php echo base_url('program/kegiatan_pending');?>',
                    data: { idUnit: id, bulan: bulanValue, tahun: tahunValue},
                    success: function (response) {
                        var todos = JSON.parse(response);
                        todos.forEach(function(value, index){
                            // alert(value.kegiatan);
                            var html="<tr>";
                            html+="<td>"+value.notapproved.no+"</td>";
                            html+="<td>"+value.notapproved.kegiatan+"</td>";
                            html+="<td>"+value.notapproved.deskripsi+"</td>";
                            html+="<td><a href='' data-toggle='modal' data-target='#editPlan"+value.notapproved.id+"' class='badge badge-success'>Edit</a> <a href='program/deletePlanning/"+value.notapproved.id+"' class='badge badge-danger'>Delete</a> <a href='program/approve/"+value.notapproved.id+"' class='badge badge-info'>approve</a></td>";
                            html+="</tr>";
                            $("#tbNotapproved").append(html);

                        })
                    }
                });
        }


        function data_mandatori(){

                var bulanValue = $( "#bulan" ).val();
                var tahunValue = $( "#tahun" ).val();
                 $("#tbMandatori").html("");

                $.ajax({
                    method: 'POST',
                    url : '<?php echo base_url('program/data_mandatori');?>',
                    data:{bulan:bulanValue, tahun: tahunValue},
                    success: function(response){
                        var todos = JSON.parse(response);
                        todos.forEach(function(value, index){
                            var html="<tr>";
                            html+="<td>"+value.dataMandatori.no+"</td>";
                            html+="<td>"+value.dataMandatori.kegiatan+"</td>";
                            html+="<td>"+value.dataMandatori.deskripsi+"</td>";
                            html+="<td><a href='' data-toggle='modal' data-target='#editPlan"+value.dataMandatori.id+"' class='badge badge-success'>Edit</a> <a href='program/deletePlanning/"+value.dataMandatori.id+"' class='badge badge-danger'>Delete</a></td>";
                            html+="</tr>";
                            $("#tbMandatori").append(html);
                            
                        })
                        
                    }

                });

                jumlah_approve();

        }

        function jumlah_approve(){
                var bulanValue = $( "#bulan" ).val();
                var tahunValue = $( "#tahun" ).val();
                 $("#tbjumlahApprove").html("");

                $.ajax({
                    method: 'POST',
                    url : '<?php echo base_url('program/jumlah_approve');?>',
                    data:{bulan:bulanValue, tahun: tahunValue},
                    success: function(response){
                        var todos = JSON.parse(response);
                        todos.forEach(function(value, index){
                            var html="<tr>";
                            html+="<td>"+value.dataApprove.no+"</td>";
                            html+="<td>"+value.dataApprove.unit+"</td>";
                            html+="<td class = 'text-center'>"+value.dataApprove.approved+"</td>";
                            html+="<td class = 'text-center'>"+value.dataApprove.notApproved+"</td>";
                            html+="<td class = 'text-center'><a href='' onclick='detailApproved("+value.dataApprove.id+");' data-toggle='modal' data-target='#lihatKegiatan1' class='badge badge-primary'><i class='fas fa-eye'></i> kegiatan <br> Approved</a> <a href='' onclick='detailNotapproved("+value.dataApprove.id+");' data-toggle='modal' data-target='#lihatKegiatan2' class='badge badge-danger'><i class='fas fa-eye'></i> kegiatan <br> Pending</a></td>";
                            html+="</tr>";
                            $("#tbjumlahApprove").append(html);
                           
                            
                        })
                        
                    }

                });
        }

        function rekap_nilai(){
                var bulanValue = $( "#bulan" ).val();
                var tahunValue = $( "#tahun" ).val();
                 $("#tbNilai").html("");

                $.ajax({
                    method: 'POST',
                    url : '<?php echo base_url('program/data_rekap_nilai');?>',
                    data:{bulan:bulanValue, tahun: tahunValue},
                    success: function(response){
                        var todos = JSON.parse(response);
                        todos.forEach(function(value, index){
                            var html="<tr class = 'text-center'>";
                            html+="<td>"+value.dataNilai.no+"</td>";
                            html+="<td class = 'text-left'>"+value.dataNilai.unit+"</td>";
                            html+="<td>"+value.dataNilai.poin+"</td>";
                            html+="<td>"+value.dataNilai.q1+"</td>";
                            html+="<td>"+value.dataNilai.q2+"</td>";
                            html+="<td>"+value.dataNilai.q3+"</td>";
                            html+="<td><i class='fas fa-star'></i>"+value.dataNilai.total+"</td>";
                            html+="</tr>";
                            $("#tbNilai").append(html);
                            
                        })
                        
                    }

                });
        }

       

   Highcharts.chart('container', {

    title: {
        text: 'U.S Solar Employment Growth',
        align: 'left'
    },

    subtitle: {
        text: '<?php echo "string";?>',
        align: 'left'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },

    xAxis: {
        accessibility: {
            rangeDescription: 'Range: 2010 to 2020'
        }
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 2010
        }
    },

    series: [
    {
        name: 'Installation & Developers',
        data: [43934, 48656, 65165, 81827, 112143, 142383,
            171533, 165174, 155157, 161454, 154610]
    },
    

    ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});



    </script>


</body>

</html>