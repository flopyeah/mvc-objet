<?php

// PagesController.php

class PagesController {

    public function home() {

        view('pages.home');

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