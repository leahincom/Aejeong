<!DOCTYPE html>
<html>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<head>
<title> Login </title>
</head>

<body>
	<?php
		$_SESSION['UserID']=$_POST['id'];
		$id=$_POST['id'];
		$password=$_POST['password'];
		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo "<p>Error: Could not connect to database. <br/>Please try again later.</p>";
			exit();
		}
		$query = "SELECT * FROM Users WHERE UserID='$id'";
		$result = $db->query($query);
		if(mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
			if($row['Password']==md5($password)){
				$_SESSION['UserID']=$id;
				if(isset($_SESSION['UserID'])){
				?>	<script>
						alert("로그인 되었습니다."); location.replace('LoginHome.php');
					</script>
	<?php
				}
			}
			else {
			?>	<script>
					alert("아이디 혹은 비밀번호가 잘못되었습니다.");
					history.back();
				</script>
	<?php
			}
		}
		else {
		?>	<script>
				alert("아이디 혹은 비밀번호가 잘못되었습니다.");
				history.back();
			</script>
<?php
		}
		$db->close();
	?>
</body>

</html>