<?php


class ArticlesController {

    public function add() {

        view('articles.add');
    }

    public function save() {

        var_dump($_POST['article']);

        // traitements + enregistrment en bdd...

        // Enfin, redirection vers page de l'article quand tout est ok
        // redirectTo('article');

    }

    public function show($id) {

        echo $id;

        $article = Article::findAll();
        $var = 'var 2';
        
        view('articles.index', compact('article', 'var'));
        //echo "Affichage de l'article";
    }
}