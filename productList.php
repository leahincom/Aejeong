﻿<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $category1=$_GET['category1'];
    $db=mysqli_connect('10.200.158.14:3306', '1111', '1234', 'aejeong');
    if(!isset($_GET['category2'])){
    $result=mysqli_query($db, "SELECT * FROM items WHERE category1='$category1'");}
    else if(isset($_GET['category2'])){
    $category2=$_GET['category2'];
    $result=mysqli_query($db, "SELECT * FROM items WHERE category2 like '%$category2%'");}
    $row=mysqli_fetch_assoc($result);
    $number=4;
?>
<html>

<head>
    <title> 애정 : 제품 목록</title>
    <link rel="stylesheet" href="productListStyle.css">
    <script type="text/javascript">
        function showfilter() { window.open("filtering.html", "안내", "width=700, height=400, left=100, top=50"); }

                        function startCategory() {
                            selectBigCategory(1);
                            for(var i=1; i<7; i++){
                                selectSmallCategory(i,1);
                            }
                            var read = location.href.split("?");
                            var init_category = read[1];
                            if (init_category != null) {
                                selectBigCategory(init_category);
                            }
                        }
                        function clearBigCategory() {
                            for (var i = 1; i < 7; i++) {
                                var cs = document.getElementById("big_category_" + i).style;
                                cs.backgroundColor = '#f9f7f4';
                                cs.color = "#000000";
                                document.getElementById('small_category'+i).style.display = 'none';
                            }
                        }
                        function selectBigCategory(index) {
                            clearBigCategory();
                            var selected = document.getElementById('big_category_' + index);
                            selected.style.backgroundColor = '#f60024';
                            selected.style.color = '#ffffff';
                            document.getElementById('small_category' + index).style.display = 'block';
                        }
                        function clearSmallCategory(big) {
                                for(var i=1; i<14; i++){
                                    var small = document.getElementById('small_category' + big + i);
                                    if (small != null) {
                                        small.style.color = '#000000';
                                    }
                            }
                        }
                        function selectSmallCategory(big, small) {
                            clearSmallCategory(big);
                            var selected = document.getElementById('small_category' + big+small);
                            selected.style.color='#f60024';
                        }
    </script>
</head>

