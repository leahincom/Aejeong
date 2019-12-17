<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    if($_GET['category1']==1 && $_GET['category2']==1){ $category1="목욕/세정제"; $category2="샴푸";  }
	else if($_GET['category1']==1 && $_GET['category2']==2){ $category1="목욕/세정제"; $category2="린스";  }
	else if($_GET['category1']==1 && $_GET['category2']==3){ $category1="목욕/세정제"; $category2="클리너";  }
	else if($_GET['category1']==1 && $_GET['category2']==4){ $category1="목욕/세정제"; $category2="기타";  }
	else if($_GET['category1']==2 && $_GET['category2']==1){ $category1="미용"; $category2="에센스";}
	else if($_GET['category1']==2 && $_GET['category2']==2){ $category1="미용"; $category2="모발";}
	else if($_GET['category1']==2 && $_GET['category2']==3){ $category1="미용"; $category2="염색";}
	else if($_GET['category1']==2 && $_GET['category2']==4){ $category1="미용"; $category2="기타";}
	else if($_GET['category1']==3 && $_GET['category2']==1){ $category1="건강"; $category2="종합영양제";}
	else if(($_GET['category1']==3 && $_GET['category2']==2)||($_GET['category1']==4 && $_GET['category2']==2)){ $category1="건강"; $category2="치아";}
	else if(($_GET['category1']==3 && $_GET['category2']==3)||($_GET['category1']==4 && $_GET['category2']==3)){ $category1="건강"; $category2="피부";}
	else if(($_GET['category1']==3 && $_GET['category2']==4)||($_GET['category1']==4 && $_GET['category2']==4)){ $category1="건강"; $category2="신장";}
	else if(($_GET['category1']==3 && $_GET['category2']==5)||($_GET['category1']==4 && $_GET['category2']==5)){ $category1="건강"; $category2="심장";}
	else if(($_GET['category1']==3 && $_GET['category2']==6)||($_GET['category1']==4 && $_GET['category2']==6)){ $category1="건강"; $category2="장";}
	else if(($_GET['category1']==3 && $_GET['category2']==7)||($_GET['category1']==4 && $_GET['category2']==7)){ $category1="건강"; $category2="소화";}
	else if(($_GET['category1']==3 && $_GET['category2']==8)||($_GET['category1']==4 && $_GET['category2']==8)){ $category1="건강"; $category2="뼈";}
	else if(($_GET['category1']==3 && $_GET['category2']==9)||($_GET['category1']==4 && $_GET['category2']==9)){ $category1="건강"; $category2="눈";}
	else if(($_GET['category1']==3 && $_GET['category2']==10)||($_GET['category1']==4 && $_GET['category2']==10)){ $category1="건강"; $category2="면역";}
	else if(($_GET['category1']==3 && $_GET['category2']==11)||($_GET['category1']==4 && $_GET['category2']==11)){ $category1="건강"; $category2="호흡";}
	else if(($_GET['category1']==3 && $_GET['category2']==12)||($_GET['category1']==4 && $_GET['category2']==12)){ $category1="건강"; $category2="해충";}
	else if(($_GET['category1']==3 && $_GET['category2']==13)||($_GET['category1']==4 && $_GET['category2']==13)){ $category1="건강"; $category2="기타";}
	else if($_GET['category1']==4 && $_GET['category2']==1){ $category1="건강"; $category2="의약";}
	else if($_GET['category1']==5 && $_GET['category2']==1){ $category1="모래"; $category2="응고형"; }
	else if($_GET['category1']==5 && $_GET['category2']==2){ $category1="모래"; $category2="응고형"; }
	else if($_GET['category1']==5 && $_GET['category2']==3){ $category1="모래"; $category2="흡수형"; }
	else if($_GET['category1']==5 && $_GET['category2']==4){ $category1="모래"; $category2="흡수형"; }
	else if($_GET['category1']==5 && $_GET['category2']==5){ $category1="모래"; $category2="탈취"; }
	else if($_GET['category1']==5 && $_GET['category2']==6){ $category1="모래"; $category2="기타"; }
	else if($_GET['category1']==6 && $_GET['category2']==1){ $category1="기타"; $category2="기타"; }
    $db=mysqli_connect('10.200.39.231:3306', '1111', '1234', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM items WHERE category2 like '%$category2%'");
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
            for (var i = 1; i < 7; i++) {
                selectSmallCategory(i, 1);
            } 
            var read = location.href.split("&");
                            var category1 = read[0].split("=");
							var init_category1 = category1[1];
							var category2 = read[1].split("=");
							var init_category2 = category2[1];
							selectSmallCategory(init_category1,init_category2);
                            
                            if (init_category1 != null) {
                                selectBigCategory(init_category1);
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
                            var selected = document.getElementById('small_category' + big + small);
                            selected.style.color = '#f60024';
                        }
    </script>
</head>

<body  onload="startCategory()">
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
                <button id="small_category11" onclick="location.href='productList1.php?category1=1&category2=1'"> 샴푸 </button>
                <button id="small_category12" onclick="location.href='productList1.php?category1=1&category2=2'"> 린스 </button>
                <button id="small_category13" onclick="location.href='productList1.php?category1=1&category2=3'"> 물티슈/클리너 </button>
                <button id="small_category14" onclick="location.href='productList1.php?category1=1&category2=4'"> 기타 </button>
            </div>
            <div class="small_category" id="small_category2">
                <button id="small_category21" onclick="location.href='productList1.php?category1=2&category2=1'"> 에센스/향수 </button>
                <button id="small_category22" onclick="location.href='productList1.php?category1=2&category2=2'"> 모발관리제 </button>
                <button id="small_category23" onclick="location.href='productList1.php?category1=2&category2=3'"> 염색 </button>
                <button id="small_category24" onclick="location.href='productList1.php?category1=2&category2=4'"> 기타 </button>
            </div>
            <div class="small_category" id="small_category3">
                <button id="small_category31" onclick="location.href='productList1.php?category1=3&category2=1'"> 종합영양제 </button>
                <button id="small_category32" onclick="location.href='productList1.php?category1=3&category2=2'"> 치아/구강 </button>
                <button id="small_category33" onclick="location.href='productList1.php?category1=3&category2=3'"> 피부/털 </button>
                <button id="small_category34" onclick="location.href='productList1.php?category1=3&category2=4'"> 신장/요로 </button>
                <button id="small_category35" onclick="location.href='productList1.php?category1=3&category2=5'"> 심장/심신안정 </button>
                <button id="small_category36" onclick="location.href='productList1.php?category1=3&category2=6'"> 유산균/장/소취 </button>
                <button id="small_category37" onclick="location.href='productList1.php?category1=3&category2=7'"> 소화계통 </button>
                <button id="small_category38" onclick="location.href='productList1.php?category1=3&category2=8'"> 뼈/관절/칼슘 </button>
                <button id="small_category39" onclick="location.href='productList1.php?category1=3&category2=9'"> 눈/귀 </button>
                <button id="small_category310" onclick="location.href='productList1.php?category1=3&category2=10'"> 면역증강/스트레스 </button>
                <button id="small_category311" onclick="location.href='productList1.php?category1=3&category2=11'"> 엘라이신/호흡기 </button>
                <button id="small_category312" onclick="location.href='productList1.php?category1=3&category2=12'"> 해충방지 </button>
                <button id="small_category313" onclick="location.href='productList1.php?category1=3&category2=13'"> 기타 </button>
            </div>
            <div class="small_category" id="small_category4">
                <button id="small_category41" onclick="location.href='productList1.php?category1=4&category2=1'"> 의약부외품 </button>
                <button id="small_category42" onclick="location.href='productList1.php?category1=4&category2=2'"> 치아/구강 </button>
                <button id="small_category43" onclick="location.href='productList1.php?category1=4&category2=3'"> 피부/털 </button>
                <button id="small_category44" onclick="location.href='productList1.php?category1=4&category2=4'"> 신장/요로 </button>
                <button id="small_category45" onclick="location.href='productList1.php?category1=4&category2=5'"> 심장/심신안정 </button>
                <button id="small_category46" onclick="location.href='productList1.php?category1=4&category2=6'"> 유산균/장/소취 </button>
                <button id="small_category47" onclick="location.href='productList1.php?category1=4&category2=7'"> 소화계통 </button>
                <button id="small_category48" onclick="location.href='productList1.php?category1=4&category2=8'"> 뼈/관절/칼슘 </button>
                <button id="small_category49" onclick="location.href='productList1.php?category1=4&category2=9'"> 눈/귀 </button>
                <button id="small_category410" onclick="location.href='productList1.php?category1=4&category2=10'"> 면역증강/스트레스 </button>
                <button id="small_category411" onclick="location.href='productList1.php?category1=4&category2=11'"> 엘라이신/호흡기 </button>
                <button id="small_category412" onclick="location.href='productList1.php?category1=4&category2=12'"> 해충방지 </button>
                <button id="small_category413" onclick="location.href='productList1.php?category1=4&category2=13'"> 기타 </button>
            </div>
            <div class="small_category" id="small_category5">
                <button id="small_category51" onclick="location.href='productList1.php?category1=5&category2=1'"> 응고형 벤토나이트 </button>
                <button id="small_category52" onclick="location.href='productList1.php?category1=5&category2=2'">응고형 천연</button>
                <button id="small_category53" onclick="location.href='productList1.php?category1=5&category2=3'"> 흡수형 실리카겔</button>
                <button id="small_category54" onclick="location.href='productList1.php?category1=5&category2=4'">흡수형 천연 </button>
                <button id="small_category55" onclick="location.href='productList1.php?category1=5&category2=5'">모래탈취제/소독/살균 </button>
                <button id="small_category56" onclick="location.href='productList1.php?category1=5&category2=6'"> 기타 </button>
            </div>
            <div class="small_category" id="small_category6">
                <button id="small_category61" onclick="location.href='productList1.php?category1=6&category2=1'"> 기타 </button>
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
	 	echo "평점: ".round($avg,2);}
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
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList1.php?category1=1&category2=1'"><img src="picture/category_icon.png" id="categoryimg"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png" id="homeimg"></button>
    <button class="bottom_bar_button" id="myPage_icon"onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png" id="myPageimg"></button>
  </section>

</body>

</html>