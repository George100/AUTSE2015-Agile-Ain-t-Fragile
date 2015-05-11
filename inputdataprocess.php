<html>
	<head>
		<title>Post Status Processed</title>
	</head>
	
	<body>
		<center><h1>Post Status Process</h1></center>
			<?php
			
				$sql_host = "127.0.0.1";
				$sql_user = "root";
				$sql_pass = "";
				$sql_db   = "university";
				$sql_tble = "seassignment";
				
				$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
				
				if (!$connection) {
					echo "<p>Database connection failure</p>";
				} else {
					
					if (isset ($_POST["title"])) {
						$title = $_POST["title"];
						if (empty ($title)) {
							$title = null;
						}
					}
					
					if (isset ($_POST["fname"])) {
						$fname = $_POST["fname"];
						$fnamePattern = "/^[a-zA-Z]+$/";
						if (!preg_match($fnamePattern, $fname)) {
							$fname = null;
						}
					}
					
					if (isset ($_POST["lname"])) {
						$lname = $_POST["lname"];
						$lnamePattern = "/^[a-zA-Z]+$/";
						if (!preg_match ($lnamePattern, $lname)) {
							$lname = null;
						}
					}
					
					$date = date('d/m/y');
					
					// checks if the necessary fields are complete, otherwise inform user to fill them in.
					if ($title != null && $fname != null && $lname != null) {
						$query = "insert into $sql_tble"
							."(title, fname, lname, dateadded)"
								. "values"
									."('$title', '$fname', '$lname', '$date')";
						
						// executes the query
						$result = @mysqli_query($connection, $query);
						// checks if the execution was successful
						if(!$result) {
							echo "<p><center>Something is wrong with ",	$query, "</center></p>";
						} else {
							// display an operation successful message
							echo "<p><center>Information successfully stored!</center></p>";
						} // if successful query operation
					} else {
						if ($title == null) {
							echo "<p><center>Please enter a title!</center></p>";
						}
						if ($fname == null) {
							echo "<p><center>Please enter a first name! (No special characters, numbers or spaces allowed)</center></p>";
						}
						if ($lname == null) {
							echo "<p><center>Please enter a last surname! (No special characters, numbers or spaces allowed)</center></p>";
						}
					}
				}
				mysqli_close($connection);
			?>		
		<center>
		<a href="inputdataform.php">Click here to submit another form</a>
		<br>
		<a href="index.php">Click here to return to the Home Page</a>
		</center>
	</body>
</html>
