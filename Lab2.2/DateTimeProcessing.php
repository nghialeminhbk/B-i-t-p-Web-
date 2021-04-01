<html><head><title>Date Time Processing</title></head></html>
<body>
    <p>Enter your name and select date and time for appointment</p>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <table>
        <tr>
            <td>Your name: </td>
            <td colspan="3"><input type="text" maxlength="15" name="name"></td>
        </tr>
        <tr>
            <td>Date: </td>
            <td><select name="day">
                <?php 
                    for ($i=1; $i<=31; $i++){
                        print("<option>$i</option>");
                    }
                ?>
            </select></td>
            <td><select name="month">
                <?php 
                    for ($i=1; $i<=12; $i++){
                        print("<option>$i</option>");
                    }
                ?>
            </select></td>
            <td><select name="year">
                <?php 
                    for ($i=1990; $i<=2021; $i++){
                        print("<option>$i</option>");
                    }
                ?>
            </select></td>
        </tr>
        <tr>
            <td>Time: </td>
            <td><select name="hour">
                <?php 
                    for ($i=0; $i<=23; $i++){
                        print("<option>$i</option>");
                    }
                ?>
            </select></td>
            <td><select name="minute">
                <?php 
                    for ($i=0; $i<=59; $i++){
                        print("<option>$i</option>");
                    }
                ?>
            </select></td>
            <td><select name="second">
                <?php 
                    for ($i=0; $i<=59; $i++){
                        print("<option>$i</option>");
                    }
                ?>
            </select></td>
        </tr>
        <tr>
            <td align="right"><input type="submit" value="Submit"></td>
            <td align="left"><input type="reset" value="Reset"></td>
        </tr>
    </table>
    <table>
    <?php
        if(array_key_exists("name", $_GET)){
            $name = $_GET['name'];
            $day = $_GET['day'];
            $month = $_GET['month'];
            $year = $_GET['year'];
            $hour = $_GET['hour'];
            $minute = $_GET['minute'];
            $second = $_GET['second'];
            print("Hi $name! <br></br>");
            print("You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year<br></br>");
            print("More information <br></br>");
            if($hour >= 12){
                $hour = $hour-12;
                print("In 12 hours, the time and date is $hour:$minute:$second PM, $day/$month/$year<br></br>");
            }
            else{
                print("In 12 hours, the time and date is $hour:$minute:$second AM, $day/$month/$year<br></br>");
            }
            if (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)){
                $temp = 29;
            }
            else{
                $temp = 28;
            }
            if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
                print("This month has 31 days!");
            }
            elseif($month == 4 || $month == 6 || $month == 9 || $month == 11){
                print("This month has 30 days!");
            }
            else{
                print("This month has $temp days!");
            }
        }
        ?> 
    </table>
    </form>
    
</body>