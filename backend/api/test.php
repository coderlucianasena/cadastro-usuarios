<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    echo "Teste de conexão bem-sucedido!";
    echo "<br>Informações do PDO: ";
    print_r($db->getAttribute(PDO::ATTR_SERVER_INFO));
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}