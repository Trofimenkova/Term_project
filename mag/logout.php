<?php 
session_start();
unset($_SESSION['session_username']);
session_destroy();
//echo '<script>localStorage.clear();</script>';
header("location:index.php");
?>
