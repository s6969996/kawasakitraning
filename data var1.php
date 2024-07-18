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

$sql = "select * from stu";
$result = mysqli_query($link, $sql);
?>
<!doctype html>
<html>
<head>
  <meta charset="utd-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>ALLUSER</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="C:\Users\User\Desktop\kawasaki\1.html">
          <img src="C:\Users\User\Desktop\kawasaki\imag\1.png" width="50" height="50" alt="icon">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="C:\Users\User\Desktop\kawasaki\1.html">首頁</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            車款介紹
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="2.html">NINJA 車系</a></li>
            <li><a class="dropdown-item" href="2.html">Z 車系</a></li>
            <li><a class="dropdown-item" href="2.html">W 車系</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">經銷據點</a> 
        </li>
      </ul>
    </div>
  </div>
</nav>
<div>
<form action="adduser.php" method="POST">
SID:<input type="text" name="s_id" maxlength="6" size="10"><br>
Name:<input type="text" name="s_name" maxlength="6" size="8"><br>
Garde:<input type="text" name="s_garde" maxlength="6" size="8"><br>
<input name="OKBTN" type="submit" value="提交">
</form>
<table width="700" border='1'>
  <tr>
    <td>SID</td>
    <td>Name</td>
    <td>Garde</td>
    <td>修改/刪除</td>
  </tr>
<?php
for($i=1;$i<=mysqli_num_rows($result);$i++){
$rs=mysqli_fetch_assoc($result);
$id=$rs[SID];
$name=$rs[Name];
$garde=$rs[Garde];
?>
  <tr>
      <td><?php echo $id?></td>
      <td><?php echo $name?></td>
      <td><?php echo $garde?></td>
      <td>
         <button onclick="location.href='?page=test&del=<?= $id ?>'">刪除</button>
         <button onclick="location.href='edituser.php?&mdy=<?= $id?>'">修改</button>
      </td>
  </tr>
<?php
}
?>
</table>
<?php
if(!empty($_GET['del'])){
  $sql="DELETE FROM stu WHERE SID=".$_GET['del'];
  mysqli_query($link,$sql);
  header("location:?page=test");
}
?>
</div>
</body>
</html>
