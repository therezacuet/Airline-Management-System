<?php 
  include  ('admin_session.php');
  include  ('connect.php');
  include  ('head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0042)http://www.biman-airlines.com/about/signup -->
<html xmlns="http://www.w3.org/1999/xhtml" class="CMS"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Admin Login</title>
  <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
  <meta name="keywords" content="airline, flights, booking, bangladesh, travel">
  <meta name="description" content="Biman International Airlines">
   
    <link rel="stylesheet" type="text/css" href="./Sign Up_files/normalize.css">
    <link rel="stylesheet" type="text/css" href="./Sign Up_files/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="./Sign Up_files/Styles.css">
    <link rel="stylesheet" type="text/css" media="all" href="./Sign Up_files/innerpage.css">
    
      <link rel="stylesheet" type="text/css" href="./Sign Up_files/saved_resource">
      <link rel="stylesheet" type="text/css" href="./Sign Up_files/saved_resource(1)">


</head>
<body style="zoom: 1; background-color: transparent;">
    <div id="container">
        <div id="header">
  
  
       </div>
       

    <ul class="globalnav">
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="" id="download">Hi,admin<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            </ul>
              

    </ul>



        <div id="page_background">
          
                



    
    <div class="section" id="3ebc9047-0742-445b-8065-b70da058f143">
        <span class="content" lang="en-US">


<div class="container-fluid">
   
        <div class = "row" style ="margin-top:50px">  
         <div class = "col-md-5">
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="view_booking.php" style="color:#006A4E"><strong>Approved</strong></a></li>
              <li role="presentation"class="active"><a href="pending_view.php"><strong>Pending</strong></a></li>
              <li role="presentation" ><a href="insert_flight.php"style="color:#006A4E"><strong>Insert Flight</strong></a></li>
               
            </ul>
          </div>
        
            <h1>Pending List</h1>
         
        </div>
        <div class="col-md-12" style="color:#006A4E">
      <div class = "col-md-10" style="color:#006A4E">


 <?php 
 $sql = "SELECT * FROM booking_status,passenger_details,booking_details WHERE status='Pending' AND p_status='Pending' AND b_status='Pending' AND booking_status.pnr=passenger_details.p_pnr AND passenger_details.p_pnr=booking_details.b_pnr";
            $qry=mysql_query($sql);

           



  ?>    

  <table class="table table-hover" style="color:#006A4E">
          <thead>
            <tr>
              <th>Customer Name</th>
               <th>Flight Path</th>
               <th>Ammount</th>
              <th>Payment No</th>
              <th>Status</th>
              
            </tr>
          </thead>

  <?php
   
            while($rec=mysql_fetch_array($qry))
            {
          ?>
          <tbody>
            <tr>
                <td>
                  <?php echo $rec['customer_name']; ?>
                </td>
                 <td>
                  <?php echo $rec['flight_path']; ?>
                </td>
                <td>
                  <?php echo $rec['ammount']; ?>
                </td>
                <td>
                  <?php echo $rec['payment_num']; ?>
                </td>
                <td>
                  <?php echo $rec['status']; ?>
                </td>
                 
                <td>
                  <a href='approval.php?pnr=<?php echo $rec ['pnr'];?>'> <input type='button' value='Approve' data-toggle="tooltip" data-placement="top" title="Approve" class='btn btn-info'/></a>
                </td>
            </tr>
          </tbody>
          <?php
            }
          ?>
        </table>   
        </div>
      </div> 