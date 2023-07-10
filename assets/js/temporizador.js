window.onload = function() {
    let tempoRestante = 1 * 60; // 3 minutos em segundos
    let temporizadorElement = document.getElementById('temporizador');
    const fieldToken = document.getElementById('token');
    const enviarBtn = document.getElementById('enviar-btn');
  
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
            // alert('Tempo esgotado!');
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
                console.log(res.textContent);
                $("#resultado").html(res);
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
                            console.log(response);
                            if (response.status === 'success') {
                                window.location.href = response.redirectUrl;
                            } else if (response.status === 'error') {
                                // Trate o erro de acordo com sua necessidade
                                console.log('Erro:', response.errorMessage);
                            }
                        }
                    });


                }
                
                
            }
        });
    }
});