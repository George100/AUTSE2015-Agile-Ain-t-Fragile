<html>
	<head>
		<title>SERLER Bibliographic Search</title>
    </head>
	
	<body>

	<h1>Welcome to SERLER</h1>
	<h4>Feel free to view data in the repository.</h4>
	
	<form action="bibliographicprocess.php" method="get">
		Fill in the fields to search:
		<p>
		Title: <input type="text" name="searchTitle" placeholder="Title name" size="30">
		<p>
		Author: <input type="text" name="authorOneFName" placeholder="First name" size="10">
		<input type="text" name="authorOneLName" placeholder="Last Name" size="10">
		<p>
		Date Published: <input type="month" name="searchYear" placeholder="Year Published">
		<p>
		Category: <input type="category" name="searchCategory" placeholder="Software Engineering">
		<p>
		<input type="submit" value="Search!">
		<input type="reset" value="Reset">
	</form>
	<a href="bibliographicform.php">Bibliographic Search</a><br />
	<a href="methodologyform.php">Methodology Search</a><br />
	<a href="inputdataform.php">Submit data!</a><br />
	<a href="library.php">Library!</a><br />
	<a href="index.php">Home</a>
	</body>
</html>
