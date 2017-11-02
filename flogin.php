<?php 
        $title = 'Bangladesh Airlines | Login';
	include  ('init.php');
	f_logged_in_redirect();
	include  ('header.php');
?>
            
            <form class="form-horizontal" action="loginact.php" method="POST" >
                  <div class="row">
                  <div class="col-lg-4">
            	<div class="well bs-component"style="background:#EFEEE9">
                  <legend style="color:#006A4E">Passenger Log In</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-12">
                      <input type="text" name="f_uname" class="form-control" required placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-12">
                      <input type="password" name="f_password" class="form-control" required placeholder="Password">
                    </div>
                  </div>
            	<div class="form-group">
                <center><button type="submit" id="submit" value="submit" name="submit" class="btn btn-success">Login</button></center>
              </div>
              </form>
            	<strong ><a href=" fregister.php" style="color:#006A4E">Register Here</a></strong><br/><br/>
            	<strong  > <a href=" recover.php?mode=f_uname" style="color:#006A4E">Forgot Username?</a></strong><br/>
            	<strong  ><a href=" recover.php?mode=f_password" style="color:#006A4E">Forgot Password?</a></strong><br/>
            </form>
            </div>
            </div>
              <div class="col-lg-12">
      
     <?php 
        include  ('footer.php');
      ?>

</div>
</div>
