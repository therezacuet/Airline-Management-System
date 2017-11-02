<?php 
        $title = 'Bangladesh Airlines | Recovery Process';
	include  ('init.php');
	f_logged_in_redirect();
	include  ('header.php');
?>
 <div class="col-lg-4">
       
<h3>Recovery</h3>
            
<?php
	if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>

	<p>We have sent you the recovery details! Please check your email!</p>

<?php
	
	}
	else
	{
		$mode_allowed = array('f_uname','f_password');
		if(isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
			if(isset($_POST['f_mailid']) === true && empty($_POST['f_mailid']) === false) {
				if(f_email_exists($_POST['f_mailid']) === true) {
					f_recover($_GET['mode'],$_POST['f_mailid']);
					header('Location: http://localhost/airlines/recover.php?success');
					exit();
				}
				else {
					echo 'Sorry, we could not find that email address!';
				}
			}
?>

            	<div class="well bs-component"style="background:#EFEEE9">
	<form action="" method="POST">
		<br/>
		<div class="col-lg-12">
		<h4>Please enter your email address:</h4><br/>
		</div>
		<div class="col-lg-12">
		<input type="text" name="f_mailid" class="form-control"/><br/> 
		
		</div>
		<center><input style="background: #006A4E;color:#FFFFFF" type="submit" class="btn btn" value="Recover" />	</center>
		 

	</form>
	</div>
</div>


<?php
		}
		else {
			header('Location: http://localhost/airlines/index.php');
			exit();
		}
	}

?>

 