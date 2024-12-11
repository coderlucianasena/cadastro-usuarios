<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    echo "Conexão bem-sucedida!<br>";
    echo "Versão do servidor: " . $db->getAttribute(PDO::ATTR_SERVER_VERSION) . "<br>";
    echo "Informações de conexão: " . $db->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "<br>";
} catch (Exception $e) {
    echo "Erro de conexão: " . $e->getMessage() . "<br>";
}

// Teste de conexão direta ao MySQL
try {
    $conn = mysqli_connect("localhost", "root", "", "cadastro_usuarios", 3307);
    if (!$conn) {
        throw new Exception(mysqli_connect_error());
    }
    echo "Conexão direta ao MySQL bem-sucedida!<br>";
    mysqli_close($conn);
} catch (Exception $e) {
    echo "Erro na conexão direta ao MySQL: " . $e->getMessage() . "<br>";
}

// Verificar configurações do PHP
echo "<h3>Configurações do PHP:</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "PDO MySQL: " . (extension_loaded('pdo_mysql') ? 'Enabled' : 'Disabled') . "<br>";
echo "MySQL: " . (extension_loaded('mysqli') ? 'Enabled' : 'Disabled') . "<br>";

// Listar todas as extensões carregadas
echo "<h3>Extensões PHP carregadas:</h3>";
print_r(get_loaded_extensions());