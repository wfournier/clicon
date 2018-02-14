var $elem = $("#sticky");
var stickySidebar = $elem.offset().top;

$(window).scroll(function () {
    if($(window).width() < 426){
        console.log($(window).width())
        $elem.css("position", "unset");
        $elem.css("z-index", "unset");
        $elem.css("top", "unset");
        $("header").css("padding-bottom", "0");
    } else {
        if ($(window).scrollTop() >= stickySidebar) {
            $elem.css("position", "fixed");
            $elem.css("z-index", "1");
            $elem.css("top", "0");
            $("header").css("padding-bottom", "50px");
        }
        else {
            $elem.css("position", "unset");
            $elem.css("z-index", "unset");
            $elem.css("top", "unset");
            $("header").css("padding-bottom", "0");
        }
    }
});