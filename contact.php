<?php 
include "dbconn.php"; 
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
		<li class="active" ><a href="index.php">HOME</a></li>
      </ul>
      <ul class="side-nav mininav" id="mobile-demo">
		<li style="transform: skewX(0deg); color: seagreen;" class="active"><a style="transform: skewX(0deg); color: seagreen;" href="index.php">Logout</a></li>
      </ul>
    </div>
  </nav>
</div>     
    <div class="container add">
        <div class="row">
        
            <br /><br />
            <div class="col s12 allPlaces" >
                <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">Write a message</h4>
            <hr />
            </div>
            <br /><br />
        <form method="post" action="contact.php" style="margin-top: 5%;">
        <br />
            <input style="color: white; width: 100%;" type="text" placeholder="Enter your name" name="author" required>
            <input style="color: white; width: 100%;" type="email" placeholder="Enter your email" name="email" required>
            
            <input style="color: white; width: 100%;" type="text" placeholder="Enter title" name="title" required>
            <textarea style="color: white; width: 100%;" type="textarea" id="textarea1" class="materialize-textarea" name="content" rows="15" placeholder="Enter your content" required></textarea>
              <div class="center">
                        <input style="margin-top: 2%;" type="submit" name="newmessage" value="Send the message"></div>
                        </form>
                        <?php
if(isset($_POST['newmessage'])){
$author = $_POST['author'];
$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];
$sql = "INSERT INTO messages (author, email, title, content) VALUES ('$author','$email','$title','$content')";

if (mysqli_query($conn, $sql)) {
    echo "Successfully added place!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}
?>
      <hr />
      </div>
        </div></div>
    <hr /><br />
    </div>
                    <footer class="page-footer1">
          <div class="container footer-info1">
            <div class="row">
              <div class="col l6 s12">
                <h5 style="color: #FF4F4F;">Mesten - всичко, навсякъде</h5>
                <p class=" " style="color: #FF4F4F;">Mesten – първата българска онлайн платформа, помагаща на хората, които посещават нов град и искат да се почувстват като месни жители. Платформата Ви дава възможност да откриете всички важни институции, намиращи се в съответния град в България.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="pink-text">Полезни линкове</h5>
                <ul>
                  <li><a class="pink-text " href="index.php">Mesten</a></li>
                  <li><a class="pink-text modal-trigger" href="#modal1">F.A.Q</a></li>
                  <li><a class="pink-text " href="about.html">About us</a></li>
                  <li><a class="pink-text " href="contact.php">Contact us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright footer-info2">
            <div class="container" style="color: white;">
                © 2016 <a style="color: white;" href="http://www.gimdesign.eu">CME</a>- Всички права са запазени
            <a class=" right hide-on-small-only" style="color: white;" href="#main">Начало</a>
            </div>
          </div>
        </footer>
        <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Общи условия за ползване:</h4>
      <p>Потребителят трябва да въведе града, който посещава и след това да въведе допълнително уточнение за това, от което се интересува. След това той бива препратен към нова страница, в която получава списък с интересуващата го информация. Всяка част от този списък води до индивидуално view, което запознава потребителя с местоположението, имейлът, работното време на интересуващата го институция.</p>
      <h4>Какво предлага Mesten?<h4>
      <h4>В платформата ще откриете:</h4>
      <ol>
      <li>Списък с големите български градове.</li>
      <li>Интерактивно представена информация свързана с институциите, намиращи се в тях.</li>
      <li>Раутинг система, която ви позволява да откриете пътя до институцията.</li>
      </ol>
      <p>За допълнителни въпроси: тел. 0892238257 (СЕО); 0882939737 (СЕО) email: mesten@abv.bg</p>
      <h7>*Mesten - Запазва правото си да променя общите правила на онлайн платформата!</h7>
    </div>
    <div class="modal-footer">
      <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat ">СЪГЛАСЕН СЪМ</a>
    </div>
  </div>
    </body>
</html>