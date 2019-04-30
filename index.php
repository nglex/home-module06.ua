<?php
unset($_POST['login']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>classes</title>
</head>
<body>
	<form action="page-1.php" method="POST">
	<table>
		<tr><td>login:</td><td><input type="text" name="login"></td></tr>
		<tr><td>password:</td><td><input type="password" name="password"></td></tr>
		<!-- <tr><td>lang:</td><td><input type="password" name="language"></td></tr> -->
		<tr><td><input type="submit" name="Enter"></td>
		<td><a href="homework05.php?logout=true">logout</a></td></tr>
	</form>
	
</body>
</html>