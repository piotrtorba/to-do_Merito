<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikacja To Do List w PHP z bazą danych MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
#Kod formularza do logowania
echo "<img src='merito_logo.png' alt='Tu ma być logo' id='logo'/>";
echo "<h1 class='title' >Aplikacja To Do List w PHP z bazą danych MySQL</h1>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<form class='form' action='check_login.php' method='POST'>";

echo "<h4> Logowanie</h4>";
echo "<br>";
echo "<label class='label' for='username'>Użytkownik  </label>";
echo "<input class='text' type='text' name='username' placeholder='Nazwa użytkownika'>";
echo "<br>";
echo "<label class='label' for='password'>Hasło  </label>";
echo "<input class='text' type='password' name='password' placeholder='Hasło'>";
echo "<br>";
echo "<br>";
echo "<input class='submit' type='submit' value='Zaloguj się'>";
echo "</form>";
echo "<form class='form' action='signup.php' method='GET'>";
echo "<input class='submit' type='submit' value='Zarejestruj się'>";
echo "</form>";

?>
</body>
</html>