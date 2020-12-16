<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinindo senha</title>
</head>
<body>
    <h3>Redefinindo sua senha</h3>

    <p>Clique no link abaixo para redefinir a sua senha !</p>

    <a href="<?= base_url() . '/redefinir/'. $codigo; ?>">redefinir senha</a>
</form>
</body>
</html>