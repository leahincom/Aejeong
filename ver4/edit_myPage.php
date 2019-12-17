<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.39.231:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>

<head>
    <title> 애정 : 개인정보 수정</title>
    <link rel="stylesheet" href="signupStyle.css">
	<script type="text/javascript">
		var flag=0;
		function password_switch(){
			var able = document.getElementById('password_change_article');
			var disable = document.getElementById('password_change_shadow');
			if(flag==0){
				able.style.display = 'block';
				disable.style.display ='none';
				flag=1;
			}else{
				able.style.display = 'none';
				disable.style.display ='block';
				flag=0;
			}
			
		}
	</script>
</head>


<body>
	<section id="back_bar">
		<button id="back_icon"><img src="picture/back_button.png" onclick="location.href='myPage.php'"></button>
		<label id="explain_label"><b>개인정보 수정</b></label>
    </section>
  
    <section>
	<form name="edit" action="info_modify.php" method="post">  
        <h1>개인정보 수정</h1>
        <p>
            아이디 &nbsp :&nbsp <?php echo "$id";?>
        </p>
        <p>
            닉네임 &nbsp :&nbsp <?php echo $row['Nickname']; ?>
        </p>
        <p>
            <button type="button" id="password_change_button" onclick="password_switch()">비밀번호 수정</button>
        </p>
		<article id="password_change_shadow">
            <p>
                비밀번호
                <input id="password_change_input" type="password"id="password" disabled>
            </p>
            <p>
                비밀번호 확인
                <input id="passwordCheck_change_input" type="password" disabled>
            </p>
        </article>
        <article id="password_change_article">
            <p>
                비밀번호
                <input id="password_change_input" type="password" name="password" id="password">
            </p>
            <p>
                비밀번호 확인
                <input id="passwordCheck_change_input" type="password" name="passwordCheck">
            </p>
        </article>
        <p>
            생년월일
            <input class="date_inputtext" type="text" placeholder="년" name="year">
            <input class="date_inputtext" type="text" placeholder="월" name="month">
            <input class="date_inputtext" type="text" placeholder="일" name="day">
            성별
            <select name="gender">
                <option> 여 </option>
                <option> 남 </option>
                <option> 기타 </option>
            </select>
        </p>
        <p>
            전화 번호
            &nbsp;&nbsp;
            010
            -
            <input class="callNum_input" type="text" name="phone1">
            -
            <input class="callNum_input" type="text" name="phone2">
        </p>
        <p>
            이메일
            <input id="email_input" type="text" name="email" value="<?php echo $row['Email']; ?>" >
        </p>
        <article>
            <p id="animalType_text">동물 가족 :</p>
            <div id="animalType_div">
                <p>
                    강아지
                    <select class="animal_count" name="dog" >
                        <option> 0 </option>
                        <option> 1 </option>
                        <option> 2 </option>
                        <option> 3 </option>
                        <option> 4~ </option>
                    </select>
                    마리
                </p>
                <p>
                    고양이
                    <select class="animal_count" name="cat">
                        <option> 0 </option>
                        <option> 1 </option>
                        <option> 2 </option>
                        <option> 3 </option>
                        <option> 4~ </option>
                    </select>
                    마리
                </p>
                <p>
                    <input class="other_animal_input" type="text" name="etc1_name" >
                    <select class="animal_count" name="etc1" >
                        <option> 0 </option>
                        <option> 1 </option>
                        <option> 2 </option>
                        <option> 3 </option>
                        <option> 4~ </option>
                    </select>
                    마리
                </p>
                <p>
                    <input class="other_animal_input" type="text" name="etc2_name" >
                    <select class="animal_count" name="etc2">
                        <option> 0 </option>
                        <option> 1 </option>
                        <option> 2 </option>
                        <option> 3 </option>
                        <option> 4~ </option>
                    </select>
                    마리
                </p>
            </div>
        </article>
    </section>
    <section>
	<button class="cancel_store_button" type="submit"> 저장 </button>
	<button class="cancel_store_button" type="button" onclick="history.back(-1);"> 취소 </button> 
    </section>
    </form>
</body>

</html>
