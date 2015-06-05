<html>
	<head>
		<title>Post Status Processed</title>
    </head>
	
	<body>
		<h1>Post Status Process</h1>
		<?php
			require_once('sqlinfo.inc.php');
			
			$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
			
			if (!$connection) {
				echo "<p>Database connection failure</p>";
			} else {
				
				$namePattern = "/^[a-zA-Z]+$/";
				
				if (isset ($_POST["title"])) {
					$title = $_POST["title"];
					if (empty ($title)) {
						$title = null;
					}
				}
				if (isset ($_POST["fname"])) {
					$fname = $_POST["fname"];
					if (!preg_match($namePattern, $fname)) {
						$fname = null;
					}
				}
				if (isset ($_POST["lname"])) {
					$lname = $_POST["lname"];
					if (!preg_match ($namePattern, $lname)) {
						$lname = null;
					}
				}
				if (isset ($_POST["datePub"])) {
					$datePub = $_POST["datePub"];
				}
				if (isset ($_POST["category"])) {
					$category = $_POST["category"];
				}
				if (isset ($_POST["afname"][0])) {
					$authorTwoFname = $_POST["afname"][0];
					if (!preg_match($namePattern, $authorTwoFname)) {
						$authorTwoFname = null;
					}
				} else {
					$authorTwoFname = null;
				}
				if (isset ($_POST["alname"][0])) {
					$authorTwoLname = $_POST["alname"][0];
					if (!preg_match($namePattern, $authorTwoLname)) {
						$authorTwoLname = null;
					}
				} else {
					$authorTwoLname = null;
				}
				if (isset ($_POST["afname"][1])) {
					$authorThreeFname = $_POST["afname"][1];
					if (!preg_match($namePattern, $authorThreeFname)) {
						$authorThreeFname = null;
					}
				} else {
					$authorThreeFname = null;
				}
				if (isset ($_POST["alname"][1])) {
					$authorThreeLname = $_POST["alname"][1];
					if (!preg_match($namePattern, $authorThreeLname)) {
						$authorThreeLname = null;
					}
				} else {
					$authorThreeLname = null;
				}
				if (isset ($_POST["afname"][2])) {
					$authorFourFname = $_POST["afname"][2];
					if (!preg_match($namePattern, $authorFourFname)) {
						$authorFourFname = null;
					}
				} else {
					$authorFourFname = null;
				}
				if (isset ($_POST["alname"][2])) {
					$authorFourLname = $_POST["alname"][2];
					if (!preg_match($namePattern, $authorFourLname)) {
						$authorFourLname = null;
					}
				} else {
					$authorFourLname = null;
				}
				// Current day for the date added.
				$date = date('d/m/y');
				
				// checks if the necessary fields are complete, otherwise inform user to fill them in.
				if ($title != null && $datePub != null) {
					$query = "insert into $sql_tble"
						."(title, authoronefname, authoronelname, authortwofname, authortwolname, 
							authorthreefname, authorthreelname, authorfourfname, authorfourlname, 
								dateadded, datepublish, category)"
							. "values"
								."('$title', '$fname', '$lname', '$authorTwoFname', '$authorTwoLname', 
									'$authorThreeFname', '$authorThreeLname', '$authorFourFname', '$authorFourLname', 
										'$date', '$datePub', '$category')";
					
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
		<a href="bibliographicform.php">Bibliographic Search</a><br />
		<a href="methodologyform.php">Methodology Search</a><br />
		<a href="inputdataform.php">Submit data!</a><br />
		<a href="library.php">Library!</a><br />
		<a href="index.php">Home</a>	</body>
</html>
