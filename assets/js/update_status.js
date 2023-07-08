function atualizarStatus(novoStatus, representanteId) {
    let message = document.getElementById('message-status');
     setTimeout(() => {
        message.style.display = 'none';

        // Crie um formulário para enviar a requisição
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '../atualizar_status.php'; // Altere para o arquivo que irá processar a requisição

        // Crie um campo de input para o novo status
        const statusInput = document.createElement('input');
        statusInput.type = 'hidden';
        statusInput.name = 'status';
        statusInput.value = novoStatus;

        // Crie um campo de input para o ID do representante
        const representanteIdInput = document.createElement('input');
        representanteIdInput.type = 'hidden';
        representanteIdInput.name = 'id';
        representanteIdInput.value = representanteId;

        // Adicione os campos de input ao formulário
        form.appendChild(statusInput);
        form.appendChild(representanteIdInput);

        // Adicione o formulário à página e envie a requisição
        document.body.appendChild(form);
        form.submit();
        
    }, '3000')

    

    
}