<?php


class Day
{

    private $id; //PK
    private $user_id; //FK
    private $date_of_day;
    private $description;
    private $hours;
    private $totalHours;
    private $department_id; //FK

    /**
     * Day constructor.
     * @param $id int
     * @param $user_id
     * @param $date_of_day
     * @param $description
     * @param $hours
     * @param $totalHours
     * @param $department_id
     */
    public function __construct($id, $user_id, $date_of_day, $description, $hours, $totalHours, $department_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->date_of_day = $date_of_day;
        $this->description = $description;
        $this->hours = $hours;
        $this->totalHours = $totalHours;
        $this->department_id = $department_id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return
     */
    public function getDateOfDay()
    {
        return $this->date_of_day;
    }

    /**
     * @return String
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return String
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @return int
     */
    public function getTotalHours()
    {
        return $this->totalHours;
    }

    /**
     * @return mixed
     */
    public function getDepartmentId()
    {
        return $this->department_id;
    }


    function save()
    {
        if ($this->getId() == null) {
            try {
                $pdo = Db::connect();
                $sql = "INSERT INTO day(id, user_id, date_of_day, description, hours, totalHours, department_id) VALUES(NULL, :user_id, :date_of_day, :description, :hours, :totalHours, :department_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':date_of_day', $this->date_of_day, PDO::PARAM_STR);
                $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
                $stmt->bindParam(':hours', $this->hours, PDO::PARAM_INT);
                $stmt->bindParam(':totalHours', $this->totalHours, PDO::PARAM_INT);
                $stmt->bindParam(':department_id', $this->department_id, PDO::PARAM_INT);
                $result = $stmt->execute();
            } catch (Exception $e) {
            }
        } else {
            try {
                $pdo = Db::connect();
                $sql = "UPDATE day SET description=:description, hours=:hours, totalHours=:totalHours, department_id=:department_id WHERE id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
                $stmt->bindParam(':hours', $this->hours, PDO::PARAM_INT);
                $stmt->bindParam(':totalHours', $this->totalHours, PDO::PARAM_INT);
                $stmt->bindParam(':department_id', $this->department_id, PDO::PARAM_INT);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                $result = $stmt->execute();
            } catch (Exception $e) {
            }
        }
        return $result;
    }

    static function getAll()
    {
        $pdo = Db::connect();
        $sql = "SELECT * FROM day";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_FUNC, 'Day::buildFromPdo');
    }

    static function getById($id)
    {
        $pdo = Db::connect();
        $sql = "SELECT * FROM day WHERE id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_FUNC, 'Day::buildFromPdo');
    }

    public static function buildFromPdo($id, $user_id, $date_of_day, $description, $hours, $totalHours, $department_id)
    {
        return new Day($id, $user_id, $date_of_day, $description, $hours, $totalHours, $department_id);
    }

    static function delete($id)
    {
    }
}