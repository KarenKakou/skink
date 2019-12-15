<?php

require_once('modules/module_image/Vue_Image.php');
require_once('modules/module_image/Modele_Image.php');

    class Controleur_Image
    {
        private $vueImage;
        private $modeleImage;

        public function __construct()
        {
            $this->vueImage = new Vue_Image();
            $this->modeleImage = new Modele_Image();
        }

        public function recupererImage($image) {
            $array = $this->modeleImage->obtenirImage($image);
            $this->vueImage->afficherImage($array[0]);
            $this->vueImage->optionSuppression($image);
        }

        public function supprimerImage($image) {
            $this->modeleImage->supprimerImage($image);
        }
    }
?>