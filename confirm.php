<?php 
  include  ('init.php');
  include  ('header.php');

  if(f_logged_in()===true) {
  		$uid = $f_data['f_id'];
  	  
		if(isset($_POST['flight_path'])===true && isset($_POST['payment_num'])===true) {
			 $flight_path=$_POST['flight_path'];
			 $payment_num=$_POST['payment_num'];
			 $ammount=$_POST['ammount'];

			 $puname = $_POST['puname'];
			$puphno = $_POST['puphno'];
			$puadd = $_POST['puadd'];
			$pumail = $_POST['pumail'];
		   if(isset($_POST['chose_to'])===true) {
				if(isset($_POST['chose_fro'])===true && !empty( $_POST['chose_fro'])) {
					$to = $_POST['chose_to'];
					$fro = $_POST['chose_fro'];
					$counta = $_POST['count_a'];
					$countc = $_POST['count_c'];
					$class = $_POST['class'];
					if($class==='Economy' && $counta==='1' && $countc==='0') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$ect1 = $_POST['ect1'];
						$ect2 = $_POST['ect2'];
						$eat1 = $_POST['eat1'];
						$eat2 = $_POST['eat2'];
						$etotr = $_POST['etotr'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						 
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etotr', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
										$q12 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$fro'";
										$r12 = mysql_query($q12);
										if($r12) {
											if(mysql_num_rows($r12)>0) {
												while($row12 = mysql_fetch_assoc($r12)) {
													$e_seats_left = $row12['e_seats_left'];
													$dec_seats12 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats12' WHERE `fno`='$fro'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a5 = date('H:i:s');
											$e5 = str_replace(':', '', $a5);
											$a6 = date('d-m-Y');
											$e6 = str_replace('-', '', $a6);
											$pnr6 = $e5.$e6+100;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr6', '$fro', '$to_city', '$from_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`,  `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etotr', '$countc', '$counta', '$totc', '$status', '$pnr6' , '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`,  `flight_path`, `ammount`,  `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' , '$payment_num','$status','$pnr1')");
										}
										echo '<h4 style="color:#006A4E">Payment Successfull ! Please wait a moment for approve by admin!</h4>';
										
										
									}
									else if($class==='Economy' && $counta==='1' && $countc==='1') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$ect1 = $_POST['ect1'];
						$ect2 = $_POST['ect2'];
						$eat1 = $_POST['eat1'];
						$eat2 = $_POST['eat2'];
						$etotr = $_POST['etotr'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						 
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etotr', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
										$q12 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$fro'";
										$r12 = mysql_query($q12);
										if($r12) {
											if(mysql_num_rows($r12)>0) {
												while($row12 = mysql_fetch_assoc($r12)) {
													$e_seats_left = $row12['e_seats_left'];
													$dec_seats12 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats12' WHERE `fno`='$fro'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a5 = date('H:i:s');
											$e5 = str_replace(':', '', $a5);
											$a6 = date('d-m-Y');
											$e6 = str_replace('-', '', $a6);
											$pnr6 = $e5.$e6+100;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr6', '$fro', '$to_city', '$from_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`,  `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etotr', '$countc', '$counta', '$totc', '$status', '$pnr6' , '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`,  `flight_path`, `ammount`,  `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' , '$payment_num','$status','$pnr1')");
										}
										echo '<h4 style="color:#006A4E">Payment Successfull ! Please wait a moment for approve by admin!</h4>';
										
										
										

					}
					else if($class==='Business' && $counta==='1' && $countc==='0') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$bct1 = $_POST['bct1'];
						$bct2 = $_POST['bct2'];
						$bat1 = $_POST['bat1'];
						$bat2 = $_POST['bat2'];
						$btotr = $_POST['btotr'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						 
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$btotr', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
										$q12 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$fro'";
										$r12 = mysql_query($q12);
										if($r12) {
											if(mysql_num_rows($r12)>0) {
												while($row12 = mysql_fetch_assoc($r12)) {
													$e_seats_left = $row12['e_seats_left'];
													$dec_seats12 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats12' WHERE `fno`='$fro'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a5 = date('H:i:s');
											$e5 = str_replace(':', '', $a5);
											$a6 = date('d-m-Y');
											$e6 = str_replace('-', '', $a6);
											$pnr6 = $e5.$e6+100;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr6', '$fro', '$to_city', '$from_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`,  `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$btotr', '$countc', '$counta', '$totc', '$status', '$pnr6' , '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`,  `flight_path`, `ammount`,  `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' , '$payment_num','$status','$pnr1')");
										}
										echo '<h4 style="color:#006A4E">Payment Successfull ! Please wait a moment for approve by admin!</h4>';
										
										
										

					}
					else if($class==='Business' && $counta==='1' && $countc==='1') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$bct1 = $_POST['bct1'];
						$bct2 = $_POST['bct2'];
						$bat1 = $_POST['bat1'];
						$bat2 = $_POST['bat2'];
						$btotr = $_POST['btotr'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						 
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$btotr', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
										$q12 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$fro'";
										$r12 = mysql_query($q12);
										if($r12) {
											if(mysql_num_rows($r12)>0) {
												while($row12 = mysql_fetch_assoc($r12)) {
													$e_seats_left = $row12['e_seats_left'];
													$dec_seats12 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats12' WHERE `fno`='$fro'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a5 = date('H:i:s');
											$e5 = str_replace(':', '', $a5);
											$a6 = date('d-m-Y');
											$e6 = str_replace('-', '', $a6);
											$pnr6 = $e5.$e6+100;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr6', '$fro', '$to_city', '$from_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`,  `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$btotr', '$countc', '$counta', '$totc', '$status', '$pnr6' , '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`,  `flight_path`, `ammount`,  `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' , '$payment_num','$status','$pnr1')");
										}
										echo '<h4 style="color:#006A4E">Payment Successfull ! Please wait a moment for approve by admin!</h4>';
										
										
										

					}
						 
					}
					




			
			    else { 
				 $to = $_POST['chose_to'];
					
					$counta = $_POST['count_a'];
					$countc = $_POST['count_c'];
					$class = $_POST['class'];
					if($class==='Economy' && $counta==='1' && $countc==='0') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$ect1 = $_POST['ect1'];
						
						$eat1 = $_POST['eat1'];
						$etot1=$_POST['etot1'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etot1', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
									 
										echo 'Tickets Successfully Booked! Please check your bookings page for details!';
										
										

							
						
					}
                    else if($class==='Business' && $counta==='1' && $countc==='0') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$bct1 = $_POST['bct1'];
						
						$bat1 = $_POST['bat1'];
						$btot1=$_POST['btot1'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$btot1', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
									 
										echo 'Tickets Successfully Booked! Please check your bookings page for details!';
										
										

							
						
					}
					else if($class==='Economy' && $counta==='1' && $countc==='1') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$ect1 = $_POST['ect1'];
						
						$eat1 = $_POST['eat1'];
						$etot1=$_POST['etot1'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etot1', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
									 
										echo 'Tickets Successfully Booked! Please check your bookings page for details!';
										
										

							
						
					}
					else if($class==='Business' && $counta==='1' && $countc==='1') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$bct1 = $_POST['bct1'];
						
						$bat1 = $_POST['bat1'];
						$btot1=$_POST['btot1'];
						$totc = $counta + $countc;
						$status = 'Pending';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Dhaka');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$btot1', '$countc', '$counta', '$totc', '$status', '$pnr1',  '$uid')");
										    mysql_query("INSERT INTO `booking_status`( `customer_name`, `flight_path`, `ammount` , `payment_num`, `status`,`pnr`) VALUES ('$aname1','$flight_path','$ammount' ,'$payment_num','$status','$pnr1')");
										}
									 
										echo 'Tickets Successfully Booked! Please check your bookings page for details!';
										
										

							
						
					}




				}
			  
}
            

   }
}
?>