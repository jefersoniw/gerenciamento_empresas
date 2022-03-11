function upperCaseF(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

$(document).ready(function () {
    $("#marca_id").select2();
});

$(document).ready(function () {
    $("#produto_id").select2();
});

$(document).ready(function () {
    $("#buscarSaidaProduto").select2();
});
