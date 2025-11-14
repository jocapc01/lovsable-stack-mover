<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="stats">
        <div class="stat-card">
            <div class="stat-title">Total de Agendamentos</div>
            <div class="stat-value"><?= $stats['total_agendamentos'] ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Agendamentos Hoje</div>
            <div class="stat-value"><?= $stats['agendamentos_hoje'] ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total de Serviços</div>
            <div class="stat-value"><?= $stats['total_servicos'] ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total de Clientes</div>
            <div class="stat-value"><?= $stats['total_clientes'] ?></div>
        </div>
    </div>
</div>
