<?php
session_start(); // Iniciar a sessão no início de cada página que utilizará sessões

$hostname = "localhost";
$bancodedados = "clientes"; // Certifique-se de que este é o nome correto do seu banco de dados
$usuario = "root"; // Verifique se 'root' é o nome de usuário correto
$senha = ""; // Se você definiu uma senha, coloque aqui. Caso contrário, mantenha vazio.

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit(); // Para sair caso a conexão falhe
}

function registrarUsuario($email, $senha) {
    global $mysqli;

    // Verificar se o email já está cadastrado
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return ["success" => false, "message" => "Email já cadastrado."];
    }

    // Hash da senha e inserir novo usuário
    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
    $stmt->bind_param('ss', $email, $senha_hashed);
    
    if ($stmt->execute()) {
        return ["success" => true, "message" => "Usuário registrado com sucesso."];
    } else {
        return ["success" => false, "message" => "Erro ao registrar usuário: " . $stmt->error];
    }
}

function loginUsuario($email, $senha) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT senha FROM usuarios WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            // Senha correta, iniciar sessão
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email; // Você pode salvar mais dados conforme necessário
            return ["success" => true, "message" => "Login bem-sucedido."];
        } else {
            return ["success" => false, "message" => "Senha incorreta."];
        }
    }

    return ["success" => false, "message" => "Usuário não encontrado."];
}

// Fechar a conexão ao final do script
register_shutdown_function(function() {
    global $mysqli;
    $mysqli->close();
});
?>
