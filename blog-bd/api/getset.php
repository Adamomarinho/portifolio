<?
class Categoria 
{

  private $idcat;
  public $nomecat;
  
  public function getIdCat() 
  {
    return $this->idcat;
  }
  
  public function setIdCat($idcat) 
  {
    $this->idcat = $idcat;
  }
  
  public function getNomeCat() 
  {
    return $this->nomecat;
  }
  
  public function setNomeCat($nomecat) 
  {
    $this->nomecat= $nomecat;
  }
  
}

class Nivel 
{

  private $idnivel;
  public $nomenivel;
  
  public function getIdNivel() 
  {
    return $this->idnivel;
  }
  
  public function setIdNivel($idnivel) 
  {
    $this->idnivel = $idnivel;
  }
  
  public function getNomeNivel() 
  {
    return $this->nomenivel;
  }
  
  public function setNomeNivel($nomenivel) 
  {
    $this->nomenivel= $nomenivel;
  }
  
}

class Situacao 
{

  private $idsit;
  public $nomesit;
  
  public function getIdSit() 
  {
    return $this->idsit;
  }
  
  public function setIdSit($idsit) 
  {
    $this->idsit = $idsit;
  }
  
  public function getSituacao() 
  {
    return $this->nomesit;
  }
  
  public function setSituacao($nomesit) 
  {
    $this->nomesit= $nomesit;
  }
  
}

class Permissao 
{

  private $idperm;
  public $iduserperm;

  public $idsitperm;

  public $idcatperm;

  public $idnivelperm;
  
  public function getIdPerm() 
  {
    return $this->idperm;
  }
  
  public function setIdPerm($idperm) 
  {
    $this->idperm = $idperm;
  }
  
  public function getIdUserPerm() 
  {
    return $this->iduserperm;
  }
  
  public function setIdUserPerm($iduserperm) 
  {
    $this->iduserperm = $iduserperm;
  }

  public function getIdSitPerm() 
  {
    return $this->idsitperm;
  }
  
  public function setIdSitPerm($idsitperm) 
  {
    $this->idsitperm = $idsitperm;
  }

  public function getIdCatPerm() 
  {
    return $this->idcatperm;
  }
  
  public function setIdCatPerm($idcatperm) 
  {
    $this->idcatperm = $idcatperm;
  }

  public function getIdNivelPerm() 
  {
    return $this->idnivelperm;
  }
  
  public function setIdNivelPerm($idnivelperm) 
  {
    $this->idnivelperm = $idnivelperm;
  }
  
}

class Post 
{

  private $idpost;

  public $idcatpost;

  public $idsitpost;

  public $iduserpost;
  public $titulopost;

  public $conteudopost;
  
  public function getIdPost() 
  {
    return $this->idpost;
  }
  
  public function setIdPost($idpost) 
  {
    $this->idpost = $idpost;
  }
  
  public function getIdCatPost() 
  {
    return $this->idcatpost;
  }
  
  public function setIdCatPost($idcatpost) 
  {
    $this->idcatpost = $idcatpost;
  }

  public function getIdSitPost() 
  {
    return $this->idsitpost;
  }
  
  public function setIdSitPost($idsitpost) 
  {
    $this->idsitpost = $idsitpost;
  }

  public function getIdUserPost() 
  {
    return $this->iduserpost;
  }
  
  public function setIdUserPost($iduserpost) 
  {
    $this->iduserpost = $iduserpost;
  }

  public function getTituloPost() 
  {
    return $this->titulopost;
  }
  
  public function setTituloPost($titulopost) 
  {
    $this->titulopost= $titulopost;
  }

  public function getConteudoPost() 
  {
    return $this->conteudopost;
  }
  
  public function setConteudoPost($conteudopost) 
  {
    $this->conteudopost= $conteudopost;
  }
  
}

class Usuario 
{

  private $iduser;
  public $idniveluser;
  public $idsituser;
  public $usersenha;
  public $nomeuser;
  public $emailuser;
  
  public function getIdUser() 
  {
    return $this->iduser;
  }
  
  public function setIdUser($iduser) 
  {
    $this->iduser = $iduser;
  }

  public function getIdNivelUser() 
  {
    return $this->idniveluser;
  }
  
  public function setIdNivelUser($idniveluser) 
  {
    $this->idniveluser = $idniveluser;
  }

  public function getIdSitUser() 
  {
    return $this->idsituser;
  }
  
  public function setIdSitUser($idsituser) 
  {
    $this->idsituser = $idsituser;
  }
  
  public function getNomeUser() 
  {
    return $this->nomeuser;
  }
  
  public function setNomeUser($nomeuser) 
  {
    $this->nomeuser = $nomeuser;
  }
  
  public function getEmailUser() 
  {
    return $this->emailuser;
  }
  
  public function setEmailUser($emailuser) 
  {
    $this->emailuser = $emailuser;
  }

}

?>