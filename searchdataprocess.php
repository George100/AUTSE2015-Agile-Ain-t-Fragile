<html>
	<head>
		<title>Search Status Processed</title>
	</head>
	
	<body>
		<center><h1>Search Results</h1></center>
		
			<?php
				
				$sql_host = "127.0.0.1";
				$sql_user = "root";
				$sql_pass = "";
				$sql_db   = "university";
				$sql_tble = "seassignment";
				
				$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
			
				if (!$connection) {
					echo "<p><center>Database connection failure</center></p>";
				} else {					
					$search = $_GET["search"];
					// tells user to input something to search for, otherwise search for user input.
					if (empty ($_GET["search"])) {
						echo "<p><center>Please enter something to search for!</center></p>";
					} else {
					
						echo "<p><center>Search results for: <i>", $search, "</i></center></p>";
					
						$query = "select * from $sql_tble where title like '$search'";
						$result = mysqli_query($connection, $query);
						
						if (!$result) {
							echo "<p>Something is wrong with ", $query, "</p>";
						} else {
							// inform users if there are no results, otherwise show results.
							if (mysqli_num_rows($result)==0) {
								echo "<p><center>There are no results for this search. Sorry!</center></p>";
							} else {
								echo "<center><table border=\"1\">";
									
								while ($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>Title: ", $row["title"], "</td>";
									echo "<td>First Name: ", $row["fname"], "</td>";
									echo "<td>Last Name: ", $row["lname"], "</td>";
									echo "<td>Date Added: ", $row["dateadded"], "</td>";
									echo "</tr>";
								}
							}
						}
						echo "</table></center>";
					}
				}	
				mysqli_close($connection);
			?>	
		<center>
		<br><a href="searchdataform.php">Search again</a>
		<br><a href="index.php">Return to Home Page</a>
		</center>
	</body>
</html>
