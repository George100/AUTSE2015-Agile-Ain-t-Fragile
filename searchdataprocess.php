<html>
	<head>
		<title>Search Status Processed</title>
	</head>
	
	<body>
		<center>
			<h1>Search Results</h1>
				<?php
					require_once('sqlinfo.inc.php');
					
					$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
				
					if (!$connection) {
						echo "<p>Database connection failure</p>";
					} else {					
						$search = $_GET["searchTitle"];
						$authorFName = $_GET["authorFName"];
						$authorLName = $_GET["authorLName"];
						$datePublished = $_GET["searchYear"];
						$searchCategory = $_GET["searchCategory"];
						// tells user to input something to search for, otherwise search for user input.
						if (empty ($_GET["searchTitle"])) {
							echo "<p>Please enter something to search for!</p>";
						} else {
						
							$query = "SELECT * FROM $sql_tble
										WHERE title LIKE '%$search%'";
						
							if ($authorFName != null) {
								$query .= "AND fname LIKE '%$authorFName%'";
							}
							if ($authorLName != null) {
								$query .= "AND lname LIKE '%$authorLName%'";
							}
							if ($datePublished != 0 || $datePublished != null) {
								$query .= "AND datepublish LIKE '$datePublished'";
							}
							if ($searchCategory != null) {
								$query .= "AND category LIKE '%$searchCategory%'";
							}
							
							echo "<p>Search results for: <i>", $search, "</i></p>";
							
							$result = mysqli_query($connection, $query);
							
							if (!$result) {
								echo "<p>Something is wrong with ", $query, "</p>";
							} else {
								// inform users if there are no results, otherwise show results.
								if (mysqli_num_rows($result)==0) {
									echo "<p>There are no results for this search. Sorry!</p>";
								} else {
									echo "<table border=\"1\">";
										
									while ($row = mysqli_fetch_assoc($result)) {
										echo "<tr>";
										echo "<td>Title: ", $row["title"], "</td>";
										echo "<td>First Name: ", $row["fname"], "</td>";
										echo "<td>Last Name: ", $row["lname"], "</td>";
										echo "<td>Date Added: ", $row["dateadded"], "</td>";
										echo "<td>Date Published: ", $row["datepublish"], "</td>";
										echo "<td>Category: ", $row["category"], "</td>";
										echo "</tr>";
									}
								}
							}
							echo "</table>";
						}
					}	
					mysqli_close($connection);
				?>	
			<br><a href="index.php">Return to Home Page</a>
		</center>
	</body>
</html>
