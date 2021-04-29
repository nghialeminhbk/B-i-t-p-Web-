<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Sale</title>
</head>
<body>
    <?php 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'mydatabase';
    $table_name = 'Products';
    $connect = mysqli_connect($server, $user, $pass);
    ?>

    <font size="4" color="blue">Select Product We Just Sold</font>
    <form action="sale.php" method="POST">
    <table>
        <tr>
            <?php 
                if (!$connect) {
                    die ("Cannot connect to $server using $user");
                } else {
                    $SQLcmd = "SELECT Product_desc FROM $table_name";
                    mysqli_select_db($connect ,$mydb);
                    $result = mysqli_query($connect, $SQLcmd);
                    if(isset($result)){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<td>'.$row['Product_desc'].'<input type="radio" name="choice" value="'.$row['Product_desc'].'" ></td>';
                        }
                    }
                }
            ?>
        </tr>
    </table>
    <table>
        <tr>
            <td><button>Click To Submit</button></td>
            <td><button type="button" onclick="Reset()">Reset</button></td>
        </tr>
    </table>
    </form>
    <script>
        // $search = document.querySelector('#search');
        // function Reset(){
        //     $search.value = '';
        // }
    </script>
<?php
 if (!$connect) {
      die ("Cannot connect to $server using $user");
 } else {
      $SQLcmd = "SELECT * FROM $table_name";
  mysqli_select_db($connect ,$mydb);
  $result = mysqli_query($connect, $SQLcmd);
  if(isset($result)){
      echo '<br>The Query is <i>'.$SQLcmd.'</i>';
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
?>

</body>
</html>

