<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikacja To Do List w PHP z bazą danych MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

#Kod formularza do rejestracji
echo "<img src='merito_logo.png' alt='Tu ma być logo' id='logo'/>";
echo "<h1 class='title' >Aplikacja To Do List w PHP z bazą danych MySQL</h1>";
echo "<h3 class='title' >Autor: Piotr Torba</h3>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<form class='form' action='check_signup.php' method='POST'>";

echo "<h4> Rejestracja Użytkownika</h4>";
echo "<br>";
echo "<label class='label' for='username'>Użytkownik  </label>";
echo "<input class='text' type='text' name='username' placeholder='Nazwa użytkownika'>";
echo "<br>";
echo "<label class='label' for='password'>Hasło  </label>";
echo "<input class='text' type='password' name='password' placeholder='Hasło'>";
echo "<br>";
echo "<br>";
echo "<input class='submit' type='submit' value='Zarejestruj się'>";

echo "</form>";
echo "<form class='form' action='login.php' method='GET'>";
echo "<input class='submit' type='submit' value='Zaloguj się'>";
echo "</form>";

#Kod informujący o błędach w formularzu
if(isset($_GET["username"])) {
    if($_GET["username"] == "successful") {
        echo "<h4>Dodano użytkownika</h4>";
    }
    else if($_GET["username"] == "duplicate") {
        echo "<h4>Taki użytkownik już istnieje</h4>";
        echo "<h4>Podaj inną nazwę użytkownika</h4>";
    }
}

?>
</body>
</html>