<?php

/**
 * Nous allons utiliser des méthodes issues de Db, nous disons que Article
 * est une classe enfant, elle hérite de la classe Db 
 */
class Plateforme extends Db {

    /**
     * Propietés 
     */
    protected $id;
    protected $nom;
    protected $slug;
    protected $image;

    /**
     * Constantes
     * Nous pouvons aussi définir des constantes. Ici, il s'agit du nom de la table. Ainsi, s'il venait à changer, nous n'aurons plus qu'à le changer à cet endroit.
     */
    const TABLE_NAME = "plateforme";

    /**
     * Méthodes magiques
     */
    public function __construct( $id = null ) {

        /**
         * Pour chaque argument, on utilise les Setters pour attribuer la valeur à l'objet.
         * Pour appeler une méthode non statique de la classe DANS la classe, on utilise $this.
         */
        if ( $id != null ) {
            $this->setId($id);
        }
    }

     /**
     * CRUD Methods
     */
    public static function save($data) {

        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);

        return $nouvelId;
    }

    public static function update($data, $id) {

        Db::dbUpdate(self::TABLE_NAME, 
                        $data, 
                        ["p_id" => $id]);

        return;
    }

    public static function delete($id) {

        Db::dbDelete(self::TABLE_NAME, ['p_id' => $id ]);
        
        return;
    }

    public static function findAll() {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM plateforme ');

        // je l'execute 
        $query->execute();

        // je récupere les lignes 
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        // je retourne la liste d'articles
        return $articles;        
    }

    public static function findOne(int $id) {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM plateforme 
                            WHERE p_id = :id');

        // je l'execute 
        $query->execute([
            'id' => $id
        ]);

        // je récupere les lignes 
        $plateforme = $query->fetch(PDO::FETCH_ASSOC);

        // je retourne la liste d'articles
        return $plateforme;   

    }


    /**
     * Get propietés
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set propietés
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
} 