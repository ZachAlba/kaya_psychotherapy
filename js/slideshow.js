// Function to display slides in a slideshow automatically
function showSlides() {
   // Get all elements with the class "slideshow"
   var slides = $(".slideshow");

   slides.hide(); // Hide all slides

   slideindex++;
   if (slideindex > slides.length) {
      slideindex = 1;
   }

   slides.eq(slideindex - 1).show(); // Show the current slide

   // Call this function recursively after 5000 milliseconds (5 seconds)
   setTimeout(showSlides, 5000);
}

var slideindex = 0;
showSlides();
