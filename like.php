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
    		$db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');
		$result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
		$row=mysqli_fetch_assoc($result);
		$nick=$row['Nickname'];

		$result1=mysqli_query($db, "SELECT * FROM items WHERE Picture='$item'");
		$row1=mysqli_fetch_assoc($result1);
    		$name=$row1['ItemName'];

		
		$result2=$db->query("SELECT * FROM items WHERE Nickname='$nick' AND ItemName='$name'");
		

		if(!(isset($result2->num_rows))){
			$sql="DELETE FROM likes WHERE Nickname='$nick' AND ItemName='$name'"; 
			mysqli_query($db, $sql);
			echo "삭제되었습니다.";
		} 
		if(mysqli_query($db, "INSERT INTO likes(Nickname, ItemName, Picture) VALUES ('$nick' ,'$name' ,'$item')")){
			echo "저장되었습니다.";
		}
		else{ echo $item.$nick."오류"; }
	?>
</body>
</html> 