<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario de contato</title>
</head>
<body>
<!-- 
    formulario em HTML
    o formulario deve conter action, method e submit para o botão
-->
    <h1>Deixe sua mensagem</h1>
    <form action="" method="post">
        Nome: <input type="text" name="nome"><br>
        E-mail: <input type="text" name="email"><br>
        Mensagem: <input type="text" name="mensagem"><br>
        <input type="submit">
    </form>

<!-- código PHP para receber os dados do formuário -->

    <?php

    // pega os dados do formulário e grava em uma variavel
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $mensagem=$_POST["mensagem"];

    // Exibe conteudo da variavel(passo opcional)
        echo "Bem vindo: " . $nome . "<br>"; 
        echo "Seu E-mail é: " . $email . "<br>";
        echo "Sua Mensagem: " . $mensagem . "<br>";

    // Variaveis de conexao ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "form";

    // Cria conexao
        $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica conexao
        if ($conn->connect_error) {
            die("Conexao ao banco de dados Falhou: " . $conn->connect_error . "<br>");
        }
        echo "Conectado ao banco de dados com Sucesso <br>";

    // Insere dados do banco de dados
        $sql = "INSERT INTO contatos (nome, email, mensagem)
        VALUES ('$nome', '$email', '$mensagem')";

        if ($conn->query($sql) === TRUE) {
        echo "Sua mensagem foi registrada com Sucesso <br>";
        } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    // fecha conexao
        $conn->close();   
    
    ?>   
    
</body>
</html>