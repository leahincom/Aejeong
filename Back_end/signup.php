 FROM Users WHERE UserID='$id'";
		$result_id=$db->query($check_id);
		if($result_id->num_rows==1){
			echo "중복된 아이디입니다.";
			echo "<a herf=singup.html>back page</a>";
			exit();
		}
		else {
			echo "사용 가능한 아이디입니다.";
		}
		$check_nick="SELECT * FROM Users WHERE Nickname='$nick'";
		$result_nick=$db->query($check_nick);
		if($result_id->num_rows==2){
			echo "중복된 닉네임입니다.";
			echo "<a herf=singup.html>back page</a>";
			exit();
		}
		else {
			echo "사용 가능한 닉네임입니다.";
		}
		$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
		if($checkEmail!=true){
			echo "이메일 주소를 다시 입력해 주십시오.";
			exit();
		}
		$sql="INSERT INTO Users(UserID, Nickname, Password, Birth, Gender, PhoneNumber, Email, Dog, Cat, etc1Name, etc1, etc2Name, etc2)";
		$sql=$sql." VALUES ('$id','$nick','$password','$birth','$gender','$phone','$email','$dog','$cat','$ etc1name','$etc1','$ etc2name','$etc2')";
		if($mysqli->query($sql)){
			echo "회원가입에 성공하셨습니다.";
		}
		else {
			echo "회원가입에 실패하셨습니다.";
		}
	?>
</body>
</html>
