<?php 
  include  ('admin_session.php');
  include  ('connect.php');
  include  ('head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0042)http://www.biman-airlines.com/about/signup -->
<html xmlns="http://www.w3.org/1999/xhtml" class="CMS"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Admin Panel</title>
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
				<div class = "row" style ="margin-top:50px">	
				 <div class = "col-md-5">
						<ul class="nav nav-tabs">
							<li role="presentation" class="active"><a href="view_booking.php"><strong>Approved</strong></a></li>
							<li role="presentation" ><a href="pending_view.php"style="color:#006A4E"><strong>Pending</strong></a></li>
							<li role="presentation" ><a href="insert_flight.php"style="color:#006A4E"><strong>Insert Flight</strong></a></li>
							 
						</ul>
					</div>
					<div class ="col-md-4">
						<h1>Booking List</h1>
					</div>
				</div>
				<div class="col-md-12">
			<div class = "col-md-10" style="color:#006A4E">
					<?php
						error_reporting(E_ALL & ~E_NOTICE);
						$sql = "SELECT * FROM booking_details WHERE b_status='Booked'";
						$qry=mysql_query($sql);
					?>
					<table class="table table-hover" style="color:#006A4E">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone No</th>
								<th>E-mail</th>
								<th>Address</th>
								<th>Price</th>
								<th>Adult</th>
								<th>Child</th>
								<th>Total</th>
								<th>Status</th>
								<th colspan=3 style="text-align:center">Actions</th>
							</tr>
						</thead>
						 <?php
            while($rec=mysql_fetch_array($qry))
            {
          ?>
						<tbody>
							<tr>
									<td>
										<?php echo $rec['b_name'] ?>
									</td>
									<td>
										<?php echo $rec['b_phno'] ?>
									</td>
									<td>
										<?php echo $rec['b_mail'] ?>
									</td>
									<td>
										<?php echo $rec['b_add'] ?>
									</td>
									<td>
										<?php echo $rec['b_price']?>
									</td>
									<td>
										<?php echo $rec['b_adults'] ?>
									</td>
									<td>
										<?php echo $rec['b_child']?>
									</td>
									<td>
										<?php echo $rec['b_total']?>
									</td>
									<td>
										<?php echo $rec['b_status']?>
									</td>
									
                                    
									<td>

										<a href='cancel.php?pnr=<?php echo $rec ['b_pnr'];?>' ><img  src="img/error.png" style="height:30px;width:30px;"></img></a>
									</td>
									
					<?php
						}
					?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>