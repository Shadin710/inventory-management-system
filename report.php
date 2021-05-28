<?php
   session_start();
   if (empty($_SESSION['username'])) 
   {
      header("Location:index.php");
   }


   
   include_once 'connection/db_connection.php';
   $sql_report = 'SELECT * FROM articles ORDER by dos ASC';
   $report_object = mysqli_query($conn,$sql_report) Or die("Failed to query " . mysqli_error($conn));
   $count_doc = mysqli_num_rows($report_object);

  $get_name='';
  $get_room='';

  


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
                     
                      <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                      </span>
                      Warehouse
                   </div>
                   <!-- end invoice-company -->
                   <!-- begin invoice-header -->
                   <!-- end invoice-header -->
                   <!-- begin invoice-content -->
                   <div class="invoice-content">
                      <!-- begin table-responsive -->
                      <div class="table-responsive">
                         <table class="table table-invoice">
                            <thead>
                               <tr>
                                 <th class="text-center">Product Name</th>
                                  <th class="text-center">Description</th>
                                  <th class="text-center">City Name</th>
                                  <th class="text-center">Product Category</th>
                                  <th class="text-center">City Lotto</th>
                                  <th class="text-center">Room</th>       
                                  <th class="text-center" >Under Stock</th>
                                  <th class="text-center" >Sales Period</th>
                                  <th class="text-center" >Cost Per Room</th>
                                  <th class="text-center" >Date of sell</th>
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
                                    $city_object = array();
                                    $city_array = array();
                                   while ($product_report=mysqli_fetch_assoc($report_object)) 
                                   {
                                      $get_name = $product_report['Product_Name'];
                                      $sql_stock ="SELECT * FROM stock where Product_Name ='$get_name'";
                                      $stock_object[$i] =mysqli_query($conn,$sql_stock) Or die("Failed to query " . mysqli_error($conn));
                                      $report_stock[$i] = mysqli_fetch_assoc($stock_object[$i]);

                                      //City
                                      $sql_city= "SELECT * FROM city WHERE Product_Name = '$get_name'";
                                      $city_object[$i] = mysqli_query($conn,$sql_city) Or die("Failed to search city " . mysqli_error($conn));
                                      $city_array[$i] = mysqli_fetch_assoc($city_object[$i]);
                                      //room
                            
                                      $get_room = $product_report['room'];
                                      $sql_room = "SELECT * FROM room where room_id = '$get_room'";
                                      $room_object[$i] = mysqli_query($conn,$sql_room) Or die("Failed to query " . mysqli_error($conn));
                                      $room_info[$i] = mysqli_fetch_assoc($room_object[$i]);

                                       echo '<tbody>
                                       <tr>
                                       <td class="text-center">' . $get_name . ' </td>
                                          <td class="text-center">
                                            ' . $report_stock[$i]['pDescription'] . '
                                            
                                          </td>
                                          <td class="text-center">' . $city_array[$i]['city_name'] . ' </td>
                                          <td class="text-center">' . $report_stock[$i]['category'] . ' </td>
                                          <td class="text-center">' . $city_array[$i]['city_lotto'] . ' </td>
                                          <td class="text-center">' . $get_room . ' </td>
                                          <td class="text-center"  style="color:red;"><b>' . $report_stock[$i]['Under_Stock'] . '</b></td>
                                          <td class="text-center">' . $product_report['Sales_Period'] . '</td>
                                          <td class="text-center">' . $room_info[$i]['cost_per_room'] . '</td>
                                          <td class="text-center">' . $product_report['dos'] . '</td>
                                          
                                       </tr>
                                    </tbody>';
                                    $i++;
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
                                  <small>Total Selling price</small>
                                  <span class="text-inverse">€<?php echo $_SESSION['profit_sell'];?></span>
                               </div>
                               <div class="sub-price">
                                  <i class="fa fa-minus text-muted"></i>
                               </div>
                               <div class="sub-price">
                                  <small>Total Buying price</small>
                                  <span class="text-inverse">€<?php echo $_SESSION['profit_stock'];?></span>
                               </div>
                            </div>
                         </div>
                         <div class="invoice-price-right">
                            <small>TOTAL</small> <span class="f-w-600">€ <?php echo $_SESSION['profit'];?></span>
                         </div>
                      </div>
                      <!-- end invoice-price -->
                   </div>
                   <!-- end invoice-content -->
                   <!-- begin invoice-note -->
                   <!-- end invoice-note -->
                   <!-- begin invoice-footer -->
                   <div class="invoice-footer">
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