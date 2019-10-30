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
$empty_count = 0;

function validateName ($name, $submit){
  if( empty( $submit )) {
    return '';}
  if (empty ($name)){
    return "You didn't enter your name!";}
  if (!preg_match("/^[a-zA-Z \-]*$/",$name, $matches)){
    return "Please enter a valid name";
  }
}


function validatePhone ($phone, $submit){
  global $phone_expr;
  if( empty( $submit )) {
    return '';}
  if (empty ($phone)){
    return "You didn't enter a phone number!";}
  if (!preg_match('/^\(?([0-9]{3})\)?[-]?([0-9]{3})[-]?([0-9]{4})$/', $phone, $matches)){
    return "This phone is not valid.";
      }
    
}

function validateEmail ($email, $submit){
    if (empty($submit)){
      return '';
    }
    if (empty ($email)){
      return "You didn't enter an email address!";}
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) ){
      return "Please enter a valid email.";}
  }

function validateCheckbox($checkbox1, $checkbox2, $checkbox3, $submit){
  if (empty($submit)){
    return '';}
  if (empty($checkbox1) && empty($checkbox2) && empty($checkbox3)) {
    return "Please check two or more boxes";}
  if (countEmpty($checkbox1, $checkbox2, $checkbox3, $submit) > 1){
    return "Please check two or more boxes";}
  if (countEmpty($checkbox1, $checkbox2, $checkbox3, $submit) == 1){
    return '';}
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
  if (empty($submit)){
    return '';
  }
  if(empty($dropdown)) { 
    return "Please select one"; 
  } 
  if (!empty($dropdown)) {
    return '';
  }
}

function validateTextarea($message, $submit){
  if (empty($submit)){
    return '';
  }
  if(empty($message)){
    return "Required field";
  }
  if (!empty($message)){
    return '';
  }
}

if(isset($_POST['submit'])){
  header("Location:confirmed.php");}

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
      <p class="valid"><?php echo validateName($name, $submit);?></p>
    </div>

    <div class="contactForm">
      <label for="phone">Phone*: </label>
      <div id="errorphone" class="error"></div>
      <input type="phone" name="phone" id="phone" placeholder="000-000-0000" value="<?php echo $phone; ?>">
      <p class="valid"><?php echo validatePhone($phone, $submit);?></p> 
    </div>

    <div class="contactForm">
      <label for="email">Email*: </label>
      <div id="erroremail" class="error"></div>
      <input type="email" name="email" id="email" placeholder="janedoe@email.com" value="<?php echo $email; ?>">
      <p class="valid"><?php echo validateEmail($email, $submit);?></p>
    </div>

    <br>

    <div class="contactForm">
      <label for="checkbox" id="checkbox" name="checkbox">Contactee Type*: </label><br>
      <div id="errorcheck" class="error"></div>
      <label><input type="checkbox" id="check1" name="checkbox1" value="1" >Individual</label>
      <label><input type="checkbox" id= "check2" name="checkbox2" value="2" >Business:Catering</label>
      <label><input type="checkbox" id="check3" name="checkbox3" value="3">Business:Partner</label>
      <p class="valid"><?php echo validateCheckbox($checkbox1, $checkbox2, $checkbox3, $submit);?></p>
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
      <p class="valid"><?php echo validateDropdown($dropdown, $submit);?></p>
    </div>

    <div class="contactForm">
      <p>Let us know how we can help!*</p>
      <textarea name="message" rows="10" cols="30"></textarea>
      <br>
      <div id="errordescrip" class="error"></div>
      <p class="valid"><?php echo validateTextarea($message, $submit);?></p>
    </div>

    <div class="button"><input type="submit" name="submit" id="submit" value="Submit"></div>
  </fieldset>

  </form>
  </body>

  <footer>
  <p>This is the footer</p>
  </footer>
</html>