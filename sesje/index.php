<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<hr>

<?php
session_start();

if(!isset($_SESSION['kto'])){
echo "<h3>Logowanie:</h3>";
    echo "<form method='POST' action='login.php'>";
        echo "login: <input type='text' name='f_login'><br>";
        echo "haslo: <input type='text' name='f_pass'><br><br>";
        echo "<button type='submit'>Zaloguj</button>";
    echo "</form>";
}else{
    echo "Witaj: ".$_SESSION['kto']."<br>";
    echo "<a href='logout.php'>Exit</a>";

    if($_SESSION['pu']==0){
        echo "<br>Uprawnienia zalogowanego goscia";
    }
    if($_SESSION['pu']==1){
        echo "<br>Uprawnienia redaktora";
    }
    if($_SESSION['pu']==2){
        echo "<br>Uprawnienia administratora";
    }
    if($_SESSION['pu']>2){
        echo "<br>Brak uprawnien";
    }
}
?>
<hr>
</body>
</html>