<html>
	<head>
		<title>SERLER Submission Processed</title>
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
			<h1>&nbsp;</h1>
			<h1>&nbsp;</h1>
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
					}
					$practices = null;
					if (isset ($_POST["practice"])) {
						$practicesInvestigated = $_POST["practice"];
						for ($i=0; $i<count($practicesInvestigated);$i++) {
							$practices .= $practicesInvestigated[$i];
							$practices .= ", ";
						}
						if ($practices == null) {
							$practices = null;
						}
					}
					// The Pieces of Evidence
					if (isset ($_POST["taContext"])) {
						$taContext = $_POST["taContext"];
						if (empty ($taContext)) {
							$taContext = "N/A";
						}
					}
					if (isset ($_POST["taTested"])) {
						$taTested = $_POST["taTested"];
						if (empty ($taTested)) {
							$taTested = "N/A";
						}
					}
					if (isset ($_POST["taResult"])) {
						$taResult = $_POST["taResult"];
						if (empty ($taResult)) {
							$taResult = "N/A";
						}
					}
					if (isset ($_POST["taIntegrity"])) {
						$taIntegrity = $_POST["taIntegrity"];
						if (empty ($taIntegrity)) {
							$taIntegrity = "N/A";
						}
					}
					// Information about the research design
					if (isset ($_POST["natureParticipants"])) {
						$natureParticipants = $_POST["natureParticipants"];
						if ($natureParticipants == 0) {
							$natureParticipants = "N/A";
						} elseif ($natureParticipants == 1) {
							$natureParticipants = "Small Group (<15 people)";
						} elseif ($natureParticipants == 2) {
							$natureParticipants = "Medium Group (<50 people)";
						} elseif ($natureParticipants == 3) {
							$natureParticipants = "Large Group (>50 people)";
						}
					}
					if (isset ($_POST["researchMethod"])) {
						$researchMethod = $_POST["researchMethod"];
						if ($researchMethod == 0) {
							$researchMethod = "N/A";
						} elseif ($researchMethod == 1) {
							$researchMethod = "Quantitatively Driven Approach";
						} elseif ($researchMethod == 2) {
							$researchMethod = "Qualitatively Driven Approach";
						} elseif ($researchMethod == 3) {
							$researchMethod = "Mixture of Quantitative & Qualitative";
						}
					}
					if (isset ($_POST["taResearchQuestion"])) {
						$taResearchQuestion = $_POST["taResearchQuestion"];
						if (empty ($taResearchQuestion)) {
							$taResearchQuestion = "N/A";
						}
					}
					if (isset ($_POST["taResearchMetrics"])) {
						$taResearchMetrics = $_POST["taResearchMetrics"];
						if (empty ($taResearchMetrics)) {
							$taResearchMetrics = "N/A";
						}
					}
					// Current day for the date added.
					$date = date('d/m/y');
					
					// checks if the necessary fields are complete, otherwise inform user to fill them in.
					if ($title != null && $datePub != null && $methodology != null && $practices != null) {
						$query = "insert into $sql_tble"
							."(title, authoronefname, authoronelname, authortwofname, authortwolname, 
								authorthreefname, authorthreelname, dateadded, datepublish, 
									sdmethodology, practicesinvestigated, benefitoutcometested,
									contextstudy, studyresult, implementationintegrity, 
									numberofparticipants, researchmethod, 
									researchquestion, researchmetrics)"
								. "values"
									."('$title', '$fname', '$lname', '$authorTwoFname', '$authorTwoLname', 
										'$authorThreeFname', '$authorThreeLname', '$date', '$datePub', 
											'$methodology', '$practices', '$taTested',  
											'$taContext', '$taResult', '$taIntegrity', 
											'$natureParticipants', '$researchMethod',
											'$taResearchQuestion', '$taResearchMetrics')";
						
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
						if ($methodology == null) {
							echo "<p>Please select a methodology<p>";
						}
						if ($practices == null) {
							echo "<p>Please select some practice(s)";
						}
					}
				}
				mysqli_close($connection);
			?>
		</div>
	</body>
</html>
