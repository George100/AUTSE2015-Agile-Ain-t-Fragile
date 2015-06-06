<html>
	<head>
		<title>SERLER Methodology Search</title>
		<script language="javascript">
				function CountChecks(whichlist, maxchecked, latestcheck) {
			var listone = new Array("ch1", "ch2", "ch3", "ch4", "ch5", "ch6", "ch7", "ch8");
			var iterationlist;
			eval("iterationlist="+whichlist);
			var count = 0;
			for( var num=0; num < iterationlist.length; num++) {
			   if( document.getElementById(iterationlist[num]).checked == true) { count++; }
			   if( count > maxchecked ) { latestcheck.checked = false; }
			   }
			if( count > maxchecked ) {
			   alert('Sorry, only ' + maxchecked + ' may be checked.');
			   }
		}
		</script>
    </head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<div id="menu">
		<ul id="nav">
			<li><a href="index.php" >Home</a></li>
			<li><a href="library.php" >Library</a>
			<li><a href="bibliographicform.php">Bibliographic Search</a>
			 <li><a href="methodologyform.php">Methodology Search</a>
		  <li><a href="inputdataform.php">Submit data!</a>
	   </ul>
	</div>
	<p class="center">
		<h1>&nbsp;</h1>
		<h1>&nbsp;</h1>
		<h1 class="center">Methodology Search</h1>
	</p>
		<form action="methodologyprocess.php" method="POST" class="center">
			<b>Information about the article</b>
			<p>
			Credibility Rating of Article:
			<input type="Radio" name="credibility" value="1">1
			<input type="Radio" name="credibility" value="2">2
			<input type="Radio" name="credibility" value="3">3
			<input type="Radio" name="credibility" value="4">4
			<input type="Radio" name="credibility" value="5">5
			<p>
			Software Development Methodology:
				<select id="methodology" name="methodology">
					<option value="0">Select Methodology</option>
					<option value="1">Spiral</option>
					<option value="2">Scrum</option>
					<option value="3">Waterfall</option>
					<option value="4">Kanban</option>
					<option value="5">Extreme Programming</option>
					<option value="6">Test Driven Development</option>
				</select><p>
			<center><table><tr>
				Practice(s) being investigated:
				</tr>
				<tr>
				<td><input type="checkbox" id="ch1" name="practice[]" onClick="CountChecks('listone',2,this)" value="Test First Development">Test First Development</td>
				<td><input type="checkbox" id="ch2" name="practice[]" onClick="CountChecks('listone',2,this)" value="Automated Regression Testing">Automated Regression Testing</td>
				</tr>
				<tr>
				<td><input type="checkbox" id="ch3" name="practice[]" onClick="CountChecks('listone',2,this)" value="Version Control">Version Control</td>
				<td><input type="checkbox" id="ch4" name="practice[]" onClick="CountChecks('listone',2,this)" value="Automated Acceptance Testing">Automated Acceptance Testing</td>
				</tr>
				<tr>
				<td><input type="checkbox" id="ch5" name="practice[]" onClick="CountChecks('listone',2,this)" value="Shared Code">Shared Code</td>
				<td><input type="checkbox" id="ch6" name="practice[]" onClick="CountChecks('listone',2,this)" value="Automated Build">Automated Build</td>
				</tr>
				<tr>
				<td><input type="checkbox" id="ch7" name="practice[]" onClick="CountChecks('listone',2,this)" value="Continuous Integration">Continuous Integration</td>
				<td><input type="checkbox" id="ch8" name="practice[]" onClick="CountChecks('listone',2,this)" value="Rapid Prototyping">Rapid Prototyping</td>
				</tr></table></center>
		
			<p><b>******THE FOLLOWING FIELDS BELOW ARE OPTIONAL******</b><p>
		
			<b>The Pieces of Evidence</b>
			<br />
			The benefit or outcome being tested:<br />
			<textarea name="taTested" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
			<p>The context of the study:<br />
			<textarea name="taContext" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
			<p>The result of the study:<br />
			<textarea name="taResult" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
			<p>The integrity of the implementation of the practice/method:<br />
			<textarea name="taIntegrity" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
			<p>

			<b>Information about the research design</b><br />	
			<p>Nature of the Participants: 
			<select id="natureParticipants" name="natureParticipants">
				<option value="0">----------------------------</option>
				<option value="1">Small Group (<15 people)</option>
				<option value="2">Medium Group (<50 people)</option>
				<option value="3">Large Group (>50 people)</option>
			</select><br />
			<p>Research Method:
			<select id="researchMethod" name="researchMethod">
				<option value="0">----------------------------</option>
				<option value="1">Quantitatively Driven Approach</option>
				<option value="2">Qualitatively Driven Approach</option>
				<option value="3">Mixture of Quantitative & Qualitative</option>
			</select><br /><p>
			Research Question:<br />
			<textarea name="taResearchQuestion" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
			<p>
			Research Metrics:<br />
			<textarea name="taResearchMetrics" placeholder="50 Character Limit" maxLength="50" cols="55" rows="2"></textarea>
			<p>
			<input type="submit" value="Post">
			<input type="reset" value="Reset">
		</form>
</html>
