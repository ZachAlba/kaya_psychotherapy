    $(document).ready(function() {
        var cards = $(".card");

        cards.hover(function() {
            $(this).animate({
                width: "120%",
                height: "120%"
            }, 200, function() {
                $(this).find(".card-text").fadeIn();
            });
        }, function() {
            $(this).animate({
                width: "100%",
                height: "100%"
            }, 200, function() {
                $(this).find(".card-text").fadeOut();
            });
        });
    });



    //fix this wonky shit