<?php 
session_start();
if(isset($_SESSION['username'])) {
include "dbconn.php";$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $id = $_GET['id'];
 ?> 
<?php
     $query_select = "SELECT * FROM `messages` WHERE id = '$id' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$author =  $rws['author'];
	$title =  $rws['title'];
	$content =  $rws['content'];
	$email = $rws['email'];
	$time =  $rws['time'];
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
        
            
            <div class="col s12 allPlaces">
                <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;"><?php echo $title; ?></h4>
            <hr />
            </div>
                <table class="">
        <thead>
        
        
          <tr>
              <th data-field="id">Author</th>
          </tr>
          
        </thead>
        <tbody>
          <tr>
            <td style="color: white;"><?php echo $author; ?></td>
          </tr>
        </tbody>
      </table>
      <table class="">
        <thead>
        
        
          <tr>
              <th data-field="id">Content</th>
          </tr>
          
        </thead>
        <tbody>
          <tr>
            <td style="color: white;"><?php echo $content; ?></td>
          </tr>
        </tbody>
      </table>
      <table class="">
        <thead>
        
        
          <tr>
              <th data-field="id">Recieved at</th>
          </tr>
          
        </thead>
        <tbody>
          <tr>
            <td style="color: white;"><?php echo $time; ?></td>
          </tr>
        </tbody>
      </table>
      <br />
      <div class="center col s6" style="background-color: white;">
                    <hr />
                        <a class="modal-trigger" href="#modal11"><input style="background-color: #FF4F4F;" type="submit" name="submit" value="Write back"></a>
                        </div>
                        <div class="center col s6" style="background-color: white;">
                    <hr />        
                        <a href="deletemessage.php?id=<?php echo $id; ?>"><input style="background-color: #FF4F4F;" type="submit" name="submit" value="Remove message"></a>
                        </div>
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
  <!-- Modal Structure -->
  <div id="modal11" class="modal" style="background-color: #FF4F4F;">
    <div class="modal-content">
      <h4 style="color: white; text-shadow: 1px 1px 1px black;">Write back to: <?php echo $email; ?></h4>
      <form method="post" action="readmessage.php?id=<?php echo $id; ?>">
      <input type="text" style="color: white;" name="titleanswer" placeholder="Enter title" required>
      <textarea style="color: white;" type="textarea" id="textarea1" class="materialize-textarea" name="contentanswer" rows="15" placeholder="Enter content" required></textarea> 
      <div class="col s12 center">
      <input type="submit" name="answer" value="Send">
      </div>
      </form>
      <?php
      if(isset($_POST['answer'])){
$subject = $_POST['titleanswer'];
$txt = $_POST['contentanswer'];
$headers = "From: mesten@abv.bg" . "\r\n" .
"CC: mesten@abv.bg";

mail($email,$subject,$txt,$headers);
}
?>
    </div>
  </div>
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
<?php
} }
} else{
echo "Please login!"; 
?>
<?php } ?>