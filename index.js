$(document).ready(function() {
    $("#submit").click(
        function(){
            $("#addLogP").css('display', 'none');
            $("#auth").reset();
            sendAjaxForm('auth', 'add.php');

            return false;
        }
    );
    $("#theme").click(
        function () {
            $("#addLogP").css('display', 'none');
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
            $("#addLogP").css('display', 'none');
        }
    );
    $("#enterbtn").click(
        function () {
            $('#enter').css('display', 'flex');
            $('#auth').css('display', 'none');
            $("#enterLogP").css('display', 'none');
            $("#enterPassP").css('display', 'none');
            $("#addLogP").css('display', 'none');
        }
    );
    $("#entersub").click(
        function (){
            console.log('enter');
            event.preventDefault();
            $("#enterLogP").css('display', 'none');
            $("#enterPassP").css('display', 'none');
            enter('enter', 'login.php');
            $("#enter").trigger("reset");
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
    $("#findSub").click(
        function () {
            event.preventDefault();
            find();
            $("#findForm").trigger("reset");
        }
    );

    stat();

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
            console.log($.parseJSON(response));
            let res = $.parseJSON(response);
            switch (res["anserType"]) {
                case 2:{
                    console.log(res.message);
                    $("#addLogP").css('display', '');
                    $("#addLogP").html(res.message);
                    break;
                }
            }
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

function stat() {
    $.ajax({
        url:     "getStat.php",
        type:     "GET",
        success: function(response) {
            console.log(response);
            let result = $.parseJSON(response);
            for (let i in result["names"]){
                console.log(result["names"][i]);
                $("#users").html($("#users").html()+"<p>"+result["names"][i]["name"]+" "+result["names"][i]["surname"]+"</p>");
            }

            $("#stat").html(
                $("#stat").html()+
                "<p> Пользователей: "+result["count"] + "</p>"+
                "<p> Пользователей за месяц: "+result["last_month"] + "</p>" +
                "<p> Последний зарегистрированный: "+result["last_user"]["name"] + " " + result["last_user"]["surname"] +"</p>"
            );
            console.log(result);
        },
        error: function(response) {
            console.log('-');
        }
    });
}

function find() {
    $.ajax({
        url:     "find.php",
        type:     "POST",
        dataType: "html",
        data: $("#findForm").serialize(),
        success: function(response) {

            $("#answer").html("");
            let result = $.parseJSON(response);
            console.log(result["names"].length);
            if (result["names"].length == 0){
                $("#answer").html("<p> Пользователей не найдено</p>")
            } else {
                for (let i in result["names"]){
                    console.log(result["names"][i]);
                    $("#answer").html($("#answer").html()+"<p>"+result["names"][i]["name"]+" "+result["names"][i]["surname"]+"</p>");
                }
            }
        },
        error: function(response) {
            console.log('-');
        }
    });
}
