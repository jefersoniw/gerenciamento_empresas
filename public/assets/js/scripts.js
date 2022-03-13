//SCRIPT PARA A FUNÇÃO DE VISUALIZAR SENHA NO LOGIN
$(document).ready(function () {
    $("#showPassword").on("click", function () {
        var passwordField = $("#password");
        var passwordFieldType = passwordField.attr("type");
        if (passwordFieldType == "password") {
            passwordField.attr("type", "text");
            $(this).val("Ocultar Senha");
        } else {
            passwordField.attr("type", "password");
            $(this).val("Mostrar Senha");
        }
    });
});

//MOSTRAR SENHA NO REPETIR SENHA DO CADASTRO DE USUÁRIO
$(document).ready(function () {
    $("#showPassword2").on("click", function () {
        var passwordField = $("#password_confirmation");
        var passwordFieldType = passwordField.attr("type");
        if (passwordFieldType == "password") {
            passwordField.attr("type", "text");
            $(this).val("Ocultar Senha");
        } else {
            passwordField.attr("type", "password");
            $(this).val("Mostrar Senha");
        }
    });
});

//TRANSFORMANDO TEXTO EM MAÍUSCULO
function upperCaseF(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

//
$(document).ready(function () {
    $("#end_id_log").select2();
});

$(document).ready(function () {
    $("#log_id_bai").select2();
});

$(document).ready(function () {
    $("#doc_id_tdo").select2();
});

//
function Mudarestado(el) {
    var display = document.getElementById(el).style.display;
    if (display == "none") document.getElementById(el).style.display = "block";
    else document.getElementById(el).style.display = "none";
}
