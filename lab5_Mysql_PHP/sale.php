<html><head><title>Insert Table</title></head><body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'mydatabase';
$table_name = 'Products';
$choice = $_POST['choice']??'';
$connect = mysqli_connect($server, $user, $pass);
 if (!$connect) {
      die ("Cannot connect to $server using $user");
 } else {
      $SQLcmd = "SELECT * FROM $table_name";
      $SQLUpdate = "UPDATE $table_name SET Numb = Numb - 1 WHERE (Product_desc = '$choice')";
  mysqli_select_db($connect ,$mydb);
  $update = mysqli_query($connect, $SQLUpdate);
  echo '<font size="5" color="blue" > Update Results for Table Products</font>';
  if($update){
      echo '<br>The Query is <i>'.$SQLUpdate.'</i>';
  }else{
      echo 'Update fail!';
  }
  $result = mysqli_query($connect, $SQLcmd);
  if(isset($result)){
      echo '<table border=1>
      <tr>
        <th>Num</th>
        <th>Product</th>
        <th>Cost</th>
        <th>Weight</th>
        <th>Count</th>
      </tr> ';
    while($row = mysqli_fetch_assoc($result)){
        echo '    <tr>
        <td>'.$row['ProductID'].'</td>
        <td>'.$row['Product_desc'].'</td>
        <td>'.$row['Cost'].'</td>
        <td>'.$row['Weight'].'</td>
        <td>'.$row['Numb'].'</td>
    </tr>';
    }
  }
  mysqli_close($connect);
 }
 ?></body>

 </html> 
