<?php
session_start();

$conn = mysqli_connect("localhost","root","","db_restoran");
 if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn,"SELECT * FROM tb_user WHERE username ='$username' and password ='$password'");
    $cek = mysqli_num_rows($sql);
  if ($cek > 0){
  $data  = mysqli_fetch_assoc($sql);
  if ($data['level']=="admin") {
    $_SESSION['username']=$username;
    $_SESSION['level']="admin";
    echo "<script>alert('Selamat Datang $username');document.location.href='dashboard.php'</script>";
  }elseif ($data['level'] == 'kasir') {
    $_SESSION['username']=$username;
    $_SESSION['level']="kasir";
    echo "<script>alert('Selamat Datang $username');document.location.href='dash_kasir.php'</script>";
  }
}else{
    echo "<script>alert('Maaf Username/Password Anda Salah');document.location.href='index.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
	
</head>
<!-- Warna rgb(10,101,146); -->
<body>
<div class="main">
    <form method="post">
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required=""><br>
          <input class="loginsub" type="submit" name="login" value="Login">
				</form>
			</div>
	</div>
<!--div class="box">
	<form method="post">
		<h1>Form Login</h1>
		<label for="username">Username</label>
		<input type="text" name="username">
		<br>
		<label for="password">Password</label>
		<input type="password" name="password">
		<br>
		<input type="submit" name="login" value="Login" -->
		<style type="text/css">
      body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #B31312, #EEE2DE, #EA906C);
}
.main{
	width: 350px;
	height: 500px;
	background: red;
	overflow: hidden;
	background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: inline;
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 120px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	width: 60%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
.loginsub{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #B31312;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
.loginsub:hover{
	background: #EEE2DE;
  color: #B31312;
}
.login{
	height: 460px;
	background: #fff;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #B31312;
}

		</style>
	</form>
</div>
</body>
</html>