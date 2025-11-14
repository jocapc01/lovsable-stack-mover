<div class="container">
    <h1>Profissionais - <?= $servico['nome'] ?></h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Adicionar Profissional</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BASE_PATH ?>/servicos/add-profissional">
                        <input type="hidden" name="servico_id" value="<?= $servico['id'] ?>">
                        
                        <div class="form-group">
                            <label>Selecione o Profissional</label>
                            <select name="usuario_id" class="form-control" required>
                                <?php foreach ($profissionais as $profissional): ?>
                                    <option value="<?= $profissional['id'] ?>"><?= $profissional['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Profissionais Ativos</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($profissionaisAtivos as $profissional): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $profissional['nome'] ?>
                                <a href="<?= BASE_PATH ?>/servicos/remove-profissional/<?= $servico['id'] ?>/<?= $profissional['id'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Tem certeza?')">
                                    Remover
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
