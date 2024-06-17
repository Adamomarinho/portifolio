<?php 
    class Bd 
    {
        private $host = "127.0.0.1";
        private $database_name = "phpapi";
        private $username = "root";
        private $password = "123456";

        public $conexao;

        public function Conecta()
      {
            $this->conexao = null;
            try
            {
                $this->conexao = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conexao->exec("set names utf8");
            }
            catch(PDOException $exception)
            {
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conexao;
        }
    }  
?>
