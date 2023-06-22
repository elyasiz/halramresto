<?php
session_start();
if ($_SESSION['level'] == ""){
  header("location:index.php");
  exit;
}elseif ($_SESSION['level'] == "admin") {
  header("location:dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halram Resto</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<!--css navbar-->
<style type="text/css">
* {margin:0;
   padding:0;
}
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
</style>
<body>
	<div class="container">
		<nav>
		<ul>
			<li style="margin-left: 50px;"><a href="dash_kasir.php"><i class="fas fa-home"></i>  HalramResto</a></li>
			<li style="margin-left: 820px;"><a href="transaksi.php"><i class="fas fa-address-book"></i>  Transaksi</a></li>
			<li><a href="logout.php" onclick="return confirm('Apa anda yakin ?')"><i class="fa fa-share"></i>  Log Out</a></li>
		</ul>
	</nav>

	<section class="showcase-area" id="showcase">
      <div class="showcase-container">
        <h1 class="main-title" id="home">Eat Right Food</h1>
        <p style="color:#fff;">Eat good food and definitely Halram Food.</p>
      </div>
    </section>
</div>
	</div>
</body>
</html>