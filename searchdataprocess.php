<html>
	<head>
		<title>SERLER</title>
	<link href="style.css" rel="stylesheet" type="text/css">
    </head>
	<img src="Images/logo.png" width="322" height="152" alt=""/>
    <img src="Images/aaflogo.png" width="322" height="152" alt="" align="right"/> 
    <p>&nbsp;</p>
	
	<body>
		<center>
			<h1 class="jumbotron">Welcome to SERLER</h1>
			<h4 class="jumbotron">Feel free to view data in the repository.</h4>
			
			<?php
				require_once('sqlinfo.inc.php');
				
				$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
				
				if (!$connection) {
					echo "<p>Database connection failure</p>";
				} else {
					
					if (empty ($_GET["searchTitle"])) {
							echo "<p>Please enter something to search for!</p>";
					} else {
						$query = "SELECT * FROM $sql_tble
									WHERE title LIKE '%$search%'";

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
			?>
			<a href="searchdataformadv.php" class="btn">Click here to use the advanced search!</a>
            <p>&nbsp;</p>
			<br><a href="inputdataform.php" class="btn">Click here to submit data! (registered users only)</a>
            <p>&nbsp;</p>
			<br><a href="index.php" class="btn">Click here to return to Home Page</a>
            <p>&nbsp;</p>
    </center>
	</body>
</html>
