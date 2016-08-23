$(document).ready(function (){
    'use strict';

    $('#flash-message-close').click(function(){
        $('.flash-message').remove();
    });

    if ($('.mySelect option:selected').text() === 'Select') {
        $('#encode').prop('disabled', true);
    }

    $('.mySelect').change(function(){
        if ($('.mySelect option:selected').text() === 'Select') {
            $('#encode').prop('disabled', true);
        } else {
            $('#encode').prop('disabled', false);
        }
    });

    $('.delete').click(function(){
        var action = confirm("Are you sure you want to delete this product?");
        if (action === false) {
            return false;
        }
    });

    // //Progress Bar
    // $(".load-bar").css("width", "100%");
    // $(".load-bar").fadeTo(1e3, 1, function() {
    //     $(".load-bar").remove();
    // });
});
