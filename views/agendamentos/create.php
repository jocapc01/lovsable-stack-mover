<div class="container">
    <h1>Novo Agendamento</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" class="card p-4">
        <div class="form-group">
            <label>Serviço</label>
            <select name="servico_id" class="form-control" required>
                <?php foreach ($servicos as $servico): ?>
                    <option value="<?= $servico['id'] ?>">
                        <?= $servico['nome'] ?> - R$ <?= number_format($servico['preco'], 2, ',', '.') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Profissional</label>
            <select name="funcionario_id" class="form-control" required>
                <?php foreach ($funcionarios as $funcionario): ?>
                    <option value="<?= $funcionario['id'] ?>"><?= $funcionario['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Data</label>
            <input type="date" name="data" class="form-control" required min="<?= date('Y-m-d') ?>">
        </div>

        <div class="form-group">
            <label>Horário</label>
            <select name="hora" class="form-control" required>
                <?php for($h = 8; $h <= 18; $h++): ?>
                    <option value="<?= str_pad($h, 2, '0', STR_PAD_LEFT) ?>:00">
                        <?= str_pad($h, 2, '0', STR_PAD_LEFT) ?>:00
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agendar</button>
    </form>
</div>
