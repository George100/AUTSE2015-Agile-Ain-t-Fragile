<html>
	<head>
		<title>Status Posting System</title>
	</head>
	
	<body>
		<center><h1>Data Entry Form</h1>
			<form action="inputdataprocess.php" method="post">

				Title: 
				<input type="text" name="title" placeholder="Mary had a little lamb"></label>
				<p>
				Author: 
				<br>First Name: <input type="text" name="fname" placeholder="John">
				<br>Last Name: <input type="text" name="lname" placeholder="Smith">
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
			<a href="searchdataform.php">Click here to search SERLER</a>
			<br>
			<a href="index.php">Click here to return to Home Page</a>
		</center>
	</body>
</html>
