let msg = document.getElementById('warning-alert');
// Verificar se um parâmetro foi adicionado na URL
if (window.location.search.indexOf('erro') !== -1) {
    var parametro = new URLSearchParams(window.location.search).get('erro');
    msg.style.display = '';
    msg.textContent = parametro;
    setTimeout(() => {
        msg.style.display = "none";
    }, "3000")
}