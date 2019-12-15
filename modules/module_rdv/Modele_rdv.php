<?php


class Modele_rdv extends Connexion
{

    public function __construct()
    {
    }

    public function listProjet() {
        $listCompte = $this::$bdd->prepare('SELECT * from projet');
        $listCompte->execute();
        return $listCompte->fetchAll();
    }

    public function ajoutRDV($date, $projet, $dureeRDV, $modePaiement) {
        $dureeRDV = (int)$dureeRDV;
        $dateFin = date("Y-M-d H:i:", strtotime(' +'.$dureeRDV.' minutes', strtotime($date)));
        $insertRDVPrepare = $this::$bdd->prepare('INSERT into rdv values(DEFAULT, ?, ?, ?, ?)');
        $array = array($date, $dateFin, $modePaiement, $projet);
        if ($insertRDVPrepare->execute($array)) {
            echo "Le rendez-vous pour le projet $projet a correctement été pris en compte";
        } else {
            echo "Il y a eu un problème avec la prise de rendez-vous du projet $projet";
        }
    }
}