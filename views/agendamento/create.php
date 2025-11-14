<!DOCTYPE html>
<html>
<head>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <style>
        .horarios-container {
            display: none;
            margin-top: 20px;
        }
        .horario-btn {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
        }
        .horario-btn.disponivel {
            background: #e3f2fd;
        }
        .horario-btn.indisponivel {
            background: #ffebee;
            cursor: not-allowed;
            opacity: 0.5;
        }
        #calendario {
            margin: 20px 0;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Novo Agendamento</h1>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Serviço</label>
                    <select id="servico" class="form-control" onchange="atualizarCalendario()">
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?= $servico['id'] ?>" data-duracao="<?= $servico['duracao'] ?>">
                                <?= $servico['nome'] ?> (<?= $servico['duracao'] ?>min)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Profissional</label>
                    <select id="funcionario" class="form-control" onchange="atualizarCalendario()">
                        <?php foreach ($funcionarios as $funcionario): ?>
                            <option value="<?= $funcionario['id'] ?>"><?= $funcionario['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-8">
                <div id="calendario"></div>
                
                <div id="horarios" class="horarios-container">
                    <h3>Horários Disponíveis</h3>
                    <div id="lista-horarios"></div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/pt-br.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                selectable: true,
                select: function(info) {
                    buscarHorariosDisponiveis(info.startStr);
                },
                selectConstraint: {
                    start: new Date().toISOString().split('T')[0],
                },
                validRange: {
                    start: new Date()
                }
            });
            calendar.render();
        });

        function buscarHorariosDisponiveis(data) {
            const servicoId = document.getElementById('servico').value;
            const funcionarioId = document.getElementById('funcionario').value;
            
            fetch(`${BASE_PATH}/agendamento/horarios-disponiveis?data=${data.toISOString()}&servico_id=${servicoId}&funcionario_id=${funcionarioId}`)
                .then(response => response.json())
                .then(horarios => {
                    mostrarHorarios(horarios);
                });
        }

        function mostrarHorarios(horarios) {
            const container = document.getElementById('horarios');
            const lista = document.getElementById('lista-horarios');
            container.style.display = 'block';
            
            lista.innerHTML = horarios.map(horario => `
                <button class="horario-btn ${horario.disponivel ? 'disponivel' : 'indisponivel'}"
                        onclick="selecionarHorario('${horario.hora}')"
                        ${!horario.disponivel ? 'disabled' : ''}>
                    ${horario.hora}
                </button>
            `).join('');
        }

        function selecionarHorario(hora) {
            const servicoId = document.getElementById('servico').value;
            const funcionarioId = document.getElementById('funcionario').value;
            
            // Enviar formulário de agendamento
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `${BASE_PATH}/agendamento/create`;
            
            const campos = {
                servico_id: servicoId,
                funcionario_id: funcionarioId,
                data: document.querySelector('.fc-highlight').getAttribute('data-date'),
                hora: hora
            };
            
            Object.keys(campos).forEach(key => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = campos[key];
                form.appendChild(input);
            });
            
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
