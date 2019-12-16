<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $item=$_GET['item'];
    $db=mysqli_connect('172.30.1.53:3306', '1111', '1234', 'aejeong');
	$result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
	$row=mysqli_fetch_assoc($result);
	$nick=$row['Nickname'];
    $result=mysqli_query($db, "SELECT * FROM items WHERE Picture='$item'");
    $row=mysqli_fetch_assoc($result);
    $name=$row['ItemName'];
	$result2=$db->query("SELECT * FROM likes WHERE Nickname='$nick' AND ItemName='$name'");
	$n=$result2->num_rows+1;
  $compoResult=mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$name%'");
    $firstGrade =mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$name%' AND ComponentGrade=0");
   $secGrade =mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$name%' AND ComponentGrade=1");
   $thirdGrade =mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$name%' AND ComponentGrade=2");
  $fCount = $firstGrade->num_rows;
  $sCount = $secGrade->num_rows;
  $tCount = $thirdGrade->num_rows;
  $total = $compoResult->num_rows;
  if($total==0){
  	  $total=1;
  }
  $fCount = (int)($fCount/$total * 100);
  $sCount = (int)($sCount/$total * 100);
  $tCount = (int)($tCount/$total * 100);

  $recent=mysqli_query($db, "SELECT * FROM recent WHERE Nickname='$nick'");
  if ($recent->num_rows == 0){
     mysqli_query($db, "INSERT INTO recent(Nickname, ItemName, Picture, number) VALUES ('$nick' ,'$name' ,'$item', 3)");
  }
  else if ($recent->num_rows == 1){
     mysqli_query($db, "INSERT INTO recent(Nickname, ItemName, Picture, number) VALUES ('$nick' ,'$name' ,'$item', 2)");
  }
  else if ($recent->num_rows == 2){
     mysqli_query($db, "INSERT INTO recent(Nickname, ItemName, Picture, number) VALUES ('$nick' ,'$name' ,'$item', 1)");
  }
  else if ($recent->num_rows == 3){
	   mysqli_query($db, "DELETE FROM recent WHERE number='3'");
	   mysqli_query($db, "UPDATE recent SET number='3' WHERE number='2'");
	   mysqli_query($db, "UPDATE recent SET number='2' WHERE number='1'");
	   mysqli_query($db, "INSERT INTO recent(Nickname, ItemName, Picture, number) VALUES ('$nick' ,'$name' ,'$item', 1)");
  }

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
        function showIn() { window.open("ingredient.php?item=<?php echo $row['ItemName'];?>", "성분", "width=600, height=300, left=100, top=50"); }
    </script>
</head>
<body>

  <section id="search_bar">  <!--윗배너-->
      <p>
         <button id="logo_icon" onclick="location.href='LoginHome.php'"><img src="picture/newLogo_white.png"></button>
        <wrapper>
	  <form method="post" action="search.php">
          <input type="text" id="search_text" name="search_text">
          <button type="submit" id="micro_icon"><img src="picture/micro.png" id="micro_id"></button>
          <button type="button" id="login_button" onclick="location.href='Logout.php'"><b>로그아웃</b></button>
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
	 	echo "평점: ".round($avg,2);}
	  ?>
      </p>
    </div>

    <p style="padding-bottom:3%;"></p>
<p>
  <button id="ingredient_button" onclick="showIn();">+ 성분 자세히 보기</button>
</p>
    <p align="center">  <!--제품 성분-->
        <?php for($i=0; $i<$fCount/10; $i++) {
          echo '<img src="picture/bluebar.png" class="barimg">'.' ';
        } for($i=0; $i<$sCount/10; $i++) {
          echo '<img src="picture/yellowbar.png" class="barimg">'.' ';
        } for($i=0; $i<$tCount/10; $i++) {
          echo '<img src="picture/redbar.png" class="barimg">'.' ';
        }
        ?>
      </p>
      <p align="center">
        <br>
        <img src="picture/bluebar.png" class="barimg">&nbsp1등급: <?php echo $fCount."%"?>&nbsp&nbsp&nbsp
        <img src="picture/yellowbar.png" class="barimg">&nbsp2등급: <?php echo $sCount."%"?> &nbsp&nbsp&nbsp
        <img src="picture/redbar.png" class="barimg">&nbsp3등급: <?php echo $tCount."%"?>
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
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList1.php?category1=1&category2=1'"><img src="picture/category_icon.png" id="categoryimg"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png" id="homeimg"></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png" id="myPageimg"></button>
  </section>

</body>
</html>