$(document).ready(function() {

    $('.btn-novo').click(function(e){
        e.preventDefault()

        //Limpar todas as informações já existentes em nossa modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        //Incluir novos textos no cabeçalho da minha janela modal
        $('.modal-title').append('Adicionar novo registro')

        //Incluir nosso formulário dentro do corpo da nossa janela modal
        $('.modal-body').load('src/tipo/visao/form-tipo.html')

        //Abrir a janela modal
        $('#modal-tipo').modal('show')
    })

})