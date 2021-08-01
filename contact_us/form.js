/*feed back form validation*/

var modalStatus = document.getElementById("modal_container");

function checkData() {

    //The following code will check whether the user has selected the title.
    if (document.response.TITLE.value == "0") {
      alert("Title is required!");
      document.response.TITLE.focus();
      return false;
    }

    //The following code will check whether user has entered the name.
    if (document.response.NAME.value == false) {
      alert("Name is required!");
      document.response.NAME.focus();
      return false;
    }

    //The following code will check whether the name has an appropirate length.
    if (document.response.NAME.value.length <=2) {
      alert("Your name should be longer than two characters");
      document.response.NAME.focus();
      return false;
    }

    //The following code will check whether the name has special characters or numbers.
    var specialCharacters=/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    var numbers=/[0-9]+/;
    if(specialCharacters.test(document.response.NAME.value) || numbers.test(document.response.NAME.value)){
      alert("You can't include numbers or special characters in your name");
      document.response.NAME.focus();
      return false;
    }

    //The following code will check if the user has entered the phone number.
    if (document.response.CONTACT_NUMBER.value == false) {
      alert("Phone number is required!");
      document.response.CONTACT_NUMBER.focus();
      return false;
    }

    //The following code will check whether the phone number is in a valid format.
    phone_number_pattern=/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/
    if (phone_number_pattern.test(document.response.CONTACT_NUMBER.value)==false) {
      alert("Invalid phone number! Please insert a valid phone number");
      document.response.CONTACT_NUMBER.focus();
      return false;
    }
  
    //The following code will check whether the user has entered the email.
    if (document.response.EMAIL.value == false) {
      alert("Email is required");
      document.response.EMAIL.focus();
      return false;
    }

    //The following code will check whether the user has entered the email in the correct format.
    var format=/^[-!#$%&'*+\/0-9=?A-Z^_a-z`{|}~](\.?[-!#$%&'*+\/0-9=?A-Z^_a-z`{|}~])*@[a-zA-Z0-9](-*\.?[a-zA-Z0-9])*\.[a-zA-Z](-?[a-zA-Z0-9])+$/;
    if(format.test(document.response.EMAIL.value)==false){
      alert("Invalid email! Please insert a valid email");
      document.response.EMAIL.focus();
      return false;
    }

    //The following code will check whether the user has entered a message with an appropriate length.
    if (document.response.COMMENTS.value.length <=30) {
      alert("Your feedback must be longer than 30 characters");
      document.response.COMMENTS.focus();
      return false;
    }

    //The following code will check whether the user has choosen 1 or more methods to contact.
    if (document.response.BEST_WAY_TO_CONTACT[0].checked==false && document.response.BEST_WAY_TO_CONTACT[1].checked == false && document.response.BEST_WAY_TO_CONTACT[2].checked == false) {
      alert("Please select a contact method!");
      return false;
    } 
    
    //The following code will check whether the user select the enquirey status
    if (document.response.COMPLAINT.value == false) {
      alert("Please select whether this is a complaint!");
      return false;
    }else{
      modalStatus.style.display ="block";
      return true;
    }
     
  }

  
function goToHome(){
  window.location.replace('../index.html');
}



  /* 

  references
  
  * Stack Overflow. 2021. Check for special characters in string. [ONLINE] 
    Available at: https://stackoverflow.com/questions/32311081/check-for-special-characters-in-string. 
    [Accessed 13 January 2021].

  * Telusko. (2021). #31 Email Validation in JavaScript. [Online Video]. 26 November 2018. 
    Available from: https://www.youtube.com/watch?v=vPVx-zGFh0w&feature=youtu.be. 
    [Accessed: 13 January 2021].

  * Validity. 2021. What are the rules for email address syntax?. 
    [ONLINE] Available at: https://help.returnpath.com/hc/en-us/articles/220560587-What-are-the-rules-for-email-address-syntax-#:~:text=A%20special%20character%20cannot%20appear,(%2D)%20and%20plus%20sign%20(%2B). 
    [Accessed 17 January 2021].

  * W3schools. 2021. JavaScript String length Property. [ONLINE] 
    Available at: https://www.w3schools.com/jsref/jsref_length_string.asp. 
    [Accessed 13 January 2021].

  * Stack Overflow. 2012. Regular expression for GB based and only numeric phone number. 
    [ONLINE] Available at: https://stackoverflow.com/questions/11518035/regular-expression-for-gb-based-and-only-numeric-phone-number. 
    [Accessed 3 February 2021].

  */