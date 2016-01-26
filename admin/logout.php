<?php
session_start();
unset($_SESSION['logged_in']);
session_destroy();
echo "Ja foste..";
header ("Refresh: 5; viewrecrutamento.php");
?>