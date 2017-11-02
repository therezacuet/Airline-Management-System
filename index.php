<?php 
  include  ('init.php');
  include  ('header.php');
?>
<div class="row" style="margin-top:-75px;">
        <div class="col-lg-4">
          <div class="well bs-component"style="background:#EFEEE9">
            <form class="form-horizontal" action="search_view.php" method="GET"style="color:#006A4E" >
              <legend style="color:#006A4E">Search Flights</legend>
              <div class="form-group">
                <div class="col-lg-10">
                  <div class="radio" style="color:#006A4E">
                    <label>
                      <input type="radio" name="path" value="oneway" onclick="setReadOnly(this)">
                      One Way
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="path" value="return" checked onclick="setReadOnly(this)">
                      Return
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">From</label>
                                   <select class="form-control" name="from_city" id="from_city" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo '';?>"><option value="" selected>Departure City</option> <option  value="CTG">Chittagong (CTG)</option><option  value="CXB">Cox&#39;s Bazar (CXB)</option><option  value="DHK">Dhaka (DHK)</option><option  value="BAR">Barishal (BAR)</option> </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">To</label>

                  <select style="color:#006A4E" class="form-control" name="to_city" id="to_city" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo '';?>" ><option value="" selected>Arrival City</option> <option  value="CTG">Chittagong (CTG)</option><option  value="CXB">Cox&#39;s Bazar (CXB)</option><option  value="DHK">Dhaka (DHK)</option><option  value="BAR">Barishal (BAR)</option> </select>

                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Departure Date</label>
                  <input style="color:#006A4E" class="form-control" name="departure_date" id="departure_date" value="<?php if(isset($_GET['departure_date'])) { echo htmlentities ($_GET['departure_date']); } else echo '';?>" required type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Arrival Date</label>
                  <input class="form-control" name="return_date" id="return_date" value="<?php if(isset($_GET['return_date'])) { echo htmlentities ($_GET['return_date']); } else echo '';?>" required type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                <label for="select" class="control-label">Number of Adults</label>
                  <select style="color:#006A4E" class="form-control" name="count_a" id="select">
                    <option value="1">1</option>
                  
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                <label for="select" class="control-label">Number of Children</label>
                  <select class="form-control" name="count_c" id="select">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label for="select" class="control-label">Class</label>
                  <select class="form-control" name="class" id="select">
                    <option name="economy" value="Economy">Economy</option>
                    <option name="business" value="Business">Business</option>
                  </select>
                  <br>
                </div>
              </div>
              <div class="form-group">
                <center><button style="background: #006A4E" type="submit" id="submit" value="submit" name="submit" class="btn btn-primary">Submit</button></center>
              </div>
            </form>
          </div>


        </div>

<div class="col-lg-8">


<?php 
  include  ('slider_view.php');

?>
</div>

</div>

<?php 
  include  ('footer.php');

?>





