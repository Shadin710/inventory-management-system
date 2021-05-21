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
    $total_profit = $profit_sell-$product_stock;

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
    <title>Sidebar left menu - Bootdey.com</title>
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
            <li>
                <a href="setting.php">Settings</a>
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
                	<small><span class="text-semibold">7%</span> Higher than yesterday</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-danger panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Lowest Stock</p>
        			<i class="fa fa-comment fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin"><?php echo $low_stock['category'];?></p>
        			<small><span class="text-semibold"><i class="fa fa-unlock-alt fa-fw"></i></span></small>
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
        			<small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> 954</span> Sales in this month</small>
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-info panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Earnings</p>
        			<i class="fa fa-euro fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin"><?php echo $total_profit; ?></p>
        			<small><span class="text-semibold"><i class="fa fa-euro fa-fw"></i> 22,675</span> Total Earning</small>
        		</div>
        	</div>
        </div>        
	</div>

    

    <div class="row">
  <!-- BEGIN SEARCH RESULT -->
  <div class="col-md-12">
    <div class="grid search">
      <div class="grid-body">
        <div class="row">
          <!-- BEGIN FILTERS -->
          <div class="col-md-3">
            <h2 class="grid-title"><i class="fa fa-filter"></i> Filters</h2>
            <hr>
            
            <!-- BEGIN FILTER BY CATEGORY -->
            <h4>By category:</h4>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Application</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Design</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Desktop</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Management</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Mobile</label>
            </div>
            <!-- END FILTER BY CATEGORY -->
            
            <div class="padding"></div>
            
            <!-- BEGIN FILTER BY DATE -->
            <h4>By date:</h4>
            From
            <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1">
              <input type="text" class="form-control">
              <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input1" value="">
            
            To
            <div class="input-group date form_date" data-date="2014-06-14T05:25:07Z" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2">
              <input type="text" class="form-control">
              <span class="input-group-addon bg-blue"><i class="fa fa-th"></i></span>
            </div>
            <input type="hidden" id="dtp_input2" value="">
            <!-- END FILTER BY DATE -->
            
            <div class="padding"></div>
            
            <!-- BEGIN FILTER BY PRICE -->
            <h4>By price:</h4>
            Between <div id="price1">$300</div> to <div id="price2">$800</div>
            <div class="slider-primary">
              <div class="slider slider-horizontal" style="width: 152px;"><div class="slider-track"><div class="slider-selection" style="left: 30%; width: 50%;"></div><div class="slider-handle round" style="left: 30%;"></div><div class="slider-handle round" style="left: 80%;"></div></div><div class="tooltip top hide" style="top: -30px; left: 50.1px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">300 : 800</div></div><input type="text" class="slider" value="" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="[300,800]" data-slider-tooltip="hide"></div>
            </div>
            <!-- END FILTER BY PRICE -->
          </div>
          <!-- END FILTERS -->
          <!-- BEGIN RESULT -->
          <div class="col-md-9">
            <h2><i class="fa fa-file-o"></i> Result</h2>
            <hr>
            <!-- BEGIN SEARCH INPUT -->
            <div class="input-group">
              <input type="text" class="form-control" value="web development">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <!-- END SEARCH INPUT -->
            <p>Showing all results matching "web development"</p>
            
            <div class="padding"></div>
            
            <div class="row">
              <!-- BEGIN ORDER RESULT -->
              <div class="col-sm-6">
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Order by <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Name</a></li>
                    <li><a href="#">Date</a></li>
                    <li><a href="#">View</a></li>
                    <li><a href="#">Rating</a></li>
                  </ul>
                </div>
              </div>
              <!-- END ORDER RESULT -->
              
              <div class="col-md-6 text-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-default active"><i class="fa fa-list"></i></button>
                  <button type="button" class="btn btn-default"><i class="fa fa-th"></i></button>
                </div>
              </div>
            </div>
            
            <!-- BEGIN TABLE RESULT -->
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody><tr>
                  <td class="number text-center">1</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/FF8C00" alt=""></td>
                  <td class="product"><strong>Product 1</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></td>
                  <td class="price text-right">$350</td>
                </tr>
                <tr>
                  <td class="number text-center">2</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/5F9EA0" alt=""></td>
                  <td class="product"><strong>Product 2</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></td>
                  <td class="price text-right">$1,050</td>
                </tr>
                <tr>
                  <td class="number text-center">3</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300" alt=""></td>
                  <td class="product"><strong>Product 3</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i></span></td>
                  <td class="price text-right">$550</td>
                </tr>
                <tr>
                  <td class="number text-center">4</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/8A2BE2" alt=""></td>
                  <td class="product"><strong>Product 4</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></span></td>
                  <td class="price text-right">$330</td>
                </tr>
                <tr>
                  <td class="number text-center">5</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300" alt=""></td>
                  <td class="product"><strong>Product 5</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></td>
                  <td class="price text-right">$540</td>
                </tr>
                <tr>
                  <td class="number text-center">6</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/6495ED" alt=""></td>
                  <td class="product"><strong>Product 6</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></td>
                  <td class="price text-right">$870</td>
                </tr>
                <tr>
                  <td class="number text-center">7</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/DC143C" alt=""></td>
                  <td class="product"><strong>Product 7</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></td>
                  <td class="price text-right">$620</td>
                </tr>
                <tr>
                  <td class="number text-center">8</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/9932CC" alt=""></td>
                  <td class="product"><strong>Product 8</strong><br>This is the product description.</td>
                  <td class="rate text-right"><span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></td>
                  <td class="price text-right">$1,550</td>
                </tr>
              </tbody></table>
            </div>
            <!-- END TABLE RESULT -->
            
            <!-- BEGIN PAGINATION -->
            <ul class="pagination">
              <li class="disabled"><a href="#">«</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
            </ul>
            <!-- END PAGINATION -->
          </div>
          <!-- END RESULT -->
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