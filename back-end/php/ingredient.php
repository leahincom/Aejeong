<!DOCTYPE html>

<?php  if (session_status() == PHP_SESSION_NONE) {
  session_start();}
  $id=$_SESSION['UserID'];
  $ItemName=$_GET['item'];
  $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
  $count = mysql_query("SELECT count(1) FROM table");
  $sevRow = mysql_fetch_array($count);
  $total = $sevRow[0];
  $result=mysqli_query($db, "SELECT * FROM Components WHERE ItemName='$ItemName'");
  $fCount = 0;
  $sCount = 0;
  $tCount = 0;
  while($row = mysqli_fetch_assoc($result)) {
    if($row['ComponentGrade'] == 0) $fCount += 1;
    else if($row['ComponentGrade'] == 1) $sCount += 1;
    else if($row['ComponentGrade'] == 2) $tCount += 1;
  }
  $fCount = $fCount/$total * 100;
  $sCount = $sCount/$total * 100;
  $tCount = $tCount/$total * 100;
  ?>

  <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <title> 애정 : 성분 상세 페이지</title>
    <link rel="stylesheet" href="ingredientStyle.css">
  </head>
  <body>

    <section>

      <div>
        <p id="name_bar"><b>성분</b></p>
      </div>

      <hr id="first">

      <div id="ingredient_bar">
        <p>  <!--제품 성분-->
          <script language = "javascript">
          <?php for(i=0; i<$fCount/10; i++) {
            echo '<img src="picture/bluebar.png" class="barimg">';
          } for(i=0; i<$fCount/10; i++) {
            echo '<img src="picture/yellowbar.png" class="barimg">';
          } for(i=0; i<$fCount/10; i++) {
            echo '<img src="picture/redbar.png" class="barimg">';
          }
          ?>
          </script>
        </p>
        <p>
          <br>
          <img src="picture/bluebar.png" class="barimg">&nbsp1등급: <?php echo $fCount."%"?>&nbsp&nbsp&nbsp
          <img src="picture/yellowbar.png" class="barimg">&nbsp2등급: <?php echo $sCount."%"?> &nbsp&nbsp&nbsp
          <img src="picture/redbar.png" class="barimg">&nbsp3등급: <?php echo $tCount."%"?>
        </p>
      </div>
    </section>

    <hr id="second">

    <section>
      <div class="buttonDiv">
        <?php   while($row=mysqli_fetch_assoc($result)) { ?>
          <button class="ingredientButton"  onclick="if(this.parentNode.getElementsByTagName('div')[0].style.display != ''){this.parentNode.getElementsByTagName('div')[0].style.display = '';this.value = '숨기기';}else{this.parentNode.getElementsByTagName('div')[0].style.display = 'none'; this.value = '더보기';}" >
            <?php
            $grade=$row['ComponentGrade'];
            if($grade == 0) {
              echo '<img src="picture/in1.png" class="rankingimg">';
            } else if($grade==1) {
              echo '<img src="picture/in3.png" class="rankingimg">';
            } else if($grade==2) {
              echo '<img src="picture/in5.png" class="rankingimg">';
            }
            ?>
            <p class="nameP"><?php echo $row['ComponentsName'] ?></p>
          </button>
          <div class="myDIV" style="display:none;"><?php echo $row['Characteristic'] ?></div>
        <?php } ?>
      </div>
    </section>
    <hr>


  </body>
  </html>
