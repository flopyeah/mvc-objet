<?php

// PagesController.php

class PagesController {

    public function home() {

        $article = Article::findAll();

        return view('pages.home', compact('article'));
    }

    public function about($id) {

        view('pages.about');
    }

    public function contact() {

        view('pages.contact');

    }

    public function traitementForm() {

        var_dump($_POST);

    }
    
    public function page404() {

        view('pages.404');

    }

}