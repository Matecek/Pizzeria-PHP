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

<!-- głóny div --> 
    <div class="advantages-box">

        <h2 class="center">Zaloguj się</h2>

    <!-- formularz z podaniem loginu i hasła -->
        <form method="POST" action="zaloguj.php" id="zaloguj">
        <table border="1" class="loguj">
                <tr><td><input type="text" name="f_login" id="lLogin" placeholder="Nazwa użytkownika"></td></tr>
                <tr><td><input type="password" name="f_pass" placeholder="Hasło"></td></tr>
                <tr><td><input type="submit" value="Zaloguj" id="lHaslo"></td></tr>
                <tr><td><b id="register">Nie posiadasz konta? Zarejestruj się</b></td></tr>
            </table>
        </form>
    </div>

<script>
$("#register").click(function(){
        $("main").load("register.php");
    })

</script>
