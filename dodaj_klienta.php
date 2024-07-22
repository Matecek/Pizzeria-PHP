<?php
// wyciągniecie z formularza wszystkich danych
$imie=$_POST['f_imie'];
$nazwisko=$_POST['f_nazwisko'];
$miejscowosc=$_POST['f_miejscowosc'];
$ulica=$_POST['f_ulica'];
$numer=$_POST['f_numer'];
 
include 'dbconfig.php';

    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z połączeniem z BD');  // połączenie z baza danych

    $zapytanie = "INSERT INTO `klienci1` (`id`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `numer`) VALUES (NULL, '$imie', '$nazwisko', '$miejscowosc', '$ulica', '$numer');";   // dodanie do tabeli klienci klienta z podanymi danymi

    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $baza->close();
?>
