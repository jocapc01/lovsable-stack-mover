<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Agendamentos</h1>
        <a href="<?= BASE_PATH ?>/agendamentos/create" class="btn btn-primary">Novo Agendamento</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Profissional</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agendamentos as $agendamento): ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($agendamento['data'])) ?></td>
                        <td><?= $agendamento['hora'] ?></td>
                        <td><?= $agendamento['cliente_nome'] ?></td>
                        <td><?= $agendamento['servico_nome'] ?></td>
                        <td><?= $agendamento['funcionario_nome'] ?></td>
                        <td>
                            <span class="badge badge-<?= $agendamento['status'] === 'confirmado' ? 'success' : ($agendamento['status'] === 'cancelado' ? 'danger' : 'warning') ?>">
                                <?= ucfirst($agendamento['status']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($agendamento['status'] === 'pendente'): ?>
                                <a href="<?= BASE_PATH ?>/agendamentos/confirmar/<?= $agendamento['id'] ?>" class="btn btn-sm btn-success">Confirmar</a>
                                <a href="<?= BASE_PATH ?>/agendamentos/cancelar/<?= $agendamento['id'] ?>" class="btn btn-sm btn-danger">Cancelar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
