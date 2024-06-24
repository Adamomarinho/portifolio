<?php

class CategoriaCrud 
{

    public function addCat(Categoria $c) 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO categoria (nomecat) VALUES (:nome)");
        $sql->bindValue(':nome', $c->getNomeCat());
        $sql->execute();

        $u->setIdCat( $link->lastInsertId() );
        return $u;
    }

    public function findAllCat() 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM categoria");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
                $u = new Categoria();
                $u->setIdCat($item['idcat']);
                $u->setNomeCat($item['nomecat']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByIdCat($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM categoria WHERE idcat = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $u = new Categoria();
            $u->setIdCat($data['id']);
            $u->setNomeCat($data['nome']);

            return $u;
        } 
        else 
        {
            return false;
        }
    }

    public function updateCat(Categoria $c) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $c = new Categoria();
        $link = $conecta->conectado();

        $sql = $link->prepare("UPDATE categoria SET nomecat = :nome WHERE idcat = :id");
        $sql->bindValue(':nome', $c->getNomeCat());
        $sql->bindValue(':id', $c->getIdCat());
        $sql->execute();

        return true;
    }

    public function deleteCat($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM categoria WHERE idcat = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}

class LogsCrud 
{

    public function addlog($usuario, $ip, $acao) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO logs (usuario, ip, acao, dataacao) VALUES (:usuario, :ip, :acao, now())");
        $sql->bindValue(':usuario', $usuario);
        $sql->bindValue(':ip', $ip);
        $sql->bindValue(':acao', $acao);
        $sql->execute();

        $logs = $link->lastInsertId();
        return $logs;
    }

    public function findAllLogs() 
    {

        require_once 'dados.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM logs");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
             $logs = $item['id'];
             $logs = $item['usuario'];
             $logs = $item['ip'];
             $logs = $item['acao'];
             $logs = $item['data_acao'];

                $array[] = $logs;
            }
        }

        return $array;
    }

    public function findByIdLog($id) 
    {

        require_once 'dados.php';
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $logs = $data['id'];
            $logs = $data['usuario'];
            $logs = $data['ip'];
            $logs = $data['acao'];
            $logs = $data['data_acao'];

            return $logs;
        } 
        else 
        {
            return false;
        }
    }

    public function deleteLog($id) 
    {

        require_once 'dados.php';
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM logs WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}

class NiveisCrud 
{

    public function addNivel(Nivel $n) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $n = new Nivel();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO nivel (nomenivel) VALUES (:nome)");
        $sql->bindValue(':nome', $n->getNomeNivel());

        $sql->execute();

        $n->setIdNivel( $link->lastInsertId() );
        return $n;
    }

    public function findAllNiveis() 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $n = new Nivel();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM nivel");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
                $n = new Nivel();
                $n->setIdNivel($item['idnivel']);
                $n->setNomeNivel($item['nomenivel']);

                $array[] = $n;
            }
        }

        return $array;
    }

    public function findByIdNivel($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM nivel WHERE idnivel = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $n = new Nivel();
            $n->setIdNivel($data['idnivel']);
            $n->setNomeNivel($data['nomenivel']);

            return $n;
        } 
        else 
        {
            return false;
        }
    }

    public function updateNivel(Nivel $n) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("UPDATE nivel SET nomenivel = :nome WHERE idnivel = :id");
        $sql->bindValue(':nome', $n->getNomeNivel());
        $sql->bindValue(':id', $n->getIdNivel());
        $sql->execute();

        return true;
    }

    public function deleteNivel($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM nivel WHERE idnivel = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}

class SituacoesCrud 
{

    public function addSit(Situacao $s) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $s = new Situacao();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO situacao (nomesit) VALUES (:nome)");
        $sql->bindValue(':nome', $s->getSituacao());
        $sql->execute();

        $s->setIdSit( $link->lastInsertId() );
        return $s;
    }

    public function findAllSit() 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM situacao");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
                $s = new Situacao();
                $s->setIdSit($item['idsit']);
                $s->setSituacao($item['nomesit']);

                $array[] = $s;
            }
        }

        return $array;
    }

    public function findByIdSit($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM situacao WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $s = new Situacao();
            $s->setIdSit($data['idsit']);
            $s->setSituacao($data['nomesit']);

            return $s;
        } 
        else 
        {
            return false;
        }
    }

    public function updateSit(Situacao $s) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("UPDATE situacao SET nomesit = :nome WHERE idsit = :id");
        $sql->bindValue(':nome', $s->getSituacao());
        $sql->bindValue(':id', $s->getIdSit());
        $sql->execute();

        return true;
    }

    public function deleteSit($id) 
    {

        require_once 'dados.php';
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM situacao WHERE idsit = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}
class PermissoesCrud 
{

    public function addPerm(Usuario $u, Situacao $s, Categoria $c, Nivel $n, Permissao $p) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO permissao (iduser, idsituacao, idcat, idnivel) VALUES (:iduser, :idsituacao, :idcat, :idnivel)");
        $sql->bindValue(':iduser', $u->getIdUser());
        $sql->bindValue(':idsituacao', $s->getIdSit());
        $sql->bindValue(':idcat', $c->getIdCat());
        $sql->bindValue(':idnivel', $n->getIdNivel());
        $sql->execute();

