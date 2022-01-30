<?php include("koneksi.php");
if(isset($_POST['save'])){ 
    $query_input=mysqli_query($koneksi,"INSERT INTO satuan(id_satuan,nama_satuan) 
    values( 
        '".$_POST['idsatuan']."', 
        '".$_POST['nama']."')");
    if($query_input){
        header('location:input_barang.php'); 
    }else{ 
    echo mysqli_error(); 
        } 
    } 
?>
<?php 
Include('header.php');
?>
<div class="row">
    <div class="col-md-10">
        <div class="card" style="min-height: 484px;">
            <div class="card-header"><h3>Form Input Satuan Barang</h3></div>
            <div class="card-body">
                <form class="forms-sample" method="post">                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Satuan Barang</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Satuan Barang">
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