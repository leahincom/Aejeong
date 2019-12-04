<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $Nickname=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$UserID'");
    $result=mysqli_query($db, "SELECT * FROM Reviews WHERE Nickname='$Nickname'");
    $row=mysqli_fetch_assoc($result);
?>
<head>
<title> Review </title>
</head>

<body>
	<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		$Nickname = $row['Nickname'];
		$ItemName = $row['ItemName'];
		$Date = $row['Date'];
		$Advantage = $_POST['Advantage'];
		$Weakness  = $_POST['Weakness'];
		$Etc = $_POST['Etc'];

		$db=mysqli_connect('localhost', 'root', 'skwjdgus', 'aejeong');
		if(mysqli_connect_errno()){
			echo "<p>Error: Could not connect to database. <br/>Please try again later.</p>";
			exit();
		}
    if($Rating == NULL || $Advantage==NULL || $Weakness==NULL || $Etc==NULL ){
			echo "<script>alert('내용을 입력하세요.');history.back(-1);</script>";
			exit;
		}
    else {
				mysqli_query($db,"UPDATE Reviews SET Rating='$Rating' WHERE Nickname='$Nickname'");
				mysqli_query($db,"UPDATE Reviews SET Advantage='$Advantage' WHERE Nickname='$Nickname'");
				mysqli_query($db,"UPDATE Reviews SET Weakness='$Weakness' WHERE Nickname='$Nickname'");
				mysqli_query($db,"UPDATE Reviews SET Etc='$Etc' WHERE Nickname='$Nickname'");
		      echo "<script>alert('리뷰가 수정되었습니다.'); location.replace('myReview.php'); </script>";
  			exit;
  	}
	?>
</body>

</html>
