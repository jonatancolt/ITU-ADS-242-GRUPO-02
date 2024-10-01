<?php
$senha = 'senha123'; // Defina aqui a senha que você deseja usar
$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
echo $senha_hashed;
?>
