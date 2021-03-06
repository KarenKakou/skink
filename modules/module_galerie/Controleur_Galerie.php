<?php

require_once('modules/module_galerie/Vue_Galerie.php');
require_once('modules/module_galerie/Modele_Galerie.php');

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

        public function afficherUpload($tatoueur) {
            $this->vueGalerie->afficherUpload($tatoueur);
        }

        public function uploaderImage($tatoueur) {
            $image = $this->modeleGalerie->uploadImage($tatoueur);
            $this->modeleGalerie->insererImage($image,$tatoueur);
        }
    }
?>