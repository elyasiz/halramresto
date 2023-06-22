<?php
session_start();
include 'config/koneksi.php';

if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "kasir") {
  header("location:dash_kasir.php");
  exit;
}
if (isset($_POST['simpan'])) {
		$sql = mysqli_query($conn,"INSERT INTO tb_user VALUES(null,'$_POST[nama]','$_POST[nohp]','$_POST[username]','$_POST[password]','$_POST[level]')");

		echo "<script>alert('Data Tersimpan');document.location.href='?menu=user'</script>";
	}
  $perintah = new oop();
  $table = "tb_user";
  $redirect = "?menu=user";
  @$where = "nama = $_GET[id]";


  /*if(isset($_POST['simpan'])) {
  	$nama = $_POST['nama'];
  	$nohp = $_POST['nohp'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];
  	$level = $_POST['level'];

  	$value = "'','$nama','$nohp','$username','$password','$level'";
  	$cek = $perintah->countWhere("username","username",$table,"username",$username);
  	if ($cek['username'] > 0) {
        echo "<script>alert('username tidak boleh sama');document.location.href='user.php'</script>";
      }
      else{
        $perintah->simpan($table,$value,"user.php");
      }
  }*/
  if(isset($_GET['edit'])){
		$sql = mysqli_query($conn,"SELECT * FROM tb_user WHERE kd_user = '$_GET[id]'");
		$edit = mysqli_fetch_array($sql);
	}
	if (isset($_POST['updateuser'])) {
		$sql = mysqli_query($conn,"UPDATE tb_user SET nama='$_POST[nama]',no_hp='$_POST[nohp]', username='$_POST[username]',password='$_POST[password]',level='$_POST[level]' WHERE kd_user='$_GET[id]'");
		if($sql){

		echo "<script>alert('Data Berhasil Terupdate');document.location.href='user.php'</script>";
		}else{
			echo printf("Error : %s\n", mysqli_error($conn));
			exit();
		}
	}
	 if(isset($_GET['hapus'])){
		$sql = mysqli_query($conn,"DELETE FROM tb_user WHERE kd_user = '$_GET[id]'");

		echo "<script>alert('Data Terhapus');document.location.href='?menu=user'</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kelola User</title>
	<style type="text/css">
	* {margin:0; padding:0;}
	nav{
	position: fixed;
	background-color: rgb(10,101,146);
	 width: 100%;
	 height: 30px;
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
    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    /* Style  button */
    input[type=submit] {
      background-color: rgb(10,101,146);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    
    }
    

    /*  labels: 25% width */
    .col-25 {
      float: left;
      width: 25%;
      margin-top: 20px;
    }

    /*  inputs: 75% width */
    .col-75 {
      float: left;
      width: 75%;
      margin-top: 20px;
    }
   
    .row:after {
      content: "";
      display: table;
      clear: both;
    }


    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
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
</head>
<body>
	<div class="container">
		<nav>
		<ul>
      <li  style="margin-left: 50px;"><a href="dashboard.php"><i class="fas fa-home"></i>    HalramResto</a></li>
			<li  style="margin-left: 450px;"><a href="menu.php"><i class="fas fa-address-book"></i>    Menu</a></li>
			<li><a href="kategori.php">Kategori</a></li>
			<li><a href ="laporan.php">Laporan</a></li>
			<li><a href="user.php">Kelola User</a></li>
			<li><a href="transaksi.php">Transaksi</a></li>
			<li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')"><i class="fa fa-share"></i>    Log Out</a></li>
	</nav>
	<br>
	<br>
	<br><br>
	<h2 style="font-family:sans-serif; color:#B31312; text-align:center; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">Kelola User</h2>
	  
      
		<center><form  method="post">
    <div class="row">
      <div class="col-25">
        <label for="nama" style="margin-left:200px; color:#B31312; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">Nama Lengkap</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #B31312; border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?php echo @$edit['nama']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="ry"  style="margin-left:200px; color:#B31312; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">No HP</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #B31312;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="ry" name="nohp" placeholder="No HP" required value="<?php echo @$edit['no_hp'];?>">
      </div>
    </div>
       <div class="row">
      <div class="col-25">
        <label for="us"  style="margin-left:200px; color:#B31312; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">Username</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #B31312;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="us" name="username" placeholder="Username" required value="<?php echo @$edit['username'];?>">
      </div>
    </div>
     <div class="row">
      <div class="col-25">
        <label for="pw"  style="margin-left:200px; color:#B31312; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">Password</label>
      </div>
      <div class="col-75">
        <input style=" width: 80%;padding: 12px;border: 1px solid #B31312;border-radius: 4px;box-sizing: border-box;resize: vertical;" type="text" id="pw" name="password" placeholder="Password" required value="<?php echo @$edit['password'];?>">
      </div>
    </div>
       <!--<div class="row">
      <div class="col-25">
        <label for="lvl">Level</label>
      </div>
      <div class="col-75">
        <input type="text" id="lvl" name="level" required>
      </div>
    </div>-->
    <div class="row">
    <div class="col-25">
    <label for="lvl"  style=" margin-left:200px; color:#B31312; font-family: -apple-system, BlinkMacSystemFont, segoe ui, roboto, oxygen, ubuntu, cantarell, fira sans, droid sans, helvetica neue, Arial, sans-serif;">Posisi</label>
	</div>
    <div class="col-75">
        <select style="color:#B31312; width: 80%;padding: 12px;border: 1px solid #B31312;border-radius: 4px;box-sizing: border-box;resize: vertical;" name="level" id="lvl" value="<?php echo @$edit[5]; ?>">
          <option>admin</option>
          <option>kasir</option>
        </select>
    </div>
  </div>
      <br>
    <div class="row">
      <input type="submit" value="Simpan" name="simpan" style="background-color:#B31312;">
      <input type="submit" name="updateuser" value="Update" style="background-color:#B31312;">
    </div>
    
   </form></center>
        <br><br>
      <br>
      <form method="post">
      <div class="s" style="float: right; margin-right:140px;">
      <input type="text" name="tcari" style="solid :#B31312; width:60%;padding:5px;box-sizing: border-box; resize: vertical; text-align: right;border-radius: 10px;" value="<?php echo @$_POST['tcari']; ?>"class="cari">
      <input type="submit" name="cari" value="Cari" style=" width: 80px; border: 0; background-color: #B31312; height: 31px; color: white; border-radius: 10px;" >
    </div>
    </form><br>
    <form>    
      <center><table align="center">
  <br>
  <br>
  <br>
    <tr align="center">
    	<th style="background-color:#B31312; color:#EEE2DE;">Kode User</th>
        <th style="background-color:#B31312; color:#EEE2DE;">Nama</th>
        <th style="background-color:#B31312; color:#EEE2DE;">No HP</th>
        <th style="background-color:#B31312; color:#EEE2DE;">Username</th>
        <th style="background-color:#B31312; color:#EEE2DE;">Password</th>
        <th style="background-color:#B31312; color:#EEE2DE;">Posisi</th>
        <th colspan="2" align="center" style="background-color:#B31312; color:#EEE2DE;">Aksi</th>

    </tr>
    <?php 	
    $sql = "SELECT * FROM q_user";
    if (isset($_POST['cari'])) {
        $sql="SELECT * FROM q_user WHERE kd_user LIKE '$_POST[tcari]%' OR nama LIKE '$_POST[tcari]%' OR no_hp LIKE '$_POST[tcari]%' OR username LIKE '$_POST[tcari]%'";
      }else{
        $sql="SELECT * FROM q_user";
      }		
 			$qry= mysqli_query($conn,$sql);
 			while($r=mysqli_fetch_array($qry)){
			?>
<tr style="background-color:#EEE2DE;">
				<td style="color:#B31312;"><?php echo $r['kd_user'];?></td>
				<td><?php echo $r['nama'];?></td>
				<td><?php echo $r['no_hp'];?></td>
				<td><?php echo $r['username'];?></td>
				<td><?php echo $r['password'];?></td>
				<td><?php echo $r['level'];?></td>
				<td><a onclick="return confirm('Yakin Ingin Menghapus?')" href="user.php?hapus&id=<?php echo $r['kd_user'];?>" style="color:#B31312;">HAPUS</a></td>
					<td><a href="user.php?edit&id=<?php echo $r['kd_user'];?>" style="color:#B31312;">EDIT</a></td>
			</tr>
			<?php } ?>
  </table></center>
  </form>

  <br>
  <br>
    </div>
</body>
</html>