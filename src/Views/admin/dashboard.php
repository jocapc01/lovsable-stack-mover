<?php
// dashboard.php

require_once '../../Controllers/AdminController.php';

$adminController = new AdminController();
$reports = $adminController->getReports(); // Método fictício para obter relatórios

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/app.css">
    <title>Painel Administrativo</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Painel Administrativo</h1>
            <nav>
                <ul>
                    <li><a href="/admin/dashboard.php">Dashboard</a></li>
                    <li><a href="/admin/stores.php">Gerenciar Lojas</a></li>
                    <li><a href="/admin/reports.php">Relatórios</a></li>
                    <li><a href="/logout.php">Sair</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Relatórios</h2>
            <div class="reports">
                <?php if (!empty($reports)): ?>
                    <ul>
                        <?php foreach ($reports as $report): ?>
                            <li><?php echo htmlspecialchars($report); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Nenhum relatório disponível.</p>
                <?php endif; ?>
            </div>
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> Agendamentos Multi-Loja</p>
        </footer>
    </div>
    <script src="/assets/js/app.js"></script>
</body>
</html>