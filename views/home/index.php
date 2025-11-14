<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>
    <h1>Bem-vindo ao Sistema de Agendamentos</h1>
    <div class="container">
        <section class="hero">
            <div class="card">
                <h1>Sistema de Agendamentos Multi-lojas</h1>
                <p>Gerencie sua loja, serviços e agendamentos de forma simples e eficiente.</p>
                
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <div class="actions">
                        <a href="<?= BASE_PATH ?>/auth/login" class="btn btn-primary">Login</a>
                        <a href="<?= BASE_PATH ?>/loja/create" class="btn btn-secondary">Cadastrar Loja</a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="features">
            <h2>Recursos</h2>
            <div class="grid">
                <div class="card">
                    <h3>Gestão de Serviços</h3>
                    <p>Cadastre e gerencie todos os serviços oferecidos.</p>
                </div>
                <div class="card">
                    <h3>Agendamentos Online</h3>
                    <p>Seus clientes podem agendar horários 24/7.</p>
                </div>
                <div class="card">
                    <h3>Dashboard</h3>
                    <p>Acompanhe o desempenho do seu negócio.</p>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
