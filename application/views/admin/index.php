<!DOCTYPE html>
<html>
<?php
$this->load->view("_partials/head.php");
date_default_timezone_set('Asia/Jakarta');
$tgll = date("Y-m-d");
$tgl = date("d");
$tahun = date("Y");
?>

<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
    <div class="wrapper">

        <!--header-->
        <?php
        $this->load->view('_partials/header');
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php
            $this->load->view("_partials/sidebar.php");
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
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    <?php
                                    foreach ($jumdesa as $row) :
                                        echo "<h3>" . $row['jumlah'] . "</h3>";
                                    endforeach;
                                    ?>
                                </h3>
                                <p>Desa</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-map-pin"></i>
                            </div>
                            <a href="./viewdesa" class="small-box-footer">Informasi Lengkap<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    <?php
                                    foreach ($jumkomoditas as $row) :
                                        echo "<h3>" . $row['jumlah'] . "</h3>";
                                    endforeach;
                                    ?>
                                </h3>

                                <p>Komoditas</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tree"></i>
                            </div>
                            <a href="./viewkomoditas" class="small-box-footer">Informasi Lengkap<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    <?php
                                    foreach ($jumuser as $row) :
                                        echo "<h3>" . $row['jumlah'] . "</h3>";
                                    endforeach;
                                    ?>
                                </h3>

                                <p>Petani</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="./viewpetani" class="small-box-footer">Informasi Lengkap<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                    <?php
                                    foreach ($jumpengusaha as $row) :
                                        echo "<h3>" . $row['jumlah'] . "</h3>";
                                    endforeach;
                                    ?>
                                </h3>

                                <p>Pegusaha</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="./viewuser" class="small-box-footer">Informasi Lengkap<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 style="text-align: center;">Grafik Data</h3>

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
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        $this->load->view("_partials/footer.php");
        ?>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <?php
    $this->load->view("_partials/js.php");
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
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php
                            echo $panen[0][0]['jan'] . "," . $panen[1][0]['feb'] . "," . $panen[2][0]['mar'] . "," . $panen[3][0]['apr'] . "," . $panen[4][0]['mei'] . "," . $panen[5][0]['jun'] . "," . $panen[6][0]['jul'] . ", " . $panen[7][0]['ags'] . ", " . $panen[8][0]['sep'] . "," . $panen[9][0]['okt'] . "," . $panen[10][0]['nov'] . "," . $panen[11][0]['dess'];
                            ?>]
                },
                {
                    label: "Pemesanan",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [<?php
                            echo $pesan[0][0]['jan'] . "," . $pesan[1][0]['feb'] . "," . $pesan[2][0]['mar'] . "," . $pesan[3][0]['apr'] . "," . $pesan[4][0]['mei'] . "," . $pesan[5][0]['jun'] . "," . $pesan[6][0]['jul'] . ", " . $pesan[7][0]['ags'] . ", " . $pesan[8][0]['sep'] . "," . $pesan[9][0]['okt'] . "," . $pesan[10][0]['nov'] . "," . $pesan[11][0]['dess'];
                            ?>]
                }
            ]
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