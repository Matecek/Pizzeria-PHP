<?php
    
    $id=$_POST['f_id'];  // wyciągniecie id z formularza

    include 'dbconfig.php';
    $baza = mysqli_connect($server,$user,$pass,$base) or ('coś nie tak z połączniem z BD');  // połączenie z baza danych

    $zapytanie="SELECT * FROM `klienci1` WHERE `id`='$id'"; // wyświetlenie wszystkich rekordów z bazy danych gdzie id równa się id podanemu w formularzu
    
    // stworzenie tabeli umożliwiającej edycje klienta
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');
        while($wiersz = $result->fetch_assoc())
            {
                echo "<h2>Edycja klienta</h2>";
                echo "<form method='POST' action='update_klient.php'>";
                    echo "<input type='text' name='f_id' value='".$wiersz['id']."' hidden>";
                    echo "<table border='1' class='baza'>";
                    echo "<thead><td>Imię</td><td>Nazwisko</td><td>Miejscowość</td><td>Ulica</td><td>Numer</td><td>Operacje</td></thead>";
                    echo "<tr><td><input type='text' name='f_imie' value='".$wiersz['imie']."'></td>";
                    echo "<td><input type='text' name='f_nazwisko' value='".$wiersz['nazwisko']."'></td>";
                    echo "<td><input type='text' name='f_miejscowosc' value='".$wiersz['miejscowosc']."'></td>";
                    echo "<td><input type='text' name='f_ulica' value='".$wiersz['ulica']."'></td>";
                    echo "<td><input type='text' name='f_numer' value='".$wiersz['numer']."'></td>";
                    echo "<td><input type='submit' value='Zapisz'></td></tr>";
                echo "</table>";
                echo "</form>"; 
            
            }
        
    $baza->close();
?>