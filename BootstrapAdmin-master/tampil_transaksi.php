<?php
include('koneksi.php');
$kueri_tampil=mysqli_query($koneksi, "SELECT * FROM transaksi
INNER JOIN barang ON transaksi.id_barang = barang.id_barang
INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan order by tgl_transaksi asc;
");
?>
<?php 
Include('header.php');
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
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
                        <th>NO</th>
                        <th>Pelanggan</th>
                        <th>Status Pelanggan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Barang</th>
                        <th>Diskon</th>
                        <th>Total</th>
                    </tr>
                </thead> 
                <?php
                    $no=1;
                    while($tampil=mysqli_fetch_array($kueri_tampil)){?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $no++;?></th>  
                        <td><?php echo $tampil['nama_pelanggan'];?></td>
                        <td><?php echo $tampil['status'];?></td>
                        <td><?php echo rupiah($tampil['harga']);?></td>
                        <td><?php echo $tampil['qty'];?></td>
                        <td><?php echo $tampil['nama_barang'];?></td>
                        <td><?php echo $tampil['diskon']."%";?></td>
                        <td><?php $hrg=$tampil['harga'];
                        $qty=$tampil['qty'];
                        $diskon=$tampil['diskon'];
                        $jml=$hrg*$qty-($hrg*$qty*$diskon/100); echo rupiah($jml);?></td>
                    </tr>
                </tbody>
                <?php };?>              
            </table>
        </div>
    </div>
</div>

<?php
include('footer.php')
?>