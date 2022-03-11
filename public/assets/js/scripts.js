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
