<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location:\QuickBill1\index.php");


}
?>