<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Agendamentos Multi-Loja'; ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
    <header>
        <h1>Agendamentos Multi-Loja</h1>
        <nav>
            <ul>
                <li><a href="/">Início</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Registrar Loja</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Agendamentos Multi-Loja. Todos os direitos reservados.</p>
    </footer>

    <script src="/assets/js/app.js"></script>
</body>
</html>