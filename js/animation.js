
    $("#myElement").fadeIn(1000, function() {
        // Callback function to be executed after the animation is complete
        console.log("Fade in animation complete");
    });

    // Example animation: slide down an element
    $("#myElement").slideDown(500, function() {
        // Callback function to be executed after the animation is complete
        console.log("Slide down animation complete");
    });

    // Example animation: animate multiple CSS properties
    $("#myElement").animate({
        opacity: 0.5,
        width: "200px",
        height: "200px"
    }, 1000, function() {
        // Callback function to be executed after the animation is complete
        console.log("Multiple properties animation complete");
    });
