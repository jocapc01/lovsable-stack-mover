<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Serviços</h1>
        <a href="<?= BASE_PATH ?>/servicos/create" class="btn btn-primary">Novo Serviço</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Duração</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servicos as $servico): ?>
                <tr>
                    <td><?= $servico['nome'] ?></td>
                    <td><?= $servico['descricao'] ?></td>
                    <td>R$ <?= number_format($servico['preco'], 2, ',', '.') ?></td>
                    <td><?= $servico['duracao'] ?> min</td>
                    <td>
                        <a href="<?= BASE_PATH ?>/servicos/edit/<?= $servico['id'] ?>" class="btn btn-sm btn-info">Editar</a>
                        <a href="<?= BASE_PATH ?>/servicos/delete/<?= $servico['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
