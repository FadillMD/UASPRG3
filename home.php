<?php 
include("koneksi.php");
include("header.php");
$jmlbrg = "barang";
$jmltrx = "transaksi";
$jmlpel = "pelanggan";
$jmlkat = "kategori";
$brg = "SELECT count(id_barang) AS jumlah FROM $jmlbrg";
$querybrg = mysqli_query($koneksi, $brg);
$hasilbrg = mysqli_fetch_array($querybrg);

$trx = "SELECT count(id_transaksi) AS jumlah FROM $jmltrx";
$querytrx = mysqli_query($koneksi, $trx);
$hasiltrx = mysqli_fetch_array($querytrx);

$pel = "SELECT count(id_pelanggan) AS jumlah FROM $jmlpel";
$querypel = mysqli_query($koneksi, $pel);
$hasilpel = mysqli_fetch_array($querypel);

$kat = "SELECT count(id_kategori) AS jumlah FROM $jmlkat";
$querykat = mysqli_query($koneksi, $kat);
$hasilkat = mysqli_fetch_array($querykat);
?>
<div class="row clearfix">
<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="widget">
        <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                    <h6>Barang</h6>
                    <h2><?php echo $hasilbrg['jumlah'];?></h2>
                </div>
                <div class="icon">
                    <i class="ik ik-shopping-bag"></i>
                </div>
            </div>
            <small class="text-small mt-10 d-block">Total Barang</small>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="widget">
        <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                    <h6>Daftar Transaksi</h6>
                    <h2><?php echo $hasiltrx['jumlah'];?></h2>
                </div>
                <div class="icon">
                    <i class="ik ik-list"></i>
                </div>
            </div>
            <small class="text-small mt-10 d-block">Total Transaksi</small>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="widget">
        <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                    <h6>Pelanggan</h6>
                    <h2><?php echo $hasilpel['jumlah'];?></h2>
                </div>
                <div class="icon">
                    <i class="ik ik-user"></i>
                </div>
            </div>
            <small class="text-small mt-10 d-block">Total Pelnggan</small>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="widget">
        <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="state">
                    <h6>Kategori</h6>
                    <h2><?php echo $hasilkat['jumlah'];?></h2>
                </div>
                <div class="icon">
                    <i class="ik ik-clipboard"></i>
                </div>
            </div>
            <small class="text-small mt-10 d-block">Total Kategori</small>
        </div>
    </div>
</div>
</div>
<?php
include("footer.php");
?>