<body  onload="startCategory()">
  <section id="search_bar">  <!--윗배너-->
      <p>
        <button class="search_bar_button" id="logo_icon" onclick="location.href='LOGINED_home.html'"><img src="picture/whitelogo.png"  id="whitelogo_id"></button>
        <wrapper>
	  <form method="post" action="search.php">
          <input type="text" id="search_text" name="search_text">
          <button type="submit" class="search_bar_button" id="micro_icon"><img src="picture/micro.png" id="micro_id"></button>
          <button type="button"class="search_bar_button" id="login_button" onclick="location.href='Logout.php'"><b>로그아웃</b></button>
	  </form>
        </wrapper>
      </p>
  </section>


  <p class="border3p"></p>

    <section id="category_section">
      <div id="big_category">
                <button id="big_category_1" onclick="selectBigCategory(1)"> 목욕/세정제 </button>
                <button id="big_category_2" onclick="selectBigCategory(2)"> 미용/관리 </button>
                <button id="big_category_3" onclick="selectBigCategory(3)"> 건강(영양제) </button>
                <button id="big_category_4" onclick="selectBigCategory(4)"> 건강(의약품) </button>
                <button id="big_category_5" onclick="selectBigCategory(5)"> 고양이모래 </button>
                <button id="big_category_6" onclick="selectBigCategory(6)"> 기타 </button>
            </div>
            <div class="small_category" id="small_category1">
                <button id="small_category11" onclick="selectSmallCategory(1,1)"> 샴푸 </button>
                <button id="small_category12" onclick="selectSmallCategory(1,2)"> 린스 </button>
                <button id="small_category13" onclick="selectSmallCategory(1,3)"> 물티슈/클리너 </button>
                <button id="small_category14" onclick="selectSmallCategory(1,4)"> 기타 </button>
            </div>
            <div class="small_category" id="small_category2">
                <button id="small_category21" onclick="selectSmallCategory(2,1)"> 에센스/향수 </button>
                <button id="small_category22" onclick="selectSmallCategory(2,2)"> 모발관리제 </button>
                <button id="small_category23" onclick="selectSmallCategory(2,3)"> 염색 </button>
                <button id="small_category24" onclick="selectSmallCategory(2,4)"> 기타 </button>
            </div>
            <div class="small_category" id="small_category3">
                <button id="small_category31" onclick="selectSmallCategory(3,1)"> 종합영양제 </button>
                <button id="small_category32" onclick="selectSmallCategory(3,2)"> 치아/구강 </button>
                <button id="small_category33" onclick="selectSmallCategory(3,3)"> 피부/털 </button>
                <button id="small_category34" onclick="selectSmallCategory(3,4)"> 신장/요로 </button>
                <button id="small_category35" onclick="selectSmallCategory(3,5)"> 심장/심신안정 </button>
                <button id="small_category36" onclick="selectSmallCategory(3,6)"> 유산균/장/소취 </button>
                <button id="small_category37" onclick="selectSmallCategory(3,7)"> 소화계통 </button>
                <button id="small_category38" onclick="selectSmallCategory(3,8)"> 뼈/관절/칼슘 </button>
                <button id="small_category39" onclick="selectSmallCategory(3,9)"> 눈/귀 </button>
                <button id="small_category310" onclick="selectSmallCategory(3,10)"> 면역증강/스트레스 </button>
                <button id="small_category311" onclick="selectSmallCategory(3,11)"> 엘라이신/호흡기 </button>
                <button id="small_category312" onclick="selectSmallCategory(3,12)"> 해충방지 </button>
                <button id="small_category313" onclick="selectSmallCategory(3,13)"> 기타 </button>
            </div>
            <div class="small_category" id="small_category4">
                <button id="small_category41" onclick="selectSmallCategory(4,1)"> 의약부외품 </button>
                <button id="small_category42" onclick="selectSmallCategory(4,2)"> 치아/구강 </button>
                <button id="small_category43" onclick="selectSmallCategory(4,3)"> 피부/털 </button>
                <button id="small_category44" onclick="selectSmallCategory(4,4)"> 신장/요로 </button>
                <button id="small_category45" onclick="selectSmallCategory(4,5)"> 심장/심신안정 </button>
                <button id="small_category46" onclick="selectSmallCategory(4,6)"> 유산균/장/소취 </button>
                <button id="small_category47" onclick="selectSmallCategory(4,7)"> 소화계통 </button>
                <button id="small_category48" onclick="selectSmallCategory(4,8)"> 뼈/관절/칼슘 </button>
                <button id="small_category49" onclick="selectSmallCategory(4,9)"> 눈/귀 </button>
                <button id="small_category410" onclick="selectSmallCategory(4,10)"> 면역증강/스트레스 </button>
                <button id="small_category411" onclick="selectSmallCategory(4,11)"> 엘라이신/호흡기 </button>
                <button id="small_category412" onclick="selectSmallCategory(4,12)"> 해충방지 </button>
                <button id="small_category413" onclick="selectSmallCategory(4,13)"> 기타 </button>
            </div>
            <div class="small_category" id="small_category5">
                <button id="small_category51" onclick="selectSmallCategory(5,1)"> 응고형 벤토나이트 </button>
                <button id="small_category52" onclick="selectSmallCategory(5,2)">응고형 천연</button>
                <button id="small_category53" onclick="selectSmallCategory(5,3)"> 흡수형 실리카겔</button>
                <button id="small_category54" onclick="selectSmallCategory(5,4)">흡수형 천연 </button>
                <button id="small_category55" onclick="selectSmallCategory(5,5)">모래탈취제/소독/살균 </button>
                <button id="small_category56" onclick="selectSmallCategory(5,6)"> 기타 </button>
            </div>
            <div class="small_category" id="small_category6">
            </div>
        </section>

    <p class="border1p"></p>

      <button id="filter_button" onclick="showfilter();">
        <img src="picture/filter.png" id="filterimg">
      </button>

      <p class="border3p"></p>

