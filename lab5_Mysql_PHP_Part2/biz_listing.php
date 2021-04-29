<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$mydb = 'business_service';
$table_name_cate = 'categories';
$tabe_name_busi = 'businesses';
$table_name_biz_cate = 'biz_categories';
$cat_id = $_GET['cat_id']??'';
$connect = mysqli_connect($server, $user, $pass);
 if (!$connect) {
      die ("Cannot connect to $server using $user");
 } else {
      $SQLcmd = "SELECT * FROM $table_name_cate";
    mysqli_select_db($connect ,$mydb);
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business listing</title>
    <style>
        table, tr, th, td {
            order: 1px solid black;
            border-collapse: collapse;
        }

        table th, td{
            padding: 10px;
        }

        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            color: orange;
            transform: scale(1.2);
        }
        body{
            display: flex;
            flex-direction: row;
        }
        table{
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>Click on a category to find business listings:</th>
        </tr>
    <?php
        $result = mysqli_query($connect, $SQLcmd);
        if(isset($result)){
            while($row = mysqli_fetch_assoc($result)){
                echo'<tr>
                        <td><a href="biz_listing.php?cat_id='.$row['CategoryID'].'">'.$row['Title'].'</a></td>
                    </tr>';
            }
        }
    ?>
    </table>

    <table border="1">
        <?php
            if($cat_id != ''){
                $SQLselect = "SELECT * FROM $tabe_name_busi AS bs, $table_name_biz_cate AS bizcat WHERE bizcat.BusinessID = bs.BusinessID AND bizcat.CategoryID = '$cat_id'";
                $rs = mysqli_query($connect, $SQLselect);
                while($row = mysqli_fetch_assoc($rs)){
                    echo    '<tr>
                                <td>'.$row['BusinessID'].'</td>
                                <td>'.$row['Name'].'</td>
                                <td>'.$row['Address'].'</td>
                                <td>'.$row['City'].'</td>
                                <td>'.$row['Telephone'].'</td>
                                <td>'.$row['URL'].'</td>
                                <td>'.$row['BusinessID'].'</td>
                                <td>'.$row['CategoryID'].'</td>
                            </tr>';
                }
            }
        ?>
        
    </table>
</body>
</html>