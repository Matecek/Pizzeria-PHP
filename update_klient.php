<?php
// wyciągniecie danych z formularza
$id=$_POST['f_id'];
$imie=$_POST['f_imie'];
$nazwisko=$_POST['f_nazwisko'];
$miejscowosc=$_POST['f_miejscowosc'];
$ulica=$_POST['f_ulica'];
$numer=$_POST['f_numer'];
 
include 'dbconfig.php';

    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z połączeniem z BD');  // połączenie z baza danych

    $zapytanie = "UPDATE `klienci1` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `miejscowosc` = '$miejscowosc', `ulica` = '$ulica', `numer` = '$numer' WHERE `klienci1`.`id` = '$id'"; // zamienienie danych w tabeli klienic

    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $baza->close();
?>
