<!DOCTYPE html>
<html lang="en">
<head>
  
  <!--  Meta  -->
  <meta charset="UTF-8" />
  <title>RainyDayBakes</title>
  
  <?php include 'header.php'?>
  
  <!--  Styles  -->
  <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>

<?php
  $validation_error = "";
  $user_url = "";
  $form_message = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
	  $user_url = $_POST["email"];
	  if (!filter_var($user_url, FILTER_VALIDATE_EMAIL)) {
      $validation_error = "* This is an invalid URL.";
      $form_message = "Please retry and submit your form again.";
    } else {
      $form_message = "Thank you for your submission.";
    }  
  }  

?>

  <h3>Order Online</h3>

  <form id="orderForm" action="" method="POST">
  <div id="name">
    <label for="name">Name: </label>
    <input type="name" id="name" required>
    <span class="error"><?= $validation_error;?></span>
  </div>

  <br>

  <div id="email">
    <label for="email">Email: </label>
    <input type="email" id="email" required>
    <span class="error"><?= $validation_error;?></span>
  </div>

  <br>

  <div id="item">
    <label for="checkbox" id="checkbox" name="checkbox">What are you ordering?: </label><br>
    <input type="checkbox" name="type1" value="Cookie1">Cookie Box, Dozen<br>
    <input type="checkbox" name="type2" value="Cookie2">Cookie Box, Half-Dozen<br>
    <input type="checkbox" name="type3" value="Cookie3">Cookie Box, Two Dozen<br>
    <input type="checkbox" name="type4" value="Cake1">Cake, Small (6")<br>
    <input type="checkbox" name="type5" value="Cake2">Cake, Medium (8")<br>
    <input type="checkbox" name="type6" value="Cake3">Cake, Large (10")<br>
    <input type="checkbox" name="type7" value="Cupcake1">Cupcake Box, Dozen<br>
    <input type="checkbox" name="type8" value="Cupcake2">Cupcake Box, Half-Dozen<br>
    <input type="checkbox" name="type9" value="Cupcake3">Cupcake Box, Two Dozen<br>
  </div>

  <br>
  <div class="button"><input type="button" name="submit" id="submit" value="Submit"></div>
  </form>

  <p> <?= $form_message;?> </p> 
  <!-- Scripts -->
  <script src="scripts/main.js"></script>
</body>
</html>