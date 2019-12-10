<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $rowNick=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($rowNick);
    $Nickname=$row['Nickname'];
    $result=mysqli_query($db, "SELECT * FROM Reviews WHERE Nickname='$Nickname'");
    $row=mysqli_fetch_assoc($result);
?>
<head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href= "myReviewstyle.css">
<title>애정 : 내가 쓴 리뷰</title>
</head>

<body>
  <section id="back_bar">
    <button id="back_icon" onclick="location.href='myPage.html'"><img src="picture/back_button.png" width="50%"></button>
    <label id="explain_label"><b>내가 쓴 리뷰</b></label>
  </section>
  <p class="noneline_for_space"></p>
  <section id="myreview_section">
    <article id="goodsInfo_article">
      <div id="info_div">
        <img src="picture\product2.png" align="left" width="65">
        <p style="font-size:120%"><b><?php echo $row['ItemName']; ?></b></p>
        <p style="font-size:80%"><?php echo $row['Date']; ?><p>
      </div>
    </article>
    <article id="writing_article">
        <p style="padding-right: 1%;">평점
          <?php echo $row['Rating']; ?><b><font size="5%">/5</font></b>
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

        <!--javascript: 내용 접거나 펴기-->
        <?php while($row=mysqli_fetch_assoc($result)) { ?>
      <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
      <?php echo $row['Adavantage']; ?>
      <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
      <?php echo $row['Weakness']; ?>
      <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
      <?php echo $row['Etc']; } ?>
      <p style="color:#888888;"> 사진</p>
      <img src="picture/product2.png" width="7%" style="padding-left:5%;">
-->

      <a href="edit_review.php"> <button id="edit_button"><b>편집</b></button>
      <p class="noneline_for_space"></p>
    </article>
  </section>

  <p class="noneline_for_space"></p>

  <section id="bottom_bar">
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LOGOUT_home.html'"><img src="picture/home_icon.png" width="160%"></button>
    <button class="bottom_bar_button" id="myPage_icon" onclick="location.href='myPage.html'"><img src="picture/myPage_icon.png" width="110%"></button>
  </section>

</body>
</html>
