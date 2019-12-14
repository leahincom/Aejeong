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
    <link rel="stylesheet" href="homeStyle.css?ver=1">
    <script type="text/javascript">
        function sendTest(index) {
            location.href = "productList.php?" + index;
        }
    </script>
</head>
<body>
    <section id="search_bar">
      <p>
        <button class="search_bar_button" id="logo_icon" onclick="location.href='LoginHome.php'"><img src="picture/whitelogo.png"  width="60%"></button>
        <wrapper>
          <form method="post" action="search.php">
          <input type="text" id="search_text" name="search_text">
          <button type="submit" class="search_bar_button" id="micro_icon"><img src="picture/micro.png" width="45%"></button>
          <button type="button" id="login_button" onclick="location.href='Logout.php'"><b>로그아웃</b></button>
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
    <p class="border3p"></p>
    <section>
            <table >
                <tr>
                    <td>
                        <button class="img_button" type="button" onclick="location.href = 'productList.php?category1=목욕/세정제'">
                            <img src="picture\category4.png" class="category_images">
                            <p>샴푸, 치약 등 <br> <b>목욕/세정제</b></p>
                        </button>
                    </td>
                    <td>
                        <button class="img_button" type="button" onclick="location.href = 'productList.php?category1=미용'">
                            <img src="picture\category3.png" class="category_images">
                            <p>에센스, 염색 등 <br> <b>미용/관리</b></p>
                        </button>
                    </td>
                    <td>
                        <button class="img_button" type="button" onclick="location.href = 'productList.php?category1=건강'">
                            <img src="picture\category2.png" class="category_images">
                            <p>종합영양제, 유산균 등<br> <b> 영양제 </b></p>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="img_button" type="button" onclick="location.href = 'productList.php?category1=건강'">
                            <img src="picture\category2.png" class="category_images">
                            <p>의약부외품, 소화제 등 <br> <b>의약품</b></p>
                        </button>
                    </td>
                    <td>
                        <button class="img_button" type="button" onclick="location.href = 'productList.php?category1=모래'">
                            <img src="picture\category7.png" class="category_images">
                            <p>응고형 벤토나이트 <br> <b>고양이 모래</b></p>
                        </button>
                    </td>
                    <td>
                        <button class="img_button" type="button" onclick="location.href = 'productList.php?category1=기타'">
                            <img src="picture\category6.png" class="category_images">
                            <p><b>기타</b></p>
                        </button>
                    </td>
                </tr>
            </table>
  </section>

  <section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.php'"><img src="picture/category_icon.png"  height="35" width="35"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png"  height="35" width="70" ></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"  height="35" width="35" ></button>
  </section>

</body>
</html>