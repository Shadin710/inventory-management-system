<?php
    session_start();
    if (empty($_SESSION['username'])) 
    {
        header("Location:index.php");
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Entry Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/entry.css">
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
                <a href="products.php">Products</a>
            </li>
            <li class="active">
                <a href="supplier_info.php">Supplier</a>
            </li>
            <li>
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
                            <a href="warning_sign.php">
        						<i class="ti-settings"></i>
        						<p>Clear todays Product</p>
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
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
    <form action="entry_product_db.php" method='POST'>
		<div class="row gutters">
            
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Product Entry</h6>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Product Name</label>
					<input type="text" class="form-control" id="eMail" name="pName" placeholder="Product Name">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">City Name</label>
					<input type="text" class="form-control" id="eMail" name="city" placeholder="Product Name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Category</label>
                    <select name="category" class="form-control" id="fullName">
                        <option value="">Choose a product</option>
                        <option value="Courtesies">Courtesies</option>
                        <option value="Frigobar">Frigobar</option>
                        <option value="RoomService"> Room Service</option>
                        <option value="Other">Other</option>
                    </select>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Number of product</label>
					<input type="number" class="form-control" name = "sell" id="website" placeholder="Number of Product">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Selling Price</label>
					<input type="number" class="form-control" name ="selling_price" id="website" placeholder="Selling Price">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Room</label>
					<input type="text" class="form-control" name = "room_number" id="website" placeholder="Room number">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Sales per period</label>
					<input type="text" class="form-control" name = "spp" id="website" placeholder="Sales per period">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Cost per Room</label>
					<input type="text" class="form-control" name = "cpr" id="website" placeholder="Cost Per Room">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Lotto</label>
					<input type="number" class="form-control" name="lotto" id="website" placeholder="Lotto">
				</div>
			</div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Date of Sell</label>
					<input type="date" class="form-control" id="website" name="dos" placeholder="Date of Sell">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Expire Date</label>
					<input type="date" class="form-control" id="website" name="Expire" placeholder="Expire Date">
				</div>
			</div>
		</div>


		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
                <input type="submit" id="submit" name="submit" class="btn btn-primary" value ='SUBMIT'>
                    <a href="homepage.php"><button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button></a>
				</div>

			</div>
		</div>
        
        
	</div>
</div>
</div>
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