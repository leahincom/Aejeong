<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>
<head>
<title> review </title>
</head>

<body>
	<?php
$Nickname = $row['Nickname'];
$ItemName = $_GET['item'];
$Rating = (float)($_POST['Rating']);
$Date = date("Y-n-j");
$Advantage = $_POST['Advantage'];
$Weakness  = $_POST['Weakness'];
$Etc = $_POST['Etc'];


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
		$sql = "INSERT INTO reviews(Nickname, ItemName, Date, Rating, Advantage, Weakness, Etc) VALUES ('$Nickname', '$ItemName', now(), $Rating, '$Advantage', '$Weakness', '$Etc')";
		if(mysqli_query($db, $sql)){
			echo "<script>alert('리뷰가 작성되었습니다.');
			location.replace('myReview.php'); </script>";
			exit;
		}
		else{
			echo $_GET['item'];
		}
	?>
</body>
</html>
