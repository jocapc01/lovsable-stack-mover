<div class="container">
    <h1>Cadastrar Novo Usuário</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_PATH ?>/usuario/create" class="card p-4">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" required minlength="6">
        </div>

        <div class="form-group">
            <label>Tipo de Usuário</label>
            <select name="tipo_usuario" class="form-control" required>
                <option value="admin">Administrador</option>
                <option value="funcionario">Funcionário</option>
                <option value="cliente">Cliente</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
