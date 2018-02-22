var price = localStorage.price;
$(document).ready(function ()
{
    $('#friday').click(function () {
        if ($(this).is(':checked')) {
            price = 25;
            if ($('#saturday').is(':checked'))
                price = 65;
            if ($('#sunday').is(':checked'))
                price = 60;
            if ($('#sunday').is(':checked') && $('#saturday').is(':checked'))
                price = 55;
            $('#price1').text(price);
            localStorage.price = price;
        }
        if (!$(this).is(':checked')) {
            price = 0;
            if ($('#saturday').is(':checked'))
                price = 40;
            if ($('#sunday').is(':checked'))
                price = 35;
            if ($('#sunday').is(':checked') && $('#saturday').is(':checked'))
                price = 75;
            $('#price1').text(price);
            localStorage.price = price;
        }
    });
    $('#saturday').click(function () {
        if ($(this).is(':checked')) {
            price = 40;
            if ($('#friday').is(':checked'))
                price = 65;
            if ($('#sunday').is(':checked'))
                price = 75;
            if ($('#sunday').is(':checked') && $('#friday').is(':checked'))
                price = 55;
            $('#price1').text(price);
            localStorage.price = price;
        }
        if (!$(this).is(':checked')) {
            price = 0;
            if ($('#friday').is(':checked'))
                price = 25;
            if ($('#sunday').is(':checked'))
                price = 35;
            if ($('#sunday').is(':checked') && $('#friday').is(':checked'))
                price = 60;
            $('#price1').text(price);
            localStorage.price = price;
        }
    });
    $('#sunday').click(function () {
        if ($(this).is(':checked')) {
            price = 35;
            if ($('#saturday').is(':checked'))
                price = 75;
            if ($('#friday').is(':checked'))
                price = 60;
            if ($('#friday').is(':checked') && $('#saturday').is(':checked'))
                price = 55;
            $('#price1').text(price);
            localStorage.price = price;
        }
        if (!$(this).is(':checked')) {
            price = 0;
            if ($('#saturday').is(':checked'))
                price = 40;
            if ($('#friday').is(':checked'))
                price = 25;
            if ($('#friday').is(':checked') && $('#saturday').is(':checked'))
                price = 65;
            $('#price1').text(price);
            localStorage.price = price;
        }
    });
});

