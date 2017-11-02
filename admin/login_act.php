<?php 
include  ('admin_session.php');
include  ('connect.php');

?>
<?php
if (isset($_POST['admin_password']) && isset($_POST['admin_uname'])) {
    $username = $_POST['admin_uname'];
    $password = $_POST['admin_password'];
    if (!empty($password) && !empty($username)) {
        
        $query_cmd = "SELECT * FROM `admin` 
							WHERE `username` = '$username' 
							AND `password` = '$password'";

        if ($query_run = mysql_query($query_cmd)) {
            $num_row = mysql_num_rows($query_run);
            if ($num_row == 0) {
                echo 'Invalid username or password!<br>';
            } else if ($num_row == 1) {
                $user_id = mysql_result($query_run, 0, `id`);//id = 1 ::make garbage
                $_SESSION['user_id'] = $user_id;
                header('Location: view_booking.php');
            } 
      else {
                echo 'You must login!';
            }
        }
    }
}
?>

 