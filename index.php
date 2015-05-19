<html>
	<head>
		<title>SERLER</title>
	</head>
	
	<body>
		<center>
			<h1>Welcome to SERLER</h1>
			<h4>Feel free to view data in the repository.</h4>
			
			<form action="searchdataprocess.php" method="get">
				Fill in the fields to search:
				<p>
				Title: <input type="text" name="searchTitle" placeholder="Title name">
				<p>
				Author: <input type="text" name="author" placeholder="Author name">
				<p>
				Date Published: <input type="month" name="searchYear" placeholder="Year Published">
				<p>
				Category: <input type="category" name="searchCategory" placeholder="Software Engineering">
				<p>
				<input type="submit" value="Search!">
			</form>
			
			<br><a href="inputdataform.php">Click here to submit data! (Admins only)<a/>
			
		</center>
	</body>
</html>
