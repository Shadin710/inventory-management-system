<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Sidebar left menu - Bootdey.com</title>
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
                            <a href="setting.php">
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
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
    <form action="store.php" method='POST'>
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
					<label for="eMail">Buying Price</label>
					<input type="number" class="form-control" id="eMail" name="buying_price" placeholder="Buying price">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Description</label>
                    <textarea name="description" id="phone" class ="form-control" cols="1" rows="1" placeholder ="Product details"></textarea>
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Under Stock</label>
					<input type="number" class="form-control" name = "underStock" id="website" placeholder="Under Stock">
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
					<label for="website">Lotto</label>
					<input type="number" class="form-control" name="lotto" id="website" placeholder="Lotto">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Date of purchase</label>
					<input type="date" class="form-control" id="website" name="dop" placeholder="Date of purchase">
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
				<h6 class="mt-3 mb-2 text-primary">Supplier Infomation</h6>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Company Name</label>
					<input type="text" class="form-control" name="cName" id="Street" placeholder="Company Name">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Company Email</label>
					<input type="text" class="form-control" id="Street" name="cEmail" placeholder="Company Email">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Supplier Name</label>
					<input type="text" class="form-control" id="Street" name="sNamne" placeholder="Supplier Name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Address</label>
					<input type="text" class="form-control" id="ciTy" name="sAddress" placeholder="Supplier's Address">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Category</label>
                    <select name="sCategory" class="form-control" id="fullName">
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
					<label for="zIp">Phone Number</label>
					<input type="phone" class="form-control" name="sPhone" id="zIp" placeholder="Phone number">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Mobile Number</label>
					<input type="phone" class="form-control" name="sMobile" id="zIp" placeholder="Mobile number">
				</div>
			</div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Email</label>
					<input type="email" class="form-control" id="zIp" name= "sEmail" placeholder="Email">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
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