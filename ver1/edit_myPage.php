<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>

<head>
    <title> 애정 : 개인정보 수정</title>
    <link rel="stylesheet" href="login_signup_Style.css?after">
</head>


<body>
  <section id="back_bar"> <!--윗배너 생성-->
      <button id="back_icon" onclick="location.href='myPage.php'"><img src="picture/back_button.png" width="50%"></button>
      <label id="explain_label"><b>개인정보 수정</b></label>
  </section>
    <section>
	<form name="edit" action="info_modify.php" method="post">  
        <h1>개인정보 수정</h1>
        <p>
            아이디 &nbsp :&nbsp <?php echo "$id";?>
        </p>
        <p>
            닉네임
            <input class="id_nick_input" type="text" id="nick" name="nick" value="<?php echo $row['Nickname']; ?>">
        </p>
        <p>
            <button id="password_change_button">비밀번호 수정</button>
        </p>
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
            <input id="email_input" type="text" name="email" >
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
                    <input class="other_animal_input" type="text" name="etc1_name">
                    <select class="animal_count" name="etc1">
                        <option> 0 </option>
                        <option> 1 </option>
                        <option> 2 </option>
                        <option> 3 </option>
                        <option> 4~ </option>
                    </select>
                    마리
                </p>
                <p>
                    <input class="other_animal_input" type="text" name="etc2_name">
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
	<button class="cancel_store_button"> 취소 </button> 
    </section>
    </form>
</body>

</html>
