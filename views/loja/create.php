<div class="container">
    <h1>Cadastrar Nova Loja</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_PATH ?>/loja/create">
        <div class="form-group">
            <label>Nome da Loja</label>
            <input type="text" name="nome" required class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Loja</button>
    </form>
</div>
