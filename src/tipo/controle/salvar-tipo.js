$(document).ready(function() {

    $('.btn-salvar').click(function (e) {
        e.preventDefault()

        let dados = $('#form-tipo').seriaize()

        dados += `&operacao=${$('.btn-salvar').attr('data-operation')}`
    
        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/tipo/modelo/salvar-tipo.php',
            success: function(dados) {
                Swal.fire({
                    title: 'SysRifa',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-tipo').moldal('hide')
            }
        })

    })

})