<html>
	<head>
		<title>SERLER Methodology Processed</title>
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
			<h1>Methodology Search Results</h1>
			<?php
				require_once('sqlinfo.inc.php');
					
				$connection = @mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
				
				if (!$connection) {
					echo "<p>Database connection failure</p>";
				} else {
					$query = "SELECT * FROM $sql_tble ";
					
					if (isset ($_POST["methodology"])) {
						$methodology = $_POST["methodology"];
						if ($methodology == 0) {
							$methodology = null;
						} elseif ($methodology == 1) {
							$methodology = "Spiral";
						} elseif ($methodology == 2) {
							$methodology = "Scrum";
						} elseif ($methodology == 3) {
							$methodology = "Waterfall";
						} elseif ($methodology == 4) {
							$methodology = "Kanban";
						} elseif ($methodology == 5) {
							$methodology = "Extreme Programming";
						} elseif ($methodology == 6) {
							$methodology = "Test Driven Development";
						}
						$query .= "WHERE sdmethodology LIKE '$methodology' ";
					}
					$practices = null;
					if (isset ($_POST["practice"])) {
						$practicesInvestigated = $_POST["practice"];
						$practices = null;
						for ($i=0; $i<count($practicesInvestigated);$i++) {
							$practices .= $practicesInvestigated[$i];
							$practices .= ", ";
						}
						if ($practices == null) {
							$practices = null;
						} else {
							// Split the string into 2 practices
							$practiceNum = explode(", ", $practices);
							$practiceOne = $practiceNum[0];
							$practiceTwo = $practiceNum[1];
							if ($practiceOne != null) {
								$query .= "AND practicesinvestigated LIKE '%$practiceOne%' ";
							}
							if ($practiceOne != null) {
								$query .= "AND practicesinvestigated LIKE '%$practiceTwo%' ";
							}
						}
					}
					if (isset ($_POST["taTested"])) {
						$taTested = $_POST["taTested"];
						if (empty ($taTested)) {
							$taTested = null;
						} else {
							$query .= "AND benefitoutcometested LIKE '%$taTested%' ";
						}
					}
					if (isset ($_POST["taContext"])) {
						$taContext = $_POST["taContext"];
						if (empty ($taContext)) {
							$taContext = null;
						} else {
							$query .= "AND contextstudy LIKE '%$taContext%' ";
						}
					}
					if (isset ($_POST["taResult"])) {
						$taResult = $_POST["taResult"];
						if (empty ($taResult)) {
							$taResult = null;
						} else {
							$query .= "AND studyresult LIKE '%$taResult%' ";
						}
					}
					if (isset ($_POST["taIntegrity"])) {
						$taIntegrity = $_POST["taIntegrity"];
						if (empty ($taIntegrity)) {
							$taIntegrity = null;
						} else {
							$query .= "AND implementationintegrity LIKE '%$taIntegrity%' ";
						}
					}
					if (isset ($_POST["natureParticipants"])) {
						$natureParticipants = $_POST["natureParticipants"];
						if ($natureParticipants == 0) {
							$natureParticipants = null;
						} elseif ($natureParticipants == 1) {
							$natureParticipants = "Small";
						} elseif ($natureParticipants == 2) {
							$natureParticipants = "Medium";
						} elseif ($natureParticipants == 3) {
							$natureParticipants = "Large";
						}						
						$query .= "AND numberofparticipants LIKE '%$natureParticipants%' ";
					}
					if (isset ($_POST["researchMethod"])) {
						$researchMethod = $_POST["researchMethod"];
						if ($researchMethod == 0) {
							$researchMethod = null;
						} elseif ($researchMethod == 1) {
							$researchMethod = "Quantitatively";
						} elseif ($researchMethod == 2) {
							$researchMethod = "Qualitatively";
						} elseif ($researchMethod == 3) {
							$researchMethod = "Mixture";
						}						
						$query .= "AND researchmethod LIKE '%$researchMethod%' ";
					}
					if (isset ($_POST["taResearchQuestion"])) {
						$taResearchQuestion = $_POST["taResearchQuestion"];
						if (empty ($taResearchQuestion)) {
							$taResearchQuestion = null;
						} else {
							$query .= "AND researchquestion LIKE '%$taResearchQuestion%' ";
						}
					}
					if (isset ($_POST["taResearchMetrics"])) {
						$taResearchMetrics = $_POST["taResearchMetrics"];
						if (empty ($taResearchMetrics)) {
							$taResearchMetrics = null;
						} else {
							$query .= "AND researchmetrics LIKE '%$taResearchMetrics%' ";
						}
					}
					
					
					
					if ($methodology == null) {
						echo "<p>Please select a methodology to search for</p>";
					} else if ($practices == null) {
						echo "<p>Please select a practice(s)";
					} else {
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