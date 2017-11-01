<?php
if (!isset($_SESSION)) {
    session_start();
}

$host = 'localhost';
$usuario = 'root';
$senha = '';
$nome_banco = 'futebol';

try {
    $conn = new PDO("mysql:host={$host};dbname={$nome_banco}", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    $e->getMessage(); //em producao comentar linha
}

include_once('User.php');

$user = new User($conn);
