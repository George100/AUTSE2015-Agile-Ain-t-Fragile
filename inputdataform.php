<html>
	<head>
		<title>SERLER Data Entry</title>
    </head>
	
	<body>
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
			<br><input type="month" name="datePub">
			<p>
			Category:
			<br><input type="text" name="category">
			<p>
			<input type="submit" value="Post">
			<input type="reset" value="Reset">
		</form>
		<a href="bibliographicform.php">Bibliographic Search</a><br />
		<a href="methodologyform.php">Methodology Search</a><br />
		<a href="inputdataform.php">Submit data!</a><br />
		<a href="library.php">Library!</a><br />
		<a href="index.php">Home</a>
	</body>
</html>
