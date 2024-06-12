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

#Weryfikacja nazwy użytkownika i hasła w bazie danych
$username = $_POST["username"];

$statement = "SELECT * FROM user WHERE username=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("s", $username);
$final_statement->execute();

$result = $final_statement->get_result();

if($result->num_rows>=1) {
    $row = $result->fetch_assoc();
    $hash = $row["password"];
    if(password_verify($_POST["password"], $hash)) {
        session_start();
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["user_id"] = $row["user_id"];
        $db_connect->close();
        header("Location:display_task.php");
    }
    else {
        $user = "wrong_password";
        header("Location:login.php?user=$user");
    }
}
else {
    $user="wrong_user";
    header("Location:login.php?user=$user");
}
$final_statement->close();
$db_connect->close();
}
else {
    header("Location:login.php");
}

?>