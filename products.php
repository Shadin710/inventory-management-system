<?php
    session_start();

    if (empty($_SESSION['username'])) 
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';

    $sql_product_stock = 'SELECT * FROM stock';
    $product_object_stock= mysqli_query($conn,$sql_product_stock) Or die("Falied to query " . mysqli_error($conn));
    $product_count = mysqli_num_rows($product_object_stock);

    $sql_check = "SELECT * FROM articles";
    $object_check = mysqli_query($conn,$sql_check) Or die("Failed to query " . mysqli_error($conn));
    $article_count = mysqli_num_rows($object_check);
 
   $get_name='';

    $null ='';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/products.css">
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
                <a href="entry_lotto.php">Entry Stocks </a>
            </li>
            <li>
                <a href="products.php">Products </a>
            </li>
            <li>
                <a href="supplier_info.php">Supplier </a>
            </li>

            <li class="active">
                <a href="report.php">Report</a>
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
                            <a href="logout.php">
        						<i class="ti-settings"></i>
        						<p>Logout</p>
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
  // need to fix it
    if ($product_count>0 && $article_count>0) 
    {
        $i=0;
        $product_sell=array();
        $product_sale=array();
        while ($product_get=mysqli_fetch_assoc($product_object_stock))
         {  
             
            $get_name = $product_get['Product_Name'];

            $sql_product_sell = "SELECT * FROM articles WHERE Product_Name='$get_name'";

            $product_sale[$i] = mysqli_query($conn,$sql_product_sell) Or die("Failed to query " . mysqli_error($conn));

            $product_sell[$i] = mysqli_fetch_assoc($product_sale[$i]);

            if (isset($product_sell[$i])) {
                $profit = $product_sell[$i]['sell_price'] - $product_get['buy_price'];
                echo '<tr>
                <td>' . $product_get['Product_Name'] . '</td>
                <td>' . $product_get['category'] . '</td>
                <td>' . $product_get['supplier_name'] . '</td>
                <td>' . $product_sell[$i]['room'] . '</td>
                <td>' . $product_get['Under_Stock'] . '</td>
                <td>' . $product_get['buy_price'] . '</td>
                <td>' . $product_sell[$i]['sell_price'] . '</td>
                <td>' . $profit . '</td>
                <td>' . $product_sell[$i]['lotto'] . '</td>
                <td>' . $product_get['dop'] . '</td>
                <td>' . $product_sell[$i]['dos'] . '</td>
                <td>' . $product_sell[$i]['expire'] . '</td>
              </tr>';
            }
            else
            {
                $product_not ='Not Selled';
                $profit = 0;
               
                echo '<tr>
                <td>' . $product_get['Product_Name'] . '</td>
                <td>' . $product_get['category'] . '</td>
                <td>' . $product_get['supplier_name'] . '</td>
                <td>' . $product_not . '</td>
                <td>' . $product_get['Under_Stock'] . '</td>
                <td>' . $product_get['buy_price'] . '</td>
                <td>' . $product_not . '</td>
                <td>' .  $profit . '</td>
                <td>' . $product_not . '</td>
                <td>' . $product_get['dop'] . '</td>
                <td>' . $product_not . '</td>
                <td>' . $product_not . '</td>
              </tr>';
            }
          $i++;
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
























