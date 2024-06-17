<?php
    class Usuario
    {

        // conexaoection
        private $conexao;

        // Table
        private $db_table = "usuario";

        // Columns
        public $id;
        public $nome;
        public $email;
        public $idade;
        public $funcao;
        public $criado;

        // Db conexaoection
        public function __construct($db)
      {
            $this->conexao = $db;
        }

        // GET ALL
        public function VerUsuarios()
        {
            $sqlQuery = "SELECT id, nome, email, idade, funcao, criado FROM " . $this->db_table . "";
            $stmt = $this->conexao->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
      public function CriarUsuario()
      {
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nome = :name, 
                        email = :email, 
                        idade = :age, 
                        funcao = :designation, 
                        criado = :created";
        
            $stmt = $this->conexao->prepare($sqlQuery);
        
            // sanitize
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->idade=htmlspecialchars(strip_tags($this->idade));
            $this->funcao=htmlspecialchars(strip_tags($this->funcao));
            $this->criado=htmlspecialchars(strip_tags($this->criado));
        
            // bind data
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->idade);
            $stmt->bindParam(":designation", $this->funcao);
            $stmt->bindParam(":created", $this->criado);
        
            if($stmt->execute())
            {
               return true;
            }
            return false;
        }

        // UPDATE
      public function VerUsuario()
      {
            $sqlQuery = "SELECT
                        id, 
                        nome, 
                        email, 
                        idade, 
                        funcao, 
                        criado
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conexao->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nome = $dataRow['nome'];
            $this->email = $dataRow['email'];
            $this->idade = $dataRow['idade'];
            $this->funcao = $dataRow['funcao'];
            $this->criado = $dataRow['criado'];
        }        

        // UPDATE
      public function AtualizarUsuario()
      {
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        email = :email, 
                        idade = :idade, 
                        funcao = :funcao, 
                        criado = :criado
                    WHERE 
                        id = :id";
        
            $stmt = $this->conexao->prepare($sqlQuery);
        
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->idade=htmlspecialchars(strip_tags($this->idade));
            $this->funcao=htmlspecialchars(strip_tags($this->funcao));
            $this->criado=htmlspecialchars(strip_tags($this->criado));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":idade", $this->idade);
            $stmt->bindParam(":funcao", $this->funcao);
            $stmt->bindParam(":criado", $this->criado);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute())
            {
               return true;
            }
            return false;
        }

        // DELETE
        function RemoverUsuario()
        {
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conexao->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute())
            {
                return true;
            }
            return false;
        }

    }
?>

