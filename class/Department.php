<?php


class Department implements Saveable
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    function save()
    {
    }

    static function getAll()
    {
        $pdo = Db::connect();
        $sql = "SELECT * FROM department";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_FUNC, 'Department::buildFromPdo');
    }

    static function getById($id)
    {
        $pdo = Db::connect();
        $sql = "SELECT * FROM department WHERE id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_FUNC, 'Department::buildFromPdo')[0];
    }

    public static function buildFromPdo($id, $name)
    {
        return new Department($name, $id);
    }

    static function delete($id)
    {
    }

}