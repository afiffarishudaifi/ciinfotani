<!DOCTYPE html>
<html>
<?php
$this->load->view('_partials/head');
date_default_timezone_set('Asia/Jakarta');
$tgll = date("Y-m-d");
$tahun = date("Y");
$tglhariini = date("yy-mm-dd");
?>

<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
    <div class="wrapper">

        <!--header-->
        <?php
        $this->load->view('_partials/headeruser');
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php
            $this->load->view('_partials/sidebar');
            ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Beranda
                    <small>InfoTani</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
                    <li class="active">Beranda</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        foreach ($cekpesanmasuk as $hasil) :
                            $hasilcekpesan = $hasil['ID_PESAN'];
                            if ($hasilcekpesan >= 1) {
                        ?>
                                <script language="JavaScript">
                                    alert('Tambah Konfirmasi Pemesanan !');
                                    setTimeout(function() {
                                        window.location.href = '<?php echo base_url('Uriwayat'); ?>'
                                    }, 10);
                                </script>
                            <?php
                            }
                        endforeach;

                        //cek data
                        foreach ($cekdata as $hasil) :
                            $hasilcekdata = $hasil['KTP'];
                            if ($hasilcekdata == 0) {
                            ?>
                                <script language="JavaScript">
                                    alert('Lengkapi Data !');
                                    setTimeout(function() {
                                        window.location.href = '<?php echo base_url('Upetani'); ?>'
                                    }, 10);
                                </script>
                            <?php
                            }
                        endforeach;

                        //insert into PANEN
                        //sudah di controller

                        //cek panen
                        foreach ($cekpanen as $hasil) :
                            $hasilcek = $hasil['ID_PANEN'];
                            if ($hasilcek >= 1) {
                            ?>
                                <script language="JavaScript">
                                    alert('Tambah Hasil Panen !');
                                    setTimeout(function() {
                                        window.location.href = '<?php echo base_url('Upanen/tambahpanen') ?>'
                                    }, 10);
                                </script>
                        <?php
                            }
                        endforeach;

                        ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 style="text-align: center;">Hasil Panen Tahun <?php echo $tahun; ?></h3>

                                <div class=" box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="areaChart" style="height:250px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        $this->load->view('_partials/footer');
        ?>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <?php
    $this->load->view('_partials/js');
    ?>
</body>
<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September",
                "Oktober", "November", "Desember"
            ],
            datasets: [{
                label: "Panen",
                fillColor: "rgba(60,141,188,0.9)",
                strokeColor: "rgba(60,141,188,0.8)",
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [<?php
                        echo $panen[0][0]['jan'] . "," . $panen[1][0]['feb'] . "," . $panen[2][0]['mar'] . "," . $panen[3][0]['apr'] . "," . $panen[4][0]['mei'] . "," . $panen[5][0]['jun'] . "," . $panen[6][0]['jul'] . ", " . $panen[7][0]['ags'] . ", " . $panen[8][0]['sep'] . "," . $panen[9][0]['okt'] . "," . $panen[10][0]['nov'] . "," . $panen[11][0]['dess'];
                        ?>]
            }]
        };

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);


    });
</script>

</html>