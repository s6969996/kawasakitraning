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

if($_POST['OKBTN'])
{
$a=$_POST['s_id'];
$b=$_POST['s_name'];
$c=$_POST['s_garde'];
$sql="INSERT into stu values($a,'$b',$c)";
mysqli_query($link,$sql);
}

echo "<script>alert('退出成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>"; 

?>
