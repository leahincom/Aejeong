<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title> 애정 : 종아요한 상품 </title>
    <link rel="stylesheet" href="myPageStyle.css">
</head>

<body>
  <section id="back_bar">
     <button id="back_icon"><img src="picture/back_button.png" width="50%" onclick="history.back(-1);"></button>
    <label id="explain_label"><b>좋아요 한 상품</b></label>
  </section>

  <h2>좋아요 한 상품</h2>

  <section id="likeProduct_list_section">
    <article>
      <button onclick="location.href='goodsInfo.html'">
        <img class="like_product_img" src="picture\product1.jpg">
        <figcaption>Can-C Eye Drop 캔씨 백내장 강아지 안약 5ml 2개입</figcaption>
      </button>
    </article>
    <article>
      <button onclick="location.href='goodsInfo.html'">
        <img class="like_product_img" src="picture\product2.png">
      </button>
      <div>
        <p>동물친구</p>
        <h1>바란스 하이포알러지 강아지 샴푸 503ml</h1>
      </div>
    </article>
  </section>

  <section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  height="35" width="35"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png"  height="35" width="70" ></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"  height="35" width="35" ></button>
  </section>

</body>
</html>
