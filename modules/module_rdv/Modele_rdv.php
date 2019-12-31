<?php


class Modele_rdv extends Connexion
{

    public function __construct()
    {
    }

    public function listProjetAvecActeur() {
        $listCompte = $this::$bdd->prepare('SELECT idProj, nomProjet, nomCompte, prenomCompte from PROJET INNER JOIN GERER using(idProj) INNER JOIN COMPTE using(idCompte)');
        $listCompte->execute();
        return $listCompte->fetchAll();
    }

    public function ajoutRDV($date, $heureDebRDV,$projet, $dureeRDV) {
        $dateDuJour = date("Y-m-d H:i:s", strtotime(' +1 hour'));
        $dureeRDV = (int)$dureeRDV;
        $dateDeb = date("Y-m-d H:i:s", strtotime(' +'.$heureDebRDV.' minutes', strtotime($date)));
        $dateFin = date("Y-m-d H:i:s", strtotime(' +'.$dureeRDV.' minutes', strtotime($dateDeb)));
        if($date == null || $dateDeb <= $dateDuJour) {
            echo "Veuillez selectionner une date valide et supérieur à celle du jour";
        }
        else {

            if($this->estUnRdvValable($dateDeb, $dateFin)) {
                echo "C'est valable !";
                $insertRDVPrepare = $this::$bdd->prepare('INSERT into RDV values(DEFAULT, ?, ?, ?)');
                $array = array($dateDeb, $dateFin, $projet);
                if ($insertRDVPrepare->execute($array)) {
                    echo "Le rendez-vous pour le projet $projet a correctement été pris en compte";
                } else {
                    echo "Il y a eu un problème avec la prise de rendez-vous du projet $projet";
                }
            }else {
                echo "Un rendez-vous est déjà posé à cette date";
            }
        }
    }

    private function estUnRdvValable($debRDV, $finRDV) {
        $listRDV = $this->listRDV();

        foreach ($listRDV as $key => $value) {
            if ($debRDV <= $listRDV[$key]['debRdv'] && $finRDV > $listRDV[$key]['debRdv'])
                return false;
            if ($debRDV < $listRDV[$key]['finRdv'] && $finRDV >= $listRDV[$key]['finRdv'])
                return false;
            if ($debRDV >= $listRDV[$key]['debRdv'] && $finRDV <= $listRDV[$key]['debRdv'])
                return false;
        }
        return true;
    }

    private function listRDV() {
        $listRDV = $this::$bdd->prepare('SELECT debRdv, finRdv from RDV');
        $listRDV->execute();
        return $listRDV->fetchAll();
    }
}