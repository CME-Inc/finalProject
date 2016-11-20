<?php 
     require 'dbconn.php'; 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $place = $_GET['place'];
     $category = $_GET['category'];
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>MESO</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/jquery.fullPage.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body class="bod trump">

  <img src="img\logo.png" alt="MESO-LOGO" class="logo"/>
  <div class="topBar">
    <div class="topMost">
    </div>
  </div>

  <div class="msgAfterInput center">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h4 class="msgFR">You have selected to display <i><?php echo $category; ?></i> in <i><?php echo $place; ?></i>!</h4>
          <a href="#!" class="ok btn btn-large btn-flat waves-effect waves-green">Alright!</a>
        </div>
      </div>
    </div>
  </div>

  <div class="toSpamArticles-Big hide-on-small-only">
  <?php
     $query_select = "SELECT * FROM `articles` WHERE place='$place' AND category='$category' ORDER BY `id` ASC";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$name =  $rws['name'];
	$adress = $rws['adress'];
	$tel = $rws['tel'];
	$website = $rws['website'];
	$email = $rws['email'];
	$description = $rws['description'];
	$id = $rws['id'];
      ?>
    <div class="doctor-wrapper" id="dw-<?php echo $id; ?>">
      <div class="element z-depth-5 hoverable">
        <div class="row" style="width: 100%; height: 100%;">
          <div class="col s2 pic-img">
            <img src="img\cardiogram.svg" alt="pic" class="tooltipped responsive-img" width="100px" height="100px" data-position="top" data-delay="50" data-tooltip="Doctor"/>
          </div>
          <div class="col s10 docName-wrapper">
            <h3 class="docName"><?php echo $name; ?></h3>
            <i class="material-icons medium close close<?php echo $id; ?>">clear_all</i>
          </div>
        </div>
      </div>
      <div class="doc-content" id="dc-<?php echo $id; ?>">
        <table class="striped bordered">
          <tbody>
            <tr>
              <td>Name</td>
              <td><?php echo $name; ?></td>
            </tr>
            <tr>
              <td>Telephone</td>
              <td><?php echo $tel; ?></td>
            </tr>
            <tr>
              <td>Adress</td>
              <td><?php echo $adress; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $email; ?></td>
            </tr>
            <tr>
              <td>Webiste</td>
              <td><?php echo $website; ?></td>
            </tr>
            <tr>
              <td>Description</td>
              <td><?php echo $description; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <br>
    
<?php } } ?>
  </div>
  
  <!--Fill the bottom-->


  <div class="toSpamArticles-Small hide-on-med-and-up">
    <div class="singleModule">
    <?php
     $query_select = "SELECT * FROM `articles` WHERE place='$place' AND category='$category' ORDER BY `id` ASC LIMIT 2";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$name =  $rws['name'];
	$adress = $rws['adress'];
	$tel = $rws['tel'];
	$website = $rws['website'];
	$email = $rws['email'];
	$description = $rws['description'];
	$id = $rws['id'];
      ?>
      <div class="module-wrapper" id="mw-<?php echo $id; ?>">
        <img id="m-<?php echo $id; ?>" src="img\dentist.svg" alt="pic" class="cirlce responsive-img module" width="100px" height="100px"/>
      </div>
      <div class="module-content" id="mc-<?php echo $id; ?>">
        <table class="striped bordered">
          <tbody>
            <tr>
              <td>Name</td>
              <td><?php echo $name; ?></td>
            </tr>
            <tr>
              <td>Telephone</td>
              <td><?php echo $tel; ?></td>
            </tr>
            <tr>
              <td>Adress</td>
              <td><?php echo $adress; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $email; ?></td>
            </tr>
            <tr>
              <td>Webiste</td>
              <td><?php echo $website; ?></td>
            </tr>
            <tr>
              <td>Description</td>
              <td><?php echo $description; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <br>
    <?php } } ?>
  </div>


  <div class="botBar">
    <div class="botMost">
    </div>
  </div><div class="footer">
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
                  <li><a class="pink-text " href="admin.php">Mesten</a></li>
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
  </div>

  <!--  Scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/jquery.fullPage.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
   <?php
     $query_selects = "SELECT * FROM `articles` WHERE place='$place' AND category='$category' ORDER BY `id` ASC";
     $rss2 = (mysqli_query($conn, $query_selects)) or die(mysqli_error($conn));
     	if(!$rss2){
     		echo mysqli_error();
		} else{
			while($rwss = mysqli_fetch_assoc($rss2)){
	$id = $rwss['id'];
      ?>
  <script type="text/javascript">
 
    $('.close<?php echo $id; ?>').on("click", function(){
      if($('#dw-<?php echo $id; ?>').hasClass('animStart')){
        $('#dw-<?php echo $id; ?>').removeClass('animStart');
        $('#dw-<?php echo $id; ?>').addClass('animEnd');
        $('#dc-<?php echo $id; ?>').removeClass('unwrap');
        $('#dc-<?php echo $id; ?>').addClass('wrap');
      }else {
        $('#dw-<?php echo $id; ?>').removeClass('animEnd');
        $('#dw-<?php echo $id; ?>').addClass('animStart');
        $('#dc-<?php echo $id; ?>').removeClass('wrap');
        $('#dc-<?php echo $id; ?>').addClass('unwrap');
      }
    });
    $('#m-<?php echo $id; ?>').on("click",function(){
      if($('#m-<?php echo $id; ?>').hasClass('animStartS')){
        $('#mw-<?php echo $id; ?>').css("background", "none");
        $('#mc-<?php echo $id; ?>').removeClass('unwrapS');
        $('#m-<?php echo $id; ?>').removeClass('animStartS');
        $('#m-<?php echo $id; ?>').addClass('animEndS');
      }else {
        $('#mw-<?php echo $id; ?>').css("background", "#5a9bd5");
        $('#m-<?php echo $id; ?>').removeClass('animEndS');
        $('#m-<?php echo $id; ?>').addClass('animStartS');
        $('#mc-<?php echo $id; ?>').addClass('unwrapS');
      }
    });
    

  </script>
  <?php } } ?>
  </body>
</html>