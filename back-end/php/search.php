<!DOCTYPE html>
<html>

<?php
$db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
if(mysqli_connect_errno()){
  echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
  exit;
}
$search_text = $_POST['search_text'];
$sql = "SELECT * FROM Items WHERE ItemName like '%$search_text%'";
$result=mysqli_query($db,$sql);
$sql1 = "SELECT * FROM reviews WHERE ItemName like '%$search_text%'";
$result1=mysqli_query($db,$sql);
$num=0;
$sum=0;
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
        <button class="big_category_button" id="big_category_1"> 목욕/세정제 </button>
        <button class="big_category_button" > 미용/관리 </button>
        <button class="big_category_button" > 건강(영양제) </button>
        <button class="big_category_button" > 건강(의약품) </button>
        <button class="big_category_button" > 고양이모래 </button>
        <button class="big_category_button" > 기타 </button>
      </div>
    </section>


    <p style="padding:5%;"></p>
    <?php while($row=mysqli_fetch_assoc($result)) { ?>
      <section align="center">
        <button class="rankingButton" onclick="location.href='goodsInfo.html'">
          <div class="buttonDiv">
            <p class="numbP" id="firstP"></p>
            <img src="<?php echo $row['Picture']; ?>">
            <wrapper class="goodsInfoWrapper">
              <p class="nameP">  <?php echo $row['ItemName']; ?> </p>
              <p class="infoP"><span class="brandSpan"> </span> / <span class="priceSpan"> <?php echo $row['Price']; ?> </span></p>
            </wrapper>
            <p> 평점: <?php while($row1=mysqli_fetch_assoc($result1)) {
              $sum=$sum+$row1['Rating'];
              $num=$num+1; } }
              $avg=$sum/$num;
              echo $avg; ?> </p>
            </div>
            <hr class="rankingHr"></hr>
          </button>
        </section>


        <p style="padding:5%;"></p>

        <section id="bottom_bar">
          <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
          <button class="bottom_bar_button" id="home_icon" onclick="location.href='home.html'"><img src="picture/home_icon.png" width="160%"></button>
          <button class="bottom_bar_button" id="myPage_icon"><img src="picture/myPage_icon.png" width="110%"></button>
        </section>


      </body>

      </html>
