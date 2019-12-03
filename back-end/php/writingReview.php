<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Reviews WHERE Nickname='$Nickname'");
    $row=mysqli_fetch_assoc($result);
?>
<html>
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="writingReviewStyle.css"></head>

<body>
  <section id="search_bar"> <!--윗배너-->
    <form method="post" action="search.php">
      <button class="search_bar_button" id="logo_icon"><img src="picture/logo.png"  width="100%"></button>
        <input type="text" id="search_text">
        <button class="search_bar_button" id="micro_icon"><img src="picture/micro.png" width="35%"></button>
      <button class="search_bar_button" id="login_button"><b>로그인</b></button>
    </form>
  </section>
<p class="noneline_for_space"></p>   <!--배너와 section 구분-->

<form action = "review_upload.php" method = "post">
<section> <!--윗부분 정보 섹션. 나에 대한 정보 + 제품 정보 표시-->
  <div id="myProfile_div" align="left"> <!--내 정보 div-->
    <img src="picture/basic_profile.png" align="left" width="45%" style="margin-right:5%;">
    <p name="Nickname" align="left" style="color:white" ><font size=4%><b><?php echo $row['Nickname']; ?></b></font> <font size=2%>님</font></p>
    // DB Users에서 불러오기
    <p style="font-size:80%; color: white;">구매 상품 32개 <br>내 상품평 17개</p>
  </div>

  <article id="profile_article"><!--제품 div-->
    <div id="goods_div">
      <img src="picture/product1.jpg" align="left">
      //DB에서 가져오기
      <p name="ItemName" style="font-size:150%"><b><?php echo $row['ItemName']; ?></b></p>
      <p name="Date" style="font-size:80%"><?php echo $row['Date']; ?><p>
    </div>
  </article>
</section>
<hr id="myHr">
<p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->



<section style="padding-left:2%;">
  <article> <!--text 자동 줄바꿈-->
      <p style="padding-right: 1%;">평점<input type="range" id="star_range" min="0" max="5"></p>
      <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
      <input type="text" class="writing_text" name="Advantage">
      <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
      <input type="text" class="writing_text" name="Weakness">
      <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
      <input type="text" class="writing_text" name="Etc">
      <p style="color:#888888;"> 사진 추가</p>
      <input type="button" id="addPicture_button" value="+">
  </article>

    <!--밑 버튼 / 작성완료 작성취소-->
    <input type="submit" id="done_button" value="작성 완료">
    <input type="button" id="yet_button" value="작성 취소" onclick="location.href='goodsInfo.html'">
</section>
</form>

<p class="noneline_for_space"></p>   <!--아래section과 아래 banner 구분-->
<section id="bottom_bar">
  <button class="bottom_bar_button" id="category_icon"><img src="picture/category_icon.png"  width="100%"></button>
  <button class="bottom_bar_button" id="home_icon"><img src="picture/home_icon.png" width="160%"></button>
  <button class="bottom_bar_button" id="myPage_icon"><img src="picture/myPage_icon.png" width="110%"></button>
</section>

</body>
</html>
