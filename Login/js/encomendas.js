$("#encomendas").addClass("active");

// Gerenciamento dos modais
$(".adicionar").click(function () {
    $('.modal-um').modal('show');
})

$(".proceed1").click(function () {
    $('.modal-um').modal('hide');
    $('.modal-dois').modal('show');
})

$(".proceed2").click(function () {
    $('.modal-dois').modal('hide');
    $('.modal-tres').modal('show');
})

$(".previous1").click(function () {
    $('.modal-dois').modal('hide');
    $(".modal-um").modal('show');
})
$(".previous2").click(function () {
    $('.modal-tres').modal('hide');
    $(".modal-dois").modal('show');
})

$(".share").click(function(){
    var id = $(this).attr('id');
    var link = ("http://localhost:8080/4lp/Rastreio.php?codigo=" + id );
    

    $('.shareModal').modal('show');
    $('.shareInput').val(link);
});
$('.shareInput').click(function(){
    $('.shareInput').select();
    document.execCommand('copy');
    $('.shareModal').modal('hide');
});

var ooooohYeahThisIsAnIdBaby;

$('.update').click(function(){
    $('.updateModal').modal('show');
    ooooohYeahThisIsAnIdBaby= $(this).attr('id');
});


$('#mudarFase').click(function(){
    var cod= $('.fase').val();
    
    var fase={
        "enco":ooooohYeahThisIsAnIdBaby,
        "Cfase":cod
    }


    $.ajax({
        url: "/4lp/teste.php",
        type: "POST",
        data: { "enco": JSON.stringify(fase) }
    }).done(function (resposta) {
        console.log(resposta);
    }).fail(function (jqXHR, textStatus, error) {
        console.log("Request failed: " + textStatus + " - " + error);
    });
});



$("#finalizar").click(function () {
    $(".modal-tres").modal('hide');
    //info modal 1
    bairro1 = $("#bairro").val();
    cep = $("#cep").val();
    cidade1 = $("#cidade").val();
    complemento = $("#complemento").val();
    estado1 = $("#uf").val();
    rua = $("#rua").val();
    numero = $("#numero").val();
    
    //info modal 2
    bairro2 = $("#bairro2").val();
    cep2 = $("#cep2").val();
    cidade2 = $("#cidade2").val();
    complemento2 = $("#complemento2").val();
    estado2 = $("#uf2").val();
    rua2 = $("#rua2").val();
    numero2 = $("#numero2").val();
   
    
    //info modal 3
    var cpf = $("#cpf").val();
    var prazo = $("#prazo").val();



    var url = "teste.php";
    var encomenda = {
        "bairro1": bairro1,
        "bairro2": bairro2,
        "cep": cep,
        "cep2": cep2,
        "cidade1": cidade1,
        "cidade2": cidade2,
        "complemento": complemento,
        "complemento2": complemento2,
        "cpf": cpf,
        "estado1": estado1,
        "estado2": estado2,
        "logradouro1": rua,
        "logradouro2": rua2,
        "pais": "Brasil",
        "numero": numero,
        "numero2": numero2,
        "prazo": prazo
    };
    console.log(encomenda);
    $.ajax({
        url: "/4lp/Repositorios/encomendaRepositorio.php",
        type: "POST",
        data: { "enco": JSON.stringify(encomenda) }
    }).done(function (resposta) {
        console.log(resposta);
        window.location.reload();
    }).fail(function (jqXHR, textStatus, error) {
        console.log("Request failed: " + textStatus + " - " + error);
        window.location.reload();
    });
});





// Busca de CEP
$(document).ready(function () {

    var rua;
    var bairro;
    var cidade;
    var uf;

    function buscaCep(rua, bairro, cidade, uf, cep) {

        $(rua).val("...");
        $(bairro).val("...");
        $(cidade).val("...");
        $(uf).val("...");
        //Consulta o webservice viacep.com.br/
        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $(rua).val(dados.logradouro);
                $(bairro).val(dados.bairro);
                $(cidade).val(dados.localidade);
                $(uf).val(dados.uf);
            } //end if.
            else {
                //CEP pesquisado não foi encontrado.
                limpa_formulario_cep();
                alert("CEP não encontrado.");
            }
        });

    }


    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                buscaCep($("#rua"), $("#bairro"), $("#cidade"), $("#uf"), cep);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            //limpa_formulario_cep();
        }
    });
    $("#cep2").blur(function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                buscaCep($("#rua2"), $("#bairro2"), $("#cidade2"), $("#uf2"), cep);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            //limpa_formulario_cep();
        }
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

