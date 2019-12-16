<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('192.168.0.17:3306', '1111', '1234', 'aejeong');
    $rowNick=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($rowNick);
    $Nickname=$row['Nickname'];
    $result=mysqli_query($db, "SELECT * FROM Reviews WHERE Nickname='$Nickname'");
    
?>
<head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href= "myReviewstyle.css">
<title>애정 : 내가 쓴 리뷰</title>
</head>

<body>
  <section id="back_bar">
    <button id="back_icon"><img src="picture/back_button.png" width="50%" onclick="history.back(-1);"></button>
    <label id="explain_label"><b>내가 쓴 리뷰</b></label>
  <?php while($row=mysqli_fetch_assoc($result)){ ?>
  </section>
  <p class="noneline_for_space"></p>
  <section id="myreview_section">
    <article id="goodsInfo_article">
      <div id="info_div">
        <img src="<?php $ItemName=$row['ItemName'];
    $result1=mysqli_query($db, "SELECT * FROM items WHERE ItemName='$ItemName'");
    $row1=mysqli_fetch_assoc($result1); 
    echo $row1['Picture']; ?>" align="left" width="65">
        <p style="font-size:120%"><b><?php echo $row['ItemName']; ?></b></p>
        <p style="font-size:80%"><?php echo $row['Date']; ?><p>
      </div>
    </article>
    <article id="writing_article">
        <p style="padding-right: 1%;">평점
          <?php echo $row['Rating']; ?><b><font size="5%">/5</font></b>
        </p>
        <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
        <?php echo $row['Advantage']; ?>
        <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
        <?php echo $row['Weakness']; ?>
        <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
        <?php echo $row['Etc']; ?>
        

      <a href="edit_review.php?item=<?php echo $row1['ItemName'];?>"> <button id="edit_button"><b>편집</b></button></a>
      <p class="noneline_for_space"></p>
    </article>
  </section>
  <?php } ?>
  <p class="noneline_for_space"></p>

  <section id="bottom_bar">   <!--아래배너-->
    <button type="button" class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  height="35" width="35"></button>
    <button type="button" class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png"  height="35" width="70" ></button>
    <button type="button" class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"  height="35" width="35" ></button>
  </section>

</body>
</html>
