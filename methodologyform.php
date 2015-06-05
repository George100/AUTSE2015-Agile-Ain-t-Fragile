<html>
	<head>
		<title>SERLER Methodology</title>
    </head>
	
	<h1>Methodology Search</h1>
	<h4>Feel free to view data in the repository.</h4>
	<form action="methodologyprocess.php" method="get">
	
		<b>Information about the article</b><p>
		<label>Credibility Rating of Article:
		<input type="Radio" name="credOne" value="1">1
		<input type="Radio" name="credTwo" value="2">2
		<input type="Radio" name="credThree" value="3">3
		<input type="Radio" name="credFour" value="4">4
		<input type="Radio" name="credFive" value="5">5
		</label><br />

		Software Development Methodology:
		<select>
			<option value="methNone">Choose One</option>
			<option value="methSpiral">Spiral</option>
			<option value="methScrum">Scrum</option>
			<option value="methWaterfall">Waterfall</option>
			<option value="methKanban">Kanban</option>
			<option value="methoExtremeProg">Extreme Programming</option>
			<option value="methTestDriven">Test Driven Development</option>
		</select><br />
		Nature of the Participants: 
		<select>
			<option value="natureSmall">Small Group (<15 people)</option>
			<option value="natureMedium">Medium Group (<50 people)</option>
			<option value="natureLarge">Large Group (>50 people)</option>
		</select><br />
		Practice(s) being investigated: 
		<select>
			<option value="practiceTestFirst">Test First Development</option>
			<option value="practiceAutoRegression">Automated Regression Testing</option>
			<option value="practiceAutoAcceptance">Automated Acceptance Testing</option>
			<option value="practiceVersionControl">Version Control</option>
			<option value="practiceSharedCode">Shared Code</option>
			<option value="practiceContinuousInt">Continuous Integration</option>
			<option value="practiceAutomatedBuild">Automated Build</option>
			<option value="practiceRapidPrototype">Rapid Prototyping</option>
		</select><p>
		
		<b>The Pieces of Evidence</b><br />
		<i>None of the following below are compulsory</i><p>
		The benefit or outcome being tested:<br />
		<textarea name="taTested" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
		<p>The context of the study:<br />
		<textarea name="taContext" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
		<p>The result of the study:<br />
		<textarea name="taResult" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
		<p>The integrity of the implementation of the practice/method:<br />
		<textarea name="taIntegrity" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
		<p><label>Confidence Rating of Evidence:
		<input type="Radio" name="conOne" value="1">1
		<input type="Radio" name="conTwo" value="2">2
		<input type="Radio" name="conThree" value="3">3
		<input type="Radio" name="conFour" value="4">4
		<input type="Radio" name="conFive" value="5">5
		</label><br />
	</form>
	<p>
	<a href="bibliographicform.php">Bibliographic Search</a><br />
	<a href="methodologyform.php">Methodology Search</a><br />
	<a href="inputdataform.php">Submit data!</a><br />
	<a href="library.php">Library!</a><br />
	<a href="index.php">Home</a>
	</body>
</html>
