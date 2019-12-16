<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>애정 : 회원가입</title>
    <link rel="stylesheet" href="signupStyle.css?after">
</head>


<body>
    <section>
        <h1>회원가입</h1>
	<form name="singup" action="singup.php" method="post">
        <p>
            아이디
            <input class="id_nick_input" type="text" name="id" id="id">
        </p>
        <p>
            닉네임
            <input class="id_nick_input" type="text" name="nick">
        </p>
	
        <p>
            비밀번호
            <input id="password_input" type="password" name="password">
        </p>
        <p>
            비밀번호 확인
            <input id="passwordCheck_input" type="password" name="passwordCheck">
        </p>
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
            <input id="email_input" type="text" name="email">
        </p>
        <article>
            <p id="animalType_text">동물 가족 :</p>
            <div id="animalType_div">
                <p>
                    강아지
                    <select class="animal_count" name="dog">
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
                    <input class="other_animal_input" type="text" name="etc1_name" value=''>
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
                    <input class="other_animal_input" type="text" name="etc2_name" value''>
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
	<button id="signup_button" type="submit">가입하기</button>
    </section>
    </form>
</body>

</html>
