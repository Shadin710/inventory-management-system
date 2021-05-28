<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';
    $sql_rooms = 'SELECT * FROM articles';
    $room_object = mysqli_query($conn,$sql_rooms) Or die("Failed to query " . mysqli_error($conn));
    $rooms_sold = mysqli_num_rows($room_object);

    $profit_sell=0;
    while ($product = mysqli_fetch_assoc($room_object)) 
    {
        $profit_sell = $profit_sell+$product['sell_price'];
    }
    $sql_stock = 'SELECT * FROM stock';
    $stock_object = mysqli_query($conn,$sql_stock) Or die("Failed to query " . mysqli_error($conn));
    $profit_stock = 0;
    $product_under_stock=0;
    while ($product_stock = mysqli_fetch_assoc($stock_object)) 
    {
      $profit_stock = $profit_stock+$product_stock['buy_price'];
      $product_under_stock = $product_under_stock +$product_stock['Under_Stock'];
    }
    $total_profit = $profit_sell-$profit_stock;

    $_SESSION['profit_sell'] = $profit_sell;
    $_SESSION['profit_stock'] = $profit_stock;
    $sql_report = 'SELECT * FROM supplier';
    $report_object = mysqli_query($conn,$sql_report) Or die("Failed to query " . mysqli_error($conn));
    $report = mysqli_fetch_assoc($report_object);

    //$sql_warehouse =  'SELECT * FROM rooms';
    //$warehouse_object = mysqli_query($conn,$sql_warehouse) Or die("Failed to query " . mysqli_error($conn));
    //$warehouse = mysqli_fetch_assoc($warehouse_object);

    $sql_low_stock='SELECT * FROM stock ORDER BY Under_Stock ASC';
    $low_stock_object = mysqli_query($conn,$sql_low_stock) Or die("Failed to query " . mysqli_error($conn));
    $low_stock = mysqli_fetch_assoc($low_stock_object);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/homepage.css">
</head>
<body>


<div id="wrapper" class="wrapper-content">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
           
            <li class="sidebar-brand">
                
                   Welcome
                
            </li>
            <li>
                <a href="homepage.php">Homepage</a>
            </li>
            <li>
                <a href="entry_product.php">Entry Products</a>
            </li>
            <li>
                <a href="entry_lotto.php">Entry your stock </a>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
        						<p></p>
                            </a>
                        </li>
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
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-dark panel-colorful">
                <div class="panel-body text-center">
                	<p class="text-uppercase mar-btm text-sm">Rooms Sold Today</p>
                	<i class="fa fa-users fa-5x"></i>
                	<hr>
                	<p class="h2 text-thin"><?php echo $rooms_sold;?></p>
                	<small><span class="text-semibold"><?php echo $rooms_sold;?></span> have been provided with services</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-danger panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Lowest Stock</p>
        			<i class="fa fa-comment fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin"><?php 

                  if (isset($low_stock['category'])) 
                  {
                       echo $low_stock['category'];  
                     
                  }
                  else
                  {
                    echo '<small><span class="text-semibold">No Products are in the database</span></small>';
                  }
              
              ?></p>
        			<small><span class="text-semibold"><i class="fa fa--alt fa-fw"></i>you are running out of stock</span></small>
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-primary panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Total Product</p>
        			<i class="fa fa-shopping-cart fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin"><?php echo $product_under_stock;?></p>
        			<small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> <?php echo $product_under_stock;?></span> Product under stock</small>
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-info panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Earnings</p>
        			<i class="fa fa-euro fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin"><?php 
              
                  if ($rooms_sold==0) {
                    
                      $total_profit=0;
                  }
                    echo $total_profit; 

                    $_SESSION['profit'] = $total_profit;
              
              
              ?></p>
        			<small><span class="text-semibold"><i class="fa fa-euro fa-fw"></i> <?php echo $total_profit; ?></span> Total Earning</small>
        		</div>
        	</div>
        </div>        
	</div>

  <!-- END SEARCH RESULT -->
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