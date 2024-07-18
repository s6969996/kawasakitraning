<?php
$host = 'localhost';
$dbuser  = 'root';
$dbpw = 'Saku@123';
$dbname = 'lll';

$link = mysqli_connect($host, $dbuser, $dbpw, $dbname);

if ($link)
{
 mysqli_query($link, "SET NAMES utf8");
}
else
{
 echo'mysql link die:<br/>'.mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTD-8">
 <title>修改資料</title>
</head>
<body>
<?php
 if(!empty($_GET[mdy])){
  $sql="SELECT * FROM stu WHERE SID=".$_GET['mdy']; 
  $result=mysqli_query($link,$sql);
  $rs=mysqli_fetch_assoc($result);
  $id=$rs[SID];
  $name=$rs[Name];
  $garde=$rs[Garde];  
  }
?>

<div style="width:50%;margin:0 auto;background-color:#eee;text-align:center;padding:2% 5%">
  <h1>修改資料</h1>
  <form method="post">
     <h3>SID: <?= $id ?> </h3>
     <h3>Name<br><input type="text" name="name" style="width:50%" value="<?= $name ?>"></h3>
     <h3>Garde<br><input type="text" name="garde" style="width:50%" value="<?= $garde ?>"></h3>
     <input type="submit" value="修改">
     <input type="reset" value="重置">
  </form>
<div>

<?php
if(!empty($_POST)){
$sql= "UPDATE stu SET Name='$_POST[name]',Garde='$_POST[garde]' WHERE SID='$_GET[mdy]'";
mysqli_query($link,$sql);
mysqli_close($link);
header("location:data.php");
}

?>
</body>
</html>


