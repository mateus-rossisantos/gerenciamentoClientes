
window.onload = function() {

    // analisa o campo do CNPJ
    const cnpj = document.getElementById('cnpj'); 
    cnpj.addEventListener('input', function() {
        const cnpjText = cnpj.value;

        if (!validaCNPJ(cnpjText)){
            cnpj.setCustomValidity('Insira um CNPJ válido');
        }else{
            cnpj.setCustomValidity('');
        }  
    }); 



    // Analisa o campo do telefone 1
    const phoneInput = document.getElementById('telefone1');
    phoneInput.addEventListener('input', validateAndFormatPhone1);

    // Analisa o campo do telefone 2
    const phoneInput2 = document.getElementById('telefone2');
    phoneInput2.addEventListener('input', validateAndFormatPhone2);

}

// Validação e formatação do telefone
function validateAndFormatPhone1() {
    const phoneInput = document.getElementById('telefone1');
    const phone = phoneInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    getValidatePhone(phoneInput, phone);
}
// Validação e formatação do telefone
function validateAndFormatPhone2() {
    const phoneInput = document.getElementById('telefone2');
    const phone = phoneInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    getValidatePhone(phoneInput, phone);
}

function getValidatePhone(phoneInput, phone) {
     // Verifica o tamanho do número de telefone
     const phoneLength = phone.length;
  
     if (phoneLength >= 10 && phoneLength <= 11) {
       let formattedPhone;
   
       if (phoneLength === 10) {
         // Formatação para telefone de 10 dígitos: (XX) XXXX-XXXX
         formattedPhone = phone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
       } else {
         // Formatação para telefone de 11 dígitos: (XX) XXXXX-XXXX
         formattedPhone = phone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
       }
   
       phoneInput.value = formattedPhone;
       phoneInput.setCustomValidity('');
     } else {
       // Telefone inválido
       phoneInput.setCustomValidity('Número de telefone inválido');
     }
}


function validaCNPJ(cnpj) {
    // Remove todos os caracteres não numéricos
    cnpj = cnpj.replace(/\D/g, '');

    // Verifica se todos os dígitos são iguais (situação inválida)
    if (/^(\d)\1+$/.test(cnpj)) {
        return false;
    }

    // Verifica o tamanho do CNPJ
    if (cnpj.length !== 14) {
        return false;
    }

    // Verifica os dígitos verificadores
    var tamanho = cnpj.length - 2;
    var numeros = cnpj.substring(0, tamanho);
    var digitos = cnpj.substring(tamanho);
    var soma = 0;
    var pos = tamanho - 7;
    var resultado;

    for (var i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) {
            pos = 9;
        }
    }

    resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);

    if (resultado != digitos.charAt(0)) {
        return false;
    }

    tamanho += 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;

    for (var i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) {
            pos = 9;
        }
    }

    resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);

    if (resultado != digitos.charAt(1)) {
        return false;
    } else {
        cnpj = cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2}).*/, '$1.$2.$3/$4-$5');
        document.getElementById('cnpj').value = cnpj;
        return true;
    }

}



/*
 calc_digitos_posicoes
 
 Multiplica dígitos vezes posições
 
 @param string digitos Os digitos desejados
 @param string posicoes A posição que vai iniciar a regressão
 @param string soma_digitos A soma das multiplicações entre posições e dígitos
 @return string Os dígitos enviados concatenados com o último dígito
*/
function calc_digitos_posicoes( digitos, posicoes = 10, soma_digitos = 0 ) {

    // Garante que o valor é uma string
    digitos = digitos.toString();

    // Faz a soma dos dígitos com a posição
    // Ex. para 10 posições:
    //   0    2    5    4    6    2    8    8   4
    // x10   x9   x8   x7   x6   x5   x4   x3  x2
    //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
    for ( var i = 0; i < digitos.length; i++  ) {
        // Preenche a soma com o dígito vezes a posição
        soma_digitos = soma_digitos + ( digitos[i] * posicoes );

        // Subtrai 1 da posição
        posicoes--;

        // Parte específica para CNPJ
        // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
        if ( posicoes < 2 ) {
            // Retorno a posição para 9
            posicoes = 9;
        }
    }

    // Captura o resto da divisão entre soma_digitos dividido por 11
    // Ex.: 196 % 11 = 9
    soma_digitos = soma_digitos % 11;

    // Verifica se soma_digitos é menor que 2
    if ( soma_digitos < 2 ) {
        // soma_digitos agora será zero
        soma_digitos = 0;
    } else {
        // Se for maior que 2, o resultado é 11 menos soma_digitos
        // Ex.: 11 - 9 = 2
        // Nosso dígito procurado é 2
        soma_digitos = 11 - soma_digitos;
    }

    // Concatena mais um dígito aos primeiro nove dígitos
    // Ex.: 025462884 + 2 = 0254628842
    var cpf = digitos + soma_digitos;

    // Retorna
    return cpf;
    
}