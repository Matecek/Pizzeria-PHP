<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="jq.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
// wylogowywanie sie
      $(document).ready(function(){
         $('#logout').submit(function(){       
        
        $.ajax({url: 'logout.php',
            type: 'POST',
            data: $("#logout").serialize(),
            cache: false,
            success: function(response) {
                //alert(response);
                $("main").load("home.php");
                location.reload();
            }
        }); 
        return false;
    });
});
    </script>
    <title>Pizzeria</title>
</head>
<body>
<!-- nawigacja, menu -->
    <header id="header">
      <div id="logo">
        <img width="60" src="https://cdn.pixabay.com/photo/2012/04/01/16/51/pizza-23477_960_720.png" alt="">
      </div>
      <nav class="navbar">
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="bi bi-list"></i></label>
        <div class="menu">
          <ul class="list">
            <li><b id="home">Strona główna</b></li>
            <li><b id="menu-pizza">Menu</b></li>
            <li><b id="about-us">O nas</b></li>
            <?php session_start();                      // włączenie sesji, aby przed zalogowaniem nie była widoczna podstrona "Klienci"
            if(isset($_SESSION['user'])) {
              echo "<li><b id='users'>Klienci</b></li>";
            };
            ?>
            <?php                      // ustawienie sesji, aby przed zalogowaniem nie była widoczna podstrona "Zamówienia"
            if(isset($_SESSION['user'])) {
              echo "<li><b id='orders'>Zamównienia</b></li>";
            };
            ?>
          </ul>
        </div>
        
      </nav>
      <div class="login-panel">
        <div class="login-button"><?php
            
            if(!isset($_SESSION['user'])){
                echo "<b id='login'>Login</b>";
            }else{
                echo "Witaj ".$_SESSION['user']." <form method='POST' action='logout.php' id='logout'><input type='submit' value='Wyloguj' id='logout'></form>";
                }
            ?>
        </div>
      </div>
      
    </header>
    <main>
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
        <?php                                                               // sesja z informacja o błędnym logowaniu
               if(isset($_SESSION['error-login']))
               echo "<p id='login-faild'>".$_SESSION['error-login']."</p>";
        ?> 
        <?php                                                               // sesja z informacja o błędnej rejestracji
               if(isset($_SESSION['error-register']))
               echo "<p id='login-faild'>".$_SESSION['error-register']."</p>";
        ?> 
<!-- głowny div -->        
      <div class="advantages-box">
        <div class="advantages-one-third">
          <div class="column-advantage best-ingredients">
            Najlepsze <br>składniki
          </div>
        </div>
        <div class="advantages-one-third">
          <div class="column-advantage original-recipe">
            Oryginalna <br>receptura
          </div>
        </div>
        <div class="advantages-one-third">
          <div class="column-advantage fast-delivery">
            Szybka <br>dostawa
          </div>
        </div>
      </div>  
    </main>
<!-- stopka strony -->
    <footer class="page-footer">
      <p id="copy">Author: Mateusz Wojtas © Copyright 2023. All Rights Reserved.</p>
    </footer>
        
<script type="text/javascript" src="app.js">
</script>
</body>
</html>
