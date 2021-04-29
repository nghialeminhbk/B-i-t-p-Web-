<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Add business</title>
</head>
<body>
    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $mydb = 'business_service';
        $table_name_cate = 'categories';
        $tabe_name_busi = 'businesses';
        $table_name_biz_cate = 'biz_categories';
        $name = $_POST['name']??'';
        $addr = $_POST['address']??'';
        $city = $_POST['city']??'';
        $tele = $_POST['telephone']??'';
        $url = $_POST['url']??'';
        $arr = $_POST['catId']??array();
        $catId = $arr[0]?? 0;
        
        // foreach($arr as $index => $id){
        //     var_dump($index, $id);
        // }

        // var_dump($arr, $url, $name);   
        $connect = mysqli_connect($server, $user, $pass);
         if (!$connect) {
              die ("Cannot connect to $server using $user");
         } else {
              $SQLcmd = "SELECT * FROM $table_name_cate";
              $SQLIsBusi = "INSERT INTO $tabe_name_busi VALUES (null, '$name', '$addr', '$city', '$tele', '$url')";
            mysqli_select_db($connect ,$mydb);
            $result = mysqli_query($connect, $SQLcmd);
         }
    ?>
    <h2>Business Registration</h2>
    <?php
        if(isset($_POST['submit'])){
            $rs = array();
            $resultBusi = mysqli_query($connect, $SQLIsBusi);
            if($resultBusi){
                $SQL = "SELECT BusinessID FROM $tabe_name_busi WHERE Name = '$name'AND Address = '$addr'AND City = '$city'AND Telephone = '$tele' AND URL = '$url'";
                $busiId = mysqli_fetch_array(mysqli_query($connect, $SQL))[0];
                foreach($arr as $index => $cateId){
                    $SQLIsBiz = "INSERT INTO $table_name_biz_cate VALUES ('$busiId', '$cateId')";
                    $rs[$index] = mysqli_query($connect, $SQLIsBiz);
                    if(!$rs[$index]){
                        echo 'False, please check again !';
                        break;
                    }
                }
                echo 'Record inserted as shown below.';
            }
            
        }
    ?>
    <form action="add_biz.php" method="POST">
    <table width="100%">
        <tr>
            <td width="30%">
                <table>
                    <tr>
                        <?php
                            if(!isset($_POST['submit'])){
                                echo '<td class="p-3" >Click on one, or control-click on multiple categories</td>';
                            }else{
                                echo '<td class="p-3" >Selected category values are highlighted.</td>';
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><select name="catId[]" class="form-select" multiple size="3" aria-label="size 3 select example">
                        <?php
                            if(isset($result)){
                                if(!isset($_POST['submit'])){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['CategoryID'].'">'.$row['Title'].'</option>';
                                }
                                }else{
                                    while($row = mysqli_fetch_assoc($result)){
                                        if(in_array($row['CategoryID'], $arr)){
                                            echo '<option selected value="'.$row['CategoryID'].'">'.$row['Title'].'</option>';
                                        }else{
                                            echo '<option value="'.$row['CategoryID'].'">'.$row['Title'].'</option>';
                                        }
                                    }
                                }
                            }

                        ?>
                            </select></td>
                    </tr>
                </table>
            </td>
            <td width="70%">
                <table width="100%">
                    <tr>
                        <td>Business Name</td>
                        <td width=85%><input style="width: 80%" type="text" value="<?=$name?>" name="name" ></td>
                    </tr>
                    <tr>
                        <td>Address</td> 
                        <td><input style="width: 80%" type="text" value="<?=$addr?>" name="address" ></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input style="width: 80%" type="text" value="<?=$city?>" name="city"></td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td><input style="width: 80%" type="text" value="<?=$tele?>" name="telephone"></td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td><input style="width: 80%" type="text" value="<?=$url?>" name="url"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php
        if(!isset($_POST['submit'])){
            echo '<button class="btn btn-success ms-3" name="submit">Add Business</button>';
        }else{
            echo '<a class="ms-3" href="add_biz.php">Add Another Business</a>';
        }
    ?>
    </form>
    
    <!-- <script>
        $anoun = document.getElementById('anoun');
        function anoun(){
            $anoun.innerHTML = "Selected category values are highlight.";
        }
    </script> -->
</html>