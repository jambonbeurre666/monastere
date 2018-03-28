<?php 
//require(Model.php);
class Client
{
    //attributes
    private $idClient;
    private $raisonSociale;
    private $type;
    private $domaineActivite;
    private $numRue;
    private $nomRue;
    private $codePostal;
    private $ville;
    private $nature;
    private $ca;
    private $effectif;
    private $commentaire;
    private $telephone ;
    private $adressemail;
    private $keyword;
    /**Constructeur */
    public function __construct($array)
    {
      //  $this->setIdClient($array['idClient']);
        $this->setRaisonSociale($array['raisonClient']);
        $this->setType($array['typeClient']);
        $this->setDomaineActivite($array['domaineActivitéClient']);
        $this->setNumRue($array['numeroRueClient']);
        $this->setNomRue($array['nomRueclient']);
        $this->setCodePostal($array['codepostalClient']);
        $this->setVille($array['villeClient']);
        $this->setNature($array['natureClient']);
        $this->setEffectif($array['effectifClient']);
        $this->setCa($array['caClient']);
        $this->setCommentaire($array['commentaireClient']);
        $this->setTelephone($array['telephoneClient']);
        $this->setAdressemail($array['emailClient']);
        $this->setKeyword($array['motsCle']);
    }
    //VERIFICATION TELEPHONE
    /* numeric, decimal passes */
    private function validate_numeric($telephone)
    {
        return is_numeric($telephone);
    }
    /* digits only */
    private function is_digits($telephone)
    {
        return !preg_match("/[^0-9]/", $telephone);
    }
  
    private function lengthDigit($digit)
    {
        return strlen($digit);
    }
    /**Accesseurs */
    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;
    }
    public function getNature()
    {
        return $this->nature;
    }
    
    public function setNature($nature)
    {
        $this->nature = $nature;
    }
    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function setVille($ville)
    {
        $this->ville = $ville;
    }
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    /**Verification Code Postal */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
        $check = "/^([0-9]{5})$/";
        if (preg_match($check, $codePostal)===1) {
            $this->codePostal = $codePostal;
        } else {
            throw new Exception("Veuillez saisir un code postal correct");
        }
    }
    
    /**Verification de la taille, des caractères et détermine si la variable est un type numérique */
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function setTelephone($telephone)
    {
        if ($this->validate_numeric($telephone)&& $this->lengthDigit($telephone)===10 && $this->is_digits($telephone)) {
            $this->telephone = $telephone;
        } else {
            throw new Exception("Veuillez saisir un numéro valide");
        }
    }
    public function getCa()
    {
        return $this->ca;
    }
    public function setCa($ca)
    {
        if (!is_numeric($ca)) {
            throw new Exception(" Le chiffre d'affaire ne peut être que des chiffres ");
        } else {
            if ($ca/$this->effectif<1000000) {
                $this->ca = $ca;
            } else {
                throw new Exception('Le CA ne peut pas dépasser 1000000 par employés');
            }
        }
    }
    public function getEffectif()
    {
        return $this->effectif;
    }
    public function setEffectif($effectif)
    {
        if ($effectif<=0) {
            throw new Exception("L'effectif ne peut pas être égal à 0 ");
        } elseif (!is_numeric($effectif)) {
            throw new Exception("L'effectif n'est pas un nombre entier");
        } else {
            $this->effectif = $effectif;
        }
    }
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
    public function getAdressemail()
    {
        return $this->adressemail;
    }
    
    /**Vérification de l'adresse mail avec méthode filter_var */
    public function setAdressemail($adressemail)
    {
        if (filter_var($adressemail, FILTER_VALIDATE_EMAIL)) {
            $this->adressemail = $adressemail;
        } else {
            throw new Exception("Veuillez saisir une adresse mail valide");
        }
    }
    public function getDomaineActivite()
    {
        return $this->domaineActivite;
    }
    public function setDomaineActivite($domaineActivite)
    {
        $this->domaineActivite = $domaineActivite;
    }
    public function getNumRue()
    {
        return $this->numRue;
    }
    public function setNumRue($numRue)
    {
        if (!is_numeric($numRue)) {
            throw new Exception("Veuillez saisir un numéro de rue valide");
        } else {
            $this->numRue = $numRue;
        }
    }
    public function getNomRue()
    {
        return $this->nomRue;
    }
    public function setNomRue($nomRue)
    {
        $this->nomRue = $nomRue;
    }
    public function getKeyword()
    {
        return $this->keyword;
    }
    public function setKeyword($keyword)
    {
        $keyword = preg_replace("/[^ \w]+ /", "", $keyword);
        $keyword = preg_replace("/ /", ",", $keyword);
        $this->keyword = $keyword;
    }
}