<?php
session_start();
$_SESSION['kto']=null;
$_SESSION['pu']=null;

session_destroy();

echo "Zostałeś wylogowany";
?>