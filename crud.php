<?php
// Inclua as classes criadas
include 'Conexao.php';
include 'Filme.php';

// Instancia a classe conexão
$conexao = new Conexao();
$pdo = $conexao->conectar();

// Instancia a classe filmes
$filme = new Filme($pdo);

// Cria um novo filme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $genero = $_POST["genero"];
    $urlCapa = $_POST["urlCapa"];

    if ($filme->salvar($nome, $descricao, $genero, $urlCapa)) {
        echo "Filme criado com sucesso!";
    } else {
        echo "Erro ao criar o filme.";
    }
}

// Lista os filmes
$filmes = $filme->listar();
?>

<!DOCTYPE html>
<html>
<head>
   <title>CRUD de Filmes</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <h1>CRUD de Filmes</h1>

    <!-- Formulário para criar um novo filme -->
    <form method="post">
       <label for="nome">Nome:</label>
       <input type="text" name="nome" id="nome" required><br>

       <label for="descricao">Descrição:</label>
       <textarea name="descricao" id="descricao" required></textarea><br>

       <label for="genero">Gênero:</label>
       <input type="text" name="genero" id="genero" required><br>

       <label for="urlCapa">URL da Capa:</label>
       <input type="text" name="urlCapa" id="urlCapa" required><br>

       <input type="submit" value="Criar Filme">

    </form>

   <!-- Lista de filmes -->
   <h2>Filmes</h2>
     <ul>
         <?php foreach ($filmes as $filme) { ?>
            <li>
                 <strong><?php echo $filme['nome']; ?></strong>
                 <p><?php echo $filme['descricao']; ?></p>
                 <p>Gênero: <?php echo $filme['genero']; ?></p>
                 <img src="<?php echo $filme['urlCapa']; ?>" alt="Capa">
            </li>
         <?php } ?> 
     </ul>
</body>

</html>
