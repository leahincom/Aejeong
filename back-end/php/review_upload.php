<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$UserID'");
    $row=mysqli_fetch_assoc($result);
?>
<head>
<title> review </title>
</head>

<body>
	<?php
$Nickname = $row['Nickname'];
$ItemName = $_POST['ItemName'];
$Date = $_POST['Date'];
$Advantage = $_POST['Advantage'];
$Weakness  = $_POST['Weakness'];
$Etc = $_POST['Etc'];
		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database.<br/>
				Please try again later.</p>';
			exit;
		}
		if($Rating == NULL || $Advantage==NULL || $Weakness==NULL || $Etc==NULL ){
			echo "<script>alert('내용을 입력하세요.');
			history.back(-1); </script>";
			exit;
		}
		$sql="INSERT INTO Reviews(Nickname, ItemName, Date, Rating, Advantage, Weakness, Etc)
		VALUES ('$Nickname', '$ItemName', '$Date', '$Rating', '$Advantage', '$Weakness', '$Etc')";
		if(mysqli_query($db, $sql)){
			echo "<script>alert('리뷰가 작성되었습니다.');
			location.replace('myReview.php'); </script>";
			exit;
		}
	?>
</body>
</html>
