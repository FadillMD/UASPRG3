<?php
include("koneksi.php");
Include('header.php');
$idtrx=$_POST['idtrx'];
$tgltrx=$_POST['tgltrx'];
$nmatrx=$_POST['namatrx'];
$qty=$_POST['qty'];
$idbrg=$_POST['idbrg'];
$idpel=$_POST['idpel'];
if(isset($_POST['yakin'])){ 
$idpel = $_POST['idpel'];
$diskon = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$idpel'");
$cek = mysqli_num_rows($diskon);
if ($cek>0){
    $data = mysqli_fetch_assoc($diskon);
    if($data['status']=="member"){
        $query_input=mysqli_query($koneksi,"INSERT INTO transaksi(id_transaksi,nama_transaksi,tgl_transaksi,harga,qty,id_barang,diskon,id_pelanggan) 
        values(  
            '".$idtrx."',
            '".$nmatrx."', 
            '".$tgltrx."', 
            '".$_POST['harga']."', 
            '".$qty."', 
            '".$idbrg."', '5',
            '".$idpel."')");
        if($query_input){
            header('location:tampil_transaksi.php'); 
        }else{ 
        echo mysqli_error(); 
            } 
        }else{
        $query_input=mysqli_query($koneksi,"INSERT INTO transaksi(id_transaksi,nama_transaksi,tgl_transaksi,harga,qty,id_barang,diskon,id_pelanggan) 
        values(
            '".$idtrx."',
            '".$nmatrx."', 
            '".$tgltrx."', 
            '".$_POST['harga']."', 
            '".$qty."', 
            '".$idbrg."', '0',
            '".$idpel."')");  
        if($query_input){
            header('location:tampil_transaksi.php'); 
        }else{ 
        echo mysqli_error(); 
            } 
        } 
    }
}


?>
<div class="row">
    <div class="col-md-10">
        <div class="card" style="min-height: 484px;">
            <div class="card-header"><h3>Form Input Transaksi</h3></div>
            <div class="card-body">
                <form class="forms-sample" method="post" action="konfirmasi.php">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Transaksi</label>
                        <div class="col-sm-9">
                        <label class="col-sm-3 col-form-label">Nama Transaksi</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-9">
                            <input type="date" name="tgltrx" class="form-control" placeholder="Masukan Tanggal Transaksi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" name="harga" class="form-control" placeholder="mis: Rp 30000" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kuantiti</label>
                        <div class="col-sm-9">
                            <input type="text" name="qty" class="form-control" placeholder="Banyaknya" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Barang</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="idbrg" required>
                                <option disabled selected value="">Pilih</option>
                                <?php while($tmplbrg=mysqli_fetch_array($tampilbrg)){?>
                                <option value="<?=$tmplbrg['id_barang'];?>"><?=$tmplbrg['nama_barang'];}?></option>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <a href="input_barang.php" class="btn btn-secondary btn-rounded">Tambah</a>                            
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pelanggan</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="idpel" required>
                                <option disabled selected value="">Pilih</option>
                                <?php while($tmplpel=mysqli_fetch_array($tampilpel)){?>
                                <option value="<?=$tmplpel['id_pelanggan'];?>"><?=$tmplpel['nama_pelanggan'];}?></option>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <a href="input_pelanggan.php" class="btn btn-secondary btn-rounded">Tambah</a>                            
                        </div>
                    </div>
                    <input type="submit" name="yakin" class="btn btn-primary mr-2">
                </form>
            </div>
        </div>
    </div>
</div>