    $(document).ready(function() {
        var cards = $(".card");

        cards.hover(function() {
            $(this).find(".card-text").fadeIn('slow');
        }, function() {
            $(this).find(".card-text").fadeOut('slow');
        });
    });

