<?php
   session_start();
   if (empty($_SESSION['username'])) 
   {
      header("Location:index.php");
   }


   
   include_once 'connection/db_connection.php';
   $sql_report = 'SELECT * FROM articles';
   $report_object = mysqli_query($conn,$sql_report) Or die("Failed to query " . mysqli_error($conn));
   $count_doc = mysqli_num_rows($report_object);

  

  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Report of stock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/repo.css">
</head>
<body>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
              <div class="col-md-12">
                <div class="invoice">
                   <!-- begin invoice-company -->
                   <div class="invoice-company text-inverse f-w-600">
                      <span class="pull-right hidden-print">
                      <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                      <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                      </span>
                      Company Name, Inc
                   </div>
                   <!-- end invoice-company -->
                   <!-- begin invoice-header -->
                   <div class="invoice-header">
                      <div class="invoice-from">
                         <small>from</small>
                         <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Twitter, Inc.</strong><br>
                            Street Address<br>
                            City, Zip Code<br>
                            Phone: (123) 456-7890<br>
                            Fax: (123) 456-7890
                         </address>
                      </div>
                      <div class="invoice-to">
                         <small>to</small>
                         <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Company Name</strong><br>
                            Street Address<br>
                            City, Zip Code<br>
                            Phone: (123) 456-7890<br>
                            Fax: (123) 456-7890
                         </address>
                      </div>
                      <div class="invoice-date">
                         <small>Invoice / July period</small>
                         <div class="date text-inverse m-t-5">August 3,2012</div>
                         <div class="invoice-detail">
                            #0000123DSS<br>
                            Services Product
                         </div>
                      </div>
                   </div>
                   <!-- end invoice-header -->
                   <!-- begin invoice-content -->
                   <div class="invoice-content">
                      <!-- begin table-responsive -->
                      <div class="table-responsive">
                         <table class="table table-invoice">
                            <thead>
                               <tr>
                                 <th>Product Name</th>
                                  <th>Product DESCRIPTION</th>
                                  <th>Product Category</th>
                                  <th>Room</th>       
                                  <th class="text-center" width="10%">Under Stock</th>
                                  <th class="text-center" width="10%">Sales Period</th>
                                  <th class="text-right" width="20%">Cost Per Room</th>
                                  <th class="text-right" width="20%">Date of sell</th>
                               </tr>
                            </thead>

                            <?php
                                 if ($count_doc>0) 
                                 {
                                    $i=0;
                                    $stock_object = array();
                                    $room_object = array();
                                    $report_stock = array();
                                    $room_info = array();
                                   while ($product_report=mysqli_fetch_assoc($report_object)) 
                                   {
                                      $get_name = $product_report['Product_Name'];
                                      $sql_stock ='SELECT * FROM stock where Product_Name ='$get_name'';
                                      $stock_object[$i] =mysqli_query($conn,$sql_stock) Or die("Failed to query " . mysqli_error($conn));
                                      $report_stock[$i] = mysqli_fetch_assoc($stock_object[$i]);


                                      $get_room = $product_report['room'];
                                      $sql_room = 'SELECT * FROM room where roomID = '$get_room'';
                                      $room_object[$i] = mysqli_query($conn,$sql_room) Or die("Failed to query " . mysqli_error($conn));
                                      $room_info[$i] = mysqli_fetch_assoc($room_object[$i]);

                                       echo '<tbody>
                                       <tr>
                                       <td class="text-center">' . $get_name . ' </td>
                                          <td>
                                             <span class="text-inverse">'. $product_report['pDescription'] . '</span><br>
                                            
                                          </td>
                                          <td class="text-center">' . $report_stock[$i]['category'] . ' </td>
                                          <td class="text-center">' . $report_stock[$i]['room'] . ' </td>
                                          <td class="text-center">' . $report_stock[$i]['Under_Stock'] . ' </td>
                                          <td class="text-center">' . $product_report['Sales_period'] . '</td>
                                          <td class="text-right">' . $room_info[$i]['cost_per_room'] . '</td>
                                          <td class="text-right">' . $product_report[$i]['dos'] . '</td>
                                          
                                       </tr>
                                    </tbody>';
                                   }
                                 }
                            ?>
                         </table>
                      </div>
                      <!-- end table-responsive -->
                      <!-- begin invoice-price -->
                      <div class="invoice-price">
                         <div class="invoice-price-left">
                            <div class="invoice-price-row">
                               <div class="sub-price">
                                  <small>SUBTOTAL</small>
                                  <span class="text-inverse">$4,500.00</span>
                               </div>
                               <div class="sub-price">
                                  <i class="fa fa-plus text-muted"></i>
                               </div>
                               <div class="sub-price">
                                  <small>PAYPAL FEE (5.4%)</small>
                                  <span class="text-inverse">$108.00</span>
                               </div>
                            </div>
                         </div>
                         <div class="invoice-price-right">
                            <small>TOTAL</small> <span class="f-w-600">$4508.00</span>
                         </div>
                      </div>
                      <!-- end invoice-price -->
                   </div>
                   <!-- end invoice-content -->
                   <!-- begin invoice-note -->
                   <div class="invoice-note">
                      * Make all cheques payable to [Your Company Name]<br>
                      * Payment is due within 30 days<br>
                      * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                   </div>
                   <!-- end invoice-note -->
                   <!-- begin invoice-footer -->
                   <div class="invoice-footer">
                      <p class="text-center m-b-5 f-w-600">
                         THANK YOU FOR YOUR BUSINESS
                      </p>
                      <p class="text-center">
                         <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                         <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                         <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                      </p>
                   </div>
                   <!-- end invoice-footer -->
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