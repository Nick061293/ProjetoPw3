$(document).ready(function() {
    $('.btn-save').click(function(e) {
        e.preventDefault()

        let dados = $('#form-eixo').serialize()

        dados += `&op=${$('.btn-save'.attr('data-op'))}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: '../modelo/save-eixo.php',
            success: function(dados) {
                Swal.file({
                    title: 'ProjetoPW3',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })
                $('#modal-eixo').modal('hide')
            }
        })
    })
})