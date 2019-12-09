<?php

class PlateformesController {

    public function list() {

        $plateforme = Plateforme::findAll();
        
        view('plateforme.index', compact('plateforme'));
    }

    public function show($id, $slug) {

        $plateforme = Plateforme::findOne($id);
        
        view('plateforme.index', compact('plateforme'));
    }

    public function update($id) {

        $plateforme = Plateforme::findOne($id);

        $form = new Form([
            'nom'   => $plateforme['p_nom'],
            'image' => $plateforme['p_image'],
        ]);

        $form->input('text', "nom", "Nom")->required()
            ->input('text', "image", "image")->required()
            ->submit('enregistrer');

        $formulaireHtml = $form->getForm();

        $formValid  = false;
        $errors     = false; 

        // si le formulaire est validé 
        if (!empty($_POST)) {
            if($data = $form->valid()){

                // formulaire valide
                $formValid = true;

                // Enregistrement des données
                Plateforme::update([
                    "p_nom"     => $_POST['nom'],
                    "p_slug"    => slugify($_POST['nom']),
                    "p_image"   => $_POST['image']
                ], $id);

            } else {
                // affichage des erreurs 
                $errors =  $form->displayErrors();
            }
        }
        
        // vue de la page contact 
        view('plateforme.add', compact('formulaireHtml', 'formValid', 'errors'));
    }


    public function add() {

        $form = new Form($_POST);

        $form->input('text', "nom", "Nom")->required()
            ->input('text', "image", "image")->required()
            ->submit('enregistrer');

        $formulaireHtml = $form->getForm();

        $formValid  = false;
        $errors     = false; 

        
        // si le formulaire est validé 
        if (!empty($_POST)) {
            
            if($data = $form->valid()){

                // formulaire valide
                $formValid = true;
            
                // Enregistrement des données
                $id = Plateforme::save([
                    "p_nom"     => $data['nom'],
                    "p_slug"    => slugify($data['nom']),
                    "p_image"   => $data['image']
                ]);

                // redirection apres ajout en BDD 
                redirectTo('plateforme/update/'.$id);

            } else {
                // affichage des erreurs 
                $errors =  $form->displayErrors();
            }
        }
        
        // vue de la page contact 
        view('plateforme.add', compact('formulaireHtml', 'formValid', 'errors'));
    }
    
    
}