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
echo "<img src='merito_logo.png' alt='Tu ma być logo' id='logo'/>";
session_start();

#Kod pokazujący zadania konkretnego użytkownika oraz dodaje, usuwa i modyfikuje zadania
$statement = "SELECT * FROM task WHERE user_id=?";
$final_statement = $db_connect->prepare($statement);
$final_statement->bind_param("s", $_SESSION["user_id"]);
$final_statement->execute();

$result = $final_statement->get_result();

echo "<div>";
    echo "<span class='task_cell'>";
        echo "<b>Zadanie</b>";
    echo "</span>";
    echo "<span class='task_cell'>";
        
    echo "</span>";
    echo "<span class='task_cell'>";
        echo "<b>Data zakończenia</b>";
    echo "</span>";
    echo "<span class='task_cell'>";
        echo "<b>Czas zakończenia</b>";
    echo "</span>";
echo "</div>";
echo "<br>";

while($row = $result->fetch_assoc()) {
    echo "<div>";
        echo "<span class='task_cell'>";
            echo $row["task"];
        echo "</span>";
        echo "<span class='task_cell'>";
        
        echo "</span>";
        echo "<span class='task_cell'>";
            echo $row["date"];
        echo "</span>";
        echo "<span class='task_cell'>";
            echo $row["time"];
        echo "</span>";

        echo "<a class='delete_task' href='task_deleted.php?task_id={$row['task_id']}'><button>Usuń</button></a>";
            echo "&nbsp &nbsp &nbsp";
            echo "<a class='update_task' href='update_task.php?task_id={$row['task_id']}'><button>Aktualizuj</button></a>";
        echo "</span>";
    echo "</div>";
}

    $delete_task = "task_deleted.php?task_id=";
    $task_id = $row["task_id"];
    $delete_task .= $task_id;

    $update_task = "update_task.php?task_id=";
    $task_id = $row["task_id"];
    $update_task .=$task_id;

$final_statement->close();
$db_connect->close();

echo "<form class='dform' action='task_added.php' method='POST'>";
echo "<h4 id='dtitle'>Dodaj zadanie</h4>";
echo "<label for='task'>Dodaj zadanie: </label>";
echo "<input id='task' type='text' name='task'>";
echo " Data ukończenia: ";
echo "<select id='day' name='day'>";
for($i=0; $i<31; $i++) {
    $j=$i +1;
    if($j<10){
        $j="0".$j;
    }
    echo "<option value='$j'>$j</option>";
}
echo "</select>";
echo "<select id='month' name='month'>";
echo "<option value='styczen'>Styczeń</option>";
echo "<option value='luty'>Luty</option>";
echo "<option value='marzec'>Marzec</option>";
echo "<option value='kwiecien'>Kwiecień</option>";
echo "<option value='maj'>Maj</option>";
echo "<option value='czerwiec'>Czerwiec</option>";
echo "<option value='lipiec'>Lipiec</option>";
echo "<option value='sierpien'>Sierpień</option>";
echo "<option value='wrzesien'>Wrzesień</option>";
echo "<option value='pazdziernik'>Październik</option>";
echo "<option value='listopad'>Listopad</option>";
echo "<option value='grudzien'>Grudzień</option>";
echo "</select>";

echo "<select id='year' name='year' onchange='a()'>";
echo "<option value='2024'>2024 </option>";
echo "<option value='2025'>2025 </option>";
echo "<option value='2026'>2026 </option>";
echo "</select>";

echo " Godzina: ";
echo "<select id='hour' name='hour'>";
for($i=-1; $i<23; $i++) {
    $j=$i +1;
    if($j<10){
        $j="0".$j;
    }
    echo "<option value='$j'>$j</option>";
}
echo "</select>";

echo "<select id='minute' name='minute'>";
for($i=0; $i<60; $i++) {
    if($i<10){
        $i="0".$i;
    }
    echo "<option value='$i'>$i</option>";
}
echo "</select>";

echo "<input class='submit' type='submit' value='Dodaj Zadanie'>";

echo "</form>";

echo "<a href='logout.php'><button id='exit'>Wyloguj</button></a>";

?>
</body>
</html>