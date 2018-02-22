var price = parseInt($('#price2').text(), 10);
if(isNaN(price)){
    var tickets = parseInt(localStorage.price);
    price = 0;
}

price = tickets;
$(document).ready(function ()
{
    if ($('#concert').is(':checked'))
        price = 25 + tickets;
    if ($('#panel').is(':checked'))
        price = 40 + tickets;
    if ($('#guest').is(':checked'))
        price = 35 + tickets;
    if ($('#guest').is(':checked') && $('#panel').is(':checked'))
        price = 75 + tickets;
    if ($('#guest').is(':checked') && $('#concert').is(':checked'))
        price = 60 + tickets;
    if ($('#concert').is(':checked') && $('#panel').is(':checked'))
        price = 65 + tickets;
    if ($('#guest').is(':checked') && $('#panel').is(':checked') && $('#concert').is(':checked'))
        price = 55 + tickets;
    $('#price2').text(price);

    $('#concert').click(function () {
        if ($(this).is(':checked')) {
            price = 25 + tickets;
            if ($('#panel').is(':checked'))
                price = 65 + tickets;
            if ($('#guest').is(':checked'))
                price = 60 + tickets;
            if ($('#guest').is(':checked') && $('#panel').is(':checked'))
                price = 55 + tickets;
            $('#price2').text(price);
            localStorage.price = price;
        }
        if (!$(this).is(':checked')) {
            price = 0 + tickets;
            if ($('#panel').is(':checked'))
                price = 40 + tickets;
            if ($('#guest').is(':checked'))
                price = 35 + tickets;
            if ($('#guest').is(':checked') && $('#panel').is(':checked'))
                price = 75 + tickets;
            $('#price2').text(price);
            localStorage.price = price;
        }
    });
    $('#panel').click(function () {
        if ($(this).is(':checked')) {
            price = 40 + tickets;
            if ($('#concert').is(':checked'))
                price = 65 + tickets;
            if ($('#guest').is(':checked'))
                price = 75 + tickets;
            if ($('#guest').is(':checked') && $('#concert').is(':checked'))
                price = 55 + tickets;
            $('#price2').text(price);
            localStorage.price = price;
        }
        if (!$(this).is(':checked')) {
            price = 0 + tickets;
            if ($('#concert').is(':checked'))
                price = 25 + tickets;
            if ($('#guest').is(':checked'))
                price = 35 + tickets;
            if ($('#guest').is(':checked') && $('#concert').is(':checked'))
                price = 60 + tickets;
            $('#price2').text(price);
            localStorage.price = price;
        }
    });
    $('#guest').click(function () {
        if ($(this).is(':checked')) {
            price = 35 + tickets;
            if ($('#panel').is(':checked'))
                price = 75 + tickets;
            if ($('#concert').is(':checked'))
                price = 60 + tickets;
            if ($('#concert').is(':checked') && $('#panel').is(':checked'))
                price = 55 + tickets;
            $('#price2').text(price);
            localStorage.price = price;
        }
        if (!$(this).is(':checked')) {
            price = 0 + tickets;
            if ($('#panel').is(':checked'))
                price = 40 + tickets;
            if ($('#concert').is(':checked'))
                price = 25 + tickets;
            if ($('#concert').is(':checked') && $('#panel').is(':checked'))
                price = 65 + tickets;
            $('#price2').text(price);
            localStorage.price = price;
        }
    });
});

