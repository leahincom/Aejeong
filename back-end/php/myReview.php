<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM reviews WHERE Nickname='$Nickname'");
    $row=mysqli_fetch_assoc($result);
?>

<head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href= "myReviewstyle.css"></head>

<!--~~~~~~~~~~~~~~~~윗배너~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<body>
  <section id="search_bar">
    <form method="post" action="search.php">
      <button class="search_bar_button" id="logo_icon"><img src="picture/logo.png"  width="100%"></button>
        <input type="text" id="search_text">
        <button class="search_bar_button" id="micro_icon"><img src="picture/micro.png" width="35%"></button>
      <button class="search_bar_button" id="login_button"><b>로그인</b></button>
    </form>
  </section>
<p class="noneline_for_space"></p>   <!--배너와 section 구분-->



<!--~~~~~~~~~~~~~~~~윗배너~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section>
  <article id="goodsInfo_article">
  <div id="info_div"><!--원래 이름은 first div-->
    <img src="picture\product2.png" align="left" width="15%">
    <p style="font-size:120%"><b>제품명</b></p>
    <p style="font-size:80%">제품 구매날짜<p>
  </div>
  </article>
</section>

<p class="noneline_for_space"></p>   <!--배너와 section 구분-->
<hr id="myHr">
<p class="noneline_for_space"></p>   <!--배너와 section 구분-->


<section id="writing_section">
  <p>평점<!--별 사진 5개 연결-->
  </p>
  <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
  <?php echo $row['Adavantage']; ?>
  <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
  <?php echo $row['Weakness']; ?>
  <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
  <?php echo $row['Etc']; ?>
  <p style="color:#888888;"> 사진</p>
  <img src="picture/product2.png" width="7%" style="padding-left:5%;">
  <p class="noneline_for_space"></p>   <!-- 구분-->

  <input type="button" id="more_button" value="+ 더보기">

  <p>평점<!--별 사진 5개 연결-->
  </p>
    <?php while($row=mysqli_fetch_assoc($result)) { ?>
  <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
  <?php echo $row['Adavantage']; ?>
  <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
  <?php echo $row['Weakness']; ?>
  <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
  <?php echo $row['Etc']; } ?>
  <p style="color:#888888;"> 사진</p>
  <img src="picture/product2.png" width="7%" style="padding-left:5%;">
  <p class="noneline_for_space"></p>


  <a href="edit_review.php"> <button id="edit_button"><img src="picture/feather.png" style="background-color:#f60024;" width="100%"></button>
  </form>
</section>

<p class="noneline_for_space"></p>
<section id="bottom_bar">
  <button class="bottom_bar_button" id="category_icon"><img src="picture/category_icon.png"  width="100%"></button>
  <button class="bottom_bar_button" id="home_icon"><img src="picture/home_icon.png" width="160%"></button>
  <button class="bottom_bar_button" id="myPage_icon"><img src="picture/myPage_icon.png" width="110%"></button>
</section>
</body>
</html>
