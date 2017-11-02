<?php 
  include  ('init.php');
  include  ('header.php');
?>

        <div class="col-lg-12" >
          <div class="well bs-component" style="background:#EFEEE9">
            <form class="form-horizontal" action="book.php" method="GET" style="color:#006A4E">
            <?php 
            
            if(isset($_GET['path'])===true 
              && isset($_GET['from_city'])===true && isset($_GET['to_city'])===true
              && isset($_GET['departure_date'])===true
              && isset($_GET['count_a'])===true && isset($_GET['count_c'])===true && isset($_GET['class'])===true) {
              
              $from = $_GET['from_city'];
              $to = $_GET['to_city'];
              $departdate = $_GET['departure_date'];
              $class = $_GET['class'];
              $path = $_GET['path'];
              $counta = $_GET['count_a'];
              $countc = $_GET['count_c'];

              if($path==='oneway') {
              echo '<legend style="color:#006A4E">Flights from '.$from.' to '.$to.'</legend>';
              $query = "SELECT * FROM `flight_search` WHERE `from_city`= '$from' AND `to_city` = '$to' AND `departure_date` = '$departdate'";
              $result = mysql_query($query);
              if($result) {
              if(mysql_num_rows($result) > 0) {
              while($row = mysql_fetch_assoc($result)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['e_seats_left']; ?></td>
                   <td><?php echo $row['e_price']; ?></td>
                   <?php } else if($class==='Business') { ?> 
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['b_seats_left']; ?></td>
                   <td><?php echo $row['b_price']; ?></td>
                <?php } else { 'Not enough seats left, please search again!'; }
              }?>
              </tr>
              </tbody>
              </table>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
              <center><button style="background: #006A4E" type="submit" id="class" name="class" value="<?php echo $class; ?>" class="btn btn-primary">Choose Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
          } 
          else if($path==='return') {
            echo '<legend style="color:#006A4E">Flights from '.$from.' to '.$to.'</legend>';
              $query1 = "SELECT * FROM `flight_search` WHERE `from_city`= '$from' AND `to_city` = '$to' AND `departure_date` = '$departdate'";
              $result1 = mysql_query($query1);
              if($result1) {
              if(mysql_num_rows($result1) > 0) {
              while($row1 = mysql_fetch_assoc($result1)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>

                   <td><input type="radio" required name="chose_to" value="<?php echo $row1['fno']; ?>"/><?php echo $row1['fno']; ?></td>
                   <td><?php echo $row1['departure_time']; ?></td>
                   <td><?php echo $row1['arrival_time']; ?></td>
                   <td><?php echo $row1['e_seats_left']; ?></td>
                   <td><?php echo $row1['e_price']; ?></td>
                  </tr>
                </tbody>
                </table> <?php } else if($class==='Business') { ?>  
                    <td><input type="radio" required name="chose_to" value="<?php echo $row1['fno']; ?>"/><?php echo $row1['fno']; ?></td>
                   <td><?php echo $row1['departure_time']; ?></td>
                   <td><?php echo $row1['arrival_time']; ?></td>
                   <td><?php echo $row1['b_seats_left']; ?></td>
                   <td><?php echo $row1['b_price']; ?></td>
                <?php }
              }
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
              echo '<legend style="color:#006A4E">Flights from '.$to.' to '.$from.'</legend>';
              if(isset($_GET['return_date'])===true) {
                $returndate = $_GET['return_date'];
              $query2 = "SELECT * FROM `flight_search` WHERE `from_city`= '$to' AND `to_city` = '$from' AND `departure_date` = '$returndate'";
              $result2 = mysql_query($query2);
              if($result2) {
              if(mysql_num_rows($result2) > 0) {
              while($row2 = mysql_fetch_assoc($result2)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['e_seats_left']; ?></td>
                   <td><?php echo $row2['e_price']; ?></td>
                  </tr>
                </tbody>
                </table> <?php } else if($class==='Business'){ ?>  
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['b_seats_left']; ?></td>
                   <td><?php echo $row2['b_price']; ?></td>
                <?php }
              }?>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="path" value="<?php echo $path; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
              <center><button style="background: #006A4E" type="submit" id="class" value="<?php echo $class; ?>" name="class" class="btn btn-primary">Choose Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
          } 
         }
        
       ?>

         
               
          </div>
        </div>
  <div class="col-lg-12">
      
     <?php 
        include  ('footer.php');
      ?>

</div>

      </div>
    <?php }?>




 

   