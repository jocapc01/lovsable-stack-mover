<div class="container">
    <h1>Novo Serviço</h1>

    <form method="POST" class="card p-4">
        <div class="form-group">
            <label>Nome do Serviço</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Preço</label>
                    <input type="number" name="preco" class="form-control" step="0.01" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Duração (minutos)</label>
                    <input type="number" name="duracao" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Serviço</button>
    </form>
</div>
