/*document.getElementById("home").addEventListener("click", strona_home);

function strona_home(){
    document.getElementById("strona").innerHTML="<object type='text/html' data='home.html'></object>";
    alert("xyz");
}
*/
//___________jQuery______________ 

$(document).ready(function(){
    $("#home").click(function(){
        $("main").load("home.php");
    });

    $("#menu-pizza").click(function(){
        $("main").load("menu.php");
    });

    $("#about-us").click(function(){
        $("main").load("about_us.php");
    });

    $("#users").click(function(){
        $("main").load("klienci.php");
    });

    $("#orders").click(function(){
        $("main").load("orders.php");
    }); 

    $("#login").click(function(){
        $("main").load("login.php");
    })

    $("#logout").click(function(){
        $("main").load("home.php");
    })



});
