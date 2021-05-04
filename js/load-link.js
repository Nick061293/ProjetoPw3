$(document).ready(function() {
    $('.nav-link').click(function(e) {
        e.preventDefault();
        //pegar o link
        let url = $(this).attr('href')
            //limpar a div
        $('#conteudo').empty()
        $('#conteudo').load('url')
    })
})