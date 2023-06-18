let select = document.querySelectorAll('#statusSelect');
let message = document.getElementById('message-status');

$(select).on('change', function() {
    var selectedValue = $(this).val();
    var spanId = $(this).closest('td').find('span').attr('id');

    $.ajax({
        url: '../update_status_client.php',
        type: 'POST',
        data: { 
            status: selectedValue,
            spanId: spanId
        },
        success: function(response) {
            message.style.display = "";
            message.textContent = response;

            setTimeout(() => {
                message.style.display = "none";
            }, "3000")
        },
        error: function(xhr, status, error) {
            console.log('Ocorreu um erro: ' + error);
        }
    });
});

