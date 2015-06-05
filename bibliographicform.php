<html>
	<head>
		<title>SERLER Bibliographic Search</title>
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
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p class="center">
	<h1 class="center">&nbsp;</h1>
	<h1 class="center">Bibliographic Search</h1>
	</p>
	<h4 >&nbsp;</h4>
	<form action="searchdataprocessadv.php" method="get" class="center">
	<p style="font-size: 18px">Fill in the fields to search:	  </p>
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
	</body>
</html>
