<?php 
include("koneksi.php");
$tampilkat=mysqli_query($koneksi, "SELECT * from kategori");
$tampilsat=mysqli_query($koneksi, "SELECT * from satuan");
if(isset($_POST['save'])){ 
    $query_input=mysqli_query($koneksi, "INSERT INTO barang(nama_barang,kategori_id,satuan_id) 
    values( 
        '".$_POST['nama']."',
        '".$_POST['kategori']."',
        '".$_POST['satuan']."')");
    if($query_input){
        header('location:home.php'); 
    }else{ 
    echo mysqli_error(); 
        } 
    } 
    
    Include('header.php');
?>

<div class="row">
    <div class="col-md-10">
        <div class="card" style="min-height: 484px;">
            <div class="card-header"><h3>Form Input Nama Barang</h3></div>
            <div class="card-body">
                <form class="forms-sample" method="post"">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Barang" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Kategori</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="kategori" required>
                                <option disabled selected value="">Pilih</option>
                                <?php while($tampil=mysqli_fetch_array($tampilkat)){?>
                                <option value="<?=$tampil['id_kategori'];?>"><?=$tampil['nama_kategori'];}?></option>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <a href="input_kategori.php" class="btn btn-secondary btn-rounded">Tambah</a>                                
                        </div>
                    </div>
                    <div class="form-group row input-group-dropdown">
                        <label class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="satuan" required>
                                <option disabled selected value="">Pilih</option>
                                <?php while($tampil=mysqli_fetch_array($tampilsat)){?>
                                <option value="<?=$tampil['id_satuan'];?>"><?=$tampil['nama_satuan'];}?></option>
                            </select>
                        </div>
                        <div class="input-group-append">
                            <a href="input_satuan.php" class="btn btn-secondary btn-rounded">Tambah</a>                            
                        </div>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary mr-2">
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php')
?>