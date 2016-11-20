<?php 
     session_start(); 
     require 'dbconn.php'; 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $id = $_GET['id'];
 ?> 
<?php
     $query_select = "SELECT * FROM `articles` WHERE id = '$id' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$name =  $rws['name'];
      ?>
        		<html>
    <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
	<title>CONTROL PANEL</title>
	<link rel="icon" href="img/logonav.png">

    <script src="js/jquery.js" type="text/javascript" ></script>
	<link href="css/materialize.css" rel="stylesheet" />
    <link href="tipuesearch/tipuesearch.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link href="css/controlstyle.css" rel="stylesheet" />
	<link href="css/animate.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/materialize.js" type="text/javascript" ></script>
    <script src="js/scroll.js" type="text/javascript" ></script>
	<script src="js/javascript.js" type="text/javascript" ></script>
<style>

.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/Preloader_2.gif') center no-repeat #fff;
}
</style>
    </head>
        <script>

	$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
	<div class="se-pre-con"></div>
	<div class="all">
    <body>
<div class="admincol">
<div class="navbar-fixed" id="main">
<nav class="nav1">
    <div class=" nav1">
            <img class="brandImg1 hide-on-med-and-down" src="img/logopink.png" />
      <a href="index.html" style="margin-left: 3%; font-size: 45px; font-family: Century Gothic;" class="brand-logo hide-on-med-and-down fname"></a>
	  <a href="index.html" style="color: #FF4F4F;" class="brand-logo hide-on-large-only fname2">Mesten</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i style="color: #FF4F4F;" class="material-icons menuicon2">menu</i></a>
      <ul style="margin-right: 5%;" class="right hide-on-med-and-down">
        <li><a href="admincontrol.php">Places</a></li>
        <li><a href="controller.php">Control</a></li>
        <li><a href="mailbox.php">Mailbox</a></li>
		<li class="active" ><a href="logout.php?logout-from-admin-panel">Logout</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="admincontrol.php">Places</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;" href="controller.php">Control</a></li>
        <li style="transform: skewX(0deg);"><a style="transform: skewX(0deg); color: seagreen;"href="mailbox.php">Mailbox</a></li>
		<li style="transform: skewX(0deg); color: seagreen;" class="active"><a style="transform: skewX(0deg); color: seagreen;" href="logout.php?logout-from-admin-panel">Logout</a></li>
      </ul>
    </div>
  </nav>
</div>     
    <div class="container add">
        <div class="row">
            <div class="col s12 center bottomShadow">
            <br />
            <hr />
               	<h3 class="hide-on-med-and-down" style="color: white;">ПОТВЪРДЕТЕ ПРЕМАХВАНЕТО НА <br /> "<?php echo $name; ?>"</h3><br />
               	<h5 class="hide-on-large-only" style="color: white;">ПОТВЪРДЕТЕ ПРЕМАХВАНЕТО НА <br /> "<?php echo $name; ?>"</h5><hr /><br />
               	<form method="post" action="deletearticle.php?id=<?php echo $id; ?>">
               		<input style="width: 80%; height: 50px; border: 3px solid white; font-size: 20px; color: white;" type="submit" value="ПОТВЪРЖДАВАМ" name="delete">
               	</form>
               	<a href="controller.php"><input style="width: 20%; height: 35px; border: 3px solid white; font-size: 15px; color: white;" type="submit" value="Back" ></a>
               			<br /><br /><hr /><br />
               			<br />
               		<?php
               			if(isset($_POST['delete'])){
               				$sqll = "DELETE FROM articles WHERE id = '$id' ";

if ($conn->query($sqll) === TRUE) {
    header("Location: controller.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
               		?>
               </div>
        </div>
    </div>
                    <footer class="page-footer1">
                    <div class="footer-copyright footer-info2">
            <div class="container">
                © 2016 <a style="color: white;" href="http://www.gimdesign.eu">CME</a>- Всички права са запазени
            <a class="grey-text text-lighten-4 right" href="#main">Начало</a>
            </div>
          </div>
        </footer>
    </body>
    </div>
</html>	
        	<?php
}
			}
				
		} 

?>