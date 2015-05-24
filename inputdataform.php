<html>
	<head>
		<title>SERLER Data Entry</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    </head>
	<img src="Images/logo.png" width="322" height="152" alt=""/>
    <img src="Images/aaflogo.png" width="322" height="152" alt="" align="right"/> 
    <p>&nbsp;</p>
    <center>
		
		<script language="javascript">
			var i = 0;
			function changeIt()
			{
				if (i != 3) {
					my_div.innerHTML = my_div.innerHTML +
					"First Name: <input type='text' name='afname[]'> Last Name: <input type='text' name='alname[]'><p>" 
					i++;
				}
			}
		</script>
	</head>
	
	<body>
	<center>
	  <div class="jumbotron">
      <div class="container">
		  <h1>Data Entry Form</h1>
        </div>
      </div>
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
			<p><a href="index.php" class="btn">Basic Search</a>
			 - 
			   <a href="searchdataformadv.php" class="btn">Advanced Search</a>		  </p>
			<p><br>
			 - 
			<br>
			<a href="library.php" class="btn">Click here to view Library</a>		  </p>
			<p><br>
			 - 
		  <br>
		  <a href="index.php" class="btn">Click here to return to Home Page</a></p>
	  </center>
	</body>
</html>
