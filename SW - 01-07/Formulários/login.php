<?php

// Inclui o arquivo de conexão com o banco de dados (conexao.php deve conter a variável $conn)
include("conexao.php");

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os dados do formulário (email e senha)
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Prepara a consulta SQL para buscar o usuário pelo email, utilizando prepared statement para segurança
    $sql = "SELECT * FROM dados WHERE email = ?";
    $stmt = $conn->prepare($sql); // Prepara a consulta
    $stmt->bind_param("s", $email); // Liga o parâmetro à consulta (s = string)
    $stmt->execute(); // Executa a consulta

    // Obtém o resultado da consulta
    $resultado = $stmt->get_result();

    // Verifica se foi encontrado exatamente um usuário com o email informado
    if ($resultado->num_rows === 1) {
        // Recupera os dados do usuário encontrado
        $usuario = $resultado->fetch_assoc();

        // Verifica se a senha digitada corresponde à senha criptografada no banco de dados
        if (password_verify($senha, $usuario["senha"])) {
            // Senha correta: login realizado com sucesso
            echo "Login realizado com sucesso. Bem-vindo, " . $usuario["nome"];
        } else {
            // Senha incorreta
            echo "Senha incorreta.";
        } else {
        // Nenhum usuário encontrado com o email informado
                echo "Usuário não encontrado.";
        }

        // Fecha o statement e a conexão com o banco de dados
        $stmt->close();
        $conn->close();
}}


?>