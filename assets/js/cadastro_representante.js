window.onload = function() {
    validatePassword('password', 'password-confirm');
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
    const cpfRadio = document.getElementById("cpf");
    const cnpjRadio = document.getElementById("cnpj");
    const campoDocumento = document.getElementById("campoDocumento");

    if (cpfRadio.checked) {
        campoDocumento.removeAttribute("disabled");
        campoDocumento.setAttribute("required", "");
        campoDocumento.placeholder = 'Insira o CPF com 11 dígitos numéricos';
    
        campoDocumento.addEventListener('input', function() {
            const cpfText = campoDocumento.value;

            if (!validateCPF(cpfText)) {
                campoDocumento.setCustomValidity('O valor do CPF é inválido');  

            } else {
                campoDocumento.setCustomValidity('');
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
                campoDocumento.setCustomValidity('');
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