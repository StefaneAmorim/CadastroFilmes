<?php

class Conexao {
  private $host = 'localhost';
  private $dbname = 'apifilmes';
  private $usuario = 'api_filmes';  // Usuário do banco
  private $senha = 'api_filmes';   // Senha do banco

  public function conectar() {
      try {
         $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->usuario, $this->senha);
         $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conexao;
        } catch (PDOException $e) {
             echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
             die();
        }
     }
}


?>
