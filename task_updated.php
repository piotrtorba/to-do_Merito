<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikacja To Do List w PHP z bazą danych MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
    
#Połączenie z bazą danych
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "toDOlist";

$db_connect = new  mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($db_connect->connect_error) {
    die("Błąd połączenia z bazą danych: " .$db_connect->connect_error);
}

$task = $_POST["task"];
$task_id = $_POST["task_id"];

$statement = "UPDATE task SET task=? WHERE task_id=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("si", $task, $task_id);
$final_statement->execute();
$final_statement->close();

$date = $_POST["day"]."&nbsp".$_POST["month"]."&nbsp".$_POST["year"];
$time = $_POST["hour"].":".$_POST["minute"];

$statement = "UPDATE task SET date=? WHERE task_id=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("si", $date, $task_id);
$final_statement->execute();
$final_statement->close();

$statement = "UPDATE task SET time=? WHERE task_id=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("si", $time, $task_id);
$final_statement->execute();
$final_statement->close();
$db_connect->close();
header("Location:display_tesk.php");

?>
</body>
</html>