<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		$id=$_POST['id'];
		$nick=$_POST['nick'];
		$password=$_POST['password'];
		$passwordCheck=$_POST['passwordCheck'];
		$birth=(int)($_POST['year'].$_POST['month'].$_POST['day']);
		$gender=$_POST['gender'];
		$phone=(int)($_POST['phone1'].$_POST['phone2']);
		$email=$_POST['email'];
		$dog=(int)($_POST['dog']);
		$cat=(int)($_POST['cat']);
		$etc1Name=".";
		$etc1Name=$_POST['etc1_name'];
		$etc1=(int)($_POST['etc1']);
		$etc2Name=".";
		$etc2Name=$_POST['etc2_name'];
		$etc2=(int)($_POST['etc2']);
		

		$db=mysqli_connect('10.200.38.43', '1111', '1234', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit;
		}


		if($id==NULL){
			echo "<script>alert('ID를 적어주세요.');history.back(-1);</script>";
			exit;
		}

		$check_id="SELECT * FROM Users WHERE UserID='$id'";
		$result_id=$db->query($check_id);
		if($result_id->num_rows==1 ){
			echo "<script> alert('중복된 아이디입니다.');history.back(-1);</script>";
			exit;
		}


		if($nick==NULL){
			echo "<script>alert('닉네임을 적어주세요.');history.back(-1);</script>";
			exit;
		}
		$check_nick="SELECT * FROM Users WHERE Nickname='$nick'";
		$result_nick=$db->query($check_nick);
		$row=mysqli_fetch_assoc($result_nick);
		
		if($result_nick->num_rows==1){
			echo "<script>alert('중복된 닉네임입니다.');history.back(-1);</script>";
			exit;
		}


		if($password!=$passwordCheck){
			echo "<script>alert('비밀번호가 다릅니다.');history.back(-1);</script>";
			exit;

		}
		else{
			$password=md5($_POST['password']);
		}
		if($id==NULL){
			echo "<script>alert('id 빈칸.');history.back(-1);</script>";
		}
		if($id==NULL || $nick==NULL || $password==NULL || $birth==NULL || $phone==NULL || $email==NULL){
			echo "<script>alert('빈칸을 모두 채워주세요.');history.back(-1);</script>";
			exit;

		}

		if(strlen($_POST['phone1'])!=4 || strlen($_POST['phone2'])!=4 ||!(is_numeric($_POST['phone1'])) ||!(is_numeric($_POST['phone2']))){
			echo "<script>alert('전화번호를 다시 입력해주세요.');history.back(-1);</script>";
			exit;

		}

		$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
		if($checkEmail!=true){
			echo "<script>alert('이메일 주소를 다시 입력해 주세요.');history.back(-1);</script>";
			exit;

		}
		
		$sql="INSERT INTO Users(UserID, Nickname, Password, Birth, Gender, PhoneNumber, Email, Dog, Cat, etc1,etc2 ,etc1_name,etc2_name) VALUES ('$id', '$nick', '$password', '$birth','$gender', '$phone','$email', '$dog', '$cat', '$etc1', '$etc2', '$etc1Name', '$etc2Name')";

		if(mysqli_query($db, $sql)){
			echo "<script>alert('회원가입에 성공하였습니다.'); location.replace('LoginPage.php'); </script>";
			exit;

		}
		else {
			echo "<script>alert('회원가입에 실패하셨습니다.'); history.back();</script>";
			exit;

		}
	?>
</body>
</html> 