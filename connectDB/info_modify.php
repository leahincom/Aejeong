<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		if (session_status() == PHP_SESSION_NONE) {	
			session_start();
		}

		$nick=$_POST['nick'];
		$password;
		$passwordCheck;
		$birth=(int)($_POST['year'].$_POST['month'].$_POST['day']);
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$dog=(int)($_POST['dog']);
		$cat=(int)($_POST['cat']);
		$etc1Name=".";
		$etc1Name=$_POST['etc1_name'];
		$etc1=(int)($_POST['etc1']);
		$etc2Name=".";
		$etc2Name=$_POST['etc2_name'];
		$etc2=(int)($_POST['etc2']);

		$db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo "<p>Error: Could not connect to database. <br/>Please try again later.</p>";
			exit();
		}

		$id=$_SESSION['UserID'];

		if(isset($_SESSION['UserID'])){
			$result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    			$row=mysqli_fetch_assoc($result);

			$check_nick="SELECT * FROM Users WHERE Nickname='$nick'";
			$result_nick=$db->query($check_nick);
			$row1=mysqli_fetch_assoc($result_nick);
			if($result_nick->num_rows==1){
				if($nick==$row['Nickname']){
				}
				else{
					echo "<script>alert('중복된 닉네임입니다.');history.back(-1);</script>";
					exit;
				}
			}
			
			$state=0;
			if(empty($_POST['password'])){
				$state=1;
			}
			else {
				$password=$_POST['password'];
				$passwordCheck=$_POST['passwordCheck'];
				if($password!=$passwordCheck){
					echo "<script>alert('비밀번호가 다릅니다.');history.back(-1);</script>";
					exit();
				}
				else if ($password==$passwordCheck){
					$password=md5($_POST['password']);
				}
			}

			if(strlen($_POST['phone1'])!=4 || strlen($_POST['phone2'])!=4 ||!(is_numeric($_POST['phone1'])) ||!(is_numeric($_POST['phone2']))){
				echo "<script>alert('전화번호를 다시 입력해주세요..');history.back(-1);</script>";
				exit();
			}
			else{
				$phone=(int)($_POST['phone1'].$_POST['phone2']);
			}

			$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
			if($checkEmail!=true){
			echo "<script>alert('이메일 주소를 다시 입력해 주세요.');history.back(-1);</script>";
			exit();
			}

			if($nick==NULL || $birth==NULL || $phone==NULL || $email==NULL){
			echo "<script>alert('빈칸을 모두 채워주세요.');history.back(-1);</script>";
			exit();
			}
			
		

			if($state==0){
				mysqli_query($db,"UPDATE Users SET Nickname='$nick' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Password='$password' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Birth='$birth' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Gender='$gender' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET PhoneNumber='$phone' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Email='$email' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Dog='$dog' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Cat='$cat' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc1_name='$etc1Name' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc1='$etc1' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc2_name='$etc2Name' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc2='$etc2' WHERE UserID='$id'");
				$state=1;
			}
			else{
				mysqli_query($db,"UPDATE Users SET Nickname='$nick' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Birth='$birth' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Gender='$gender' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET PhoneNumber='$phone' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Email='$email' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Dog='$dog' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET Cat='$cat' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc1_name='$etc1Name' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc1='$etc1' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc2_name='$etc2Name' WHERE UserID='$id'");
				mysqli_query($db,"UPDATE Users SET etc2='$etc2' WHERE UserID='$id'");
				$state=1;
			}
			if($state==1){
				echo "<script>alert('성공적으로 변경되었습니다.'); location.replace('LoginHome.php'); </script>";
				exit();
			}
			else {
				echo "<script>alert('정보 수정에 실패했습니다.');history.back(-1);</script>";
				exit();
			}
		}
				

	?>
</body>

</html>