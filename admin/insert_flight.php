<?php 
  include  ('admin_session.php');
  include  ('head.php');
  include  ('connect.php');
?>

<?php	
	if (isset($_POST['submit'])){
	
        $flight_no = $_POST['flight_no'];
		$from_city = $_POST['from_city'];
		$to_city = $_POST['to_city'];
		$departure_date =$_POST['departure_date'];
		 
		$return_date = $_POST['return_date'];
		$d_time = $_POST['d_time'];
		$a_time = $_POST['a_time'];
		$e_seat = $_POST['e_seat'];
		$b_seat = $_POST['b_seat'];
		$e_price = $_POST['e_price'];
		$b_price = $_POST['b_price'];
		 
		 $sql="INSERT INTO  flight_search ( `fno`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `e_seats_left`, `b_seats_left`, `e_price`, `b_price`) VALUES ('$flight_no','$from_city','$to_city','$departure_date','$return_date','$d_time','$a_time','$e_seat','$b_seat','$e_price','$b_price')";
	     $qry = mysql_query($sql);
			if ($qry){
				echo '<div style="position:absolute; left:450px; top:200px; width: 450px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> Flight Information added!
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a href="insert_flight.php"><button type="button" class="btn btn-success">Continue</button></a>
									</p>
								</div>
							</div>';
					exit();
				}
			else {
				echo "not posted!";
				}
	 

}

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



<div class="section" id="3ebc9047-0742-445b-8065-b70da058f143">
        <span class="content" lang="en-US">
				<div class = "row" style ="margin-top:50px">
		
				<div class = "col-md-5">
						<ul class="nav nav-tabs">
							<li role="presentation" ><a href="view_booking.php"style="color:#006A4E"><strong>Approved</strong></a></li>
							<li role="presentation" ><a href="pending_view.php"style="color:#006A4E"><strong>Pending</strong></a></li>
							<li role="presentation" class="active"><a href="insert_flight.php"style="color:#006A4E"><strong>Insert Flight</strong></a></li>
							 
						</ul>
					</div>
					<div class ="col-md-4">
						<h1>Flight Information</h1>
					</div>
					<form enctype="multipart/form-data" method="post" class="form-horizontal">
							<div class = "col-md-9 col-md-offset-2">
								
							</div>
							
							<!-- Text input-->
							<div class="form-group"style="color:#006A4E">
								<label class="col-md-2 control-label" for="id_emp">Flight No</label>
							  <div class="col-md-2">
							  <input id="flight_no" name="flight_no" type="text" placeholder="Flight No" class="form-control input-md">
							  </div>
							
							</div>


							<!-- Select Basic -->
							<div class="form-group"style="color:#006A4E">
							  <label class="col-md-2 control-label" for="month">From City</label>
							  <div class="col-md-2">
								<select id="from_city" name="from_city" class="form-control">
								  <option>CTG</option>
								  <option>CXB</option>
								  <option>DHK</option>
								  <option>BAR</option>
								   
								</select>
							  </div>

							  <div class="form-group" style="margin-left:-35px;" >
							  <label class="col-md-2 control-label" for="month">To City</label>
							  <div class="col-md-2">
								<select id="to_city" name="to_city" class="form-control">
								  <option>CTG</option>
								  <option>CXB</option>
								  <option>DHK</option>
								  <option>BAR</option>
								   
								</select>
							  </div>
							   </div>


			 <div class="form-group" style="margin-left:-5px;">
                
                  <label class="col-md-2 control-label" for="focusedInput">Departure Date</label>
                  <div class="col-md-2">
                  <input class="form-control" name="departure_date" id="departure_date" value="<?php if(isset($_GET['departure_date'])) { echo htmlentities ($_GET['departure_date']); } else echo '';?>" required type="text">
                </div>

              <div class="form-group">
                 
                  <label class="col-md-2 control-label" for="focusedInput">Arrival Date</label>
                  <div class="col-md-2">
                  <input class="form-control" name="return_date" id="return_date" value="<?php if(isset($_GET['return_date'])) { echo htmlentities ($_GET['return_date']); } else echo '';?>" required type="text">
                </div>
              </div>
              </div>

              <div class="form-group"style="margin-left:-5px;">
							  <label class="col-md-2 control-label" for="month">Departure Time</label>
							  <div class="col-md-2">
								<select id="d_time" name="d_time" class="form-control">
								  <option>09:00</option>
								  <option>12:00</option>
								  <option>03:00</option>
								  <option>10:00</option>
								   
								</select>
							  </div>

							  <div class="form-group" style="margin-left:-5px;">
							  <label class="col-md-2 control-label" for="month">Arrival Time</label>
							  <div class="col-md-2">
								<select id="a_time" name="a_time" class="form-control">
								  <option>09:00</option>
								  <option>12:00</option>
								  <option>03:00</option>
								  <option>10:00</option>
								   
								</select>
							  </div>
                   </div>

							  <!-- Text input-->
							<div class="form-group" style="margin-left:-5px;" >
							  <label class="col-md-2 control-label" for="e_seat">Economy Seat</label>  
							  <div class="col-md-2">
							  <input id="e_seat" name="e_seat" type="number" class="form-control input-md" required="">
							  </div>
						 
                            <label class="col-md-2 control-label" for="b_seat">Buisness Seat</label>  
							  <div class="col-md-2">
							  <input id="b_seat" name="b_seat" type="number"   class="form-control input-md" required="">
							  </div>
                           </div>
                           <div class="form-group"style="margin-left:-5px;" >
							<label class="col-md-2 control-label" for="e_price">Economy Price</label>
							  <div class="col-md-2">
								<input id="e_price" name="e_price" type="number"   class="form-control input-md" required="">
							  </div>
							  <label class="col-md-2 control-label" for="b_price">Buisness Price</label>
							  <div class="col-md-2">
								<input id="b_price" name="b_price" type="number"   class="form-control input-md" required="">
							  </div>
							  </div>

							<!-- Button (Double) -->
							<div class="form-group" style="margin-left:-5px;">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8" >
								<button style="background:#006A4E;width:147px" id="submit" name="submit" class="btn btn-primary">Submit</button>
								 
							  </div>
							</div>
					</form>
			</div>
		</div>
	</div>
</div>
</div>


