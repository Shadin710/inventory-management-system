<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $pNAME=$_POST['pName'];
        $category = $_POST['category'];
        $sellPrice = $_POST['selling_price'];
        $sell= $_POST['sell'];
        $room_number =$_POST['room_number'];
        $lotto = $_POST['lotto'];
        $dos = $_POST['dos'];
        $expire = $_POST['Expire'];
        $spp=  $_POST['spp'];
        $cost_per_room = $_POST ['cpr'];
        $city_name = $_POST['city'];

        $sql_article = "INSERT INTO articles(Product_Name,category,sold_product,room,sell_price,lotto,dos,expire,Sales_Period) VALUES ('$pNAME','$category','$sell','$room_number','$sellPrice','$lotto','$dos','$expire','$spp')";

        if(!mysqli_query($conn,$sql_article))
        {
            die("Failed to insert the data in product table" . mysqli_error($conn));
        }
        else
        {
            $get_stock  = 'SELECT * FROM stock';
            $stock_object = mysqli_query($conn,$get_stock) Or die("Failed to query " . mysqli_error($conn));
            $stock = mysqli_fetch_assoc($stock_object);

            $uStock = $stock['Under_Stock'] - $sell;

            $sql_stock_update = "UPDATE stock SET Under_Stock='$uStock' WHERE Product_Name='$pNAME'";

            if (!mysqli_query($conn,$sql_stock_update)) {
                die("Failed to update the data" . mysqli_error($conn));
            }
            else
            {
                $sql_room = "INSERT INTO room(room_ID,cost_per_room,pName) VALUES ('$room_number','$cost_per_room','$pName')";
                if (!mysqli_query($conn,$sql_room)) 
                {
                     die("Failed to insert in room table " . mysqli_error($conn));
                } 
                else
                {
                    //search the city and update

                    $sql_find_city ="SELECT * FROM city WHERE city_name='$city_name' and Product_Name = '$pNAME'";
                    $city_lot_object = mysqli_query($conn,$sql_find_city) Or die("failed to search city lot " . mysqli_error($conn));

                    $city_object = mysqli_fetch_assoc($city_lot_object);

                    //Substract the current lot with input lot
                    $city_lotto = $city_object['city_lotto']-$lotto;

                    $sql_city_update = "UPDATE city SET city_lotto = '$city_lotto' WHERE Product_Name = '$pNAME' AND city_name = '$city_name'";

                    if (!mysqli_query($conn,$sql_city_update)) 
                    {
                        die("Failed to insert in city table" .  mysqli_error($conn));
                    }
                    else
                    {
                        header("Location:homepage.php");
                    }
                    
                }
            }
            
        }
    }

?>