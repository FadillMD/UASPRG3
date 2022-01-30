<?php include("koneksi.php");
if(isset($_POST['save'])){ 
    $query_input=mysqli_query($koneksi,"INSERT INTO pelanggan(nama_pelanggan,no_tlp,status) 
    values(  
        '".$_POST['nama']."', 
        '".$_POST['notlp']."',
        '".$_POST['status']."')");
    if($query_input){
        header('location:home.php'); 
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
            <div class="card-header"><h3>Form Input Nama Pelanggan</h3></div>
            <div class="card-body">
                <form class="forms-sample" method="post">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Telpon</label>
                        <div class="col-sm-9">
                            <input type="text" name="notlp" class="form-control" placeholder="Telpon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input type="text" name="status" class="form-control" placeholder="Status">
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