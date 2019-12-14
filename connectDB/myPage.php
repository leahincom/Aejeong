<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('10.200.38.43', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title> 애정 : 마이페이지 </title>
    <link rel="stylesheet" href="myPageStyle.css?ver=1">
</head>
<body>
    <section id="back_bar">
    <button id="back_icon"><img src="picture/back_button.png" width="50%" onclick="history.back(-1);"></button>
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
    	  <button class="recent_item_button" onclick="location.href='goodsInfo.html'">
   	    <img src="picture\product2.png" class="recent_item_image">
            <figcaption>바란스 하이포알러지 강아지 샴푸 503ml</figcaption>
          </button>
          <button class="recent_item_button" onclick="location.href='goodsInfo.html'">
            <img src="picture\product1.jpg" class="recent_item_image">
            <figcaption>Can-C Eye Drop 캔씨 백내장 강아지 안약 5ml 2개입</figcaption>
          </button>
          <button class="recent_item_button" onclick="location.href='goodsInfo.html'">
            <img src="picture\product2.png" class="recent_item_image">
            <figcaption>바란스 하이포알러지 강아지 샴푸 503ml</figcaption>
          </button>
        </article>

    </section>

    <section id="myReview_section">
      <button onclick="location.href='myReview.html'"><h1> 내가 쓴 리뷰 </h1></button>
      <article>
        <p>바란스 하이포알러지 강아지 샴푸 503ml</p>
        <p>2018.09.24 작성</p>
        <p>
          <img src="picture\review_face1.jpg" class="faceimg">
          <br /><img src="picture\review_face2.jpg" class="faceimg">
          <br /><img src="picture\review_option.png" class="faceimg">
        </p>
        <a class="more_link" href="myReview.php"> 더보기 </a>
      </article>
    </section>

    <section id="likeProduct_section">
      <button id="like_product_tag" onclick="location.href='likeProduct.html'"><h1> 좋아요 한 상품 </h1></button>
      <article>
        <div>
          <button class="like_product_button" onclick="location.href='goodsInfo.html'">
            <img class="like_product_img" src="picture\product1.jpg">
            <figcaption>Can-C Eye Drop 캔씨 백내장 강아지 안약 5ml 2개입</figcaption>
          </button>
          <button class="like_product_button" onclick="location.href='goodsInfo.html'">
            <img class="like_product_img" src="picture\product2.png">
            <figcaption>바란스 하이포알러지 강아지 샴푸 503ml</figcaption>
          </button>
        </div>
        <a class="more_link" href="likeProduct.php"> 더보기 </a>
      </article>
    </section>


<section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  height="35" width="35"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png"  height="35" width="70" ></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"  height="35" width="35" ></button>
  </section>

</body>
</html>