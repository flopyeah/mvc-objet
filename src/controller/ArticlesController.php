<?php


class ArticlesController {

    public function add() {

        $article = new Article(8);

        

        var_dump($article);
        var_dump($article->setTitle('florian'));

        
        $article = new Article();

        

        var_dump($article);
        var_dump($article->setTitle('florian'));

        view('articles.add');
    }

    public function save() {

        var_dump($_POST['article']);

        // traitements + enregistrment en bdd...

        // Enfin, redirection vers page de l'article quand tout est ok
        // redirectTo('article');

    }

    public function show($id, $slug) {

        echo $id;
        echo $slug;

        $articles = Article::findAll();
        
        view('articles.index', compact('articles'));
    }

    public function showId($id) {

        echo $id;

        $articles = Article::findAll();
        $var = 'var 2';
        
        view('articles.index', compact('articles', 'var'));
    }
    
}