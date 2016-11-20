<?php 
session_start();
if(isset($_SESSION['username'])) {
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
        <div class="container-fluid" width="200%;">
            <div class="col s12" style="margin-top: 5%; background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">Add new category</h4>
            <hr />
            </div>
            </div>
            <div class="col s12">
                <br class="hide-on-med-and-down" />
                <div class="col s12 inputs">
                <form enctype="multipart/form-data" class="col s12" action="controller.php" method="post">
                    <input style="color: white;" type="text" name="category" placeholder="Enter name" required >
                    <div class="center">
                    <hr />
                        <input style="margin-top: 2%;" type="submit" name="submit" value="Add"></div>
                </form>
                    <?php
if(isset($_POST['submit'])){
$category = $_POST['category'];
$sql = "INSERT INTO categories (category) VALUES ('$category')";

if (mysqli_query($conn, $sql)) {
    echo "Successfully added place!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}
?>
                    </div>
            </div>
            <div class="container-fluid" width="200%;">
            <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">Add new article</h4>
            <hr />
            </div>
            </div>
            <div class="col s12">
            <br />
      <form enctype="multipart/form-data" class="col s12" action="controller.php" method="post">
      
                    <input style="color: white;" type="text" name="username" placeholder="Article name" required >
                        <input style="color: white;" type="text" name="shortname" placeholder="Article shortname" required><br />
                               <input name="categories" list="categories" placeholder="Enter category" style="color: white;" required>   
                        <datalist name="categories" id="categories">
    
    <?php $query_Events2 = "SELECT * FROM categories ORDER BY `id` ASC";
        $rs2 = (mysqli_query($conn, $query_Events2)) or die(mysqli_error($conn));
            if(!$rs2){
               echo mysqli_error();
} else{
    while($rows = mysqli_fetch_assoc($rs2)){
        $catname =  $rows['category'];
        ?>
      <option value="<?php echo $catname; ?>">
      <?php } } ?>
    </datalist>
    
    <input list="places" name="places" placeholder="Enter place" style="color: white;" required> 
    <datalist name="places" id="places">
    
    <?php $query_Events22 = "SELECT * FROM places ORDER BY `id` ASC";
        $rs22 = (mysqli_query($conn, $query_Events22)) or die(mysqli_error($conn));
            if(!$rs22){
               echo mysqli_error();
} else{
    while($rowws = mysqli_fetch_assoc($rs22)){
        $placename =  $rowws['name'];
        ?>
      <option value="<?php echo $placename; ?>">
      <?php } } ?>
    </datalist>
                        <input style="color: white;" type="text" name="adress" placeholder="Adress" required>
                        
                        <input style="color: white;" type="text" name="tel" placeholder="Telephone number" required>
                    <input style="color: white;" type="email" name="email" placeholder="Email adress" required>
                        <input style="color: white;" type="text" name="website" placeholder="Website" required>
                        <textarea style="color: white;" type="textarea" id="textarea1" class="materialize-textarea" name="description" rows="15" placeholder="Enter description" required></textarea> 
                    <div class="center">
                        <input style="margin-top: 2%;" type="submit" name="newarticle" value="Add"></div>
                        <hr />
                        <?php
if(isset($_POST['newarticle'])){
$name = $_POST['username'];
$shortname = $_POST['shortname'];
$place = $_POST['places'];
$tel = $_POST['tel'];
$website = $_POST['website'];
$address = $_POST['adress'];
$category = $_POST['categories'];
$email = $_POST['email'];
$description = $_POST['description'];

            $prepAddr = str_replace(' ','+',$address);

            $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');

            $output= json_decode($geocode);

             $lat = $output->results[0]->geometry->location->lat;
             $long = $output->results[0]->geometry->location->lng;

$sql = "INSERT INTO articles (name, shortname, category, place, adress, tel, email, website, description, lat, lng) VALUES ('$name','$shortname','$category','$place','$address','$tel','$email','$website','$description','$lat','$long')";

if (mysqli_query($conn, $sql)) {
    echo "Successfully added place!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
}
?>
                        
                </form>
            </div>
            
            <div class="col s6 hide-on-med-and-down allPlaces">
                <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">All categories</h4>
            <hr />
            </div>
                <table class="centered">
        <thead>
        
        
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Category Name</th>
              <th data-field="price">Remove</th>
          </tr>
          
        </thead>
        <tbody>
        
        <?php $query_Events = "SELECT * FROM categories ORDER BY `id` ASC";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $cat =  $row['category'];   
        $id = $row['id']; ?>
          <tr>
            <td style="color: white;"><?php echo $id; ?></td>
            <td style="color: white;"><?php echo $cat; ?></td>
              <td><a href="deletecategory.php?id=<?php echo $id; ?>"><input type="submit" style="font-size: 10px;" name="removeplace" value="X" class="red"></a></td>
              
          </tr>
          <?php } } ?>
        </tbody>
      </table>
      <br />
      <hr />
      </div>
      
      <div class="col s6 hide-on-med-and-down allPlaces">
                <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">All articles</h4>
            <hr />
            </div>
                <table class="centered">
        <thead>
        
        
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Article Name</th>
              <th data-field="price">Remove</th>
          </tr>
          
        </thead>
        <tbody>
        
        <?php $query_Eventts = "SELECT * FROM articles ORDER BY `id` ASC";
        $rrs = (mysqli_query($conn, $query_Eventts)) or die(mysqli_error($conn));
            if(!$rrs){
               echo mysqli_error();
} else{
    while($roow = mysqli_fetch_assoc($rrs)){
        $artname =  $roow['name'];   
        $id = $roow['id']; ?>
          <tr>
            <td style="color: white;"><?php echo $id; ?></td>
            <td style="color: white;"><?php echo $artname; ?></td>
              <td><a href="deletearticle.php?id=<?php echo $id; ?>"><input type="submit" style="font-size: 10px;" name="removeplace" value="X" class="red"></a></td>
              
          </tr>
          <?php } } ?>
        </tbody>
      </table>
      <br />
      <hr />
      </div>
      <div class="col s12 hide-on-large-only allPlaces">
                <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">All categories</h4>
            <hr />
            </div>
                <table class="centered">
        <thead>
        
        
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Category Name</th>
              <th data-field="price">Remove</th>
          </tr>
          
        </thead>
        <tbody>
        
        <?php $query_Events = "SELECT * FROM categories ORDER BY `id` ASC";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $cat =  $row['category'];   
        $id = $row['id']; ?>
          <tr>
            <td style="color: white;"><?php echo $id; ?></td>
            <td style="color: white;"><?php echo $cat; ?></td>
              <td><a href="deletecategory.php?id=<?php echo $id; ?>"><input type="submit" style="font-size: 10px;" name="removeplace" value="X" class="red"></a></td>
              
          </tr>
          <?php } } ?>
        </tbody>
      </table>
      <br />
      <hr />
      </div>
      
      <div class="col s12 hide-on-large-only allPlaces">
                <div class="col s12" style="background-color: white;">
            <hr />
            <h4 class="center" style="color: #ff4f4f;">All articles</h4>
            <hr />
            </div>
                <table class="centered">
        <thead>
        
        
          <tr>
              <th data-field="id">ID</th>
              <th data-field="name">Article Name</th>
              <th data-field="price">Remove</th>
          </tr>
          
        </thead>
        <tbody>
        
        <?php $query_Eventts = "SELECT * FROM articles ORDER BY `id` ASC";
        $rrs = (mysqli_query($conn, $query_Eventts)) or die(mysqli_error($conn));
            if(!$rrs){
               echo mysqli_error();
} else{
    while($roow = mysqli_fetch_assoc($rrs)){
        $artname =  $roow['name'];   
        $id = $roow['id']; ?>
          <tr>
            <td style="color: white;"><?php echo $id; ?></td>
            <td style="color: white;"><?php echo $artname; ?></td>
              <td><a href="deletearticle.php?id=<?php echo $id; ?>"><input type="submit" style="font-size: 10px;" name="removeplace" value="X" class="red"></a></td>
              
          </tr>
          <?php } } ?>
        </tbody>
      </table>
      <br />
      <hr />
      </div>
            </div>
        </div>
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
<?php
} else{
echo "Please login!"; 
?>
<?php } ?>