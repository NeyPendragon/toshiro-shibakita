<html>
<head>
<title>Exemplo PHP</title>
</head>
<body>

<?php
// Configuracoes do PHP
ini_set("display_errors", 1); // Exibir erros no navegador
header('Content-Type: text/html; charset=iso-8859-1'); // Definir o tipo de conteudo como HTML com codificacao ISO-8859-1

// Exibir a versao do PHP
echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

// Configuracoes do banco de dados
$servername = "54.234.153.24";
$username = "root";
$password = "Senha123";
$database = "meubanco";

// Criar conexao com o banco de dados
$link = new mysqli($servername, $username, $password, $database);

// Verificar a conexao
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Gerar valores aleatorios
$valor_rand1 = rand(1, 999); // Gerar um numero aleatorio entre 1 e 999
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1)); // Gerar uma sequencia de caracteres aleatorios

$host_name = gethostname(); // Obter o nome do host onde o script esta sendo executado

// Montar a consulta SQL de insercao
$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

// Executar a consulta SQL
if ($link->query($query) === TRUE) {
    echo "New record created successfully"; // Registro criado com sucesso
} else {
    echo "Error: " . $link->error; // Exibir mensagem de erro
}

// Fechar a conexao com o banco de dados
$link->close();
?>
</body>
</html>
