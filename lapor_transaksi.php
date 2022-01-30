<?php
include('koneksi.php');
$kueri_tampil=mysqli_query($koneksi, "SELECT * FROM transaksi
JOIN barang ON transaksi.id_barang = barang.id_barang
JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
JOIN kategori ON barang.kategori_id = kategori.id_kategori where nama_pelanggan='".$_GET['namatrx']."';
");
Include('header.php');
?>

<div class="card">
    <div class="card-header d-block">
        <h3>Daftar Transaksi</h3>
    </div>
    <div class="card-body p-0 table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Kuantiti</th>
                        <th>Diskon</th>
                        <th>Jumlah</th>
                    </tr>
                </thead> 
                <?php
                    $no=1;
                    while($tampil=mysqli_fetch_array($kueri_tampil)){?>
                <tbody>
                    <tr>
                        <td><?php echo $tampil['tgl_transaksi'];?></td>
                        <td><?php echo $tampil['nama_pelanggan'];?></td>
                        <td><?php echo $tampil['status'];?></td>                        
                        <td><?php echo $tampil['nama_kategori'];?></td>
                        <td><?php echo $tampil['nama_barang'];?></td>
                        <td><?php echo $tampil['harga'];?></td>
                        <td><?php echo $tampil['qty'];?></td>
                        <td><?php echo $tampil['diskon']."%";?></td>
                        <td><?php $hrg=$tampil['harga'];
                        $qty=$tampil['qty'];
                        $diskon=$tampil['diskon'];
                        $jml=$hrg*$qty-($hrg*$qty*$diskon/100); echo $jml;?></td>
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