$(document).ready(() => {
    $('#navegacao1').click( function() {
        $('#pagina').load('servicos.html')
    })

    $('#navegacao2').on('click', () => {
        $('#pagina').load('sobre.html')
    })

    $('#navegacao3').on('click', () => {
        $('#pagina').load('ajuda.html')
    })

    $('#link1').addClass('ativo')

    $('#link2').on('click', ()=> {
        $('#link1').removeClass('ativo')
        $('#link4').removeClass('ativo')
        $('#link5').removeClass('ativo')
        $('#link2').addClass('ativo')
    })

    $('#link4').on('click', ()=> {
        $('#link1').removeClass('ativo')
        $('#link2').removeClass('ativo')
        $('#link5').removeClass('ativo')
        $('#link4').addClass('ativo')
    })

    $('#link5').on('click', ()=> {
        $('#link1').removeClass('ativo')
        $('#link2').removeClass('ativo')
        $('#link4').removeClass('ativo')
        $('#link5').addClass('ativo')
    })
    

    $('#enviar').on('click', ()=> {

        $('#load').html('<img class="mb-3" src="visual/icons8-loading-circle.gif" alt="" width="30px" height="30px">')
        
        var nome  = $('#nome').val()
        var email = $('#email').val()

        if(email.length > 10) {
            $.ajax({
                type: "GET",
                url: "sendmail.php", /* endereço do script PHP */
                data: `nome=${nome}&email=${email}`,
                success: function(data) { /* sucesso */
                    $('#load').html('<span class = "d-inline-block text-success ps-3"><i class="fa-solid fa-check"></i> Email enviado com sucesso!</span>')
                },
                error: erro => {
                    $('#load').html('<span class = "d-inline-block text-danger ps-3"><i class="fa-solid fa-xmark"></i> Problema ao enviar email!</span>')
                }
            });
        } else {
            $('#load').html('<span class = "d-inline-block text-danger ps-3"><i class="fa-solid fa-xmark"></i> Digite um email valido!</span>')
        }
        
    })
   
})