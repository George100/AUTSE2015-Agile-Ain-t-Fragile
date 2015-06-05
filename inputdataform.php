<html>
	<head>
		<title>SERLER Data Entry</title>
		<script language="javascript">
		var i = 0;
		function changeIt() {
			if (i != 2) {
				my_div.innerHTML = my_div.innerHTML +
				"First Name: <input type='text' name='afname[]'> Last Name: <input type='text' name='alname[]'><p>" 
				i++;
			}
		}
		</script>
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
			<h1>Data Entry Form</h1>
			<form action="inputdataprocess.php" method="post">
				Title: <input type="text" name="title" placeholder="Mary had a little lamb"></label>
				<p>
				Author(s): <input type="button" value="Add Author" onClick="changeIt()">
				<p>First Name: <input type="text" name="fname" placeholder="John">
				Last Name: <input type="text" name="lname" placeholder="Smith">
				<div id="my_div"></div>
				<p>
				Date Published:
				<input type="month" name="datePub">
				<p>
				Software Development Methodology:
				<select>
					<option value="methNull">----------------------------</option>
					<option value="methSpiral">Spiral</option>
					<option value="methScrum">Scrum</option>
					<option value="methWaterfall">Waterfall</option>
					<option value="methKanban">Kanban</option>
					<option value="methoExtremeProg">Extreme Programming</option>
					<option value="methTestDriven">Test Driven Development</option>
				</select><p>
				Practice(s) being investigated: 
				<br /><select>
					<option value="practiceNull">----------------------------</option>
					<option value="practiceTestFirst">Test First Development</option>
					<option value="practiceAutoRegression">Automated Regression Testing</option>
					<option value="practiceAutoAcceptance">Automated Acceptance Testing</option>
					<option value="practiceVersionControl">Version Control</option>
					<option value="practiceSharedCode">Shared Code</option>
					<option value="practiceContinuousInt">Continuous Integration</option>
					<option value="practiceAutomatedBuild">Automated Build</option>
					<option value="practiceRapidPrototype">Rapid Prototyping</option>
				</select>
				<select>
					<option value="practiceNull">----------------------------</option>
					<option value="practiceTestFirstTwo">Test First Development</option>
					<option value="practiceAutoRegressionTwo">Automated Regression Testing</option>
					<option value="practiceAutoAcceptanceTwo">Automated Acceptance Testing</option>
					<option value="practiceVersionControlTwo">Version Control</option>
					<option value="practiceSharedCodeTwo">Shared Code</option>
					<option value="practiceContinuousIntTwo">Continuous Integration</option>
					<option value="practiceAutomatedBuildTwo">Automated Build</option>
					<option value="practiceRapidPrototypeTwo">Rapid Prototyping</option>
				</select>
				<p><b>******THE FOLLOWING FIELDS BELOW ARE OPTIONAL******</b><p>
				<b>The Pieces of Evidence</b><br />
				The benefit or outcome being tested:<br />
				<textarea name="taTested" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2textarea>
				<p>The context of the study:<br />
				<textarea name="taContext" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
				<p>The result of the study:<br />
				<textarea name="taResult" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
				<p>The integrity of the implementation of the practice/method:<br />
				<textarea name="taIntegrity" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
				<p><b>Information about the research design</b><br />
				<p>Nature of the Participants: 
				<select>
					<option value="natureNull">----------------------------</option>
					<option value="natureSmall">Small Group (<15 people)</option>
					<option value="natureMedium">Medium Group (<50 people)</option>
					<option value="natureLarge">Large Group (>50 people)</option>
				</select><br />
				<p>Research Method:
				<select>
					<option value="researchNull">----------------------------</option>
					<option value="researchQuantity">Quantitatively Driven Approach</option>
					<option value="researchQuality">Qualitatively Driven Approach</option>
					<option value="researchMixture">Mixture of Quantitative & Qualitative</option>
				</select><br /><p>
				Research Question:<br />
				<textarea name="taResearchQuestion" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
				<p>Research Metrics:<br />
				<textarea name="taResearchMetrics" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
				<p>
				<input type="submit" value="Post">
				<input type="reset" value="Reset">
			</form>
		</div>
	</body>
</html>
