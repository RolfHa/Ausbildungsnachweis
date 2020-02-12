<?php


class Day implements Saveable
{
    private $id; //PK
    private $user_id; //FK
    private $date_of_day;
    private $description;
    private $hours;
    private $totalHours;
    private $modul_id; //FK

    /**
     * Day constructor.
     * @param $id
     * @param $user_id
     * @param $date_of_day
     * @param $description
     * @param $hours
     * @param $totalHours
     * @param $modul_id
     */
    public function __construct($id, $user_id, $date_of_day, $description, $hours, $totalHours, $modul_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->date_of_day = $date_of_day;
        $this->description = $description;
        $this->hours = $hours;
        $this->totalHours = $totalHours;
        $this->modul_id = $modul_id;
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
     * @return string
     */
    public function getDateOfDay()
    {
        return $this->date_of_day;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
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
     * @return int
     */
    public function getModulId()
    {
        return $this->modul_id;
    }

    function save()
    {
        if ($this->getId() == null) {
            try {
                $pdo = Db::connect();
                $sql = "INSERT INTO day(id, user_id, date_of_day, description, hours, totalHours, modul_id) VALUES(NULL, :user_id, :date_of_day, :description, :hours, :totalHours, :modul_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':date_of_day', $this->date_of_day, PDO::PARAM_STR);
                $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
                $stmt->bindParam(':hours', $this->hours, PDO::PARAM_INT);
                $stmt->bindParam(':totalHours', $this->totalHours, PDO::PARAM_INT);
                $stmt->bindParam(':modul_id', $this->modul_id, PDO::PARAM_INT);

                $result = $stmt->execute();
            } catch (Exception $e) {
            }
        } else {
            try {
                $pdo = Db::connect();
                $sql = "UPDATE day SET description=:description, hours=:hours, totalHours=:totalHours, modul_id=:modul_id WHERE id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
                $stmt->bindParam(':hours', $this->hours, PDO::PARAM_INT);
                $stmt->bindParam(':totalHours', $this->totalHours, PDO::PARAM_INT);
                $stmt->bindParam(':modul_id', $this->modul_id, PDO::PARAM_INT);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                $result = $stmt->execute();
            } catch (Exception $e) {
            }
        }
        return $result;
    }

    /*
    static function getAll()
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM day";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_FUNC, 'Day::buildFromPdo');

        } catch (Exception $e) {
        }
    }
    */

    static function getById($id)
    {
        try {
            $pdo = Db::connect();
            $stmt = $pdo->prepare("SELECT * FROM day WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_FUNC, 'Day::buildFromPdo')[0];
        } catch (Exception $e) {
        }
    }

    public static function buildFromPdo($id, $user_id, $date_of_day, $description, $hours, $totalHours, $modul_id)
    {
        return new Day($id, $user_id, $date_of_day, $description, $hours, $totalHours, $modul_id);
    }


}