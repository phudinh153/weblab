<?php
session_start();
$_SESSION['max_pics'] = isset($_POST['max_pics']) ? $_POST['max_pics'] : 1;
header("Location: ./index.php?page=movies");
exit();              
?>