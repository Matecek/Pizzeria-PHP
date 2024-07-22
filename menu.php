<!-- górny div  -->
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
        <h2>Menu</h2>

        <table border="1" class="baza"> 
            <thead><td>Lp.</td><td>Nazwa</td><td>Opis</td><td>Wielkośc</td><td>Cena</td>
            <?php                                                       // Włączenie sesji i ustawienie, aby przed zalogowaniem nie było w tabeli opcji "Operacje"
            session_start();                                    
            if(isset($_SESSION['user'])) {                             
            echo "<td>Operacje</td>";
            };
            ?>
            </thead>

        <?php

        // połączenie z bazą danych i wypisanie wszystkich danych z tabeli "menu"
            include 'dbconfig.php';

            $baza = mysqli_connect($server,$user,$pass,$base) or ('cos nie tak z połączeniem z BD');

                $zapytanie = "SELECT * FROM menu ORDER BY cena ASC";
                $result = $baza->query($zapytanie) or die ('bledne zapytanie');
                $n=0;
                while($wiersz = $result->fetch_assoc()){
                    $n++;
                    echo "<tr>";
                    echo "<td>".$n."</td>";
                    echo "<td>".$wiersz['nazwa']."</td>";
                    echo "<td>".$wiersz['opis']."</td>";
                    echo "<td>".$wiersz['wielkosc']."</td>";
                    echo "<td>".$wiersz['cena']."</td>";

                    if(isset($_SESSION['user'])){                       // Ustawienie sesji, aby przed zalogowaniem nie było widocznych opcji edycji i usuwania
                        echo "<td>";
        // Edycja
                    
                        echo "<form method='POST' action='edit_menu.php' id='editMenu'>";
                        echo "<input type='text' value='".$wiersz['id']."' name='f_id' hidden>";
                        echo "<button type='submit'> E </button>";
                        echo "</form>";
        // Usuwanie
                        echo"<form method='POST' action='del_menu.php' id='delMenu'>";
                        echo "<input type='text' value='".$wiersz['id']."' name='f_id' hidden>";
                        echo "<button type='submit'> X </button>";
                        echo "</form>";

                        echo "</td>";
                        echo "</tr>";
                    }
                }

            $baza->close();
            ?>
        </table>

        <?php
        // tabela z możliwościa dodawania kolejnych dań. Widoczna tylko po zalogowaniu 
            if(isset($_SESSION['user'])){
            echo "<hr>";
            echo "<h2>Dodaj Danie</h2>";
            echo "<form method='POST' action='dodaj_menu.php' id='dodajMenu'>";
                echo "<table border='1' class='add-danie'>";
                echo "<thead><td>Nazwa</td><td>Opis</td><td>Wielkość</td><td>Cena</td><td>Operacja</td></thead>";
                echo "<tr><td><input type='text' name='f_nazwaM'></td>";
                echo "<td><input type='text' name='f_opis'></td>";
                echo "<td><input type='text' name='f_wielkosc'></td>";
                echo "<td><input type='text' name='f_cena'></td>";
                echo "<td><button type='submit'>Dodaj Danie</button></td></tr>";
            echo "</table>";
            echo "</form>";
            }
        ?>
    </div>
<script type="text/javascript">
// Usuwanie dania
$(document).ready(function(){
    $('#delMenu').submit(function(){        
    $.ajax({url: 'del_menu.php',
            type: 'POST',
            data: $("#delMenu").serialize(),
            cache: false,
            success: function(response) {
                //alert(response);
                $("main").load("menu.php");
                }
         }); 
        return false;
    });
});

// Dodawanie dania
$(document).ready(function(){
    $("#dodajMenu").submit(function(){

        $.ajax({url: "dodaj_menu.php", 
        type: "POST", 
        data: $("#dodajMenu").serialize(), 
        cache: false, 
        success: function(response) {
            //$("#lista").append(response);
            $("main").load("menu.php");
        }     
        })  
       return false;
    })
});

</script>
