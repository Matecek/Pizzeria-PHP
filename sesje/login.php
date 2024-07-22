<?php
$login=$_POST['f_login'];
$pass=MD5($_POST['f_pass']);

if($pass === "92eb5ffee6ae2fec3ad71c777531578f" && $login === "a"){
    echo "Super, dane do logowanie ok";
    session_start();
    $_SESSION['kto']=$login;
    $_SESSION['pu']=2;
}else{
    echo "Błędne dane";
    }

?>