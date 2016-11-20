<?php
include "dbconn.php"; 
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
<body>

<!--Fullpage-->
  <div id="fullpage">

    <!--Top Section/Navbar-->
    <img src="img\logo.png" alt="MESO-LOGO" class="logo"/>
    <div class="topBar">
      <div class="topMost">
      </div>
    </div>
    <!--End Top Section-->

    <!--Form goes here-->
    <form method="post" action="index.php">

      <!--Main part of body-->
      <div class="section" id="main">

        <!--First Slide - City choice-->
        <div class="slide" id="city">
          <img src="img\number-one-in-a-circle.svg" alt="1" class="firstStep"/>
          <center><h3 style="color: #fff">CHOOSE A CITY</h3></center>
          <div class="form-wrapper" class="row">
            <div class="input-field">
              <input list="cities" name="cities" id="cityIn">
              <datalist id="cities">
              <?php $query_Events = "SELECT * FROM places ORDER BY `id` ASC";
        $rs = (mysqli_query($conn, $query_Events)) or die(mysqli_error($conn));
            if(!$rs){
               echo mysqli_error();
} else{
    while($row = mysqli_fetch_assoc($rs)){
        $name =  $row['name']; ?>
                <option value="<?php echo $name; ?>">
                <?php } } ?>
              </datalist>
              <center><a href="#" class="z-depth-3 hoverable nextSlide waves-effect waves-green">NEXT</a><center>
            </div>
          </div>
        </div>
        <!--End Slide 1-->

        <!--Second Slide - Category choice-->
        <div class="slide" id="category">
          <img src="img\number-two-in-a-circle.svg" alt="2" class="firstStep"/>
          <center><h3 style="color: #fff">CHOOSE A CATEGORY</h3></center>
          <div class="form-wrapper" class="row">
            <div class="input-field">
              <input name="categories" list="categories" id="catIn">
              <datalist id="categories">
              <?php $query_Eventss = "SELECT * FROM categories ORDER BY `id` ASC";
        $rss = (mysqli_query($conn, $query_Eventss)) or die(mysqli_error($conn));
            if(!$rss){
               echo mysqli_error();
} else{
    while($rows = mysqli_fetch_assoc($rss)){
        $cat =  $rows['category']; ?>
                <option value="<?php echo $cat; ?>">
                <?php } } ?>
              </datalist>
              <center><input type="submit" name="submit" value="SUBMIT" class="z-depth-3 hoverable submit waves-effect waves-green"><center>
              <?php 
              	if(isset($_POST['submit'])){
              	$plc = $_POST['cities'];
              	$ctg = $_POST['categories'];
              		header("Location: content.php?place=$plc&category=$ctg");
              	}
              ?>
            </div>
          </div>
        </div>
        <!--End Slide 2-->

      </div>
      <!--End Main Part-->
    </form>
    <!--End of Form-->
  </div>
  <!--End Fullpage-->
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/jquery.fullPage.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
