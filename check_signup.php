<?php

if(!empty($_POST["username"]) && !empty($_POST["password"])) {

#Połączenie z bazą danych
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME = "toDOlist";

$db_connect = new  mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($db_connect->connect_error) {
    die("Błąd połączenia z bazą danych: " .$db_connect->connect_error);
}

#Hashowanie hasła i weryfikacja w bazie danych
$username = $_POST["username"];
$password = $_POST["password"];
$hashedPASS = password_hash($password, PASSWORD_DEFAULT);

$statement = "SELECT * FROM user WHERE username=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("s", $username);
$final_statement->execute();

$result = $final_statement->get_result();

if($result->num_rows>=1) {
    $value = "user_already_exists";
    header("Location:signup.php?user=$value");
}
else {
    $statement = "INSERT INTO user (username, password) VALUES(?,?)";
    $final_statement = $db_connect->prepare($statement);
    $final_statement->bind_param("ss", $username, $hashedPASS);
    $final_statement->execute();

    $value="user_successfuly_created";
    header("Location:login.php?user=$value");
}
$final_statement->close();
$db_connect->close();
}
else {
    header("Location:signup.php");
}

?>