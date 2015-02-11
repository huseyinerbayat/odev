<?php
	$baglan=mysqli_connect("localhost","root","","odev");
	if($baglan){
		//echo "bağlandı";
	}
	
	session_start();
	if($_POST){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$bul = mysqli_query($baglan,"select * from login where username='$username' && password='$password'");
		
		$say = mysqli_num_rows($bul);
		//$ksayisi =mysqli_num_rows(mysqli_query($baglan,"select id from mesajlar"));
		if($say>0){
			$goster = mysqli_fetch_array($bul);
			$_SESSION["oturum"] = true;
			$_SESSION["username"]=$username;
			$_SESSION["password"] =$password;
			header("Location:main.php");
		}else{
			echo '<font color="red">Kullanıcı bulunamadı!!!</font>
			<a href="login.php">Geri</a>';
		}
		
	}else{
		if(isset($_SESSION["oturum"])){
		//oturum açanların görebileceği kısım
			echo 'Merhaba, Hoşgeldiniz <strong>'.$_SESSION["username"].'</strong>[<a href="cikis.php">Cıkış</a>]<br>';
			echo '<a href="main.php">Ana Sayfa</a>';
		}
	

		if(!isset($_SESSION["oturum"])){
			echo '<form action="" method="post">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td>Kullanıcı Adı:</td>
					<td><input type="text" name="username" /></td>
				</tr>
				<tr>
					<td>Şifre:</td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Giriş" /></td>
				</tr>
			</table>
			</form>';
		}
		
	}
	

?>