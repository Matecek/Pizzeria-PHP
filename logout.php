<?php
session_start();  // otwarcie sesji
$_SESSION['user']=null;
session_destroy(); // zniszczenie sesji
?>