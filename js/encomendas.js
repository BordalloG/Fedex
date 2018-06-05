$("#encomendas" ).addClass( "active" );


// Gerenciamento dos modais
$(".adicionar").click(function(){
    $('.modal-um').modal('show');
})

$(".proceed1").click(function(){
    $('.modal-um').modal('hide');
    $('.modal-dois').modal('show');
})
  
$(".proceed2").click(function(){
    $('.modal-dois').modal('hide');
    $('.modal-tres').modal('show');
})

$(".previous1").click(function(){
    $('.modal-dois').modal('hide');
    $(".modal-um").modal('show');
})
$(".previous2").click(function(){
    $('.modal-tres').modal('hide');
    $('.modal-dois').modal('show');
})

$("#finalizar").click(function(){


    var rua = $("#rua").val();
    var bairro1 = $("#bairro").val();
   var cidade1=$("#cidade").val();
   var estado1=$("#uf").val();
   var pais="Brasil";
   var rua2=$("#rua2").val();
   var bairro2=$("#bairro2").val();
   var cidade2=$("#cidade2").val();
   var estado2=$("#uf2").val();
   var numero2=$("#numero2").val();
   var complemento2=$("#complemento2").val();
   var cpf=$("#cpf").val();
   var prazo=$("#prazo").val();



    var url="teste.php";
    var encomenda =  {
        "logradouro1":rua,
        "bairro1":bairro1,
        "cidade1":cidade1,
        "estado1":estado1,
        "pais":"Brasil",
        "logradouro2":rua2,
        "bairro2":bairro2,
        "cidade2":cidade2,
        "estado2":estado2,
        "numero2":numero2,
        "complemento2":complemento2,
        "cpf":cpf,
        "prazo":prazo
    };

    console.log(encomenda);
    var obj =JSON.stringify(encomenda);
    $.ajax({
      type: 'post',
      url: url,
      data: obj//,
    //   dataType:"t"
    });
    $.post(url, function(result) {
console.log(result);
    });
});





// Busca de CEP
$(document).ready(function() {

    var rua;
    var bairro;
    var cidade;
    var uf;

    function buscaCep(rua,bairro,cidade,uf,cep){
        
            $(rua).val("...");
            $(bairro).val("...");
            $(cidade).val("...");
            $(uf).val("...");
            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $(rua).val(dados.logradouro);
                    $(bairro).val(dados.bairro);
                    $(cidade).val(dados.localidade);
                    $(uf).val(dados.uf);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            });

    }


    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                
                //Preenche os campos com "..." enquanto consulta webservice.
                buscaCep($("#rua"),$("#bairro"),$("#cidade"),$("#uf"),cep);
                
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
    $("#cep2").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                
                //Preenche os campos com "..." enquanto consulta webservice.
                buscaCep($("#rua2"),$("#bairro2"),$("#cidade2"),$("#uf2"),cep);
                
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

