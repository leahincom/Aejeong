<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
  session_start();}
  $id=$_SESSION['UserID'];
  $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');

  $Rating=$_GET['Rating'];
  if(!isset($_GET['Rating'])) {
  $result=mysqli_query($db, "SELECT * FROM Reviews");
  }
  else {
    $result=mysqli_query($db, "SELECT * FROM Reviews WHERE Rating like '%$Rating%'");
  }
  $row=mysqli_fetch_assoc($result);
  ?>
  <head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="goodsReviewStyle.css">
    <title>애정 : 제품 리뷰</title>
    <script type="text/javascript">
    function rateFilter(){
        var rate = document.getElementById("rateFilter");
        var selectValue = rate.options[rate.selectedIndex].value;
			    if(selectValue==0) { location.href = 'goodsReview.php?Rating=0'; }
			    else if(selectValue==1) { location.href = 'goodsReview.php?Rating=1'; }
 			    else if(selectValue==2) { location.href = 'goodsReview.php?Rating=2'; }
			    else if(selectValue==3) { location.href = 'goodsReview.php?Rating=3'; }
			    else if(selectValue==4) { location.href = 'goodsReview.php?Rating=4'; }
			    else if(selectValue==5) { location.href = 'goodsReview.php?Rating=5'; }
}
    }
    </script>

  </head>

  <body>
    <section id="back_bar">    <!--윗배너-->
      <button id="back_icon" onclick="location.href='goodsInfo.html'"><img src="picture/back_button.png" width="50%"></button>
      <label id="explain_label"><b>리뷰 전체보기</b></label>
      <button class="search_bar_button" id="login_button" onclick="location.href='login.html'"><b>로그인</b></button>
    </section>

    <p class="noneline_for_space"></p>   <!--배너와 section 구분-->

    <section> <!--윗부분 정보 섹션. 나에 대한 정보 + 제품 정보 표시-->
      <article id="profile_article"><!--제품 div-->
        <div id="goods_div">
          <img src="picture/product1.jpg" align="left">
          <p style="font-size:150%"><b><?php echo $row['ItemName']; ?></b></p>
          <p style="font-size:80%"><?php echo $row['Date']; ?></p>
        </div>
      </article>
    </section>

    <p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->

    <section id="reviewSearch">  <!--윗배너-->
      <p>
        <wrapper>
          <input type="text" id="searchText" value="찾고 싶은 리뷰를 검색하세요.">
          <button class="searchButton" id="microIcon"><img src="picture/mi.png" id="microId"></button>
        </wrapper>
        <wrapper id="filterButton" name="filtered">
          별점 필터링
          <select id="rateFilter" onchange="rateFilter()">
            <option value="0"> 0 </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
            <option value="4"> 4 </option>
            <option value="5"> 5 </option>
          </select>
          정렬순
          <select id="sorting">
            <option> 최신순 </option>
            <option> 별점순 </option>
          </select></wrapper>
        </p>
      </section>
      <p class="p3"></p>   <!--윗section과 아래 section 구분-->

      <p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->

      <?php while($row=mysqli_fetch_assoc($result)) { ?>
        <section class="reviewClass_section">
          <article class="profile_article" align="left"> <!--내 정보 div-->
            <img src="picture/basic_profile.png" align="left" width="10%" style="margin-right:5%;">
            <p align="left" ><font size=4%><b><?php echo $row['Nickname'];
            $Nickname = $row['Nickname'];
            ?></b></font> <font size=2%>님</font></p>
          </article>
          <article class="review_article">
            <p style="padding:3%;"></p>
            <p style="padding-right: 1%;"><?php echo $row['Rating']; ?>
            </p>
            <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
            <input type="text" class="writing_text">
            <?php echo $row['Advantage']; ?>
            <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
            <input type="text" class="writing_text">
            <?php echo $row['Weakness']; ?>
            <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
            <input type="text" class="writing_text">
            <?php echo $row['Etc']; ?>
          </article>
        </section>


        <p class="noneline_for_space"></p>   <!--아래section과 아래 banner 구분-->

        <section id="bottom_bar">
          <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
          <button class="bottom_bar_button" id="home_icon" onclick="location.href='home.html'"><img src="picture/home_icon.png" width="160%"></button>
          <button class="bottom_bar_button" id="myPage_icon"><img src="picture/myPage_icon.png" width="110%"></button>
        </section>

      </body>
      </html>
