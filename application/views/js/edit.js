"use strict";



$('#title').on("click keyup keydown change blur", function() {
    if($(this).val().length> 60){
        // alert('Eroor');
        $('#title').val($(this).val().substring(60, $(this).val()-1));
    }
    var c =60- $('#title').val().length;
    $('.countstr').html('<p> Осталось:'+c+'</p>');

});


$('#description').on("click keyup keydown change blur", function() {
    var d =1000- $('#description').val().length;
    $('.countarea').html('<p> Осталось:'+d+'</p>');
    if($(this).val().length> 1000){
        $('#description').val($(this).val().substring(1000, $(this).val()-1));
        // alert('Eroor');
        // $('#title').val('');
    }
});