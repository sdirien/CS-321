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

  <h3>Order Online</h3>

  <form id="orderForm" action="confirmed.php" method="POST">
  <div id="name">
    <label for="name">Name: </label>
    <input type="name" id="name" required>
  </div>

  <br>

  <div id="email">
    <label for="email">Email: </label>
    <input type="email" id="email" required>
  </div>

  <br>

  <div id="phone">
    <label for="phone">Phone: </label>
    <input type="phone" id="phone" required>
  </div>

  <br>

  <div id="pickup">
    <label for="pickup">Pickup Date*: </label>
    <input type="textarea" id="pickup" required>
    <p>*We do not offer delivery at this time. To place a catering order, please contact us on our contact page.</p>
  </div>

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
  <div class="button"><input type="submit" name="submit" id="submit" value="Submit"></div>
  </form>
  <br>

  <!-- Scripts -->
  <script src="scripts/main.js"></script>
</body>
<footer>
  <?php include 'footer.php'?>
</footer>
</html>