// app.js - Código JavaScript para o sistema de agendamentos multi-loja

document.addEventListener('DOMContentLoaded', function() {
    // Inicializa funcionalidades do sistema após o carregamento da página

    // Exemplo de manipulação de eventos para agendamentos
    const appointmentForm = document.getElementById('appointment-form');
    if (appointmentForm) {
        appointmentForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Lógica para enviar o formulário de agendamento via AJAX
            submitAppointmentForm();
        });
    }

    // Função para enviar o formulário de agendamento
    function submitAppointmentForm() {
        const formData = new FormData(appointmentForm);
        fetch('/api/appointments', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Agendamento realizado com sucesso!');
                // Redirecionar ou atualizar a interface conforme necessário
            } else {
                alert('Erro ao realizar agendamento: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao processar seu agendamento.');
        });
    }

    // Exemplo de função para carregar serviços disponíveis
    function loadServices() {
        fetch('/api/services')
            .then(response => response.json())
            .then(data => {
                const servicesList = document.getElementById('services-list');
                servicesList.innerHTML = '';
                data.services.forEach(service => {
                    const listItem = document.createElement('li');
                    listItem.textContent = service.name + ' - ' + service.price;
                    servicesList.appendChild(listItem);
                });
            })
            .catch(error => console.error('Erro ao carregar serviços:', error));
    }

    // Chama a função para carregar serviços ao iniciar
    loadServices();
});