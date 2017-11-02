<?php 
  include  ('head.php');
  include  ('connect.php');
?>
<?php
error_reporting(0);
 
mysql_query("UPDATE booking_status,passenger_details,booking_details SET status='CANCELLED',p_status='CANCELLED',b_status='CANCELLED' where pnr='$_GET[pnr]' AND b_pnr='$_GET[pnr]' AND p_pnr='$_GET[pnr]'");
       
      echo '<div class="container-fluid">
 
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×</button>
              <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
              <hr class="message-inner-separator">
            <p><strong>Successfully </strong>Cancel !</p><br>
            <div class="col-md-offset-9">
              <a href="view_booking.php"><button type="button" class="btn btn-success">Continue</button></a>
            </div>
          </div>
      </div>
    </div>
  </div>';
           
  
 ?>