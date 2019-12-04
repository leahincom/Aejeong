<?php
$db=mysqli_connect('localhost', 'root', 'skwjdgus', 'aejeong');
if(mysqli_connect_errno()){
  echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
  exit;
}

$search_text = $_POST['search_text'];

$sql = "SELECT * FROM Items WHERE (ItemName = "$search_text" OR BrandName = "$search_text")";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result)) {
  echo '<h2>'.$row['ItemName'].'</h2>';
  echo $row['Picture'];
  echo '<a href="goodsInfo.php">제품 상세보기</a>'.'<br />';
  }
}
 ?>
