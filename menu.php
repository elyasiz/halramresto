<?php 

include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $tmp = $_FILES['foto']['tmp_name'];
  $folder = "image/";
  $nama_file = $_FILES['foto']['name'];

  move_uploaded_file($tmp,"$folder/$nama_file");
  $a = mysqli_query($conn, "INSERT INTO tb_menu VALUES(null,'$_POST[menu]','$_POST[jenis]','$_POST[harga]','$_POST[status]','$nama_file','$_POST[kategori]')");
  echo "<script>alert('Berhasil Tersimpan');document.location.href='?menu=menu'</script>";
}

if (isset($_GET['hapus'])) {
  $b = mysqli_query($conn,"DELETE FROM tb_menu WHERE kd_menu = '$_GET[id]'");
  echo "<script>alert('Berhasil Dihapus');document.location.href='?menu=menu''</script>";
}

if (isset($_GET['edit'])) {
  $edit = "SELECT * FROM tb_menu WHERE kd_menu = '$_GET[id]'";
  $take = mysqli_query($conn,$edit);
    $ambil = mysqli_fetch_array($take);
}

if(isset($_POST['update'])){
  $tmp = $_FILES['foto']['tmp_name'];
  $folder = "image/";
  $nama_file = $_FILES['foto']['name'];

  move_uploaded_file($tmp,"$folder/$nama_file");
  $c = mysqli_query($conn,"UPDATE tb_menu SET menu = '$_POST[menu]', jenis = '$_POST[jenis]',harga = '$_POST[harga]', status = '$_POST[status]', foto = '$nama_file', kategori = '$_POST[kategori]' WHERE menu = '$_POST[menu]'");
  echo "<script>alert('Berhasil Diubah');document.location.href='?menu=menu''</script>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>transaksi</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<style type="text/css">
* {margin:0; padding:0;}
nav{
  position: fixed;
  background-color: rgb(10,101,146);
   width: 100%;
   height: 50px;
   font-family: sans-serif;  
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
  .button{
    background-color:#EEE2DE;
     border:none;
     color:#B31312;
     width: 90px;
     height: 30px;
     border-radius: 10px;
  }
  .button:hover{
    background-color:#EA906C;
    color: white;
  }
   table tr {
      text-align: center;
      padding-left: 20px;
    }
        td,th{
            color:black;
        }
        table th {
      padding: 10px 40px;
      border-left:0,5px solid black;
      border-bottom: 0,5px solid #000;
      background: #bdbdbd ;
    }
</style>
<body>
  <nav>
    <ul>
      <li style="margin-left: 50px;"><a href="dashboard.php"><i class="fas fa-home"></i>    HalramResto</a></li>
      <li style="margin-left: 450px;"><a href="menu.php"><i class="fas fa-address-book"></i>  Menu</a></li>
      <li><a href="kategori.php">Kategori</a></li>
      <li><a href ="laporan.php">Laporan</a></li>
      <li><a href="user.php">Kelola User</a></li>
      <li><a href="transaksi.php">Transaksi</a></li>
      <li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')"><i class="fa fa-share"></i>  Log Out</a></li>
    </ul>
  </nav>
  <br>
  <br><br>
  <h2 style="text-align:center; margin-top: 30px; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif; color:#B31312;">Kelola Menu</h2>
    <br><br>
    <center><form method="post" enctype="multipart/form-data">
      <table align="center" style="background-color: #B31312; border-radius: 10px;">
        <tr>
          <td style="color: #EEE2DE;">Menu</td>
          <td><input type="text" name="menu" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[1];?>"></td>
        </tr>
        <tr>
          <td style="color: #EEE2DE;">Jenis</td>
          <td style="color: #EEE2DE;"><select name="jenis" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
              <option>Makanan</option>
              <option>Minuman</option>
          </select></td>
        </tr>
        <tr>
          <td style="color: #EEE2DE;">Harga</td>
          <td><input type="text" name="harga" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[3];?>"></td>
        </tr>
        <tr>
          <td style="color: #EEE2DE;">Status</td>
          <td><input type="text" name="status" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[4];?>"></td>
        </tr>
        <tr>
          <td style="color: #EEE2DE;">Foto</td>
          <td style="color: #EEE2DE;"><input type="file" name="foto" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;" value="<?php echo @$ambil[5];?>"></td>
        </tr>
        <tr>
          <td style="color: #EEE2DE;">Kategori</td>
          <td>
            <select name="kategori" style=" width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;">
            <?php 
            $i = 0;
            $a = "SELECT * FROM tb_kategori";
            $b = mysqli_query($conn,$a);
            while ($row = mysqli_fetch_array($b)) {
              $i++;
             ?>
            <option value="<?= $row[0];?>"><?= $row[1];?></option>
          <?php } ?>
          </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td><br><input type="submit" name="simpan" value="Simpan" class="button" style="margin-right: 10px"></td>
        </tr>
      </table><br>
      <div align="center">
      <td><input type="text" name="tcari" style="background-color:#EEE2DE; margin-left: 100px;margin-right: 10px; margin-top: 30px; width: 320px; height: 30px; border-radius: 10px" placeholder=" Cari Kode" value="<?php echo @$_POST['tcari']; ?>" class="cari" ><input type="submit" name="cari" class="button" value="Search"></td>
    </div>
    </form>
    <form method="post">
      <table cellpadding="10" border="1" style="margin-top: 30px;border-collapse: collapse; " align="center">
        <tr>
          <th style="background-color:#B31312; color:#EEE2DE;">Kode Menu</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Menu</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Jenis</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Harga</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Status</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Foto</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Kode Kategori</th>
          <th style="background-color:#B31312; color:#EEE2DE;">Aksi</th>
        </tr>
        <?php
          $sql = "SELECT * FROM tb_menu";
          if (isset($_POST['cari'])) {
              $sql="SELECT * FROM tb_menu WHERE kd_menu LIKE '$_POST[tcari]%' OR menu LIKE '$_POST[tcari]%' OR jenis LIKE '$_POST[tcari]%' OR harga LIKE '$_POST[tcari]%' OR status LIKE '$_POST[tcari]%'";
            }else{
              $sql="SELECT * FROM tb_menu";
            }
          $qry = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($qry)){
          ?>
        <tr>
          <td style="color:#B31312;"><?php echo $row[0]; ?></td>
          <td><?php echo $row[1]; ?></td>
          <td><?php echo $row[2]; ?></td>
          <td>Rp.<?= number_format($row[3],2,',','.'); ?></td>
          <td><?php echo $row[4]; ?></td>
          <td><img src="image/<?php echo $row[5];?>" style="width: 90px; height: 50px;"></td>
          <td><?php echo $row[6]; ?></td>
          <td><a href="?menu=menu&edit&id=<?php echo $row[0];?>"style="color:#B31312;">Edit</a> | <a href="?menu=menu&hapus&id=<?php echo $row[0];?>"style="color:#B31312;">Hapus</a></td>
        </tr>
      <?php } ?>
      </table>
    </form></center>
</body>
</html>