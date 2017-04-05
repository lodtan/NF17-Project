<?php
  require_once ("{$ROOT}{$DS}model{$DS}model.php");
class ModelCuisinier extends Model {

  private $id;
  private $nom;
  private $prenom;
  private $datenaiss;
  private $anciennete;
  private $specialite;
  private $idresto;
  protected static $table="cuisinier";
  protected static $primary="id";
   
  // Les getters    
  public function getId() {
       return $this->id;  
  }

  public function getNom() {
       return $this->nom;  
  }

  public function getPrenom() {
       return $this->prenom;  
  }

  public function getDatenaiss() {
       return $this->datenaiss;  
  }

  public function getAnciennete() {
    return $this->anciennete;
  }

  public function getSpecialite() {
    return $this->specialite;
  }

  public function getIdresto() {
    return $this->idresto;
  }

  // Les setters 
  public function setNom($n) {
    $this->nom = $n;
  }

  public function setPrenom($p) {
    $this->prenom = $p;
  }

  public function setDatenaiss($dn) {
    $this->datenaiss = $dn;
  }

  public function setAnciennete($a) {
    $this->anciennete = $a;
  }

  public function setSpecialite($s) {
    $this->specialite = $s;
  }

  public function setIdresto($id) {
    $this->idresto = $id;
  }

  public static function selectByResto($id) {
      $sql = "SELECT *
              FROM cuisinier c
              WHERE c.idresto=:i
              ORDER BY ".static::$primary." DESC";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
        "i" => $id
      );
      $req_prep->execute($values);
      $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelCuisinier');
      // Vérifier si $req_prep->rowCount() != 0
      return $req_prep->fetchAll();
  }

  public function __construct($n = NULL, $p = NULL, $dn = NULL, $a = NULL, $s = NULL, $id = NULL) {
    if (!is_null($n) && !is_null($p) && !is_null($dn) && !is_null($a) && !is_null($s) && !is_null($id)) {
      $this->id = -1;
      $this->nom = $n;
      $this->prenom = $p;
      $this->datenaiss = $dn;
      $this->anciennete = $a;
      $this->specialite = $s;
      $this->idresto = $id;
    }
  }
}
?>