<?php
//a6n1 by Ryan Smalley on 3/1/2014
require_once('common.php');
function MainPage(){
htmlStart('Decision Maker', 'style.css');
?>
<h1>Decision Maker</h1>
<p>This site allows you to add options to a list and then chooses one.</br>
Press new to make a new options list</br>
Just type in an option click add, then repeat.</br>
Once all the options are in click Choose and it will make a decision for you</br>
Not doing the decision it chooses for you will incur the wraith of the goat-monkey curse</br>
</p>
</hr>
<form name="Decisions" method="get" action="a6n1.php">
<p>Option to add:
<input type="text" name="O" size="25" required
	placeholder="enter an option here">
</p>
<input type="submit" name="add" value="Add">
</form>
<a href="http://localhost/tests/a6n1.php?O=+&new=New">
    <button>New</button></a></br>
<a href="http://localhost/tests/a6n1.php?O=+&choose=Choose">
    <button>Choose</button></a></br></br>

<?php
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php tests";
if(isset($_GET['add'])) {
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Cannot connect to decision matrix: " .  mysqli_connect_error());
	}
	$text = $_GET['O'];
	$sql = "INSERT INTO decisions (choices) VALUES ('$text')";
	if (mysqli_query($conn, $sql)) {
	MainPage();
    echo "Successfully added option to the decision matrix.";
	} 
	else {
	MainPage();
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	}
	
elseif(isset($_GET['new'])) {
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Cannot connect to decision matrix: " .  mysqli_connect_error());
	}
	$sql = "DROP TABLE IF EXISTS decisions";
	if (mysqli_query($conn, $sql)) {
	MainPage();
    echo "Successfully cleared the decision matrix.";
	echo  "<br>";
	} 
	else {
	MainPage();
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "CREATE TABLE decisions(choiceID INT(11) NOT NULL AUTO_INCREMENT,choices VARCHAR(25) DEFAULT NULL,PRIMARY KEY (choiceID))";
	if (mysqli_query($conn, $sql)) {
    echo "Successfully reinitilized the decision matrix.";
	} 
	else {
	 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	}
	
elseif(isset($_GET['choose'])) {
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Cannot connect to decision matrix: " .  mysqli_connect_error());
	}
	MainPage();
	$sql = "SELECT choiceID, choices FROM decisions";//http://www.w3schools.com/php/php_mysql_select.asp
	$result = $conn->query($sql);
	$rando = (rand(1,$result->num_rows));
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row["choiceID"] == $rando){
		echo "<h1>";
        echo $row["choiceID"]. " : " . $row["choices"]. "<br>";
		echo "</h1>";
		}
		else{
		echo $row["choiceID"]. " : " . $row["choices"]. "<br>";
		}
    }
	echo "<p>you must do option  :  ";
	echo $rando ;
	} else {
    echo "<p> Add Some Options first....</p>";
	}
	$conn->close();
	}
	else{
		MainPage();
	}
pageFooter();
htmlEnd();
?>
