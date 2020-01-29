<?php


class User implements Saveable
{
    private $id; //PK
    private $firstName;
    private $lastName;
    private $passWord;
    private $education_start_date;

    /**
     * User constructor.
     * @param $id
     * @param $firstName
     * @param $lastName
     * @param $passWord
     * @param $education_start_date
     */
    public function __construct($id, $firstName, $lastName, $passWord, $education_start_date)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->passWord = $passWord;
        $this->education_start_date = $education_start_date;
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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

    /**
     * @return mixed
     */
    public function getEducationStartDate()
    {
        return $this->education_start_date;
    }

    function save()
    {
    }


    static function getAll()
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM user";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_FUNC, 'User::buildFromPdo');
        } catch (Exception $e) {
        }
    }

    static function getById($id)
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM user WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_FUNC, 'User::buildFromPdo')[0];
        } catch (Exception $e) {
        }
    }
    public static function buildFromPdo($id, $firstName, $lastName, $passWord, $education_start_date)
    {
        return new User($id, $firstName, $lastName, $passWord, $education_start_date);
    }

}