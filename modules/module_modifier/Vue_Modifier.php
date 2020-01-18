<?php

require_once('modules/module_modifier/Modele_Modifier.php');

class Vue_Modifier
{
    public function __construct()
    {
    }
    
    public function afficherFormulaires($idCompte, $compte) {
    $image = $compte['avatarCompte'];
    $prenom = $compte['prenomCompte'];
    $nom = $compte['nomCompte'];
    $telephone = $compte['telephoneCompte'];
    $description = $compte['descriptionCompte'];

    echo "<div class=\"container bootstrap snippet\">
        <div class=\"row\">
  		<div class=\"col-sm-4 center\"><h1>Modifier le compte</h1></div>
    </div>
    <div class=\"row\">
  		<div class=\"col-sm-4\"><!--left col-->
      <div class=\"text-center\">";
      	if($image) {
      		$this->afficherAvatarActuel($image);
      	}
      	else {
      		echo "<img src=\"http://ssl.gstatic.com/accounts/ui/avatar_2x.png\" alt=\"avatar\" style=\"width: 200px;
  		height: 200px; border-radius: 50%;\">";
      	}
       
        echo
        "<form action=\"index.php?module=modifier&action=mettreAJourAvatar&id=$idCompte\" method=\"post\" enctype=\"multipart/form-data\">
        		<h6>Changer votre avatar</h6>
        		<input type=\"file\" name=\"image\" >
                <input type=\"submit\" value=\"Valider\">
        </form>
      </div></hr><br>
          <ul class=\"list-group\">
            <li class=\"list-group-item text-muted\">Projets <i class=\"fa fa-dashboard fa-1x\"></i></li>
            <li class=\"list-group-item text-right\"><span class=\"pull-left\"><strong>Projets en cours</strong></span>?</li>
            <li class=\"list-group-item text-right\"><span class=\"pull-left\"><strong>Projets terminés</strong></span> 13</li>
          </ul>         
        </div><!--/col-3-->
    	<div class=\"col-sm-8\">   
                <hr>
                  <form class=\"form\" action=\"index.php?module=modifier&action=mettreAJourCompte&id=$idCompte\" method=\"post\" id=\"registrationForm\">
                      <div class=\"form-group\">
                          
                          <div class=\"col-xs-6\">
                              <label for=\"first_name\"><h4>Prénom</h4></label>
                              <input type=\"text\" class=\"form-control\" name=\"prenomCompte\" id=\"first_name\" value=\"$prenom\">
                          </div>
                      </div>
                      <div class=\"form-group\">
                          
                          <div class=\"col-xs-6\">
                            <label for=\"last_name\"><h4>Nom</h4></label>
                              <input type=\"text\" class=\"form-control\" name=\"nomCompte\" id=\"last_name\" value=\"$nom\">
                          </div>
                      </div>
          
                      <div class=\"form-group\">
                          
                          <div class=\"col-xs-6\">
                              <label for=\"phone\"><h4>Téléphone</h4></label>
                              <input type=\"text\" class=\"form-control\" name=\"telephoneCompte\" id=\"phone\" value = \"$telephone\">
                          </div>
                      </div>
                      <div class=\"form-group\">
                          
                          <div class=\"col-xs-6\">
                              <label><h4>Description</h4></label></br>
                              <textarea name=\"descriptionCompte\">$description</textarea>
                          </div>
                      </div>
                      <div class=\"form-group\">
                           <div class=\"col-xs-12\">
                                <br>
                                <input class=\"btn btn-lg btn-success\" type=\"submit\" value=\"Enregistrer\">
                            </div>
                      </div>
              	</form>            
              <hr>
        </div><!--/col-9-->
    </div><!--/row-->";
    }

    public function afficherAvatarActuel($image) {
        echo "<img src=\"images/images_avatar/$image\" class=\"avatar\" alt=\"avatar\" style=\"width: 200px;
  		height: 200px; border-radius: 50%;\">";
    }
}