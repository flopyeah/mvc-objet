<?php

/**
 * Nous allons utiliser des méthodes issues de Db, nous disons que Article
 * est une classe enfant, elle hérite de la classe Db 
 */
class Article extends Db {

    /**
     * Attributs
     */
    protected $id;
    protected $title;
    protected $short_content;
    protected $content;
    protected $id_author;
    protected $created_at;
    protected $updated_at;

    /**
     * Constantes
     * Nous pouvons aussi définir des constantes. Ici, il s'agit du nom de la table. Ainsi, s'il venait à changer, nous n'aurons plus qu'à le changer à cet endroit.
     */
    const TABLE_NAME = "article";

    /**
     * Méthodes magiques
     */
    public function __construct($id = null) {

        /**
         * Pour chaque argument, on utilise les Setters pour attribuer la valeur à l'objet.
         * Pour appeler une méthode non statique de la classe DANS la classe, on utilise $this.
         */
        if ($id != null)
            $this->setId($id);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

     /**
     * CRUD Methods
     */
    public function save() {

        $data = [
            "title"     => $this->title(),
            "content"   => $this->content(),
            "id_author" => $this->idAuthor()
        ];

        //if ($this->id > 0) return $this->update();

        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);

        $this->setId($nouvelId);

        return $this;
    }

    public function update() {

        if ($this->id > 0) {

            $data = [
                "title"             => $this->title(),
                "short_content"     => $this->shortcontent(),
                "content"           => $this->content(),
                "id_author"         => $this->idAuthor(),
                "updated_at"        => "CURRENT_TIMESTAMP"
            ];

            Db::dbUpdate(self::TABLE_NAME, 
                            $data, 
                            ["id" => $this->id()]);

            return $this;
        }

        return;
    }

    public function delete() {
        $data = [
            'id' => $this->id(),
        ];

        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }

    public static function findAll() {

        $bdd = Db::getDb();

        $query = $bdd->prepare('SELECT *
                            FROM article ');

        // je l'execute 
        $query->execute();

        // je récupere les lignes 
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        // je retourne la liste d'articles
        return $articles;        
    }

    public static function find(array $request, $objects = true) {
        
    }

    public static function findOne(int $id, $object = true) {

    }

    public static function findByAuthor($id_author) {

    }

} // Dernière accolade correspondant à la première ligne "class Article { ..."