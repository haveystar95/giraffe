"use strict";


var res =0;
$('#login').keyup(function () {
    var str = $('#login').val();
    var res = str.search(/(<)|(>)|(php)|(\"{1})|(\'{1})/);
//        console.log(str);
    console.log(res);
    if(res != -1){

        $('.spec').css({'display':'block'})
        setTimeout(function() {
            $('.spec').css({'display':'none'})
        },1000)

    }
})




$('#signin').click(function() {
    if( $('#login').val()==''){

//           $('.win').css({'display':'block'})

        $('#login').css({'background':'#f5bcbe'
//
        })
        setTimeout(function() {
            $('#login').css({'background':'white',
                'transition': 'background-color 100ms linear'
            })
        },500)

        return false;

    }

    if( $('#password').val()==''){

        $('#password').css({'background':'#f5bcbe'
//
        })
        setTimeout(function() {
            $('#password').css({'background':'white',
                'transition': 'background-color 100ms linear'
            })
        },500)
        return false;
    }

    var str = $('#login').val()
    var res = str.search(/(<)|(>)|(php)|(\"{1})|(\'{1})/);
//        console.log(str);
    console.log(res);


    if(res != -1){
        $('.spec').css({'display':'block'})
        return false
    }


})

$('body').click(function() {
    $('.win').css({'display':'none'})
    $('.win2').css({'display':'none'})
    $('.spec').css({'display':'none'})
});