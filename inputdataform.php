<html>
	<head>
		<title>SERLER Data Entry</title>
		
		<script language="javascript">
			var i = 1;
			function changeIt()
			{
				if (i != 4) {
					my_div.innerHTML = my_div.innerHTML +
					"First Name: <input type='text' name='mytext'+ i> Last Name: <input type='text' name='mytext'+ i><p>"
					i++;
				}
			}
		</script>
	</head>
	
	<body>
		<center><h1>Data Entry Form</h1>
			<form action="inputdataprocess.php" method="post">
				Title: 
				<input type="text" name="title" placeholder="Mary had a little lamb"></label>
				<p>
				Author: 
				<br>First Name: <input type="text" name="fname" placeholder="John">
				Last Name: <input type="text" name="lname" placeholder="Smith">
				<input type="button" value="Add Author" onClick="changeIt()">
				<div id="my_div"></div>
				<p>
				Date Published:
				<br><input type="month" name="datePub">
				<p>
				Category:
				<br><input type="text" name="category">
				<p>
				<input type="submit" value="Post">
				<input type="reset" value="Reset">
			</form>
			<a href="index.php">Basic Search</a>
			 - 
			<a href="searchdataformadv.php">Advanced Search</a>
			<br>
			 - 
			<br>
			<a href="library.php">Click here to view Library</a>
			<br>
			 - 
			<br>
			<a href="index.php">Click here to return to Home Page</a>
		</center>
	</body>
</html>
