<?php





class DBController {

	private $host = "localhost";

	private $user = "root";
	private $password = "";

	private $database = "eshop";

	private $conn;

	

	function __construct() {

		$this->conn = $this->connectDB();

	}

	

	function connectDB() {

		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);

		return $conn;

	}

	

	function runQuery($query) {

		$result = mysqli_query($this->conn,$query);

		while($row=mysqli_fetch_assoc($result)) {

			$resultset[] = $row;

		}		

		if(!empty($resultset))

			return $resultset;

	}

	

	function numRows($query) {

		$result  = mysqli_query($this->conn,$query);

		$rowcount = mysqli_num_rows($result);

		return $rowcount;	

	}

}



$dbhost = "localhost";

$dbuser ="root";

$dbpassword =  "";

$dbdatabase = "eshop";

$config_basedir = "http://localhost:81/mfhshop/";

$config_sitename = "My Friends Holiday";

$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());

mysql_select_db($dbdatabase, $db) or die(mysql_error());





?>

