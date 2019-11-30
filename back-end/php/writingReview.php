<?php
mysql_connect('localhost', 'root', 'skwjdgus');
mysql_select_db('Aejeong');

$Advantage = $_POST['Advantage'];
$Weakness = $_POST['Weakness'];
$Etc = $_POST['Etc'];

switch ($_GET['mode']) {
  case 'insert':
    $result = mysql_query("INSERT INTO topic (Advantage, Weakness, Etc)
    VALUES ('".mysql_real_escape_string($_POST['Advantage'])."',
    '".mysql_real_escape_string($_POST['Weakness'])."',
    '".mysql_real_escape_string($_POST['Etc'])."', now())");
    header("Location: reviewList.php");
    break;

  default:
    break;
}
?>
