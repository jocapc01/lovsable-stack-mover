<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistema de Agendamentos</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="<?= BASE_URL ?>/auth/login">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
