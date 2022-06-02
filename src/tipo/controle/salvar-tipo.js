$(document).ready(function() {

    $('.btn-salvar').click(function (e) {
        e.preventDefault()

        let dados = $('#form-tipo').seriaize()

        dados += `&operacao=${$('.btn-salvar').attr('data-operational')}`
    
        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/tipo/modelo/salvar-tipo.php',
            success: function(dados) {
                
            }
        })

    })

})