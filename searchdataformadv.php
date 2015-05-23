<html>
	<head>
		<title>SERLER Advanced Search</title>
	 <link href="style.css" rel="stylesheet" type="text/css">
    </head>
	<img src="Images/logo.png" width="322" height="152" alt=""/>
    <img src="Images/aaflogo.png" width="322" height="152" alt="" align="right"/> 
    <p>&nbsp;</p>
	
	<body>
		<center>
        <div class="jumbotron">
      <div class="container">
			 <h1>Welcome to SERLER</h1>
          </div>
          </div>
          <p>&nbsp;</p>

<div class="jumbotron">
    <div class="container">
	  <h4>Feel free to view data in the repository.</h4>
    </div>
</div>

			
		  <form action="searchdataprocessadv.php" method="get">
				Fill in the fields to search:
				<p>
				Title: <input type="text" name="searchTitle" placeholder="Title name">
				<p>

				Author: <input type="text" name="authorOneFName" placeholder="First name">
				<input type="text" name="authorOneLName" placeholder="Last Name">
				<p>
				Date Published: <input type="month" name="searchYear" placeholder="Year Published">
				<p>
				Category: <input type="category" name="searchCategory" placeholder="Software Engineering">
				<p>
				<input type="submit" value="Search!">
			</form>
			<a href="index.php" class="btn">Basic Search</a>
			<br>
			 - 
			<br>
			<a href="inputdataform.php" class="btn">Click here to submit data! (registered users only)</a>
			<br>
			 - 
			<br><a href="library.php" class="btn">Click here to view library</a>
			
    </center>
	</body>
</html>
