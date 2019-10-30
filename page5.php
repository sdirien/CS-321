<!DOCTYPE html>
<html lang="en">
<head>
  
  <!--  Meta  -->
  <meta charset="UTF-8" />
  <title>RainyDayBakes</title>
  
  <!--  Styles  -->
  <link rel="stylesheet" type="text/css" href="style.css"/>

  <?php include 'header.php'?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="scripts/form.js"></script>
</head>


<?php

  $user_name = "";
  $submission_response = "";

  if ( filter_has_var( INPUT_POST, 'submit' ) ) {
    $user_name = trim($_POST["name"]);
    #$user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
    #$submission_response = $_POST[$user_name];
    echo $user_name;
  }
?>


<body>

<div name="connectPage">
  <h3>Connect With Us!</h3>
  <p>Got questions? We got answers. Leave your name, email and phone number below
    and we'll get back to you ASAP. Or, feel free to call us at 123-456-7890 during
  our regular business hours.</p>
</div>

  <form action="" method="POST" >
    <div class="contactForm">
      <label for="name">Name*: </label>
      <div id="errorname" class="error"></div>
      <input type="text" name="name" id="name" minlength="2" required>
    </div>

    <div class="contactForm">
      <label for="phone">Phone: </label>
      <div id="errorphone" class="error"></div>
      <input type="phone" name="phone" id="phone" placeholder="000-000-0000" required>
    </div>

    <div class="contactForm">
      <label for="email">Email*: </label>
      <div id="erroremail" class="error"></div>
      <input type="email" name="email" id="email" placeholder="janedoe@email.com" required>
    </div>

    <br>

    <div class="contactForm">
      <label for="checkbox" id="checkbox" name="checkbox">Contactee Type: </label><br>
      <div id="errorcheck" class="error"></div>
      <input type="checkbox" id="check1" name="type1" value="1">Individual<br>
      <input type="checkbox" id= "check2" name="type2" value="2">Business:Catering<br>
      <input type="checkbox" id="check3" name="type3" value="3">Business:Partner<br>
    </div>


    <p>What are you contacting regarding?</p>
    <div class="contactForm">
      <div id="errorregarding" class="error"></div>
      <select id="regarding">
        <option value="0"></option>
        <option value="1">Wholesale Ordering</option>
        <option value="2">Catering</option>
        <option value="3">Wedding Ordering</option>
        <option value="4">Special Item Request</option>
        <option value="5">Other</option>
      </select>
    </div>

    <div class="contactForm">
      <p>Let us know how we can help!*</p>
      <textarea name="message" rows="10" cols="30" required></textarea>
      <br>
      <div id="errordescrip" class="error"></div>
    </div>

    <fieldset>
    <div class="orderBefore">
      <legend>Have you ordered with us before?</legend>
        <div id="errororder" class="error"></div>
      <label>
        <input type="radio" id="yes" name="yesOrNo" value="yes" onchange="displayQuestion(this.value)" />Yes</label>
      <label>
        <input type="radio" id="no" name="yesOrNo" value="no" onchange="displayQuestion(this.value)" />No</label>
    </div>

    <div id="noQuestion" style="display:none;"><br/>
      <legend>How did you hear about us?</legend>
      <select id="hearabout">
        <option value="Online" >Online Ad</option>
        <option value="Billboard">Billboard Ad</option>
        <option value="Walk">Walk-By</option>
        <option value="Friend">Friend</option>
        <option id="other" value="other" onchange="checkvalue(this.value)">Other</option>
      </select>
    </div>

    <div id="otherInput" style="display:none;"><label><textarea name="otherInput" rows="1" cols="1"></textarea></label></div>

    <div class="button"><input type="button" name="submit" id="submit" value="Submit"></div>
  </fieldset>

  </form>




</body>
</html>