<!DOCTYPE html>
<html>
<?php  if (session_status() == PHP_SESSION_NONE) {
  session_start();}
  $id=$_SESSION['UserID'];
  $item=$_GET['item'];
  $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
  ?>

  <head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="goodsReviewStyle.css">
    <title>애정 : 제품 리뷰</title>
    <script type="text/javascript">
    function rateFilter() {
      var selectValue = document.getElementById("rateFilter").options[document.getElementById("rateFilter").selectedIndex].value;
      if(selectedValue=="") {
        <?php
        $result=mysqli_query($db, "SELECT * FROM items WHERE Picture='$item'");
        $row=mysqli_fetch_assoc($result);
         ?>
      }
      else if(selectValue=="0") {
        <?php
        $result = mysqli_query($db, "SELECT * FROM Reviews WHERE Rating >= 0 AND Rating < 1")
        $row = mysqli_fetch_assoc($result);
         ?>
       }
      else if(selectValue=="1") {
        <?php
      $result = mysqli_query($db, "SELECT * FROM Reviews WHERE Rating >= 1 AND Rating < 2")
      $row = mysqli_fetch_assoc($result);
       ?>
     }
      else if(selectValue=="2") {
        <?php
        $result = mysqli_query($db, "SELECT * FROM Reviews WHERE Rating >= 2 AND Rating < 3")
        $row = mysqli_fetch_assoc($result);
         ?>
        }
      else if(selectValue=="3") { <?php
      $result = mysqli_query($db, "SELECT * FROM Reviews WHERE Rating >= 3 AND Rating < 4")
      $row = mysqli_fetch_assoc($result);
       ?>
      }
      else if(selectValue=="4") {
        <?php
        $result = mysqli_query($db, "SELECT * FROM Reviews WHERE Rating >= 4 AND Rating < 5")
        $row = mysqli_fetch_assoc($result);
         ?>
        }
      else if(selectValue=="5") {
        <?php
        $result = mysqli_query($db, "SELECT * FROM Reviews WHERE Rating = 5")
        $row = mysqli_fetch_assoc($result);
         ?> }

    }

    function sorting() {
      var selectValue = document.getElementById("sorting").options[document.getElementById("sorting").selectedIndex].value;

      if(selectValue=="new") {
        <?php
        $result=mysqli_query($db, "SELECT * FROM Reviews ORDER BY Date DESC");
        $row=mysqli_fetch_assoc($result);
      ?>
    }
      else if (selectValue=="rates") {
        <?php
        $result=mysqli_query($db, "SELECT * FROM Reviews ORDER BY Rating DESC");
        $row=mysqli_fetch_assoc($result);
        }
      ?>
      }
    }
  </script>
</head>

<body>
  <section id="back_bar">    <!--윗배너-->
    <button id="back_icon" onclick="location.href='goodsInfo.html'"><img src="picture/back_button.png" width="50%"></button>
    <label id="explain_label"><b>리뷰 전체보기</b></label>
    <button class="search_bar_button" id="login_button" onclick="location.href='Logout.php'"><b>로그아웃</b></button>
  </section>

  <p class="noneline_for_space"></p>   <!--배너와 section 구분-->

  <section> <!--윗부분 정보 섹션. 나에 대한 정보 + 제품 정보 표시-->
    <article id="profile_article"><!--제품 div-->
      <div id="goods_div">
        <img src="<?php echo $item; ?>" align="left">
        <p style="font-size:150%"><b><?php echo $row['ItemName']; ?></b></p>
        <p style="font-size:80%"><?php echo $row['Date']; ?></p>
      </div>
    </article>
  </section>

  <p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->

  <section id="reviewSearch">  <!--윗배너-->
    <p>
      <wrapper>
        <form method="POST" action="reviewSearch.php">
        <input type="text" id="searchText" value="찾고 싶은 리뷰를 검색하세요." name="searchText">
        <button type="submit" class="searchButton" id="microIcon"><img src="picture/mi.png" id="microId"></button>
      </form>
      </wrapper>
      <wrapper id="filterButton" name="filtered">
        별점 필터링
        <select id="rateFilter" name="rateFilter" onchange="rateFilter();">
          <option value="" selected disabled>별점</option>
          <option value="0"> 0 </option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option>
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
        </select>
        정렬순
        <select id="sorting" name="sorting" onchange="sorting();">
          <option value="new"> 최신순 </option>
          <option value="rates"> 별점순 </option>
        </select></wrapper>
      </p>
    </section>
    <p class="p3"></p>   <!--윗section과 아래 section 구분-->

    <p class="noneline_for_space"></p>   <!--윗section과 아래 section 구분-->

    <section class="reviewClass_section">
      <?php while($row=mysqli_fetch_assoc($result)) { ?>
        <article class="profile_article" align="left"> <!--내 정보 div-->
          <img src="picture/basic_profile.png" align="left" width="10%" style="margin-right:5%;">
          <p align="left" ><font size=4%><b><?php echo $row['Nickname']; ?>
          </b></font> <font size=2%>님</font></p>
        </article>
        <article class="review_article">
          <p style="padding:3%;"></p>
          <p style="padding-right: 1%;"><?php echo $row['Rating']; ?>
          </p>
          <p style="color:#6699ff;">장점 <img src="picture/smile.png" width="3%"></p>
          <?php echo $row['Advantage']; ?>
          ---------------------------------------------
          <p style="color:#ff3366;">단점 <img src="picture/bad.png" width="3%"></p>
          <?php echo $row['Weakness']; ?>
          ---------------------------------------------
          <p style="color:#888888;">기타<img src="picture/soso.png" width="3%"></p>
          <?php echo $row['Etc']; ?>
        </article>
      <?php } ?>
    </section>

    <p class="noneline_for_space"></p>   <!--아래section과 아래 banner 구분-->

    <section id="bottom_bar">
      <button class="bottom_bar_button" id="category_icon" onclick="location.href='productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
      <button class="bottom_bar_button" id="home_icon" onclick="location.href='home.html'"><img src="picture/home_icon.png" width="160%"></button>
      <button class="bottom_bar_button" id="myPage_icon"><img src="picture/myPage_icon.png" width="110%"></button>
    </section>

  </body>
  </html>
