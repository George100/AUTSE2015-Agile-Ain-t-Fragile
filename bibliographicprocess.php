<html>
	<head>
		<title>Bibliographic Status Processed</title>
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
			<h1>Bibliographic Search</h1>
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
						$authorOneFName = $_GET["authorOneFName"];
						$authorOneLName = $_GET["authorOneLName"];
						echo "<h3>Search Results for '", $searchTitle, "'</h3>";
						$query = "SELECT * FROM $sql_tble
							WHERE title LIKE '%$searchTitle%'";	
						if (!empty ($_GET["searchYear"])) {
							$query .= "AND datepublish LIKE '$searchYear'";
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
								$maxResults = 0;
								$resultNum = 1;
								while ($row = mysqli_fetch_assoc($result)) {
									$authorOne = $row["authoronefname"] . " " . $row["authoronelname"];
									$authorTwo = $row["authortwofname"] . " " . $row["authortwolname"];
									$authorThree = $row["authorthreefname"] . " " . $row["authorthreelname"];
									echo "<center><table border='2' width='900'>";
									echo "<td colspan='6'><center><b>Information about the article: ", $resultNum, "</b></center>";
									echo "<tr>";
									echo "<td width='150'><b>Title: </b>", "</td>";
									echo "<td width='100'><b>Author: </b></td>";
									echo "<td width='85'><b>Date Added </b></td>";
									echo "<td width='90'><b>Date Published: </b></td>";
									echo "<td width='90'><b>Methodology: </b></td>";
									echo "<td width='200'><b>Practice Investigated: </b></td>";
									echo "</tr><tr>";
									echo "<td>", $row["title"], "</td>";
									echo "<td>", $authorOne, "<br>", $authorTwo, "<br>", $authorThree, "</td>";
									echo "<td><center>", $row["dateadded"], "</center></td>";
									echo "<td><center>", $row["datepublish"], "</center></td>";
									echo "<td>", $row["sdmethodology"], "</td>";
									echo "<td>", $row["practicesinvestigated"], "</td>";
									echo "</tr><tr>";
									echo "<td colspan='6'><center><b>The Pieces of Evidence<b></center></td>";
									echo "</tr><tr>";								
									echo "<td width='150'>The context of the study</td>";
									echo "<td colspan='2'>", $row["contextstudy"], "</td>";
									echo "<td width='150'>The benefit or outcome being test</td>";
									echo "<td colspan='2'>", $row["benefitoutcometested"], "</td>";
									echo "</tr><tr>";
									echo "<td>The result of the study</td>";
									echo "<td colspan='2'>", $row["studyresult"], "</td>";
									echo "<td>The integrity of the implementation of the practice/method</td>";
									echo "<td colspan='2'>", $row["implementationintegrity"], "</td>";
									echo "</tr><tr>";
									echo "<td colspan='6'><b><center>Information about the research design</center></b></td>";
									echo "</tr><tr>";
									echo "<td>Nature of the participants</td>";
									echo "<td colspan='2'>", $row["numberofparticipants"], "</td>";
									echo "<td>Research Method</td>";
									echo "<td colspan='2'>", $row["researchmethod"], "</td>";
									echo "</tr><tr>";
									echo "<td>Research Question</td>";
									echo "<td colspan='2'>", $row["researchquestion"], "</td>";
									echo "<td>Research Metrics</td>";
									echo "<td colspan='2'>", $row["researchmetrics"], "</td>";
									echo "</tr>";
									echo "</table></center>";								
									echo "<p></p> --- <p></p>";
									// Limits the max. results to 25
									$maxResults++;
									$resultNum++;
									if ($maxResults == 25) {
										break;
									}
								}
							}
						}
					}
				}	
				mysqli_close($connection);
			?>
		</div>
	</body>
</html>
