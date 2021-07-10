// Index for slide show
var slideIndex = 0;


showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5500); // Change image every 2 seconds
}

// code source for slideshow: https://www.w3schools.com/w3css/w3css_slideshow.asp





// Get the modal of first advertisement
var modal1 = document.getElementById("addinfo_1");

// Get the button of first advertisement that open the modal
var btn1 = document.getElementById("addbtn_1");


// Get the modal of second advertisement.
var modal2 = document.getElementById("addinfo_2");

// Get the button of second avdertisement that open the modal
var btn2 = document.getElementById("addbtn_2");

// Get the <span> elements that closes the modal for first advertisement
var span1 = document.getElementsByClassName("close")[0];

// Get the <span> elements that closes the modal for second advertisement
var span2 = document.getElementsByClassName("close")[1];


// When the user clicks the button of first advertisement, open the modal 
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks the button of second advertisement, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x) first advertisement, close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks on <span> (x) of second advertisement, close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}


// When the user clicks anywhere outside of the modal of second advertisement, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

// code source for backdrop: https://www.w3schools.com/howto/howto_css_modals.asp-->
