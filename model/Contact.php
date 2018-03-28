<?php
class Contact
{
    //Attributs
    private $idClient;
    private $idContact;
    private $nomContact;
    private $prenomContact;
    private $numRueContact;
    private $nomRueContact;
    private $codepostContact;
    private $villeContact;
    private $telephoneContact;
    private $mailContact;
    //Ascesseur et Modifieur
    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
    }
    public function getIdContact()
    {
        return $this->idContact;
    }
    public function setIdContact($idContact)
    {
        $this->idContact = $idContact;
    }
    public function getNomContact()
    {
        return $this->nomContact;
    }
    public function setNomContact($nomContact)
    {
        $this->nomContact = $nomContact;
    }
    public function getPrenomContact()
    {
        return $this->prenomContact;
    }
    public function setPrenomContact($prenomContact)
    {
        $this->prenomContact = $prenomContact;
    }
    public function getAdresseContact()
    {
        return $this->adresseContact;
    }
    public function setAdresseContact($adresseContact)
    {
        $this->adresseContact = $adresseContact;
    }
    public function getVilleContact()
    {
        return $this->villeContact;
    }
    public function setVilleContact($villeContact)
    {
        $this->villeContact = $villeContact;
    }
    public function getCodepostContact()
    {
        return $this->codepostContact;
    }
    //RECHERCHE DE CODE POSTALE VALIDE
    public function setCodepostContact($codepostContact)
    {
        $this->codepostContact = $codepostContact;
        
        $check = "/^([0-9]{5})$/";
        if (preg_match($check, $codepostContact)===1) {
            $this->codepostContact = $codepostContact;
        } else {
            throw new Exception("Veuillez saisir un code postal correct");
        }
    }
    public function getTelephoneContact()
    {
        return $this->telephoneContact;
    }
    //RECHERCHE DE TELEPHONE VALIDE
    public function setTelephoneContact($telephoneContact)
    {
        if ($this->validate_numeric($telephoneContact)&& $this->lengtDigit($telephoneContact)===10 && $this->is_digits($telephoneContact)) {
            // $this->telephoneContact = wordwrap($telephoneContact, 2, " ", true);
            $this->telephoneContact = $telephoneContact;
        } else {
            throw new Exception("Veuillez saisir un numéro valide");
        }
    }
    public function getMailContact()
    {
        return $this->mailContact;
    }
    //RECHERCHE DE MAIL VALIDE
    public function setMailContact($mailContact)
    {
        if (filter_var($mailContact, FILTER_VALIDATE_EMAIL)) {
            $this->mailContact = $mailContact;
        } else {
            throw new Exception("Veuillez saisir une adresse mail valide");
        }
    }
    //Constructeurs
    public function __construct($array)
    {
        $this->setIdContact($array['idContact']);
        $this->setNomContact($array['nomContact']);
        $this->setPrenomContact($array['prenomContact']);
        $this->setAdresseContact($array['adresseContact']);
        $this->setVilleContact($array['villeContact']);
        $this->setCodepostContact($array['codePostContact']);
        $this->setTelephoneContact($array['telephoneContact']);
        $this->setMailContact($array['mailContact']);
    }
    // Verification Telephone
    private function validate_numeric($telephoneContact)
    {
        return is_numeric($telephoneContact);
    }
    private function is_digits($telephoneContact)
    {
        return !preg_match("/[^0-9]/", $telephoneContact);
    }
    private function lengtDigit($digit)
    {
        return strlen($digit);
    }
}