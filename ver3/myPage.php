<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('172.30.1.53:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
	$Nickname=$row['Nickname'];

?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title> 애정 : 마이페이지 </title>
    <link rel="stylesheet" href="myPageStyle.css">
</head>
<body>
    <section id="back_bar">
    <button id="back_icon"><img src="picture/back_button.png" onclick="history.back(-1);"></button>
    <label id="explain_label"><b>마이 페이지</b></label>
    <button id="revise_button" onclick="location.href='edit_myPage.php'">수정</button>
    </section>

    <section id="user_info_section">
        <article>
            <img id="profile_image" src="picture\basic_profile.png">
            <div id="user_info_div">
                <p>
                    <div id="nickname_text"> <?php echo $row['Nickname']; ?> </div>
                    기르는 동물 : 강아지 <?php echo $row['Dog']; ?>, 고양이 <?php echo $row['Cat']; ?> <?php if($row['etc1']!=0) { echo ','.$row['etc1_name']; } ?> <?php if ($row['etc1']!=0) { echo $row['etc1']; } ?> <?php if ($row['etc2']!=0) { echo ','.$row['etc2_name']; } ?> <?php if ($row['etc2']!=0) { echo $row['etc2']; } ?>
                </p>
                <p><br><?php echo $row['Email']; ?></p>
            </div>
        </article>
		
        <article>
      	  <p id="recent_items_text"> 최근 본 상품 </p>
		  <?php $recent=mysqli_query($db, "SELECT * FROM recent WHERE Nickname='$Nickname' ORDER BY number*1");
		    while($rowRecent=mysqli_fetch_assoc($recent)) {
		  ?>
    	  <button class="recent_item_button" onclick="location.href='goodsInfo.php?item=<?php echo $rowRecent['Picture'];?>'">
   	    <img src="<?php echo $rowRecent['Picture']; ?>" class="recent_item_image">
            <figcaption><?php echo $rowRecent['ItemName']; ?> </figcaption>
          </button>
		  <?php } ?>
        </article>


    </section>

	<?php $result=mysqli_query($db, "SELECT * FROM Reviews WHERE Nickname='$Nickname' ORDER BY Date DESC");
		  $row=mysqli_fetch_assoc($result); ?>
    <section id="myReview_section">
      <button onclick="location.href='myReview.html'"><h1> 내가 쓴 리뷰 </h1></button>
      <article>
        <p><?php echo $row['ItemName']; ?></p>
        <p><?php echo $row['Date']; ?> 작성</p>
        <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
        <?php echo $row['Advantage']; ?>
        <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
        <?php echo $row['Weakness']; ?>
        <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
        <?php echo $row['Etc']; ?>
        <a class="more_link" href="myReview.php"> 더보기 </a>
      </article>
    </section>

	<?php $result1=mysqli_query($db, "SELECT * FROM likes WHERE Nickname='$Nickname'");
		  $row1=mysqli_fetch_assoc($result1); ?>

    <section id="likeProduct_section">
      <button id="like_product_tag" onclick="location.href='likeProduct.html'"><h1> 좋아요 한 상품 </h1></button>
      <article>
        <div>
          <button class="like_product_button" onclick="location.href='goodsInfo.php?item=<?php echo $row1['Picture'];?>'">
            <img class="like_product_img" src="<?php echo $row1['Picture']; ?>">
            <figcaption><?php echo $row1['ItemName'];?></figcaption>
          </button>
		  <?php $row1=mysqli_fetch_assoc($result1); ?>
          <button class="like_product_button" onclick="location.href='goodsInfo.php?item=<?php echo $row1['Picture'];?>'">
            <img class="like_product_img" src="<?php echo $row1['Picture']; ?>">
            <figcaption><?php echo $row1['ItemName'];?></figcaption>
          </button>
		  <?php $row1=mysqli_fetch_assoc($result1); ?>
          <button class="like_product_button" onclick="location.href='goodsInfo.php?item=<?php echo $row1['Picture'];?>'">
            <img class="like_product_img" src="<?php echo $row1['Picture']; ?>">
            <figcaption><?php echo $row1['ItemName'];?></figcaption>
          </button>
        </div>
        <a class="more_link" href="likeProduct.php"> 더보기 </a>
      </article>
    </section>


<section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.php'"><img src="picture/category_icon.png"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png" ></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"></button>
  </section>

</body>
</html>