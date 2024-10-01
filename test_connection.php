<?php
$hostname = "localhost";
$bancodedados = "clientes"; // Certifique-se de que este banco de dados existe
$usuario = "root"; // O usuário padrão do XAMPP é 'root'
$senha = ""; // Normalmente, o root não tem senha no XAMPP

// Criação da conexão
$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

// Verifica se houve erro na conexão
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit(); // Sair se a conexão falhar
} else {
    echo "Conexão bem-sucedida!"; // Mensagem de sucesso
}

// Aqui você pode adicionar mais lógica para trabalhar com o banco de dados

// Fechar a conexão ao final
$mysqli->close();
?>
