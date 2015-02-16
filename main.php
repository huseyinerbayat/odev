<?php
	$baglan=mysqli_connect("localhost","root","","odev");
	if($baglan){
		//burası üste denememe eklenti
		//echo "bağlandı";
		//denemememememm denememem
	}
?>

<html>
	<head>
		<title>Ana Sayfa</title>
	</head>
	<body>
		<?php
			session_start();
			$username = $_SESSION["username"];
			echo "Hoşgeldiniz <b>$username</b><br>";
		?>
	</body>
</html>
