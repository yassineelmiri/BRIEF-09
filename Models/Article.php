<?php

class Article
{

    public $id;
    public $title;
    public $description;
    public $date;
    public $insurerId;
    public $clientId;
    public $softDelete;


    public function __construct($id, $title, $description, $date, $insurerId, $clientId, $softDelete)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->insurerId = $insurerId;
        $this->clientId = $clientId;
        $this->softDelete = $softDelete;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getInsurerId()
    {
        return $this->insurerId;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getSoftDelete()
    {
        return $this->softDelete;
    }
    public function latest()
    {
        return static::database()->query('SELECT * FROM article order by id DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO assurenc VALUES(null,?,?,?)");
        return $sqlState->execute([
            $this->title,
            $this->description,
            $this->date,
            $this->insurerld,
            $this->clientld,
            $this->softDelete
        ]);
    }

    public static function view($id)
    {
        $sqlState = static::database()->prepare("SELECT * FROM assurenc WHERE id = ?");
        $sqlState->execute([
            $id
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id)
    {
        $sqlState = static::database()->prepare("
            UPDATE assurenc
            SET 
                modele = ?,
                description = ?,
                prix   = ?
            WHERE id = ?
        ");
        return $sqlState->execute([
            $this->modele,
            $this->description,
            $this->prix,
            $id
        ]);
    }

    public function destroy($id)
    {
        $sqlState = self::database()->prepare("DELETE FROM assurenc WHERE id = ?");
        return $sqlState->execute([$id]);
    }
}

?>