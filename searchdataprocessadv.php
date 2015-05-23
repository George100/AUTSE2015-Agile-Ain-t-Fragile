<html>
	<head>
		<title>Search Status Processed</title>
	<html>
	<head>
    <link href="style.css" rel="stylesheet" type="text/css">
    </head>
	<img src="Images/logo.png" width="322" height="152" alt=""/>
    <img src="Images/aaflogo.png" width="322" height="152" alt="" align="right"/> 
	<p>&nbsp;</p>
	
	<body>
		<center>
			<h1 class="jumbotron">Search Results</h1>
				<?php
					require_once('sqlinfo.inc.php');
					
					$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
				
					if (!$connection) {
						echo "<p>Database connection failure</p>";
					} else {
						if (empty ($_GET["searchTitle"])) {
							echo "<p>Please enter a title, otherwise we don't know what to search for!</p>";
						} else {
							
							$searchTitle = $_GET["searchTitle"];
							$searchYear = $_GET["searchYear"];
							$searchCategory = $_GET["searchCategory"];
							$authorOneFName = $_GET["authorOneFName"];
							$authorOneLName = $_GET["authorOneLName"];
							
							$query = "SELECT * FROM $sql_tble
								WHERE title LIKE '%$searchTitle%'";	
							if (!empty ($_GET["searchYear"])) {
								$query .= "AND datepublish LIKE '$searchYear'";
							}
							if (!empty ($_GET["searchCategory"])) {
								$query .= "AND category LIKE '$searchCategory'";
							}
							if (!empty ($_GET["authorOneFName"])) {
								$query .= "AND authoronefname LIKE '$authorOneFName'";
								$query .= "OR authortwofname LIKE '$authorOneFName'";
								$query .= "OR authorthreefname LIKE '$authorOneFName'";
								$query .= "OR authorfourfname LIKE '$authorOneFName'";
							}
							if (!empty ($_GET["authorOneLName"])) {
								$query .= "AND authoronelname LIKE '$authorOneLName'";
								$query .= "OR authortwolname LIKE '$authorOneLName'";
								$query .= "OR authorthreelname LIKE '$authorOneLName'";
								$query .= "OR authorfourlname LIKE '$authorOneLName'";
							}
								
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
										$authorOne = $row["authoronefname"] . " " . $row["authoronelname"];
										$authorTwo = $row["authortwofname"] . " " . $row["authortwolname"];
										$authorThree = $row["authorthreefname"] . " " . $row["authorthreelname"];
										$authorFour = $row["authorfourfname"] . " " .  $row["authorfourlname"];
										
										echo "<tr>";
										echo "<td><b>Title: </b>", $row["title"], "</td>";
										echo "<td><b>Author(s): </b>", $authorOne, "<br>", $authorTwo, 
										"<br>", $authorThree, "<br>", $authorFour, "</td>";
										echo "<td><b>Date Added: </b>", $row["dateadded"], "</td>";
										echo "<td><b>Date Published: </b>", $row["datepublish"], "</td>";
										echo "<td><b>Category: </b>", $row["category"], "</td>";
										echo "</tr>";
									}
								}
							}
							echo "</table>";
						}
					}	
					mysqli_close($connection);
				?>	
			<br>
			<a href="searchdataformadv.php" class="btn">Advance Search Again</a>
			<br>
			 - 
			<br>
			<a href="index.php" class="btn">Return to Home Page</a>
		</center>
	</body>
</html>
