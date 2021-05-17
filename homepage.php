<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';
    $sql_rooms = 'SELECT * FROM room_number';
    $room_object = mysqli_query($conn,$sql_rooms) Or die("Failed to query" . mysqli_error($conn));
    $rooms_sold = mysqli_fetch_assoc($room_object);
    $sql_report = 'SELECT * FROM report';
    $report_object

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
    </style>
</head>
<body>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div id="wrapper" class="wrapper-content">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Bootdey.com
                </a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li class="active">
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
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