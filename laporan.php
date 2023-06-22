<?php 
include 'config/koneksi.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<style type="text/css">
* {margin:0; padding:0;}
nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 50px;
	 font-family:"helvetica", Arial, sans-serif;
}
nav ul ul {
 display: none;
}

nav ul li:hover > ul{
display: block;
width: 150px;
}

nav ul {
 background: #B31312;
 list-style: none;
 position: relative;
 display: inline-table;
 width: 100%;
}
        

nav ul li{
 float:left;
}

nav ul li:hover{
 background:#EEE2DE;

}

nav ul li:hover a{
 color:#B31312;

}

nav ul li a{
 display: block;
 padding: 20px;
 color: #EEE2DE;
 text-decoration: none;

}
	   table {
      font-family: Arial, Helvetica, sans-serif;
      background-color:grey;
      border: #212121 0,5px solid;
        }
       table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
       table th:first-child{  
        border-left:none;  
    }
       table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }
</style>
<body>
    <div class="container">
	<nav>
		<ul>
			<li style="margin-left: 50px;"><a href="dashboard.php"><i class="fas fa-home"></i>  HalramResto</a></li>
			<li style="margin-left: 450px;"><a href="menu.php"><i class="fas fa-address-book"></i>  Menu</a></li>
			<li><a href="kategori.php">Kategori</a></li>
			<li><a href ="laporan.php">Laporan</a></li>
			<li><a href="user.php">Kelola User</a></li>
			<li><a href="transaksi.php">Transaksi</a></li>
			<li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')"><i class="fa fa-share"></i>  Log Out</a></li>
		</ul>
	</nav>
	<br><br><br><br>
	<br>
	<form method="post">
		<center><table >
		<h2 style="font-family:sans-serif; color:#B31312; text-align:center; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">Laporan</h2><br><br>
			<tr>
				<td style="background-color:#B31312; color:#EEE2DE;"><input type="date" name="tgl_awal" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" placeholder="Tanggal Awal"></td>
				<td style="background-color:#B31312; color:#EEE2DE;"><input type="date" name="tgl_akhir" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" placeholder="Tanggal Akhir"></td>
				<td><input type="submit" name="filter" value="Check" style=" background-color:#B31312; color: #EEE2DE;padding: 12px 20px;border: none;border-radius: 4px;cursor: pointer;float: right;"></td>
			</tr>
		</table><br></center>
		<center><table>
			<tr>
				<th style="background-color:#B31312; color:#EEE2DE;">Nomor</th>
				<th style="background-color:#B31312; color:#EEE2DE;">Kode Transaksi</th>
				<th style="background-color:#B31312; color:#EEE2DE;">Nama Menu</th>
				<th style="background-color:#B31312; color:#EEE2DE;">Harga</th>
				<th style="background-color:#B31312; color:#EEE2DE;">Subtotal</th>
				<th style="background-color:#B31312; color:#EEE2DE;">Tanggal Transaksi</th>
				<th style="background-color:#B31312; color:#EEE2DE;">No Meja</th>
				<th style="background-color:#B31312; color:#EEE2DE;">Aksi</th>
			</tr>
			<?php 
			if(isset($_POST['filter'])){
				$tanggal_awal = $_POST['tgl_awal'];
				$tanggal_akhir = $_POST['tgl_akhir'];
				$sql = mysqli_query($conn, "SELECT * FROM laporan WHERE tgl_transaksi BETWEEN '$tanggal_awal' and '$tanggal_akhir'");
			}
			$i = 0;
			$mysql = mysqli_query($conn,"SELECT*FROM tb_transaksi");
			while ($rows = mysqli_fetch_array($mysql)) {
				$i++;
			 ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $rows[0] ?></td>
				<td><?= $rows[1] ?></td>
				<td>Rp.<?= number_format($rows[2],2,',','.');  ?></td>
				<td>Rp.<?= number_format($rows[3],2,',','.'); ?></td>
				<td><?= $rows[4] ?></td>
				<td><?= $rows[5] ?></td>
				<td><a href="cetak.php" target="_blank" style="color: #B31312;">Print</a></td>
			</tr>
		<?php } ?>
            </table></center>
	</form>
        </div>
</body>
</html>