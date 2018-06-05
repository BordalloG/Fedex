$("#usuarios" ).addClass( "active" );

$(".excluir").click(function(){
    var id=($(this).attr('id'));
    console.log(id);
    $('.mini.modal').modal('show');
    $('#codigoD').val(id);
})

$(".adicionar").click(function(){
    $('.header').html("Adicionar Usuário");
    $('.modal-adicionar').modal('show');
})

$(".edit").click(function(){
    var id=($(this).attr('id'));
    id=-id;
    $('.modal-adicionar').modal('show');
    $('.header').html("Editar Usuário");
    $('#codigo').val(id);
});