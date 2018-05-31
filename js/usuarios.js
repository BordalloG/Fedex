$("#usuarios" ).addClass( "active" );

$(".excluir").click(function(){
    $('.mini.modal').modal('show');
})

$(".adicionar").click(function(){
    $('.header').html("Adicionar Usuário");
    $('.modal-adicionar').modal('show');
})

$(".edit").click(function(){
    var id=($(this).attr('id'));
    console.log(id);
    $('.modal-adicionar').modal('show');
    $('.header').html("Editar Usuário");
    $('#codigo').val(id);
    

});