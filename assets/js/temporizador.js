window.onload = function() {
    let tempoRestante = 3 * 60; // 3 minutos em segundos
    let temporizadorElement = document.getElementById('temporizador');
    const fieldToken = document.getElementById('token');
    const enviarBtn = document.getElementById('enviar-btn');
    let title = document.getElementById('title');

    let spanMessage = document.getElementById('resultado');
    let warningMessage = document.getElementById('msm-warning');
        spanMessage.style.display = ''
        spanMessage.textContent = 'O código foi enviado ao celular informado.'
        setTimeout(() => {
            spanMessage.style.display = "none";
        }, "3000")
  
    function atualizarTemporizador() {
        if (tempoRestante > 0) {
            let minutos = Math.floor(tempoRestante / 60);
            let segundos = tempoRestante % 60;
            temporizadorElement.textContent = minutos.toString().padStart(2, '0') + ':' + segundos.toString().padStart(2, '0');
            tempoRestante--;
            setTimeout(atualizarTemporizador, 1000); // atualizar a cada segundo (1000ms)
        } else {
            fieldToken.disabled = true;
            enviarBtn.disabled = true;
            title.textContent = 'Retorne ao menu anterior';
            temporizadorElement.style.display = 'none';
            warningMessage.textContent = 'Código expirado!';
            warningMessage.style.display = '';
            setTimeout(() => {
                warningMessage.style.display = 'none';
            }, "3000")

        }
    }
  
    atualizarTemporizador();
};



$(document).ready(function() {
    $("#enviar-btn").click(function(event) {
      event.preventDefault();

      let codigo = $("#token").val();
      verificarCodigo(codigo);
    });

    function verificarCodigo(codigo) {
        const user = document.getElementById('token');
        const id = user.dataset.id;

        $.ajax({
            url: "../check_token.php",
            type: "POST",
            data: {
                codigo: codigo,
                usuario: id
            },
            
            success: function(response) {
                let res = JSON.parse(response)
                $("#resultado").html('res');
                if (res == 'Success') {
                    $.ajax({
                        url: "../check_token1.php",
                        type: "POST",
                        data: {
                            status: '200',
                            userId: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            
                            if (response.status === 'success') {
                                window.location.href = response.redirectUrl;
                            } 
                        }
                    });

                } else{
                    let warningMessage = document.getElementById('msm-warning');
                    warningMessage.style.display = '';
                    $("#msm-warning").html(res);
                    setTimeout(() => {
                        warningMessage.style.display = 'none';
                    }, "2000")
                }
                
                
            }
        });
    }
});