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
    <button>Choose</button></a></br>

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
/*
	$fh = fopen("test.txt", 'a+') or die("Failed to open file");
	
	MainPage();
	if (flock($fh, LOCK_EX))
	{
		fseek($fh, 0, SEEK_END);
		fwrite($fh, "$text \n") or die("Could not write to file");
		flock($fh, LOCK_UN);
	}
		fclose($fh);
		echo "Successfully added option.";
*/
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
	
		$filename = 'test.txt';
		$fh = fopen("test.txt", 'a+');
		$fh = file_get_contents($filename) or die("You didn't add any options..."); //http://stackoverflow.com/questions/3900985/in-php-how-do-i-load-txt-file-as-a-string
		$line = explode( "\n", $fh );
		MainPage();
		if(count($line)<1){
		echo "<p> Add Some Options first....</p>";
		}
		else{
		$rando = (rand(0,(count($line) -2)));
		for ($start=0; $start < count($line)-1; $start++) { //http://www.homeandlearn.co.uk/php/php7p5.html
		if($start == $rando){
			echo "<h1>";
			print $start;
			echo " : ";
			print $line[$start] . "<BR>";
			echo "</h1>";
		}
		else{
			print $start;
			echo " : ";
			print $line[$start] . "<BR>";
		}
			}
		echo "<p>you must do option  :  ";
		echo $rando ;
		
	
		}
	}
	else{
		MainPage();
	}
pageFooter();
htmlEnd();
?>
