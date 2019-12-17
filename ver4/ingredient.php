<!DOCTYPE html>

<?php  if (session_status() == PHP_SESSION_NONE) {
  session_start();}
  $id=$_SESSION['UserID'];
  $ItemName=$_GET['item'];
  $db=mysqli_connect('10.200.39.231:3306', '1111', '1234', 'aejeong');
  $result=mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$ItemName%'");
    $firstGrade =mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$ItemName%' AND ComponentGrade=0");
   $secGrade =mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$ItemName%' AND ComponentGrade=1");
   $thirdGrade =mysqli_query($db, "SELECT * FROM Components WHERE ItemName like '%$ItemName%' AND ComponentGrade=2");
  $fCount = $firstGrade->num_rows;
  $sCount = $secGrade->num_rows;
  $tCount = $thirdGrade->num_rows;
  $total = $fCount+$sCount+$tCount;
  if($total==0){
  	  $total=1;
  }
  $fCount = (int)($fCount/$total * 100);
  $sCount = (int)($sCount/$total * 100);
  $tCount = (int)($tCount/$total * 100);
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
          <?php for($i=0; $i<$fCount/10; $i++) {
            echo '<img src="picture/bluebar.png" class="barimg">'.' ';
          } for($i=0; $i<$sCount/10; $i++) {
            echo '<img src="picture/yellowbar.png" class="barimg">'.' ';
          } for($i=0; $i<$tCount/10; $i++) {
            echo '<img src="picture/redbar.png" class="barimg">'.' ';
          }
          ?>
        </p>
        <p>
          <br>
          <img src="picture/bluebar.png" class="barimg">&nbsp1~2등급: <?php echo $fCount."%"?>&nbsp&nbsp&nbsp
          <img src="picture/yellowbar.png" class="barimg">&nbsp3~4등급: <?php echo $sCount."%"?> &nbsp&nbsp&nbsp
          <img src="picture/redbar.png" class="barimg">&nbsp5~9등급: <?php echo $tCount."%"?>
        </p>
      </div>
    </section>

    <hr id="second">

    <section>
      <div class="buttonDiv">
        <?php   $index = 0;
        while($row=mysqli_fetch_assoc($result)) { ?>
          <button type="button" class="ingredientButton"  onclick="
          if(this.parentNode.getElementsByTagName('div')[<?php echo $index ?>].style.display != '') {
            this.parentNode.getElementsByTagName('div')[<?php echo $index ?>].style.display = '';
            this.value = '숨기기'; }
            else{this.parentNode.getElementsByTagName('div')[<?php echo $index ?>].style.display = 'none';
            this.value = '더보기';}" >
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
          <div class="myDIV" style="display:none;"><?php echo $row['Characteristic']; ?></div>
        <?php $index += 1; } ?>
  </div>
    </section>
    <hr>


  </body>
  </html>