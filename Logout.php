<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		session_destroy();
		echo "<script>alert('로그아웃 되었습니다.'); location.replace('home.php');</script>";
	?>
</body>
</html> 