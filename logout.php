<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikacja To Do List w PHP z bazą danych MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
echo "<img src='merito_logo.png' alt='Tu ma być logo' id='logo'/>";

session_start();
if(isset($_SESSION["username"])) {
    $_SESSION = array();
    session_destroy();

    echo "<h2 class='wylogowany'>Zostałeś wylogowany</h2>";
    echo "<form class='form' action='login.php' method='GET'>";
    echo "<input class='submit' type='submit' value='Zaloguj się'>";
    echo "</form>";
}

?>
</body>
</html>