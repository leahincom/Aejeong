<!DOCTYPE html>
<html>

<head>
<title> Review </title>
</head>

<body>
	<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

    $Nickname=$_POST['Nickname'];
		$Advantage=$_POST['Advantage'];
		$Weakness=$_POST['Weakness'];
		$Etc=$_POST['Etc'];

		$db=mysqli_connect('localhost', 'root', 'skwjdgus', 'aejeong');
		if(mysqli_connect_errno()){
			echo "<p>Error: Could not connect to database. <br/>Please try again later.</p>";
			exit();
		}
    if($Advantage==NULL || $Weakness==NULL || $Etc==NULL ){
			echo "<script>alert('내용을 입력하세요.');history.back(-1);</script>";
			exit;
		}
    else {
				mysqli_query($db,"UPDATE Users SET Nickname='$nick' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Password='$password' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Birth='$birth' WHERE UserID='$id'");
		      echo "<script>alert('리뷰가 작성되었습니다.'); location.replace('myReview.html'); </script>";
  			exit;
  	}
	?>
</body>

</html>
