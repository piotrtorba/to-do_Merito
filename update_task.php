<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Aplikacja To Do List w PHP z bazą danych MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 

if(isset($_SESSION["username"])  && isset($_GET["task_id"]))
{
	 
	echo "<img src='merito_logo.png' alt='Tu ma być logo' id='logo'/>";

	$DBHOST = "localhost";
	$DBUSER = "root";
	$DBPWD = "";
	$DBNAME = "toDOlist";
 
	$task_id = $_GET["task_id"];

	$db_connect = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

	if ($db_connect->connect_error) {
	    die("Connection failed: " . $db_connect->connect_error);
	} 


	$statement = "SELECT * FROM task WHERE task_id=?";
	$final_statement = $db_connect->prepare($statement);
	$final_statement->bind_param("i", $task_id);
	$final_statement->execute();
	$result = $final_statement->get_result();
	if($result->num_rows<=0)
{
	header("Location:login.php");
}			
	$final_statement->close();
 
$task_id = $_GET["task_id"];

echo "<div id='utitle'>Aktualizuj zadanie </div>";
 

if(isset($_GET["field"]))
{
if($_GET["field"] =="incomplete")
{
echo "<b class='error'>Proszę wypełnić wszystkie pola </b>";
echo "<br>";
echo "<br>";
}
}

$delete_task = "task_deleted.php?task_id=";
$task_id = $row["task_id"];
$delete_task .= $task_id;

$update_task = "update_task.php?task_id=";
$task_id = $row["task_id"];
$update_task .=$task_id;

echo "<form class='uform' action='task_updated.php' method='POST'>";	

echo "<input type='hidden' name='task_id' value='$task_id'>";
 

echo "<label class='ulabel' for='task'>Update Task:</label>";
echo "<input type='text' name='task'/>";
echo "<br>";
echo "Update Completion Time:";
echo "<select id='month' name='month' onchange='a()'>";
echo "<option value='January'>January </option>"; 
echo "<option value='February'>February </option>"; 
echo "<option value='March'>March </option>"; 
echo "<option value='April'>April </option>"; 
echo "<option value='May'>May </option>"; 
echo "<option value='June'>June </option>"; 
echo "<option value='July'>July</option>"; 
echo "<option value='August'>August </option>"; 
echo "<option value='September'>September </option>"; 
echo "<option value='October'>October </option>"; 
echo "<option value='November'>November </option>"; 
echo "<option value='December'>December </option>"; 
echo "</select>";

echo "<select id='day' name='day'>"; 
echo "</select>";

echo "<select id='year' name='year' onchange='a()'>";
echo "<option value='2024'>2024 </option>";
echo "<option value='2025'>2025 </option>";
echo "<option value='2026'>2026 </option>";
echo "</select>";

echo "<select id='hour' name='hour'>";
for($i=0; $i<12;$i++)
{
	$j = $i+1;
	 
	if($j<10)
	{
	$j = "0".$j;	
	}
 
	echo "<option value='$j'>$j</option>";
	
}
echo "</select>";

echo "<select id='minute' name='minute'>";
for($i=0; $i<60;$i++)
{
	if($i<10)
			{
			$i ="0".$i;		
			}
	echo "<option value='$i'>$i</option>";
	
}
echo "</select>";

echo "<input type='submit' value='Aktualizuj'/>";
  
echo "</form>"; 
echo "<a href='logout.php'><button id='exit'>Wyloguj</button></a>";
	
}

	
else
{
   header("Location:display_task.php");
}
/*prevents direct access of URL by user */

?>
</body>
</html>