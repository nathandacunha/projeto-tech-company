<?php


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <section id = "navbar_mobile">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Tech Company</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
    </section>

   <div class="boas_vindas">
        <h1>Bem-vindo(a) de volta!</h1>
   </div>

   <section id = "formulario_login_mobile">
        <main>
            <div class="container">
                <form method="post">
                    <label>CPF</label>
                    <input type="number" name = "campo_cpf" id = "campo_email" placeholder="CPF: " required>

                    <label>E-mail</label>
                    <input type="email" name="campo_email" id="campo_email" placeholder = "E-mail: " required>

                    <label>Senha</label>
                    <input type="password" name="campo_senha" id="campo_senha" placeholder = "Senha: " required>

                    <a href="#">Esqueci a senha</a>
                    <a href="/projeto-tech-company/src/View/cadastro.php">Não tem conta?</a>

                    <button type="submit">Entrar</button>
                </form>
            </div>
        </main>
    </section>
</body>
</html>