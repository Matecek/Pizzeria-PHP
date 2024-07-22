<?php
// wyciągniecie danych z formularza 
$idKlient=$_POST['f_klient'];
$idMenu=$_POST['f_menu'];
$data=date("Y-m-d");


include 'dbconfig.php';

    $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z połączeniem z BD');  // połąćzenie z baza danych

    $zapytanie = "INSERT INTO `orders` (`id`, `idKlient`, `idMenu`, `data`) VALUES (NULL, '$idKlient', '$idMenu', '$data');";   // dodanie to tabeli "orders" idKlienta oraz idMenu wraz z datą 

    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $baza->close();
?>