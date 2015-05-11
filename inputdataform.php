<html>
	<head>
		<title>Status Posting System</title>
	</head>
	
	<body>
		<center><h1>Data Entry Form</h1>
			<form action="inputdataprocess.php" method="post">

				<label>Title: 
				<input type="text" name="title" placeholder="Mary had a little lamb"></label>
				
				<br><br>
				
				Author: 
				<br><label>First Name: <input type="text" name="fname" placeholder="John"></label>
				<br><label>Last Name: <input type="text" name="lname" placeholder="Smith"></label>
				
				<br><br>

				<input type="submit" value="Post">
				<input type="reset" value="Reset">
			</form>
			<a href="searchdataform.php">Click here to search SERLER</a>
			<br>
			<a href="index.php">Click here to return to Home Page</a>
		</center>
	</body>
</html>
