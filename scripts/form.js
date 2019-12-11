

$("document").ready(function(){
      console.log("Loaded");
      $("#submit").click(function(){
        checkName($('#name').val());
        checkEmail($('#email').val());
        checkPhone($('#phone').val());
        checkRegarding();
});


$("#name").keyup(function(){
      console.log("Something in name changed");
      checkName($('#name').val());
});

$("#email").keyup(function(){
      console.log("Something in email changed");
      checkEmail($('#email').val());
});

$("#phone").keyup(function(){
      console.log("Something in phone changed")
      checkPhone($('#phone').val());
});

$("#regarding").change(function(){
      console.log("Something in regarding changed");
      checkRegarding();
});

$("#contactee").change(function(){
      console.log("Something in contactee changed");
      checkContactee();
});

$(function() {
    if($("#hearabout").val() == 0) //I'm supposing the "Other" option value is 0.
         $("#otherInput").show();
});

    }); //What is this even referring to?

//checks for the validity of the name input by comparing the user input to a vague regex
function checkName(inputtxt){

      var nameno = /^[A-Za-z]+$/;
      if($.trim($("#name").val())==""){
        $("#errorname").html("<p>You missed your name</p>");
        $("#errorname").addClass("showerror");
      }
      else if ((inputtxt.match(nameno))==false || inputtxt.length<2){          
        $("#errorname").html("<p>Please enter your full name</p>");
        $("#errorname").addClass("showerror");
      }
      else{
        $("#errorname").html("");
        $("#errorname").removeClass("showerror");
      }
    }

//checks for the validity of the phone input by comparing the user input to a regex in format xxx-xxx-xxxx
function checkPhone(inputtxt){

      var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      if($.trim($("#phone").val())==""){          
        $("#errorphone").html("<p>You missed your phone number</p>");
        $("#errorphone").addClass("showerror");
      }
      else if((inputtxt.match(phoneno))==false || inputtxt.length < 12){          
        $("#errorphone").html("<p>Please enter your number in the format 000-000-0000</p>");
        $("#errorphone").addClass("showerror");
      }
      else{       
        $("#errorphone").html("");
        $("#errorphone").removeClass("showerror");
      }
    }

//checks for the validity of the email input by comparing the user input to a regex in the format x*@x*.x{3}
function checkEmail(inputtxt){
      var emailno = /^[A-Za-z]*\@[A-Za-z]*.[A-Za-z]{3}$/;
      if($.trim($("#email").val())==""){
        $("#erroremail").html("<p>You missed your email</p>");
        $("#erroremail").addClass("showerror");
      }
      else if((inputtxt.match(emailno))==false || inputtxt.length < 10){          
        $("#erroremail").html("<p>Please enter your email in the format xxx@xxx.xxx</p>");
        $("#erroremail").addClass("showerror");
      }
      else{
        $("#erroremail").html("");
        $("#erroremail").removeClass("showerror");
      }
    }

//checks for the validity of the dropdown menu by comparing the user input to the value of each dropdown option. If the user selection == 0, then they haven't picked an option
function checkRegarding(){
      var e = document.getElementById("regarding");
      var result = e.options[e.selectedIndex].value;
      if(result != 1 && result != 2 && result != 3 && result != 4 && result != 5){
        $("#errorregarding").html("<p>You missed this field</p>");
        $("#errorregarding").addClass("showerror");
      }
      else{
        $("#errorregarding").html("");
        $("#errorregarding").removeClass("showerror");
      }
    }



//Code for conditional section
//checks for the validity of 

//checks to see which radio button is selected. If "no" is selected, then it displays the conditional. If "yes" is selected, it removes the conditional
function displayQuestion(answer) {

      if (answer == "no"){

      document.getElementById(answer + 'Question').style.display = "block";

      }
      if (answer == "yes") { // hide the div that is not selected

      document.getElementById('noQuestion').style.display = "none";

  }

}

function checkvalue(val){

      if(val == "other"){
       document.getElementById('otherInput').style.display='block';
      }
      else{
       document.getElementById('otherInput').style.display='none'; 
      }
}


