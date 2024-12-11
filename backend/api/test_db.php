<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    echo "Conexão com o banco de dados bem-sucedida!<br>";
    
    // Testar uma consulta simples
    $query = "SELECT 1";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Consulta de teste executada com sucesso. Resultado: " . print_r($result, true);

} catch (Exception $e) {
    echo "Erro de conexão: " . $e->getMessage();
}