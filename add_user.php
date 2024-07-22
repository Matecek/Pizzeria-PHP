<?php
session_start(); // rozpoczęcie sesji

include 'dbconfig.php';
$baza = mysqli_connect($server,$user,$pass,$base);  //połączenie z baza danych

if ($baza->connect_errno!=0){
    echo "Error: ".$baza->connect_errno;
}else{
    // wyciągniecie danych z formularza
    $login=$_POST['f_login'];
    $haslo=SHA1($_POST['f_pass']);
    $name=$_POST['f_name'];

    $zapytanie1= "SELECT * FROM `users` WHERE `login`='$login'"; // wypisanie użytkownika o takim loginie

    if($result = $baza->query($zapytanie1)){
        $ile_users = $result->num_rows; // sprawdzenie ilu jest użytkowników o takiej nazwie
        
        if($ile_users==0){  // jeśli liczba użytkowników wynosi 0 nastepuje zapytanie dodające użytkownika do bazy
            $zapytanie = "INSERT INTO `users` (`id`, `login`, `pass`, `imie`) VALUES (NULL, '$login', '$haslo', '$name');";

            unset($_SESSION['error-login']);
            unset($_SESSION['error-register']);
            $result = $baza->query($zapytanie);
        }else{ // jeśli liczba użytkownikó jest inna niz 0 wyświetla sie error
            unset($_SESSION['error-login']);
            $_SESSION['error-register'] = "Istnieje użytkownik o takiej nazwie";
            header('Location: index.php');
        }
    }
}
    $baza->close();
?>