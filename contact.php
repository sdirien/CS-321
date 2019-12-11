<!DOCTYPE html>
<html lang="en">
<head>
  
  <!--  Meta  -->
  <meta charset="UTF-8" />
  <title>RainyDayBakes</title>
  
  <!--  Styles  -->
  <link rel="stylesheet" type="text/css" href="style.css"/>

  <?php include 'header.php'?>

</head>

<?php
$name = filter_input(INPUT_POST, "name");
$phone = filter_input(INPUT_POST, "phone" );
$email = filter_input(INPUT_POST, 'email');
$submit = filter_input(INPUT_POST, 'submit' );
$checkbox1 = filter_input(INPUT_POST, 'checkbox1');
$checkbox2 = filter_input(INPUT_POST, 'checkbox2');
$checkbox3 = filter_input(INPUT_POST, 'checkbox3');
$dropdown = filter_input(INPUT_POST, 'dropdown');
$message = filter_input(INPUT_POST, 'message');
$action_location = filter_input( INPUT_SERVER, 'PHP_SELF' );
//$action_location = "confirmed.php";
$empty_count = 0;
$valid = "False";
$errorcount = -1;

function validateName ($name, $submit){
  global $errorcount;
  $errorcountN = 0;
  if( empty( $submit )) {
    return '';}
  if (empty ($name)){
    $errorcountN = $errorcountN+1;
    return "You didn't enter your name!";
    }
  if (!preg_match("/^[a-zA-Z \-]{3,}$/",$name, $matches)){
    $errorcountN = $errorcountN+1;
    return "Please enter a valid name";
  }
  else{
    $errorcountN = 0;
  }
  $errorcount = $errorcount + $errorcountN;
  return $errorcount;
}


function validatePhone ($phone, $submit){
  global $phone_expr;
  global $errorcount;
  $errorcountP = 0;
  if( empty( $submit )) {
    return '';}
  if (empty ($phone)){
    $errorcountP = $errorcountP+1;
    return "You didn't enter a phone number!";
  }
  if (!preg_match('/^\(?([0-9]{3})\)?[-]([0-9]{3})[-]([0-9]{4})$/', $phone, $matches)){
    $errorcountP = $errorcountP+1;
    return "This phone is not valid.";
  }
  else {
    $errorcountP = 0;
  }
  $errorcount = $errorcount + $errorcountP;
  return $errorcount;
    
}

function validateEmail ($email, $submit){
    global $errorcount;
    $errorcountE = 0;
    if (empty($submit)){
      return '';
    }
    if (empty ($email)){
      $errorcountE = $errorcountE+1;
      return "You didn't enter an email address!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) ){
      $errorcountE = $errorcountE+1;
      return "Please enter a valid email.";
    }
    else{
      $errorcountE = 0;
    }
    $errorcount = $errorcount + $errorcountE;
    return $errorcount;
  }

function validateCheckbox($checkbox1, $checkbox2, $checkbox3, $submit){
  global $errorcount;
  $errorcountC = 0;
  if (empty($submit)){
    return '';}
  if (empty($checkbox1) && empty($checkbox2) && empty($checkbox3)) {
    $errorcountC = $errorcountC+1;
    return "Please check two or more boxes";
  }
  else if (countEmpty($checkbox1, $checkbox2, $checkbox3, $submit) > 1){
    $errorcountC = $errorcountC+1;
    return "Please check two or more boxes";
  }
  else if (countEmpty($checkbox1, $checkbox2, $checkbox3, $submit) == 1){
    $errorcountC = 0;
    return '';}
  $errorcount = $errorcount + $errorcountC;
  return $errorcount;
}

function countEmpty($checkbox1, $checkbox2, $checkbox3, $submit){
  global $empty_count;
  if (empty($submit)){
    return '';}
  if (empty($checkbox1)){
    $empty_count = $empty_count + 1;
  }
  if (empty($checkbox2)){
    $empty_count = $empty_count + 1;
  }
  if (empty($checkbox3)){
    $empty_count = $empty_count + 1;
  }
  return $empty_count;
}

function validateDropdown($dropdown, $submit){
  global $errorcount;
  $errorcountP = 0;
  if (empty($submit)){
    return '';
  }
  if(empty($dropdown)) { 
    $errorcountP = $errorcountP+1;
    return "Please select one"; 
  } 
  if (!empty($dropdown)) {
    $errorcount = 0;
    return '';
  }
  $errorcount = $errorcount + $errorcountD;
  return $errorcount;
}

