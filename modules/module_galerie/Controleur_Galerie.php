<?php

require_once('modules/module_galerie/Vue_Galerie.php');
require_once('modules/module_galerie/Modele_Galerie.php');
require_once('util.php');

    class Controleur_Galerie
    {
        private $vueGalerie;
        private $modeleGalerie;

        public function __construct()
        {
            $this->vueGalerie = new Vue_Galerie();
            $this->modeleGalerie = new Modele_Galerie();
        }

        public function recupererImages($tatoueur) {
            $array = $this->modeleGalerie->obtenirImages($tatoueur);
            $this->vueGalerie->afficherImagesGalerie($array);
        }

        public function recupererTatoueur($tatoueur) {
            $array = $this->modeleGalerie->obtenirTatoueur($tatoueur);
            $this->vueGalerie->afficherTatoueurGalerie($array[0]);
        }

        public function galeriePerso($tatoueur){
            $tatoo = $this->modeleGalerie->obtenirTatoueur($tatoueur);
            $images = $this->modeleGalerie->obtenirImages($tatoueur);
            $this->vueGalerie->afficheGaleriePerso($tatoo, $images);
        }

        public function recupererTousTatoueurs($statut) {
            $array = $this->modeleGalerie->obtenirTousTatoueurs($statut);
            $this->vueGalerie->afficherTousTatoueursGalerie($array);
        }

        public function afficherUpload($tatoueur) {
            $this->vueGalerie->afficherUpload($tatoueur);
        }

        public function uploaderImage($tatoueur) {
            $image = Util::uploadImage("images_galerie");
            $this->modeleGalerie->insererImage($image,$tatoueur);
        }


        public function recupererImage($image) {
            $array = $this->modeleGalerie->obtenirImage($image);
            $this->vueGalerie->afficherImage($array[0]);
            $this->vueGalerie->optionSuppression($image);
        }

        public function supprimerImage($image) {
            $this->modeleGalerie->supprimerImage($image);
        }
    }
?>