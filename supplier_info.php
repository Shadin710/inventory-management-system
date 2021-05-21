<?php
    session_start();

    if (empty($_SESSION['username'])) 
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';

    $sql_supplier = 'SELECT * FROM supplier';
    $supplier_object= mysqli_query($conn,$sql_supplier) Or die("Falied to query " . mysqli_error($conn));
    $supplier_count = mysqli_num_rows($supplier_object);

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
    <link rel="stylesheet" href="css/supplier_info.css">
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
            <table id="customers">
  <tr>
    <th>Company Name</th>
    <th>Company Email</th>
    <th>Supplier Name</th>
    <th>Supplier Address</th>
    <th>Supplier Category</th>
    <th>Supplier Email</th>
    <th>Supplier Mobile</th>
    <th>Supplier Phone</th>
    <th>Supplier rating</th>
  </tr>
  <?php
    if ($supplier_count>0) 
    {
        while ($supplier=mysqli_fetch_assoc($supplier_object))
         {
            
            echo '<tr>
            <td>' . $supplier['cName'] . '</td>
            <td>' . $supplier['cEmail'] . '</td>
            <td>' . $supplier['sName'] . '</td>
            <td>' . $supplier['sAddress'] . '</td>
            <td>' . $supplier['sCategory'] . '</td>
            <td>' . $supplier['sEmail'] . '</td>
            <td>' . $supplier['sMobile'] . '</td>
            <td>' . $supplier['sPhone'] . '</td>
            <td>' . $supplier['ratings'] . '</td>
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



