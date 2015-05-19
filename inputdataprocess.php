<html>
	<head>
		<title>Post Status Processed</title>
	</head>
	
	<body>
		<center><h1>Post Status Process</h1>
			<?php
				require_once('sqlinfo.inc.php');
				
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
					if (isset ($_POST["datePub"])) {
						$datePub = $_POST["datePub"];
					}
					if (isset ($_POST["category"])) {
						$category = $_POST["category"];
					}
					
					// Current day for the date added.
					$date = date('d/m/y');
					
					// checks if the necessary fields are complete, otherwise inform user to fill them in.
					if ($title != null && $fname != null && $lname != null && $datePub != null) {
						$query = "insert into $sql_tble"
							."(title, fname, lname, dateadded, datepublish, category)"
								. "values"
									."('$title', '$fname', '$lname', '$date', '$datePub', '$category')";
						
						// executes the query
						$result = @mysqli_query($connection, $query);
						// checks if the execution was successful
						if(!$result) {
							echo "<p>Something is wrong with ",	$query, "</p>";
						} else {
							// display an operation successful message
							echo "<p>Information successfully stored!</p>";
						} // if successful query operation
					} else {
						if ($title == null) {
							echo "<p>Please enter a title!</p>";
						}
						if ($fname == null) {
							echo "<p>Please enter a first name! (No special characters, numbers or spaces allowed)</p>";
						}
						if ($lname == null) {
							echo "<p>Please enter a last surname! (No special characters, numbers or spaces allowed)</p>";
						}
						if ($datePub == null) {
							echo "<p>Please enter a date!<p>";
						}
					}
				}
				mysqli_close($connection);
			?>
		<a href="inputdataform.php">Click here to submit another form</a>
		<br>
		<a href="index.php">Click here to return to the Home Page</a>
		</center>
	</body>
</html>
