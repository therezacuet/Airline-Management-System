  <!-- Website Navigation Bar placed here -->

    <div class="navbar navbar-default" style="background:#006A4E;">
      <div class="container">
        <div class="navbar-header">
          <a href="./index.php" class="navbar-brand">Bangladesh Airlines</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><a href="#">About</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
<?php 
    if(f_logged_in() === true) {
      include  ('f-logout.php');
    } 
    else {
   include  ('w-login.php');
}?> 
     