        $p->getIdPerm($link->lastInsertId());
        return $p;
    }

    public function findAllPerm() 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM permissao");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
                $p = new Permissao();
                $p->setIdPerm($item['id']);
                $p->setIdUserPerm($item['iduser']);
                $p->setIdSitPerm($item['idsituacao']);
                $p->setIdCatPerm($item['idcat']);
                $p->setIdNivelPerm($item['idnivel']);

                $array[] = $p;
            }
        }

        return $array;
    }

    public function findByIdPerm($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM permissao WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $p = new Permissao();
         $p->setIdPerm($data['id']);
         $p->setIdUserPerm($data['iduser']);
            $p->setIdSitPerm($data['idsituacao']);
            $p->setIdCatPerm($data['idcat']);
            $p->setIdNivelPerm($data['idnivel']);


            return $p;
        } 
        else 
        {
            return false;
        }
    }

    public function updatePerm(Permissao $p) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("UPDATE permissao SET iduser = :iduser, idsituacao :idsituacao, idcat = :idcat, idnivel = :idnivel WHERE id = :id");
        $sql->bindValue(':iduser', $p->getIdUserPerm());
        $sql->bindValue(':idsituacao', $p->getIdSitPerm());
        $sql->bindValue(':idcat', $p->getIdCatPerm());
        $sql->bindValue(':idnivel', $p->getIdNivelPerm());
        $sql->bindValue(':id', $p->getIdPerm());
        $sql->execute();

        return true;
    }

    public function deletePerm($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM permissao WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}

class PostsCrud 
{

    public function add(Post $p, Categoria $c, Situacao $s, Usuario $u) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO posts (categoria, titulo, conteudo, situacao, usuario, criado) VALUES (:cat, :titulo, :conteudo, :sit, :user, now())");
        $sql->bindValue(':cat', $c->getIdCat());
        $sql->bindValue(':titulo', $p->getTituloPost());
        $sql->bindValue(':conteudo', $p->getConteudoPost());
        $sql->bindValue(':sit', $s->getIdSit());
        $sql->bindValue(':user', $u->getIdUser());
        $sql->execute();

        $p->setIdPost( $link->lastInsertId() );
        return $p;
    }

    public function findAll() 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM posts");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
                $p = new Post();
                $p->setIdPost($item['id']);
                $p->setIdCatPost($item['categoria']);
                $p->setTituloPost($item['titulo']);
                $p->setConteudoPost($item['conteudo']);
                $p->setIdSitPost($item['situacao']);
                $p->setIdUserPost($item['usuario']);

                $array[] = $p;
            }
        }

        return $array;
    }

    public function findById($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM posts WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $p = new Post();
            $p->setIdPost($data['id']);
            $p->setIdCatPost($data['categoria']);
            $p->setTituloPost($data['titulo']);
            $p->setConteudoPost($data['conteudo']);
            $p->setIdSitPost($data['situacao']);
            $p->setIdUserPost($data['usuario']);

            return $u;
        } 
        else 
        {
            return false;
        }
    }

    public function update(Post $p) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("UPDATE posts SET categoria = :cat, titulo = :titulo, conteudo = :conteudo, situacao = :sit, usuario = :user WHERE id = :id");
        $sql->bindValue(':cat', $p->getIdCatPost());
        $sql->bindValue(':titulo', $p->getTituloPost());
        $sql->bindValue(':conteudo', $p->getConteudoPost());
        $sql->bindValue(':sit', $p->getIdSitPost());
        $sql->bindValue(':user', $p->getIdUserPost());
        $sql->bindValue(':id', $p->getIdPost());
        $sql->execute();

        return true;
    }

    public function delete($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM posts WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}

class UsuariosCrud 
{

    public function add(Usuario $u) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNomeUser());
        $sql->bindValue(':email', $u->getEmailUser());
        $sql->execute();

        $u->setIdUser( $link->lastInsertId() );
        return $u;
    }

    public function findAll() 
    {

        require_once 'dados.php';
         

        $conecta = new Sistema();
        $link = $conecta->conectado();

        $array = [];

        $sql = $link->query("SELECT * FROM usuario");
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetchAll();

            foreach($data as $item) 
            {
                $u = new Usuario();
                $u->setIdUser($item['id']);
                $u->setNomeUser($item['nome']);
                $u->setEmailUser($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByEmail($email) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM usuario WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setIdUser($data['id']);
            $u->setNomeUser($data['nome']);
            $u->setEmailUser($data['email']);

            return $u;
        } 
        else 
        {
            return false;
        }
    }

    public function findById($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM usuario WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setIdUser($data['id']);
            $u->setNomeUser($data['nome']);
            $u->setEmailUser($data['email']);

            return $u;
        } 
        else 
        {
            return false;
        }
    }

    public function update(Usuario $u) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id = :id");
        $sql->bindValue(':nome', $u->getNomeUser());
        $sql->bindValue(':email', $u->getEmailUser());
        $sql->bindValue(':id', $u->getIdUser());
        $sql->execute();

        return true;
    }

    public function delete($id) 
    {

        require_once 'dados.php';
         
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("DELETE FROM usuario WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}
