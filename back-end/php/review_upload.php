<!DOCTYPE html>
<html>

<head>
<title> review </title>
</head>

<body>
	<?php
		$Nickname=$_POST['Nickname'];
		$Advantage=$_POST['Advantage'];
		$Weakness=$_POST['Weakness'];
		$Etc=$_POST['Etc'];

		$db=mysqli_connect('localhost', 'root', 'skwjdgus', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit;
		}

		if($Advantage==NULL || $Weakness==NULL || $Etc==NULL ){
			echo "<script>alert('내용을 입력하세요.');history.back(-1);</script>";
			exit;
		}

		$sql="INSERT INTO Reviews(Nickname, Advantage, Weakness, Etc)
		VALUES ('$Nickname', '$Advantage', '$Weakness', '$Etc')";

		if(mysqli_query($db, $sql)){
			echo "<script>alert('리뷰가 작성되었습니다.'); location.replace('myReview.html'); </script>";
			exit;
		}
	?>
</body>
</html>
