<?php
include('koneksi.php');
$kueri_tampil=mysqli_query($koneksi, "SELECT * from pelanggan");
?>
<?php 
Include('header.php');
?>

<div class="card">
    <div class="card-header d-block">
        <h3>Daftar Pelanggan Tersedia</h3>
    </div>
    <div class="card-body p-0 table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telpon</th>
                        <th>Status</th>
                    </tr>
                </thead> 
                <?php
                    $no=1;
                    while($tampil=mysqli_fetch_array($kueri_tampil)){?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $no++;?></th>                        
                        <td><?php echo $tampil['id_pelanggan'];?></td>
                        <td><?php echo $tampil['nama_pelanggan'];?></td>
                        <td><?php echo $tampil['no_tlp'];?></td>
                        <td><?php echo $tampil['status'];?></td>
                    </tr>
                </tbody>
                
    <?php }?>
            </table>
        </div>
    </div>
</div>

<?php
include('footer.php')
?>