function validateTextarea($message, $submit){
  global $errorcount;
  $errorcountT = 0;
  if (empty($submit)){
    return '';
  }
  if(empty($message)){
    $errorcountT = $errorcountT+1;
    return "Required field";
  }
  if (!empty($message)){
    $errorcount = 0;
    return '';
  }
  $errorcount = $errorcount + $errorcountT;
  return $errorcount;
}

$theerrorcount = 0;
if(isset($_POST['submit']) ){ 
  global $theerrorcount;
  $theerrorcount = validateTextarea($message, $submit);
  $theerrorcount = validateDropdown($dropdown, $submit);
  $theerrorcount = validateCheckbox($checkbox1, $checkbox2, $checkbox3, $submit);
  $theerrorcount = validateEmail ($email, $submit);
  $theerrorcount = validatePhone ($phone, $submit);
  $theerrorcount = validateName ($name, $submit);
  global $errorcount;
  if ($errorcount == 0){                                                                                                                                                   
    header("Location:confirmed.php");}}

?>

<body>
<h3>Connect With Us!</h3>
  <p>Got questions? We got answers. Leave your name, email and phone number below
    and we'll get back to you ASAP. Or, feel free to call us at 123-456-7890 during
  our regular business hours.</p>
</div>

<form action="<?php echo $action_location; ?>" method="POST" >
    <div class="contactForm">
      <label for="name">Name*: </label>
      <div id="errorname" class="error"></div>
      <input type="text" name="name" id="name" minlength="2" value="<?php echo $name; ?>" >
      <p class="valid"><?php if (is_string(validateName($name, $submit))) { echo validateName($name, $submit);} ;?></p>
    </div>

    <div class="contactForm">
      <label for="phone">Phone*: </label>
      <div id="errorphone" class="error"></div>
      <input type="phone" name="phone" id="phone" placeholder="000-000-0000" value="<?php echo $phone; ?>">
      <p class="valid"><?php if (is_string(validatePhone($phone, $submit))){ echo validatePhone($phone, $submit);};?></p> 
    </div>

    <div class="contactForm">
      <label for="email">Email*: </label>
      <div id="erroremail" class="error"></div>
      <input type="email" name="email" id="email" placeholder="janedoe@email.com" value="<?php echo $email; ?>">
      <p class="valid"><?php if (is_string( validateEmail($email, $submit))){ echo validateEmail($email,$submit);};?></p>
    </div>

    <br>

    <div class="contactForm">
      <label for="checkbox" id="checkbox" name="checkbox">Contactee Type*: </label><br>
      <div id="errorcheck" class="error"></div>
      <label><input type="checkbox" id="check1" name="checkbox1" value="1" >Individual</label>
      <label><input type="checkbox" id= "check2" name="checkbox2" value="2" >Business:Catering</label>
      <label><input type="checkbox" id="check3" name="checkbox3" value="3">Business:Partner</label>
      <p class="valid"><?php if(is_string(validateCheckbox($checkbox1, $checkbox2, $checkbox3, $submit))){ echo validateCheckbox($checkbox1, $checkbox2, $checkbox3, $submit);};?></p>
    </div>


    <p>What are you contacting regarding?*</p>
    <div class="contactForm">
      <div id="errorregarding" class="error"></div>
      <select id="regarding" name="dropdown">
        <option value="0"></option>
        <option  value="1">Wholesale Ordering</option>
        <option  value="2">Catering</option>
        <option  value="3">Wedding Ordering</option>
        <option  value="4">Special Item Request</option>
        <option  value="5">Other</option>
      </select>
      <p class="valid"><?php if(is_string(validateDropdown($dropdown, $submit))){ echo validateDropdown($dropdown, $submit);};?></p>
    </div>

    <div class="contactForm">
      <p>Let us know how we can help!*</p>
      <textarea name="message" rows="10" cols="30"></textarea>
      <br>
      <div id="errordescrip" class="error"></div>
      <p class="valid"><?php if(is_string(validateTextarea($message, $submit))){echo validateTextarea($message, $submit);};?></p>
    </div>

    <div class="button"><input type="submit" name="submit" id="submit" value="Submit"></div>

  </form>

  </body>

  <footer>
    <?php include 'footer.php'?>
  </footer>
</html>