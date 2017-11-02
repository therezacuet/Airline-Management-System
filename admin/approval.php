<?php 
  
  include  ('head.php');
  include  ('connect.php');
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
<?php
error_reporting(0);
 
mysql_query("UPDATE booking_status,passenger_details,booking_details SET status='Booked',p_status='Booked',b_status='Booked' where pnr='$_GET[pnr]' AND b_pnr='$_GET[pnr]' AND p_pnr='$_GET[pnr]'");


echo'<div class="container-fluid">
 
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×</button>
							<span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
							<hr class="message-inner-separator">
						<p><strong>Success!</strong> Booking Approved.</p><br>
						<div class="col-md-offset-9">
							<a href="view_booking.php"><button type="button" class="btn btn-success">Continue</button></a>
						</div>
					</div>
			</div>
		</div>
	</div>';
?>