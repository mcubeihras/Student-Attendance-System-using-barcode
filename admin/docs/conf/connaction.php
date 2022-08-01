 <?php 

	//database connection 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="stms_new";
	
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	
		//echo "Connected successfully";
	
	
	//select query
	mysqli_select_db($conn,$db);
?>