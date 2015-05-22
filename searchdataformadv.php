<html>
	<head>
		<title>SERLER Advanced Search</title>
	</head>
	
	<body>
		<center>
			<h1>Welcome to SERLER</h1>
			<h4>Feel free to view data in the repository.</h4>
			
			<form action="searchdataprocessadv.php" method="get">
				Fill in the fields to search:
				<p>
				Title: <input type="text" name="searchTitle" placeholder="Title name">
				<p>

				Author 1: <input type="text" name="authorOneFName" placeholder="First name">
				<input type="text" name="authorOneLName" placeholder="Last Name">
				<br>
					*Additional author is optional*
				<br>
				Author 2: <input type="text" name="authorTwoFName" placeholder="First name">
				<input type="text" name="authorTwoLName" placeholder="Last Name">
				<p>
				Date Published: <input type="month" name="searchYear" placeholder="Year Published">
				<p>
				Category: <input type="category" name="searchCategory" placeholder="Software Engineering">
				<p>
				<input type="submit" value="Search!">
			</form>
			<a href="index.php">Basic Search</a>
			<br>
			 - 
			<br>
			<a href="inputdataform.php">Click here to submit data! (registered users only)</a>
			<br>
			 - 
			<br><a href="library.php">Click here to view library</a>
			
		</center>
	</body>
</html>
