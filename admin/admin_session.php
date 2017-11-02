<?php
ob_start();
session_start();
$current_filename = $_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
	$referrer = $_SERVER['HTTP_REFERER'];
}

function login() {
    if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])){
        return true;
    }
    return false;
}

function GetUserField($field) {
    $query = "SELECT `$field` FROM `admin` WHERE `admin_id` ='".$_SESSION['admin_id']."'";
    if($query_run = mysql_query($query)){
		if($mysql_result=mysql_result($query_run, 0, $field)){
			return $mysql_result;
		}
	}
}
?>