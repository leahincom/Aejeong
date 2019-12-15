<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');

    $rowNick=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
$row=mysqli_fetch_assoc($rowNick);
$Nickname=$row['Nickname'];
$result=mysqli_query($db, "SELECT * FROM Reviews WHERE Nickname='$Nickname'");
$row=mysqli_fetch_assoc($result);


?>
<head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="goodsReviewStyle.css">
<title>애정 : 제품 리뷰</title>
</head>

<body>
  <section id="back_bar">    <!--윗배너-->
    <button id="back_icon" onclick="location.href='LOGOUT_goodsInfo.html'"><img src="picture/back_button.png" width="50%"></button>
    <label id="explain_label"><b>리뷰 전체보기</b></label>
    <button class="search_bar_button" id="login_button"><b>로그아웃</b></button>
  </section>

<p class="noneline_for_space"></p>   <!--배너와 section 구분-->

<section> <!--윗부분 정보 섹션. 나에 대한 정보 + 제품 정보 표시-->
  <article id="profile_article"><!--제품 div-->
    <div id="goods_div">
      <img src="picture/product1.jpg" align="left">
      <p style="font-size:150%"><b><?php echo $row['ItemName']; ?></b></p>
      <p style="font-size:80%"><?php echo $row['Date']; ?><p>
    </div>
  </article>
</section>

  <p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->

  <section class="reviewClass_section">
    <article class="profile_article" align="left"> <!--내 정보 div-->
      <img src="picture/basic_profile.png" align="left" width="10%" style="margin-right:5%;">
      <p align="left" ><font size=4%><b>이화연</b></font> <font size=2%>님</font></p>
    </article>
    <article class="review_article">
      <form method = "" action = ""> <!--text 자동 줄바꿈-->
        <p style="padding:3%;"></p>
        <p style="padding-right: 1%;">평점
          <img src="picture/ystar.png" width="3%">
          <img src="picture/ystar.png" width="3%">
          <img src="picture/ystar.png" width="3%">
          <img src="picture/ystar.png" width="3%">
          <img src="picture/nstar.png" width="3%">
        </p>
        <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
        <input type="text" class="writing_text" value="괜찮아요">
        <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
        <input type="text" class="writing_text" value="냄새가 좀 구려요">
        <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
        <input type="text" class="writing_text" value="약간 고양이가 싫어하긴 함..">
        <p style="color:#888888;"> 사진</p>
        <!--이미지 파일 넣기-->
        <img src="picture/product1.jpg" width="15%">
      </form>
    </article>
  </section>


<!--제품의 두번쨰 리뷰-->

  <p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->

  <section class="reviewClass_section">
    <article class="profile_article" align="left"> <!--내 정보 div-->
      <img src="picture/basic_profile.png" align="left" width="10%" style="margin-right:5%;">
      <p align="left" ><font size=4%><b>김호롤1로</b></font> <font size=2%>님</font></p>
    </article>
    <article class="review_article">
      <form method = "" action = ""> <!--text 자동 줄바꿈-->
        <p style="padding-right: 1%;">평점
          <img src="picture/ystar.png" width="3%">
          <img src="picture/ystar.png" width="3%">
          <img src="picture/ystar.png" width="3%">
          <img src="picture/nstar.png" width="3%">
          <img src="picture/nstar.png" width="3%">
        </p>
        <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
        <input type="text" class="writing_text" value="괜찮아요">
        <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
        <input type="text" class="writing_text" value="냄새가 좀 구려요">
        <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
        <input type="text" class="writing_text" value="약간 고양이가 싫어하긴 함..">
        <p style="color:#888888;"> 사진</p>
        <!--이미지 파일 넣기-->
        <img src="picture/product1.jpg" width="15%">
      </form>
    </article>
  </section>

<p class="noneline_for_space"></p>   <!--아래section과 아래 banner 구분-->

    <section id="bottom_bar">
        <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
        <button class="bottom_bar_button" id="home_icon" onclick="location.href='LOGOUT_home.html'"><img src="picture/home_icon.png" width="160%"></button>
        <button class="bottom_bar_button" id="myPage_icon" onclick="location.href='myPage.html'"><img src="picture/myPage_icon.png" width="110%"></button>
    </section>

</body>
</html>
