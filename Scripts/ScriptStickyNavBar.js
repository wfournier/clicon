var $elem = $("#sticky");
var stickySidebar = $elem.offset().top;

$(window).scroll(function () {
    if ($(window).width() > 426) {
        if ($(window).scrollTop() >= stickySidebar) {
            $elem.css("position", "fixed");
            $elem.css("z-index", "1");
            $elem.css("top", "0");
            $("main").css("margin-top", "50px");
        }
        else {
            $elem.css("position", "unset");
            $elem.css("z-index", "unset");
            $elem.css("top", "unset");
            $("main").css("margin-top", "0");
        }
    } else {
        $elem.css("position", "fixed");
        $elem.css("z-index", "1");
        $elem.css("top", "0");
        $("main").css("margin-top", "50px");
    }
});