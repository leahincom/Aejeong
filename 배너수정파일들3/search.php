<!DOCTYPE html>
<html>

<?php
$db=mysqli_connect('172.30.1.53:3306', '1111', '1234', 'aejeong');
if(mysqli_connect_errno()){
  echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
  exit;
  }
$search_text = $_POST['search_text'];
$sql = "SELECT * FROM Items WHERE ItemName like '%$search_text%'";
$result=mysqli_query($db,$sql);
?>

<head>
    <title> 애정 : 검색 결과 </title>
    <link rel="stylesheet" href="productListStyle.css">
</head>

<body>
  <section id="search_bar">
      <p>
        <button class="search_bar_button" id="logo_icon" onclick="location.href='home.html'"><img src="picture/whitelogo.png"  width="60%"></button>
        <wrapper>
          <form method="post" action="search.php">
          <input type="text" id="search_text" name="search_text">
          <button type="submit" class="search_bar_button" id="micro_icon"><img src="picture/micro.png" width="45%"></button>
          <button type="button" id="login_button" onclick="location.href='loginPage.php'"><b>로그인</b></button>
          </form>        </wrapper>
      </p>
  </section>

  <p style="padding:2%;"></p>

  <section id="category_section">
    <div id="big_category">
      
    </div>
  </section>


  <p style="padding:5%;"></p>
  <?php while($row=mysqli_fetch_assoc($result)) {
  $name=$row['ItemName']; 
  $sql1 = "SELECT * FROM reviews WHERE ItemName='$name'";
  $result1=mysqli_query($db,$sql1); 
  $num=0; 
  $sum=0;
  ?>
  <section align="center">
    <button class="rankingButton" onclick="location.href='goodsInfo.php?item=<?php echo $row['Picture'];?>'">
      <div class="buttonDiv">
        <p class="numbP" id="firstP"></p>
        <img src="<?php echo $row['Picture']; ?>">
        <wrapper class="goodsInfoWrapper">
          <p class="nameP">  <?php echo $row['ItemName']; ?> </p>
          <p class="infoP"><span class="brandSpan"> </span> / <span class="priceSpan"> <?php echo $row['Price']; ?> </span></p>
        </wrapper>
        <p> 평점: <?php while($row1=mysqli_fetch_assoc($result1)) {
	 $sum=$sum+$row1['Rating'];
	 $num=$num+1; }
	 if ($num==0) {
			echo "0"; }
		else{
	 	$avg=$sum/$num;
	 	echo $avg;} ?> </p>
      </div>
      <hr class="rankingHr"></hr>
    </button>
  </section>
  <?php } ?>

  <p style="padding:5%;"></p>

  <section id="bottom_bar">
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='home.html'"><img src="picture/home_icon.png" width="160%"></button>
    <button class="bottom_bar_button" id="myPage_icon"><img src="picture/myPage_icon.png" width="110%"></button>
  </section>


</body>

</html>
