<html><head><title>Insert Table</title></head><body>
<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'business_service';
$table_name = 'categories';
$catId = $_POST['catId']??'';
$title = $_POST['title']??'';
$des = $_POST['description']??'';
$connect = mysqli_connect($server, $user, $pass);
 if (!$connect) {
      die ("Cannot connect to $server using $user");
 } else {
      $SQLcmd = "SELECT * FROM $table_name";
      $SQLIs = "INSERT INTO $table_name VALUES ('$catId', '$title', '$des')";
    mysqli_select_db($connect ,$mydb);
    if($catId != '' && $title !='' && $des != ''){
        mysqli_query($connect, $SQLIs);
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Admin</title>
</head>
    <form action="admin.php" method="POST">
    <table class="table">
        <thead class="table-light">
        <tr>
            <th>Cat ID</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
           $result = mysqli_query($connect, $SQLcmd);
           if(isset($result)){
             while($row = mysqli_fetch_assoc($result)){
                 echo ' <tr>
                 <td>'.$row['CategoryID'].'</td>
                 <td>'.$row['Title'].'</td>
                 <td>'.$row['Description'].'</td>
             </tr>';
            }
        }
            mysqli_close($connect);
        ?>
        <tr>
            <td><input type="text" name="catId" require></td>
            <td><input type="text" name="title" require></td>
            <td><input type="text" name="description" require></td>
        </tr>
        </tbody>
    </table>
    <button class="btn btn-success ms-3">Add Category</button>
    </form>
<body>
    
</body>
</html>
</body></html> 
