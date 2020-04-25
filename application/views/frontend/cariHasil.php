<?php
// ini_set('session.cache_limiter','public');
// session_cache_limiter(false);
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
    $this->load->view('frontend/_partials/head');
?>

<body>
<?php
    $this->load->view('frontend/_partials/header');
?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Pencarian</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index"><i class="icon_house_alt"></i>Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cari</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

<div id="flipkart-navbar" class="navbar navbar-top">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">


            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><a class="nav menu" href="index" style="text-decoration:none;color:black;"></a></h2>
                <!--<h1 style="margin:0px;"><span class="nav-brand" href="index.php"><h3>INFO TANI</h3></span></h1>-->
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">

                  <form role="search" action="<?= base_url('carihasil/search')?>" method="post">
                  
               <input class="flipkart-navbar-input col-xs-11 cari" type="text" id="cari" name="cari" placeholder="Cari Data..." value="">
                
                  
                  <button class="flipkart-navbar-button col-xs-1" id="btnsearch" name="submitcariHasil" onclick="" >
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868
                            11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0
                            2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895
                            6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>  
                </div>
            </form>
            </div> 
            </div>                
        </div>
    </div>
</div>

<div class="fluid-container">
    <div class="left-sidebar col">
        <form role="filter" action="<?= base_url('carihasil/filter')?>" method="post">
    <h3><span class="fa fa-filter"> Filters </span></h3>
        <details class="navigasi" open>
            <summary><h4>Komoditas</h4></summary>
            <?php 
                 foreach($komoditas as $row) {
                ?>
                <h5>
                <input type="radio" name="komoditas" value="<?= $row->ID_KOMODITAS ?>">
                <?= $row->NAMA_KOMODITAS ?>
                </h5>
                <?php
                }
                ?>   
        </details>
        
        <details class="navigasi" open>
            <summary><h4>Kecamatan</h4></summary>   
                <?php 
                  foreach($kecamatan as $row) {
                ?>
                <h5>
                <input type="checkbox" name="kecamatan[]" value="<?= $row->ID_KECAMATAN ?>">
                <?= $row->NAMA_KECAMATAN ?>
                </h5>
                <?php
                }
                ?>
        </details>
           <h4 id="bulanPanen">Bulan Panen</h4>
           <select name="tglpanen">
            <option selected="selected" disabled>==Pilih Bulan==</option>
            <?php
            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            $jlh_bln=count($bulan);
            for($c=0; $c<$jlh_bln; $c+=1){
                $vbln=$c+1;
                echo"<option value=$vbln> $bulan[$c] </option>";
            }
            ?>
            </select>
            <br/><br/>
                <!--<button type="submit" class="btn btn-success" name="filter" value="Filter">Cari Filter</button>-->
                <button type="submit" class="btn btn-success" name="filter" value="Filter">Filter</button>    
        </form>
</div>
<div class="container">
<div class ="content">
<div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">NO.</th>
                  <th class="text-center">KOMODITAS</th>
                  <th class="text-center">TGL PANEN</th>
                  <th class="text-center">NAMA PETANI</th>
                  <th class="text-center">ALAMAT</th>
                  <th class="text-center">NO HP</th>
                  <th class="text-center">HASIL PANEN (KG)</th>
                  <th class="text-center">PESAN</th>
                </tr>
                </thead>
                <?php $no = $this->uri->segment('3')+1;
                foreach($alldata as $row){
                echo "<tbody>";
                    ?>
                    <tr>
                        <!--memangambil data dari tabel dengan mengisikan data di table-->
                        <td><?php echo $no++;?></td>
                        <td><?php echo $row->NAMA_KOMODITAS ?></td>
                        <td><?php echo DATE_FORMAT(date_create($row->TGL_PANEN),'d M Y');?></td>
                        <td><?php echo $row->NAMA_PETANI ?></td>
                        <td><?php echo $row->ALAMAT_PETANI; echo ", ";
                                echo "Desa/Kel. "; echo $row->NAMA_DESA; 
                                echo", Kec. "; echo $row->NAMA_KECAMATAN;
                            ?></td>
                        <td><?php echo $row->NO_HP ?></td>
                        <td class="uang text-right"><?php echo $row->HASIL ?></td>
                    </form>
                    <td class="text-center"><a href="../pengusaha/pemesanan?id=<?php echo $row->ID_PANEN ?>&tgl=<?php echo $row->TGL_PANEN ?>"><button class="pilih btn btn-primary btn-xs">Pesan</button></a></td>
                    </tr>
                    <?php
                    } ?>
                    </tbody>
                    </table>
                    <br/>
                    <?php echo $this->pagination->create_links(); 
                    ?>
</div>
                </div>

  </div>
 </div>
 </section>
    <!-- Our Expert Area End -->

<!-- Footer Area Start -->
<?php
    $this->load->view('frontend/_partials/footer');
?>
    <!-- Footer Area End -->
    
    <!-- All JS Files -->
    <?php
    $this->load->view('frontend/_partials/js');
?>
  <script src="<?php echo base_url('assets/js/jquery.mask.min.js')?>"></script>
   <script type="text/javascript">          
     $(document).ready(function(){
             // Format mata uang.
     $( '.uang' ).mask('000.000.000', {reverse: true});
    })
    </script>
</body>

</html>