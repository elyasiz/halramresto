<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="cetak.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
 
	<?php 
	include 'config/koneksi.php';
	?>
	<h2>Laporan Menu</h2>
    <div class="table-wrapper">
    <table class="fl-table">
        <thead>
		<tr>
        <th>Nomor</th>
			<th>Kode Transaksi</th>
			<th>Kode Menu</th>
			<th>Jumlah</th>
            <th>Subtotal</th>
            <th>Tanggal Transaksi</th>
            <th>Kode User</th>
			<th>Nomor Meja</th>
		</tr>
        </thead>
		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"SELECT * from tb_transaksi WHERE kd_transaksi");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['kd_transaksi']; ?></td>
			<td><?php echo $data['kd_menu']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
            <td><?php echo $data['subtotal']; ?></td>
            <td><?php echo $data['tgl_transaksi']; ?></td>
            <td><?php echo $data['kd_user']; ?></td>
            <td><?php echo $data['no_meja']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>
