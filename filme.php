<?php
class Filme {
   private $db;

   public function __construct($conexao) {
     $this->db = $conexao;
   }

   public function salvar($nome, $descricao, $genero, $urlCapa) {
     $query = "INSERT INTO filmes (Nome, Descrição, Gênero, UrlCapa) VALUES (:nome, :descricao, :genero, :url_capa)";
     $stmt = $this->db->prepare($query);
     $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':descricao', $descricao);
     $stmt->bindParam(':genero', $genero);
     $stmt->bindParam(':url_capa', $urlCapa);

     return $stmt->execute();
   }

   public function getFilme($id) {
     $query = "SELECT * FROM filmes WHERE ID = :id";
     $stmt = $this->db->prepare($query);
     $stmt->bindParam(':id', $id);
     $stmt->execute();

     return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   public function atualizar($id, $nome, $descricao, $genero, $urlCapa) {
     $query = "UPDATE filmes SET Nome = :nome, Descrição = :descricao, Gênero = :genero, UrlCapa = :url_capa WHERE ID = :id";
     $stmt = $this->db->prepare($query);
     $stmt->bindParam(':id', $id);
     $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':descricao', $descricao);
     $stmt->bindParam(':genero', $genero);
     $stmt->bindParam(':url_capa', $urlCapa);

     return $stmt->execute();
   }

   public function deletar($id) {
     $query = "DELETE FROM filmes WHERE ID = :id";
     $stmt = $this->db->prepare($query);
     $stmt->bindParam(':id', $id);

     return $stmt->execute();
   }

   public function listar() {
     $query = "SELECT * FROM filmes";
     $stmt = $this->db->query($query);

     return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
}
?>
