<!DOCTYPE html>
<html>

<head>
<title> Like </title>
</head>

<body>
	<?php
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();}
    		$id=$_SESSION['UserID'];
		$item=$_GET['item'];
    	$db=mysqli_connect('10.200.39.231:3306', '1111', '1234', 'aejeong');
		$result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
		$row=mysqli_fetch_assoc($result);
		$nick=$row['Nickname'];

		$result1=mysqli_query($db, "SELECT * FROM items WHERE Picture='$item'");
		$row1=mysqli_fetch_assoc($result1);
    	$name=$row1['ItemName'];

		
		$result2=$db->query("SELECT * FROM likes WHERE Nickname='$nick' AND ItemName='$name'");
		

		if($result2->num_rows==1){
			$sql="DELETE FROM likes WHERE Nickname='$nick' AND ItemName='$name'"; 
			mysqli_query($db, $sql);
		} 
		else{
		 if(mysqli_query($db, "INSERT INTO likes(Nickname, ItemName, Picture) VALUES ('$nick' ,'$name' ,'$item')")){
		 }
		}
		echo "<script> history.back(); </script>";
	?>
</body>
</html> 