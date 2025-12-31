<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Cadastro</title>
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

    <section>
        <main>
            <h1>Complete as informações abaixo: </h1>

            <form method="post" autocomplete="off">
                <label>Nome do usuário: </label>
                <input type="text" name="campo_nome_usuario" id="campo_nome_usuario" placeholder="Nome: " required>
                <label>CNPJ: </label>
                <input type="text" name="campo_cnpj" id="campo_cnpj" placeholder="CNPJ: " required>
                <label>Telefone: </label>
                <input type="number" name="campo_telefone" id="campo_telefone" placeholder="Telefone: " required>

                <button type="submit">Cadastrar</button>
            </form>
        </main>
    </section>
</body>
</html>