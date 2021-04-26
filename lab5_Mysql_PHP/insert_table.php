<html><head><title>Insert Table</title></head><body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'mydatabase';
$table_name = 'Products';
$des = $_POST['des']??'';
$weight = $_POST['weight']??'';
$cost = $_POST['cost']??'';
$num = $_POST['num']??'';
$connect = mysqli_connect($server, $user, $pass);
 if (!$connect) {
      die ("Cannot connect to $server using $user");
 } else {
      $SQLcmd = "INSERT INTO $table_name 
                VALUES (null, '$des','$cost','$weight','$num')";
  mysqli_select_db($connect ,$mydb);
  if (mysqli_query($connect, $SQLcmd)){
    print '<font size="4" color="blue" >The Query is '.$SQLcmd.'</font>'; 
    print '<br>Insert into '.$mydb.' was successful !';
  } else {
    die ("Insert Table Failed SQLcmd=$SQLcmd");
  } 
  mysqli_close($connect);
 }
 ?></body></html> 
