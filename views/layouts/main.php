<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistema de Agendamentos' ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/style.css">
</head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <div class="wrapper">
            <aside class="sidebar">
                <div class="sidebar-brand">
                    <h2>Agendamentos</h2>
                </div>
                <nav class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="<?= BASE_PATH ?>/dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_PATH ?>/agendamentos">
                                <i class="far fa-calendar-alt"></i> Agendamentos
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_PATH ?>/servicos">
                                <i class="fas fa-cut"></i> Serviços
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_PATH ?>/usuarios">
                                <i class="fas fa-users"></i> Usuários
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_PATH ?>/configuracoes">
                                <i class="fas fa-cog"></i> Configurações
                            </a>
                        </li>
                        <li>
                            <a href="<?= BASE_PATH ?>/auth/logout">
                                <i class="fas fa-sign-out-alt"></i> Sair
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <main class="content">
                <?= $content ?>
            </main>
        </div>
    <?php else: ?>
        <?= $content ?>
    <?php endif; ?>
</body>
</html>
