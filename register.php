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
        
    <h2>Zarejestruj się</h2>
    
<!-- formularz rejestracji -->
    <form method="POST" action="add_user.php" id="addUser">
    <table border="1" class="loguj">
            <tr><td><input type="text" name="f_login" placeholder="Nazwa użytkownika"></td></tr>
            <tr><td><input type="password" name="f_pass" placeholder="Hasło"></td></tr>
            <tr><td><input type="text" name="f_name" placeholder="Imie"></td></tr>
            <tr><td><input type="submit" value="Utwórz konto"></td></tr>
            
        </table>
    </form>
</div>
<script>
// dodawanie nowego użytkownika
$(document).ready(function(){
    $('#addUser').submit(function(){       
        
        $.ajax({url: 'add_user.php',
            type: 'POST',
            data: $("#addUser").serialize(),
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
