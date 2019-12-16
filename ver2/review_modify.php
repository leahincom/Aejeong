<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('192.168.0.17:3306', '1111', '1234', 'aejeong');
    $rowNick=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
$row=mysqli_fetch_assoc($rowNick);
$Nickname=$row['Nickname'];
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
		$ItemName = $_GET['item'];
		$Date = date("Y-n-j");
		$Rating = (float)($_POST['Rating']);
		$Advantage = $_POST['Advantage'];
		$Weakness  = $_POST['Weakness'];
		$Etc = $_POST['Etc'];

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
