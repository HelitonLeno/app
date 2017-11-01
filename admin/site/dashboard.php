<?php
include_once '../app/DB.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!$user->estaLogado()) {
    $user->redirecionar('../index.php');
}

session_destroy();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="../res/style.css" type="text/css">
</head>
<body>
<div class="container">
    <h1 class="right">AQUI SERA PAGINA DE ADMIN</h1>
</div>
</body>
</html>
