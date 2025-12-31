<?php
// Configuração de erros (apenas para desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Verificação da sessão da etapa 1
$etapa1Completa = isset(
    $_SESSION['cpf_usuario'],
    $_SESSION['email_usuario'],
    $_SESSION['senha_usuario']
);

if (!$etapa1Completa) {
    header('Location: /projeto-tech-company/src/View/cadastro.php');
    exit;
}

require $_SERVER['DOCUMENT_ROOT'] . "/projeto-tech-company/src/Model/db.php";

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização e validação dos inputs
    $nome = filter_input(INPUT_POST, 'campo_nome_usuario', FILTER_SANITIZE_STRING);
    $cnpj = preg_replace('/[^0-9]/', '', $_POST['campo_cnpj'] ?? '');
    $telefone = preg_replace('/[^0-9]/', '', $_POST['campo_telefone'] ?? '');
    
    // Validações
    if (empty($nome) || empty($cnpj) || empty($telefone)) {
        $erro = 'Todos os campos são obrigatórios.';
    } elseif (strlen($cnpj) !== 14) {
        $erro = 'CNPJ deve conter 14 dígitos.';
    } elseif (strlen($telefone) < 10) {
        $erro = 'Telefone inválido.';
    } else {
        try {
            // Verifica se CNPJ já existe
            $stmt = $conn->prepare("
                SELECT id_usuario 
                FROM usuario 
                WHERE cnpj_usuario = ?
            ");
            $stmt->bind_param('s', $cnpj);
            $stmt->execute();
            
            if ($stmt->get_result()->num_rows > 0) {
                $erro = 'CNPJ já cadastrado no sistema.';
            } else {
                // Hash da senha (boas práticas de segurança)
                $senhaHash = password_hash($_SESSION['senha_usuario'], PASSWORD_DEFAULT);
                
                // Inserção com campos corretos
                $stmt = $conn->prepare("
                    INSERT INTO usuario (
                        cpf_usuario,
                        cnpj_usuario,
                        email_usuario,
                        telefone_usuario,
                        nome_usuario,
                        senha_usuario,
                        data_cadastro
                    ) VALUES (?, ?, ?, ?, ?, ?, NOW())
                ");
                
                $stmt->bind_param(
                    'ssssss',
                    $_SESSION['cpf_usuario'],
                    $cnpj,
                    $_SESSION['email_usuario'],
                    $telefone,
                    $nome,
                    $senhaHash
                );
                
                if ($stmt->execute()) {
                    // Limpa dados sensíveis da sessão
                    unset(
                        $_SESSION['cpf_usuario'],
                        $_SESSION['email_usuario'],
                        $_SESSION['senha_usuario']
                    );
                    
                    // Redireciona para login
                    header('Location: /projeto-tech-company/src/View/login.php');
                    exit;
                } else {
                    $erro = 'Erro ao cadastrar. Tente novamente.';
                }
            }
            
            $stmt->close();
        } catch (Exception $e) {
            $erro = 'Erro no servidor. Tente mais tarde.';
            // Em produção, logar o erro: error_log($e->getMessage());
        }
    }
}
?>

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
                <label>E-mail: </label>
                <input type="email" name="campo-email" id="campo-email" placeholder="E-mail: " required>
                <label>Senha: </label>
                <input type="password" name="campo-senha" id="campo-senha" placeholder="Senha: " required>

                <button type = "submit">Finalizar cadastro</button>
            </form>
            <a href="/projeto-tech-company/src/View/cadastro.php">Voltar</a>
        </main>
    </section>
</body>
</html>