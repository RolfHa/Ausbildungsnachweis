<?php


class Department
{

    private $id; //PK
    private $name;

    /**
     * Department constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    function save()
    {
    }

    static function getAllAsArray()
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM department ORDER  BY name REGEXP '^[a-z]' DESC , name "; //ABWESEND am Ende
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }
    }

    static function getByIdAsArray($id)
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM department WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $stmt;
        } catch (Exception $e) {
        }
    }


}