$(document).ready(function() {
    $("#submit").click(
        function(){
            sendAjaxForm('auth', 'add.php');
            return false;
        }
    );
    $("#theme").click(
        function () {
            $("#enterLogP").css('display', 'none');
            $("#enterPassP").css('display', 'none');
            let light = document.querySelector(".light");
            let dark = document.querySelector(".dark");
            if (light === null ){
                dark.classList.remove("dark");
                dark.classList.add("light");
            }
            if (dark === null){
                light.classList.remove("light");
                light.classList.add("dark");
            }


        }
    );
    $("#authbtn").click(
        function () {
            $('#auth').css('display', 'flex');
            $('#enter').css('display', 'none');
            $("#enterLogP").css('display', 'none');
            $("#enterPassP").css('display', 'none');
        }
    );
    $("#enterbtn").click(
        function () {
            $('#enter').css('display', 'flex');
            $('#auth').css('display', 'none');
            $("#enterLogP").css('display', 'none');
            $("#enterPassP").css('display', 'none');
        }
    );
    $("#entersub").click(
        function (){
            console.log('enter');
            event.preventDefault();
            $("#enterLogP").css('display', 'none');
            $("#enterPassP").css('display', 'none');
            enter('enter', 'login.php');
        }
    );
    $("#exit").click(
        function () {
            $("#exit").css('display', 'none');
            $('#enter').css('display', 'flex');
            $('#auth').css('display', 'none');
            $('#in').css('display', 'none');
            $('#authbtn').css('display', '');
            $('#enterbtn').css('display', '');
        }
    )
});

function sendAjaxForm(ajax_form, url) {
    console.log($("#"+ajax_form).serialize());
    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serialize(),
        success: function(response) {
            //$('#enter').css('display', 'flex');
            //$('#auth').css('display', 'none');
            console.log(response);
            //result = $.parseJSON(response);
            console.log('+');
        },
        error: function(response) {
            console.log('-');
        }
    });
}

function  enter(ajax_form, url) {

    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serialize(),
        success: function(response) {
            let result = $.parseJSON(response);
            console.log(JSON.parse(response));
            switch (result.anserType) {
                case 1:{
                    $('#enter').css('display', 'none');
                    $('#auth').css('display', 'none');
                    $('#in').css('display', 'flex');
                    $('#exit').css('display', '');
                    $('#authbtn').css('display', 'none');
                    $('#enterbtn').css('display', 'none');
                    $("#enterLogP").css('display', 'none');
                    $("#enterPassP").css('display', 'none');
                    $('#inp').html(result.message);
                    break;
                }
                case 2:{
                    $("#enterLogP").css('display', '');
                    $("#enterLogP").html(result.message);
                    break;
                }
                case 3:{
                    $("#enterPassP").css('display', '');
                    $("#enterPassP").html(result.message);
                    break;
                }
            }
        },
        error: function(response) {
            console.log('-');
        }
    });
}


