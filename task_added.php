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
if(isset($_POST["task"]) && $_POST["task"] != "" && isset($_SESSION["username"]) && isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"])) {


#Połączenie z bazą danych
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "toDOlist";

$db_connect = new  mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($db_connect->connect_error) {
    die("Błąd połączenia z bazą danych: " .$db_connect->connect_error);
}

else  if($_POST["task"] == "") {
        $field = "incomplete";
        header("Location:login.php?field=$field");
    }
else  if($_POST["day"] == "") {
        $field = "incomplete";
        header("Location:login.php?field=$field");
    }
else {
    header("Location:display_task.php");
}
$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$task = $_POST["task"];
$date = $_POST["day"].'&nbsp'.$_POST["month"].'&nbsp'.$_POST["year"];
$time = $_POST["hour"].'&nbsp'.$_POST["minute"];

$statement = "INSERT INTO task(user_id, task, date, time) VALUES(?,?,?,?)";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("ssss", $user_id, $task, $date, $time);
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