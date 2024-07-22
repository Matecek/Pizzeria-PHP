<!-- górny div -->
<div class="slider-box">
        <div class="slider-half-item">
          <article>
            Projekt pizzerii
            <hr>
          </article>
        </div>
        <div class="slider-half-item pizza-img">
          &nbsp;
        </div>
    </div>

<!-- główny div -->
    <div class="advantages-box">
        <h2>Klienci</h2>

        <table border="1" class="baza">
            <thead><td>Lp.</td><td>Imię</td><td>Nazwisko</td><td>Miejscowość</td><td>Ulica</td><td>Numer</td><td>Operacje</td></thead>

        <?php
        // połączenie z baza danych i wypisanie wszystkich danych z tabeli klienci
            session_start();
            include 'dbconfig.php';

            $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z połączeniem z BD');

                $zapytanie = "SELECT * FROM klienci1 ORDER BY nazwisko ASC";
                $result = $baza->query($zapytanie) or die ('bledne zapytanie');
                $n=0;
                while($wiersz = $result->fetch_assoc()){
                    $n++;
                    echo "<tr>";
                    echo "<td>".$n."</td>";
                    echo "<td>".$wiersz['imie']."</td>";
                    echo "<td>".$wiersz['nazwisko']."</td>";
                    echo "<td>".$wiersz['miejscowosc']."</td>";
                    echo "<td>".$wiersz['ulica']."</td>";
                    echo "<td>".$wiersz['numer']."</td>";
                    echo "<td>";
        //Edycja
                    echo "<form method='POST' action='edit_klient.php' id='editKlient'>";
                    echo "<input type='text' value='".$wiersz['id']."' name='f_id' hidden>";
                    echo "<button type='submit'> E </button>";
                    echo "</form>";
        //Usuwanie
                    echo"<form method='POST' action='del_klient.php' id='delKlient'>";
                    echo "<input type='text' value='".$wiersz['id']."' name='f_id' hidden>";
                    echo "<button type='submit'> X </button>";
                    echo "</form>";

                    echo "</td>";
                    echo "</tr>";
                }
            
            $baza->close();
            ?>
        </table>

        <?php 
        // tabela z możliwościa dodania klienta
            echo "<hr>";
            echo "<h2>Dodaj Klienta</h2>";
            echo "<form method='POST' action='dodaj_klienta.php' id='dodajKlienta'>";
                echo "<table border='1' class='baza'>";
                echo "<thead><td>Imię</td><td>Nazwisko</td><td>Miejscowość</td><td>Ulica</td><td>Numer</td><td>Operacja</td></thead>";
                echo "<tr><td><input type='text' name='f_imie'></td>";
                echo "<td><input type='text' name='f_nazwisko'></td>";
                echo "<td><input type='text' name='f_miejscowosc'></td>";
                echo "<td><input type='text' name='f_ulica'></td>";
                echo "<td><input type='text' name='f_numer'></td>";
                echo "<td><button type='submit'>Dodaj Klienta</button></td></tr>";
            echo "</table>";
            echo "</form>";
            
        ?>
    </div>
<script type="text/javascript">
//Usuwanie klienta
$(document).ready(function(){
    $('#delKlient').submit(function(){        
    $.ajax({url: 'del_klient.php',
            type: 'POST',
            data: $("#delKlient").serialize(),
            cache: false,
            success: function(response) {
                //alert(response);
                $("main").load("klienci.php");
                }
         }); 
        return false;
    });
});

//Dodawanie klienta
$(document).ready(function(){
    $("#dodajKlienta").submit(function(){

        $.ajax({url: "dodaj_klienta.php", 
        type: "POST", 
        data: $("#dodajKlienta").serialize(), 
        cache: false, 
        success: function(response) {
            //$("#lista").append(response);
            $("main").load("klienci.php");
        }     
        })  
       return false;
    })
});

</script>
