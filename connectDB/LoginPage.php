<!DOCTYPE html>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }  
    $_SESSION['UserID']="0" ?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title> 애정 : 로그인</title>
    <link rel="stylesheet" href="login_signup_Style.css?after">
</head>
<body>
    <section id="logo_section">
        <img id="logo_img" src="picture/whitelogo.png">
    </section>
    <section>
        <h1>로그인</h1>
        <article>
            <form method="post" action="login.php" name="login">
                <p> 아이디 &nbsp &nbsp  <input class="login_input" type="text" name="id" /></p>
                <p> 비밀번호  <input class="login_input" type="password" name="password" /></p>
            <button type="submit" id="login_button">로그인 하기</button>
	    </form>
        </article>
    </section>
    <section id="singup_section">
        <a href="signupPage.php">아직 아이디가 없으신가요? </a>
    </section>
</body>
</html>