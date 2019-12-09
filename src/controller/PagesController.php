<?php

// PagesController.php

class PagesController {

    public function home() {

        $plateformes = Plateforme::findAll();

        view('pages.home', compact('plateformes'));
    }

    public function about($id) {

        view('pages.about');
    }

    public function contact() {

        $form = new Form($_POST);

        $form->input("radio", 'civilite', 'Civilité', [1=>'M', 2=>'Mme', 3=>'Mlle'])->required()
            ->input('text', "nom", "Nom")->required()
            ->input('text', "prenom", "Prénom")->required()
            ->input('text', "email", "E-mail")->required()
            ->input('textarea', "message", "Message")->required()
            ->submit('enregistrer');

        $formulaireHtml = $form->getForm();

        $formValid  = false;
        $errors     = false; 

        // si le formulaire est validé 
        if($data = $form->valid()){

            // formulaire valide
            $formValid = true;

            // ENregistrement des données

        } else {
            // affichage des erreurs 
            $errors =  $form->displayErrors();
        }

        // vue de la page contact 
        view('pages.contact', compact('formulaireHtml', 'formValid', 'errors'));
    }
    
    public function page404() {

        view('pages.404');

    }

}