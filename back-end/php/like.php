<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();}
    		$id=$_SESSION['UserID'];
		$item=$_GET['item'];
    		$db=mysqli_connect('10.200.38.43', '1111', '1234', 'aejeong');
		$result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    		$row=mysqli_fetch_assoc($result);
		$nick=$row['Nickname'];

    		$check="SELECT * FROM items WHERE Picture='$item'";
		$result=$db->query($check);
		$row=mysqli_fetch_assoc($result);
    		$name=$row['ItemName'];

		if($result->num_rows==1){
			$sql="DELETE FROM likes WHERE Nickname='$nick' AND ItemName='$name'"; 
			mysqli_query($db, $sql);
			echo "<script>location.replace('goodsInfo.php?item=<?php echo $row['Picture'];?>');</script>";
		}
		else {
			$sql="INSERT INTO likes(Nickname, ItemName, Picture) VALUES ('$nick' ,'$name' ,'$item')"; 
			mysqli_query($db, $sql);
			echo "<script>location.replace("goodsInfo.php?item=<?php echo $row['Picture'];?>");</script>";
		}
	?>
</body>
</html> 