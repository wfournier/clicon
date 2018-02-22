var price = $('#price1').val();
$(document).ready(function ()
{
    $('#friday').click(function () {
        if ($(this).is(':checked')) {
            price += 25;
            $('#price1').val(price);
        }
        if (!$(this).is(':checked')) {
            price -= 25;
            $('#price1').val(price);
        }
    });
    $('#saturday').click(function () {
        if ($(this).is(':checked')) {
            price += 40;
            $('#price1').val(price);
        }
    });
    $('#sunday').click(function () {
        if ($(this).is(':checked')) {
            price += 35;
            $('#price1').val(price);
        }
    });
});

