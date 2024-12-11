<?php
// Habilitar exibição de erros detalhados
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Logs para depuração
error_log("Método recebido: " . $_SERVER['REQUEST_METHOD']);
error_log("Dados recebidos: " . file_get_contents("php://input"));

// Tratamento para o método OPTIONS (preflight CORS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

// Incluir arquivo de conexão com o banco de dados
include_once '../config/database.php';

// Obter o método da requisição
$method = $_SERVER['REQUEST_METHOD'];

try {
    // Instanciar conexão com o banco
    $database = new Database();
    $db = $database->getConnection();

    // Ler o conteúdo da requisição
    $input = file_get_contents("php://input");
    $data = json_decode($input);

    // Verificar se o JSON é válido
    if ($input && json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON inválido");
    }

    // Processar a requisição com base no método HTTP
    switch($method) {
        case 'GET':
            $sql = "SELECT * FROM users";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($users);
            break;
        
        case 'POST':
            if (!isset($data->name) || !isset($data->email)) {
                throw new Exception("Dados incompletos");
            }
            $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $data->name);
            $stmt->bindParam(':email', $data->email);
            if($stmt->execute()) {
                echo json_encode(["message" => "Usuário criado com sucesso."]);
            } else {
                throw new Exception("Não foi possível criar o usuário.");
            }
            break;
        
        case 'PUT':
            if (!isset($data->id) || !isset($data->name) || !isset($data->email)) {
                throw new Exception("Dados incompletos");
            }
            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $data->id);
            $stmt->bindParam(':name', $data->name);
            $stmt->bindParam(':email', $data->email);
            if($stmt->execute()) {
                echo json_encode(["message" => "Usuário atualizado com sucesso."]);
            } else {
                throw new Exception("Não foi possível atualizar o usuário.");
            }
            break;
        
        case 'DELETE':
            if (!isset($data->id)) {
                throw new Exception("ID do usuário não fornecido");
            }
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $data->id);
            if($stmt->execute()) {
                echo json_encode(["message" => "Usuário excluído com sucesso."]);
            } else {
                throw new Exception("Não foi possível excluir o usuário.");
            }
            break;

        default:
            throw new Exception("Método não suportado");
    }

} catch (Exception $e) {
    error_log("Erro: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}

// Log do resultado da operação
error_log("Operação concluída para o método: " . $method);