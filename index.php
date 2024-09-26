<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a emoção foi definida e se é uma das emoções válidas
    $valid_emotions = ['tristeza', 'medo', 'raiva'];

    if (isset($_POST['emotion']) && in_array($_POST['emotion'], $valid_emotions)) {
        $emotion = $_POST['emotion'];

        // Redireciona para a página correspondente
        switch ($emotion) {
            case 'tristeza':
                header('Location: tristeza.php');
                exit();
            case 'medo':
                header('Location: medo.php');
                exit();
            case 'raiva':
                header('Location: raiva.php');
                exit();
        }
    } else {
        // Redireciona para uma página de erro ou a página inicial se a emoção não for válida
        header('Location: erro.php'); // Certifique-se de criar uma página de erro
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
