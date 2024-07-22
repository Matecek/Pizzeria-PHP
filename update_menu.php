<?php
// wyciągniecie danych z formularza
$id=$_POST['f_id'];
$nazwaM=$_POST['f_nazwaM'];
$opis=$_POST['f_opis'];
$wielkosc=$_POST['f_wielkosc'];
$cena=$_POST['f_cena'];
 
include 'dbconfig.php';

    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z połączeniem z BD'); // połączenie z baza danych

    $zapytanie = "UPDATE `menu` SET `nazwa` = '$nazwaM', `opis` = '$opis', `wielkosc` = '$wielkosc', `cena` = '$cena' WHERE `menu`.`id` = '$id'"; // zamienienie danych w tabeli menu

    $result = $baza->query($zapytanie) or die ('bledne zapytanie');
    
    $baza->close();
?>
