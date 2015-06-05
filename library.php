<html>
	<head>
		<title>SERLER Library</title>
    </head>
    <link href="style.css" rel="stylesheet" type="text/css">
	<div id="menu">
		<ul id="nav">
			<li><a href="index.php" >Home</a></li>
			<li><a href="library.php" >Library</a>
			<li><a href="bibliographicform.php" >Bibliographic Search</a>
			<li><a href="methodologyform.php" >Methodology Search</a>
			<li><a href="inputdataform.php">Submit data!</a>
		</ul>
	</div>
	<body>
		<div class="center">
			<h1>&nbsp;</h1>
			<h1>&nbsp;</h1>
			<h1>SERLER Library</h1>
			<h4>These are all the current data in the repository.</h4>
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
		</div>
	</body>
</html>
