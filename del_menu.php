<?PHP
    $id=$_POST['f_id']; //wyciągnięcie z formularza id

	include 'dbconfig.php'; 
	$baza = mysqli_connect($server,$user,$pass,$base) or ('coś nie tak z połączniem z BD');  // połączenie z baza danych

   	$zapytanie="DELETE FROM `menu` WHERE `id`=$id";  // usunięcie z tabeli menu dania z danym id
	
    $result = $baza->query($zapytanie) or die ('bledne zapytanie');

    $baza->close();
?>