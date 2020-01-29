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

    static function getAll()
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM department ORDER  BY name REGEXP '^[a-z]' DESC , name "; //ABWESEND am Ende
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_FUNC, 'Department::buildFromPdo');
        } catch (Exception $e) {
        }
    }

    static function getById($id)
    {
        try {
            $pdo = Db::connect();
            $stmt = $pdo->prepare("SELECT * FROM department WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_FUNC, 'Department::buildFromPdo')[0];
        } catch (Exception $e) {
        }
    }

    public static function buildFromPdo($id, $name)
    {
        return new Department($id, $name);
    }


}