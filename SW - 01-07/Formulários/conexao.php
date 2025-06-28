<?php

// Define o nome do servidor onde o banco de dados está hospedado (geralmente "localhost" em ambiente local)
$servidor = "localhost";

// Define o nome de usuário do banco de dados (por padrão no XAMPP, é "root")
$usuario = "root";

// Define a senha do banco de dados (vazia por padrão no XAMPP)
$senha = "";

// Define o nome do banco de dados que será utilizado
$banco = "banco_cadastro";

// Cria uma nova conexão com o banco de dados usando a classe mysqli
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    // Se houver erro, exibe a mensagem e encerra o script
    die("Conexão falhou: " . $conn->connect_error); // Corrigido de connection_error para connect_error
}

// Se a conexão for bem-sucedida, você pode manter esta linha para depuração
// ou removê-la em um ambiente de produção.
echo "Conexão bem-sucedida!";

?>