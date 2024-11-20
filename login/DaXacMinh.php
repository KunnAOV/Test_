<?php
session_start();
if (isset($_SESSION['xacminh']))
{
    unset($_SESSION['xacminh']);
	unset($_SESSION['show']);
}
header("Location: ../index.php");