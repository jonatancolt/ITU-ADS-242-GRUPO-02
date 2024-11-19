<?php
session_start(); // Inicia a sessão

// Limpa todos os dados da sessão
session_unset(); 

// Destroi a sessão
session_destroy(); 

// Redireciona o usuário para a página de login
header("Location: index.php");
exit();
?>
