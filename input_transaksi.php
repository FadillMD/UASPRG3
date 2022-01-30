<?php 
include("koneksi.php");
$tampilbrg=mysqli_query($koneksi, "SELECT * from barang");
$tampilpel=mysqli_query($koneksi, "SELECT * from pelanggan");

if(isset($_POST['save'])){ 
    $idpel = $_POST['idpel'];
    $diskon = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$idpel'");
    $cek = mysqli_num_rows($diskon);
    if ($cek>0){
        $data = mysqli_fetch_assoc($diskon);
        if($data['status']=="member"){
            $query_input=mysqli_query($koneksi,"INSERT INTO transaksi(nama_transaksi,tgl_transaksi,harga,qty,id_barang,diskon,id_pelanggan) 
            values(  
                '".$_POST['namatrx']."', 
                '".$_POST['tgltrx']."', 
                '".$_POST['hrg']."', 
                '".$_POST['qty']."', 
                '".$_POST['idbrg']."', '5',
                '".$_POST['idpel']."')");
            if($query_input){
                header('location:tampil_transaksi.php'); 
            }else{ 
            echo mysqli_error(); 
                } 
            }else{
            $query_input=mysqli_query($koneksi,"INSERT INTO transaksi(nama_transaksi,tgl_transaksi,harga,qty,id_barang,diskon,id_pelanggan) 
            values(  
                '".$_POST['namatrx']."', 
                '".$_POST['tgltrx']."', 
                '".$_POST['hrg']."', 
                '".$_POST['qty']."', 
                '".$_POST['idbrg']."', '0',
                '".$_POST['idpel']."')");
            if($query_input){
                header('location:tampil_transaksi.php'); 
            }else{ 
            echo mysqli_error(); 
                } 
            } 
        }
    }
    
?>
<?php 
Include('header.php');
?>
<div class="row">
    <div class="col-md-10">
        <div class="card" style="min-height: 484px;">
            <div class="card-header"><h3>Form Input Transaksi</h3></div>
            <div class="card-body">
                <form class="forms-sample" method="post">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Transaksi</label>
                        <div class="col-sm-9">
                            <input type="text" name="namatrx" class="form-control" placeholder="Masukan Nama Transaksi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-9">
                            <input type="date" name="tgltrx" class="form-control" placeholder="Masukan Tanggal Transaksi" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kuantiti</label>
                        <div class="col-sm-9">
                            <input type="text" name="qty" class="form-control" placeholder="Banyaknya"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Barang</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="idbrg" name="idbrg" required>
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
                        <label class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="hrg" id="hrg">
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
                    <input type="submit" name="save" class="btn btn-primary mr-2">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
include('footer.php')
?>