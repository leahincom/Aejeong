<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
	$Nickname=$row['Nickname'];
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
    <?php $result1=mysqli_query($db, "SELECT * FROM likes WHERE Nickname='$Nickname'"); 
    while($row1=mysqli_fetch_assoc($result1)){
    ?>
    <article>
      <button onclick="location.href='goodsInfo.php?item=<?php echo $row1['Picture'];?>'">
        <img class="like_product_img" src="<?php echo $row1['Picture']; ?>">
        <figcaption><?php echo $row1['ItemName'];?></figcaption>
      </button>
    </article>
	<?php } ?>
  </section>

  <section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  height="35" width="35"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png"  height="35" width="70" ></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"  height="35" width="35" ></button>
  </section>

</body>
</html>
