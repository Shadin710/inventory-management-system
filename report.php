<?php
    session_start();

    if (empty($_SESSION['username'])) 
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';

    $sql_product = 'SELECT * FROM articles';
    $product_object= mysqli_query($conn,$sql_product) Or die("Falied to query " . mysqli_error($conn));
    $product_count = mysqli_num_rows($product_object);

    $null ='   ';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Sidebar left menu - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/report.css">
</head>
<body>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div id="wrapper" class="wrapper-content">
    <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                   Welcome
                </a>
            </li>
            <li>
                <a href="homepage.php">Homepage</a>
            </li>
            <li>
                <a href="entry_product.php">Entry Products</a>
            </li>
            <li>
                <a href="supplier.php">Supplier </a>
            </li>
            <li>
                <a href="room.php">Rooms</a>
            </li>
            <li class="active">
                <a href="report.php">Report</a>
            </li>
            <li>
                <a href="logs.php">Logs</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="btn-menu btn btn-success btn-toggle-menu" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
        						<p>Stats</p>
                            </a>
                        </li>
        				<li>
                            <a href="#">
        						<i class="ti-settings"></i>
        						<p>Settings</p>
                            </a>
                        </li>
                    </ul>
        
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
            <table id="customers">
  <tr>
    <th>Product Name</th>
    <th>Category</th>
    <th>Supplier Name</th>
    <th>Room</th>
    <th>Under Stock</th>
    <th>Buy Price</th>
    <th>Sell Price</th>
    <th>Profit</th>
    <th>Lotto</th>
    <th>Date of Purchase</th>
    <th>Date of Sell</th>
    <th>Expire Date</th>
  </tr>
  <?php
    if ($product_count>0) 
    {
        while ($product=mysqli_fetch_assoc($product_object))
         {
            $profit = $product['sell_price']-$product['buy_price'];
            echo '<tr>
            <td>' . $product['Product_Name'] . '</td>
            <td>' . $product['category'] . '</td>
            <td>' . $product['supplier_name'] . '</td>
            <td>' . $product['room'] . '</td>
            <td>' . $product['Under_Stock'] . '</td>
            <td>' . $product['buy_price'] . '</td>
            <td>' . $product['sell_price'] . '</td>
            <td>' . $profit . '</td>
            <td>' . $product['lotto'] . '</td>
            <td>' . $product['dop'] . '</td>
            <td>' . $product['dos'] . '</td>
            <td>' . $product['expire'] . '</td>
          </tr>';
         }    
    }
    else
    {
        echo '<tr>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
        <td>' . $null . '</td>
      </tr>';
    }


  ?>


</table>
            </div>
        </div>
    </div>
</div>


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	



$(function(){
    $(".btn-toggle-menu").click(function() {
        $("#wrapper").toggleClass("toggled");
    });
})
</script>
</body>
</html>
























