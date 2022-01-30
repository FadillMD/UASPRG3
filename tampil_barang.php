<?php
include('koneksi.php');
$kueri_tampil=mysqli_query($koneksi, "SELECT * FROM barang
JOIN kategori ON barang.kategori_id = kategori.id_kategori
JOIN satuan ON barang.satuan_id = satuan.id_satuan order by barang.nama_barang asc;
");
?>
<?php 
Include('header.php');
?>

<div class="card">
    <div class="card-header d-block">
        <h3>Daftar Barang Tersedia</h3>
    </div>
    <div class="card-body p-0 table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                    </tr>
                </thead> 
                <?php
                    $no=1;
                    while($tampil=mysqli_fetch_array($kueri_tampil)){?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $no++;?></th>                        
                        <td><?php echo $tampil['id_barang'];?></td>
                        <td><?php echo $tampil['nama_barang'];?></td>
                        <td><?php echo $tampil['nama_kategori'];?></td>
                        <td><?php echo $tampil['nama_satuan'];?></td>
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