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
				
				$maxResults = 0;
				
				if (!$connection) {
					echo "<p>Something is wrong with ", $query, "</p>";
				} else {
					$query = "SELECT * FROM $sql_tble";
					
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
								echo "<td><b>Author: </b>", $authorOne, ", <br>", $authorTwo, "</td>";
								echo "<td><b>Author: </b>", $authorThree, ", <br>", $authorFour, "</td>";
								echo "<td><b>Date Added: </b>", $row["dateadded"], "</td>";
								echo "<td><b>Date Published: </b>", $row["datepublish"], "</td>";
								echo "<td><b>Category: </b>", $row["category"], "</td>";
								echo "</tr>";
								
								// Limits the max. results to 25
								$maxResults++;
								if ($maxResults == 25) {
									break;
								}
							}
						}
					}
					echo "</table>";
				}			
			?>
			<p>
			<a href="index.php" class="btn">Basic Search</a>
			 - 
			<a href="searchdataformadv.php" class="btn">Advanced Search</a>
			<br>
			 - 
			<br>
			<a href="inputdataform.php" class="btn">Click here to submit data! (registered users only)</a>
			<br>
			 - 
			<br>
			<a href="index.php" class="btn">Click here to return to Home Page</a>
	</center>
	</body>
</html>
