<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $item=$_GET['item'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');

	$result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
	$row=mysqli_fetch_assoc($result);
	$nick=$row['Nickname'];

    $result=mysqli_query($db, "SELECT * FROM items WHERE Picture='$item'");
    $row=mysqli_fetch_assoc($result);
    $name=$row['ItemName'];

	$result2=$db->query("SELECT * FROM likes WHERE Nickname='$nick' AND ItemName='$name'");
	$n=$result2->num_rows+1;
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="goodsInfoStyle.css">
    <title>애정 : 제품 상세 페이지</title>
    <script type="text/javascript" charset="urf-8">
        var liked =<?php echo "$result2->num_rows"; ?>;                                  //좋아요 선택 여부(나중에 데베 연결)
        function makeHeartImg() {                           //좋아요 여부 따라 Img 결정
            var heart_img = document.getElementById("heart_img");
            if (liked == 1) {
                heart_img.src = "picture/heart2.png";
            } else {
                heart_img.src = "picture/heart1.png";
            }

        }
        function heartClick() {                         //버튼 클릭 시 좋아요(나중에 데베 연결)
            if (liked == 0) {
                liked = 1;
            } else {
                liked = 0;
            }
            makeHeartImg();
        }
        function showIn() { window.open("ingredient.html", "성분", "width=600, height=300, left=100, top=50"); }

    </script>
</head>
<body>

  <section id="search_bar">  <!--윗배너-->
      <p>
        <button class="search_bar_button" id="logo_icon" onclick="location.href='home.html'"><img src="picture/whitelogo.png"  width="60%"></button>
        <wrapper>
          <form method="post" action="search.php">
          <input type="text" id="search_text" name="search_text">
          <button type="submit" class="search_bar_button" id="micro_icon"><img src="picture/micro.png" width="45%"></button>
          <button type="button" class="search_bar_button" id="login_button" onclick="location.href='Logout.php'"><b>로그아웃</b></button>
          </form>
        </wrapper>
      </p>
  </section>

  <p class="noneline_for_space"></p>   <!--배너와 section 구분-->

  <section id="information_section">   <!--제품 정보란 (베이지색 칸 내부)-->
    <div id="pictureInfo">  <!--제품 사진-->
      <img src="<?php echo $row['Picture']; ?>" width="110%">
    </div>
    <div id="explain">
      <p style= "font-size:70%"><span width="50%" style="background:#dddddd; margin-left:5%;"><?php echo $row['PetSort']; ?>용</span></p>
      <p style="font-size:130%;"><span style="margin-left:5%;"><b><?php echo $row['ItemName']; ?></b></span></p>
      <br> <br> <br>
      <p style="font-size:70%;"><span style="margin-left:5%;">가격: <?php echo $row['Price']; ?></span></p>
    </div>
    <div>
      <p>
        <?php 
		$sql1 = "SELECT * FROM reviews WHERE ItemName = '$name'";
		$result1=mysqli_query($db,$sql1);
		$num=0;
		$sum=0;
		while($row1=mysqli_fetch_assoc($result1)) {
	 		$sum=$sum+$row1['Rating'];
			 $num=$num+1; }
		if ($num==0) {
			echo "평점: 0.0"; }
		else{
	 	$avg=$sum/$num;
	 	echo "평점: ".$avg;}
	  ?>
      </p>
    </div>

    <p style="padding-bottom:3%;"></p>
<p>
  <button id="ingredient_button" onclick="showIn();">+ 성분 자세히 보기</button>
</p>
    <p align="center">  <!--제품 성분-->
      <img src="picture/bluebar.png" width="3%">
      <img src="picture/bluebar.png" width="3%">
      <img src="picture/bluebar.png" width="3%">
      <img src="picture/bluebar.png" width="3%">
      <img src="picture/bluebar.png" width="3%">
      <img src="picture/bluebar.png" width="3%">
      <img src="picture/yellowbar.png" width="3%">
      <img src="picture/yellowbar.png" width="3%">
      <img src="picture/redbar.png" width="3%">
      <img src="picture/redbar.png" width="3%">
    </p>
    <p style="font-size:80%;" align="center">
      <br>
      <img src="picture/bluebar.png" width="2%">1등급: 60% &nbsp
      <img src="picture/yellowbar.png" width="2%">2등급: 20% &nbsp
      <img src="picture/redbar.png" width="2%">3등급: 20%
    </p>

  </section>

  <br>

  <section>
    <button type="button" id="heart_button" onclick="heartClick();location.href='like.php?item=<?php echo $row['Picture'];?>'"><img id="heart_img" src="picture/heart<?php echo "$n"; ?>.png"  width="100%" height="auto"></button>
    <button id="review_button" onclick="location.href='goodsReview.php?item=<?php echo $row['Picture'];?>'"><img src="picture/review.png" width="100%" height="auto"></button>
    <button id="writing_button" onclick="location.href='writingReview.php?item=<?php echo $row['Picture'];?>'"><img src="picture/writing.png" width="100%" height="auto" ></button>
  </section>

  <p style="padding-bottom:5%;"></p>
  <?php 
    $item=$row['ItemName'];
    $result=mysqli_query($db, "SELECT * FROM reviews WHERE ItemName='$item'");
    $row=mysqli_fetch_assoc($result);
   ?>

  <section id="review_section">
    <p class="review_p"><b><?php echo $row['Nickname']; ?></b> <?php echo $row['Advantage']; $row=mysqli_fetch_assoc($result); ?></p>
    <p class="review_p"><b><?php echo $row['Nickname']; ?></b> <?php echo $row['Advantage']; ?></p>
  </section>



<p class="noneline_for_space"></p>   <!--배너와 section 구분-->

  <section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.php'"><img src="picture/category_icon.png"  height="35" width="35"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png"  height="35" width="70" ></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png"  height="35" width="35" ></button>
  </section>

</body>
</html>