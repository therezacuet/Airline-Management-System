<?php 
        $title = 'Bangladesh Airlines | Settings';
	include  ('init.php');
	f_protect_page();
	include  ('header.php');

	if(empty($_POST)===false) {
		$required_fields = array('f_fname','f_lname','f_mailid');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $required_fields) === true ) {
				$errors[] = 'All the fields are required';
				break 1;
			}
		}

		if(empty($errors) === true ) {
			if(filter_var($_POST['f_mailid'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'Please enter a valid email address';
			}
			if(f_email_exists($_POST['f_mailid']) === true && $f_data['f_mailid'] !== $_POST['f_mailid']){
				$errors[] ='Sorry, the email is already in use';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_fname'])) {
				$errors[] = 'Your first name can contain only alphabets';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_lname'])) {
				$errors[] = 'Your last name can contain only alphabets';
			}
		}
	}
?>
<div class="col-lg-12" >
          <div class="well bs-component" style="background:#EFEEE9;margin-top:-50px;">
	<h3>Settings</h3>

<?php

	if(isset($_GET['success']) ===true && empty($_GET['success'])===true) {
		echo 'Updated!';
	}
	else 
	{
	if(empty($_POST) ===false && empty($errors)===true) {
		$update_data = array(
			'f_fname' 	=> $_POST['f_fname'],
			'f_lname' 	=> $_POST['f_lname'],
			'f_mailid'	=> $_POST['f_mailid'],
			);
		update_f($session_f_id, $update_data);
		header('Location: settings.php?success');
		exit();
	}
	else if(empty($errors) === false ) {
		echo output_errors($errors);
	}

?>


<div class="well bs-component" style="background:#EFEEE9">

<form action="" method="POST" class="form-horizontal">
	<br/>
	<div class="col-lg-12">
	First Name: <br/>
	</div>
	<div class="col-lg-12">
	<input type="text" name="f_fname" value="<?php echo $f_data['f_fname']; ?>"/><br/><br/>
	</div>
	<div class="col-lg-12">
	Last Name: <br/>
	</div>
	<div class="col-lg-12">
	<input type="text" name="f_lname" value="<?php echo $f_data['f_lname']; ?>"/><br/><br/>
	</div>
	<div class="col-lg-12">
	Email ID: <br/>
	</div>
	<div class="col-lg-12">
	<input type="text" name="f_mailid" value="<?php echo $f_data['f_mailid']; ?>"/><br/><br/>
	</div>
	<input type="submit" class="btn btn" value="Update" /><br/><br/>

</form>
</div>

<?php
}

	

?>

</div>

<?php 
  include  ('footer.php');

?>
</div>
