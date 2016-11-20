<?php
require 'dbconn.php'; 
?>
<html>
<head><title>Admin Panel</title>
<link rel="icon" href="img/logonav.png">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/jquery.js" type="text/javascript" ></script>
	<link href="css/materialize.css" rel="stylesheet" />
    <link href="tipuesearch/tipuesearch.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link href="css/adminstyle.css" rel="stylesheet" />
	<link href="css/animate.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/materialize.js" type="text/javascript" ></script>
    <script src="js/scroll.js" type="text/javascript" ></script>
	<script src="js/javascript.js" type="text/javascript" ></script>
</head>
<body>
    <div class="container-fluid allInside">
        <hr />
<div class="container-fluid topPart">
<div class="col s10 center">
<div class="bordered">
    <h3 style="color:white; text-shadow: 1px 1px 1px black; padding: 10px;">Admin Panel</h3>
    </div></div></div>
    <div class="container-fluid bottomPart">
	<form style="color: white; text-align: center;" action="login.php" method="post">
		<input style="color: ff4f4f; width: 80%;" type="text" name="username" placeholder="Enter admin-username" required>
        <br />
		<input style="color: ff4f4f; width: 80%;" type="password" name="password" placeholder="Enter admin-password" required>
        <br />
        <div class="submitBg">
            <input type="submit" value="Login" name="submit"></div>
	</form><hr />
        </div></div>
</body>
</html>