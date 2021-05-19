<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';
    $sql_rooms = 'SELECT * FROM articles';
    $room_object = mysqli_query($conn,$sql_rooms) Or die("Failed to query " . mysqli_error($conn));
    $rooms_sold = mysqli_fetch_assoc($room_object);

    $sql_report = 'SELECT * FROM supplier';
    $report_object = mysqli_query($conn,$sql_report) Or die("Failed to query " . mysqli_error($conn));
    $report = mysqli_fetch_assoc($report_object);

    $sql_warehouse =  'SELECT * FROM rooms';
    $warehouse_object = mysqli_query($conn,$sql_warehouse) Or die("Failed to query " . mysqli_error($conn));
    $warehouse = mysqli_fetch_assoc($warehouse_object);
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
    <style type="text/css">
        	body{
    background:#eee;
    margin-top:20px;
}

.panel {
  box-shadow: 0 2px 0 rgba(0,0,0,0.05);
  border-radius: 0;
  border: 0;
  margin-bottom: 24px;
}

.panel-dark.panel-colorful {
  background-color: #3b4146;
  border-color: #3b4146;
  color: #fff;
}

.panel-danger.panel-colorful {
  background-color: #f76c51;
  border-color: #f76c51;
  color: #fff;
}

.panel-primary.panel-colorful {
  background-color: #5fa2dd;
  border-color: #5fa2dd;
  color: #fff;
}

.panel-info.panel-colorful {
  background-color: #4ebcda;
  border-color: #4ebcda;
  color: #fff;
}

.panel-body {
  padding: 25px 20px;
}

.panel hr {
  border-color: rgba(0,0,0,0.1);
}

.mar-btm {
  margin-bottom: 15px;
}

h2, .h2 {
  font-size: 28px;
}

.small, small {
  font-size: 85%;
}

.text-sm {
  font-size: .9em;
}

.text-thin {
  font-weight: 300;
}

.text-semibold {
  font-weight: 600;
}
    	body{
    background:#f4f3ef;    
}

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background:#fff;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper {
    box-shadow: inset -1px 0px 0px 0px #DDDDDD;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
}

.sidebar-nav li a:hover {
    text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}

#sidebar-wrapper li.active > a:after {
    border-right: 17px solid #f4f3ef;
    border-top: 17px solid transparent;
    border-bottom: 17px solid transparent;
    content: "";
    display: inline-block;
    position: absolute;
    right: -1px;
}

.sidebar-brand {
    border-bottom: 1px solid rgba(102, 97, 91, 0.3);
}

.sidebar-brand {
    padding: 18px 0px;
    margin: 0 20px;
}

.navbar .navbar-nav > li > a p {
    display: inline-block;
    margin: 0;
}
p {
    font-size: 16px;
    line-height: 1.4em;
}

.navbar-default {
    background-color: #f4f3ef;
    border:0px;
    border-bottom: 1px solid #DDDDDD;
}

btn-menu {
    border-radius: 3px;
    padding: 4px 12px;
    margin: 14px 5px 5px 20px;
    font-size: 14px;
    float: left;
}
body{margin-top:20px;
background:#eee;
}

.btn {
    margin-bottom: 5px;
}

.grid {
    position: relative;
    width: 100%;
    background: #fff;
    color: #666666;
    border-radius: 2px;
    margin-bottom: 25px;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}

.grid .grid-body {
    padding: 15px 20px 15px 20px;
    font-size: 0.9em;
    line-height: 1.9em;
}
 
.search table tr td.rate {
    color: #f39c12;
    line-height: 50px;
}

.search table tr:hover {
    cursor: pointer;
}

.search table tr td.image {
	width: 50px;
}

.search table tr td img {
	width: 50px;
	height: 50px;
}

.search table tr td.rate {
	color: #f39c12;
	line-height: 50px;
}

.search table tr td.price {
	font-size: 1.5em;
	line-height: 50px;
}

.search #price1,
.search #price2 {
	display: inline;
	font-weight: 600;
}
    </style>
</head>
<body>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div id="wrapper" class="wrapper-content">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Welcome <?php $_SESSION['username']?>
                </a>
            </li>
            <li>
                <a href="homepage.php">Homepage</a>
            </li>
            <li>
                <a href="entry_product.php">Entry</a>
            </li>
            <li>
                <a href="report.php">Report</a>
            </li>
            <li>
                <a href="supplier.php">Supplier</a>
            </li>
            <li class="active">
                <a href="setting.php">Settings</a>
            </li>
            <li>
                <a href="services.php">Services</a>
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
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-dark panel-colorful">
                <div class="panel-body text-center">
                	<p class="text-uppercase mar-btm text-sm">Visit Today</p>
                	<i class="fa fa-users fa-5x"></i>
                	<hr>
                	<p class="h2 text-thin">254,487</p>
                	<small><span class="text-semibold">7%</span> Higher than yesterday</small>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-danger panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Comments</p>
        			<i class="fa fa-comment fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin">873</p>
        			<small><span class="text-semibold"><i class="fa fa-unlock-alt fa-fw"></i> 154</span> Unapproved comments</small>
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-primary panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">New Order</p>
        			<i class="fa fa-shopping-cart fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin">2,423</p>
        			<small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> 954</span> Sales in this month</small>
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-info panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">Earning</p>
        			<i class="fa fa-dollar fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin">7,428</p>
        			<small><span class="text-semibold"><i class="fa fa-dollar fa-fw"></i> 22,675</span> Total Earning</small>
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