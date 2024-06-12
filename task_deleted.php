<?php
# Kod wyświetlający ewentualne błędy
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aplikacja 'To Do List' w PHP z bazą danych MySQL</title>
</head>
<body>

<?php

session_start();

if(isset($_SESSION["username"]) && isset($_GET["task_id"])) {

#Połączenie z bazą danych
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "toDOlist";

$db_connect = new  mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($db_connect->connect_error) {
    die("Błąd połączenia z bazą danych: " .$db_connect->connect_error);
}

$task_id = $_GET["task_id"];
$statement = "DELETE FROM task WHERE task_id=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("i", $task_id);
$final_statement->execute();
$final_statement->close();
$db_connect->close();

header("Location:display_task.php");

} else {
    header("Location:display_task.php");
}

?>


</body>
</html>