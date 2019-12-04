<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title> 애정 : 메인 홈페이지</title>
    <link rel="stylesheet" href="homeStyle.css?after">
</head>
<body>
    <section id="search_bar">
      <p>
        <button class="search_bar_button" id="logo_icon" onclick="location.href='LoginHome.php'"><img src="picture/whitelogo.png"  width="60%"></button>
        <wrapper>
	  <form action="Logout.php">
          <input type="text" id="search_text">
          <button class="search_bar_button" id="micro_icon"><img src="picture/micro.png" width="45%"></button>
          <button class="search_bar_button" id="login_button"><b>로그아웃</b></button>
	  </form>
        </wrapper>
      </p>
  </section>
    <section class="center_align_section" id="app_info_section">
        <img id="app_info" src="picture\home_pets.jpeg" border="3">
    </section>
    <section class="center_align_section">
        <form method="post" action="search.php">
            <input name = "search_text" id="search" type="text" value="제품 혹은 브랜드명을 입력하세요." />
        </form>
    </section>
    <section>
        <table cellpadding="10">
            <tr>
                <td>
                    <button class="img_button">
                        <img src="picture\category1.png" class="category_images" height="30" width="30">
                        <p>샴푸, 치약 등 <br> <b>세정제</b></p>
                    </button>
                </td>
                <td>
                    <button class="img_button">
                        <img src="picture\category2.png" class="category_images" height="30" width="30">
                        <p>연고, 구충제 등 <br> <b>의약품</b></p>
                    </button>
                </td>
                <td>
                    <button class="img_button">
                        <img src="picture\category3.png" class="category_images" height="30" width="30">
                        <p>소독제, 탈취제 등 <br> <b>소독제</b></p>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="img_button">
                        <img src="picture\category4.png" class="category_images" height="30" width="30">
                        <p>로션, 안약 등 <br> <b>화장품</b></p>
                    </button>
                </td>
                <td>
                    <button class="img_button">
                        <img src="picture\category5.png" class="category_images" height="30" width="30">
                        <p>기저귀 등 <br> <b>패드</b></p>
                    </button>
                </td>
                <td>
                    <button class="img_button">
                        <img src="picture\category6.png" class="category_images" height="30" width="30">
                        <p><b>기타</b></p>
                    </button>

                </td>
            </tr>
        </table>
    </section>

    <section id="bottom_bar">
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture\category_icon.png" height="35" width="35"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture\home_icon.png" height="35" width="70"></button>
    <button class="bottom_bar_button" id="myPage_icon" onclick="location.href='myPage.php'"><img src="picture\myPage_icon.png" height="35" width="35"></button>
  </section>

</body>
</html>