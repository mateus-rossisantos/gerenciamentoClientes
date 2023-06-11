window.onload = function() {
    validatePassword('password', 'password-confirm');
    showField();
}

function validatePassword(idPass1, idPass2) {
    const passwordInput = document.getElementById(idPass1);
    const confirmPasswordInput = document.getElementById(idPass2);

    // Adiciona um evento de escuta ao campo de confirmação de senha
    confirmPasswordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            confirmPasswordInput.setCustomValidity('As senhas não correspondem');

        } else {
            confirmPasswordInput.setCustomValidity('');

        }
    });
}


const phoneInput = document.getElementById('telefone');
phoneInput.addEventListener('input', function() {
    const phone = phoneInput.value;
    const telefoneFormatado = formatPhone(phone);
    
    phoneInput.value = telefoneFormatado;
});

// formatação do telefone
function formatPhone(phone) {
    // Remove caracteres não numéricos
    phone = phone.replace(/\D/g, '');
  
    // Verifica o tamanho do número de telefone
    var phoneLength = phone.length;
    
    if (phoneLength === 11) {
        phone = phone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    } else if (phoneLength === 10) {
        phone = phone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
    }
  
    return phone;
}

// analisa o campo do CPF e do CNPJ
function showField() {
    const cpfRadio = document.getElementById('cpf');
    const cnpjRadio = document.getElementById('cnpj');
    const campoDocumento = document.getElementById('campoDocumento');
    campoDocumento.setAttribute('disabled', 'disabled');

    if (cpfRadio.checked) {
        campoDocumento.removeAttribute("disabled");
        campoDocumento.setAttribute("required", "");
        campoDocumento.placeholder = 'Insira o CPF com 11 dígitos numéricos';
    
        campoDocumento.addEventListener('input', function() {
            const cpfText = campoDocumento.value;

            if (!validateCPF(cpfText)) {
                campoDocumento.setCustomValidity('O valor do CPF é inválido');  

            } else {
                if (!valida_cpf(cpfText)){
                    campoDocumento.setCustomValidity('Este CPF é falso');
                }else{
                    campoDocumento.setCustomValidity('');

                }
            }
        });

    } else if (cnpjRadio.checked) {
        campoDocumento.removeAttribute("disabled");
        campoDocumento.setAttribute("required", "");
        campoDocumento.placeholder = 'Insira o CNPJ com 14 dígitos numéricos';
    
        campoDocumento.addEventListener('input', function() {
            const cnpjText = campoDocumento.value;

            if (!validateCNPJ(cnpjText)) {
                campoDocumento.setCustomValidity('O valor do CNPJ é inválido');

            } else {
                if (!valida_cnpj(cnpjText)){
                    campoDocumento.setCustomValidity('Este CNPJ é falso');
                }else{
                    campoDocumento.setCustomValidity('');

                }
            }
        });
    } 
}


function validateCPF(cpf) {
    // Remove caracteres não numéricos
    cpf = cpf.replace(/[^\d]+/g, ''); 
  
    if (cpf.length !== 11) {
        return false;

    } else if (/^(\d)\1+$/.test(cpf)) { // todos dígitos iguais
        return false;

    } else return true;
}


function validateCNPJ(cnpj) {
    // Remove caracteres não numéricos
    cnpj = cnpj.replace(/\D/g, '');
  
    if (cnpj.length !== 14) {
        return false;

    } else if (/^(\d)\1+$/.test(cnpj)) {
        return false;

    } else return true;
}

/*
 Valida CPF
 
 Valida se for CPF
 
 @param  string cpf O CPF com ou sem pontos e traço
 @return bool True para CPF correto - False para CPF incorreto
*/
function valida_cpf( valor ) {

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');


    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    var digitos = valor.substr(0, 9);

    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    var novo_cpf = calc_digitos_posicoes( digitos );

    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    var novo_cpf = calc_digitos_posicoes( novo_cpf, 11 );

    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if ( novo_cpf === valor ) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        return false;
    }
    
} // valida_cpf

/*
 valida_cnpj
 
 Valida se for um CNPJ
 
 @param string cnpj
 @return bool true para CNPJ correto
*/
function valida_cnpj ( valor ) {

    // Garante que o valor é uma string
    valor = valor.toString();
    
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');

    
    // O valor original
    var cnpj_original = valor;

    // Captura os primeiros 12 números do CNPJ
    var primeiros_numeros_cnpj = valor.substr( 0, 12 );

    // Faz o primeiro cálculo
    var primeiro_calculo = calc_digitos_posicoes( primeiros_numeros_cnpj, 5 );

    // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
    var segundo_calculo = calc_digitos_posicoes( primeiro_calculo, 6 );

    // Concatena o segundo dígito ao CNPJ
    var cnpj = segundo_calculo;

    // Verifica se o CNPJ gerado é idêntico ao enviado
    if ( cnpj === cnpj_original ) {
        return true;
    }
    
    // Retorna falso por padrão
    return false;
    
} // valida_cnpj

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
    
} // calc_digitos_posicoes

function tela_edita_rep() {
    
    window.location.href='../views/tela_edita_rep.php';
}