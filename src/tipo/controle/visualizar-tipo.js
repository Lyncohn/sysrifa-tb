$(document).ready(function(){
    $('#table-tipo').on('click', 'button.btn-view', function(e) {
        e.preventDefault();

        //Limpar todas as informações já existentes em nossa modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        //Incluir novos textos no cabeçalho da minha janela modal
        $('.modal-title').append('Visualizar registro')

        let ID = `ID=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: ID,
            url: 'src/tipo/modelo/visualizar-tipo.php',
            success: function(dado) {
                if(dado.tipo == 'success'){
                    $('.modal-body').load('src/tipo/visao/form-tipo.html', function() {
                        $('#NOME').val(dado.dados.NOME)
                        $('#NOME').attr('readyonly', 'true')
                    })
                    $('.btn-salvar').hide()
                    $('#modal-tipo').modal('show')
                }else {
                    Swal.fire({
                        title: 'Sistemas de Rifas',
                        text: dados.mensagem,
                        icon: dados.tipo,
                        confirmButtonText: 'OK'
                    })
                }
            }
        })
    })
})