<?php if($result->num_rows==0) { echo "상품을 찾을 수 없습니다!"; }
      else {
?>

  <section align="center">
    <button class="rankingButton"  onclick="location.href='goodsInfo.php?item=<?php echo $row['Picture'];?>'">
      <div class="buttonDiv">
        <p class="numbP" id="firstP">1</p>
        <img src="<?php echo $row['Picture']; ?>" class="productimg">
          <p class="nameP"><?php echo $row['ItemName']; ?></p>
          <p class="infoP"><?php echo $row['Price']; ?> </p>
        <p>
          <?php $ItemName=$row['ItemName'];
		$sql1 = "SELECT * FROM reviews WHERE ItemName = '$ItemName'";
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
	 	echo "평점".$avg;}
	  ?>
        </p>
      </div>
      <hr class="rankingHr"></hr>
    </button>
  </section>

  <?php $row=mysqli_fetch_assoc($result); ?>
  <section align="center">
    <button class="rankingButton"  onclick="location.href='goodsInfo.php?item=<?php echo $row['Picture'];?>'">
      <div class="buttonDiv">
        <p class="numbP" id="secondP">2</p>
        <img src="<?php echo $row['Picture']; ?>" class="productimg">
          <p class="nameP"><?php echo $row['ItemName']; ?></p>
          <p class="infoP"><?php echo $row['Price']; ?> </p>
        <p>
          <?php $ItemName=$row['ItemName'];
		$sql1 = "SELECT * FROM reviews WHERE ItemName = '$ItemName'";
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
	 	echo "평점".$avg;}
	  ?>
        </p>
      </div>
      <hr class="rankingHr"></hr>
    </button>
  </section>



  <section align="center">
    <button class="rankingButton"  onclick="location.href='goodsInfo.php?item=<?php echo $row['Picture'];?>'">
      <div class="buttonDiv">
        <p class="numbP" id="thirdP">3</p>
         <img src="<?php echo $row['Picture']; ?>" class="productimg">
          <p class="nameP"><?php echo $row['ItemName']; ?></p>
          <p class="infoP"><?php echo $row['Price']; ?></p>
        <p>
          <?php $ItemName=$row['ItemName'];
		$sql1 = "SELECT * FROM reviews WHERE ItemName = '$ItemName'";
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
	 	echo "평점".$avg;}
	  ?>
        </p>
      </div>
      <hr class="rankingHr"></hr>
    </button>
  </section>

  <?php $row=mysqli_fetch_assoc($result); 
   while($row=mysqli_fetch_assoc($result)){ ?>

  <section align="center">
    <button class="rankingButton"  onclick="location.href='goodsInfo.php?item=<?php echo $row['Picture'];?>'">
      <div class="buttonDiv">
        <p class="numbP"><?php echo $number; $number=$number+1; ?></p>
        <img src="<?php echo $row['Picture']; ?>"  class="productimg">
          <p class="nameP"><?php echo $row['ItemName']; ?></p>
          <p class="infoP"><?php echo $row['Price']; ?> </p>
        <p>
          <?php $ItemName=$row['ItemName'];
		$sql1 = "SELECT * FROM reviews WHERE ItemName = '$ItemName'";
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
	 	echo "평점".$avg;}
	  ?>
        </p>
      </div>
      <hr class="rankingHr"></hr>
    </button>
  </section>
<?php } ?>
<?php } ?>

  <p class="noneline_for_space"></p>   <!--배너와 section 구분-->
  <section id="bottom_bar">   <!--아래배너-->
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.html'"><img src="picture/category_icon.png" id="categoryimg"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LOGINED_home.html'"><img src="picture/home_icon.png" id="homeimg"></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.html'"><img src="picture/myPage_icon.png" id="myPageimg"></button>
  </section>

</body>

</html>
