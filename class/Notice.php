<?php


class Notice implements Saveable
{

    private $id;
    private $user_id;
    private $notice_date;
    private $notice;

    /**
     * Notice constructor.
     * @param $id
     * @param $user_id
     * @param $notice_date
     * @param $notice
     */
    public function __construct($id, $user_id, $notice_date, $notice)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->notice_date = $notice_date;
        $this->notice = $notice;
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
    public function getNoticeDate()
    {
        return $this->notice_date;
    }

    /**
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }


    function save()
    {
        if ($this->getId() == null) {
            try {
                $pdo = Db::connect();
                $sql = "INSERT INTO notice(id, user_id, notice_date, notice) VALUES(NULL, :user_id, :notice_date, :notice)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
                $stmt->bindParam(':notice_date', $this->notice_date, PDO::PARAM_STR);
                $stmt->bindParam(':notice', $this->notice, PDO::PARAM_STR);
                $result = $stmt->execute();
            } catch (Exception $e) {
            }
        } else {
            try {
                $pdo = Db::connect();
                $sql = "UPDATE notice SET notice=:notice WHERE id=:id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':notice', $this->notice, PDO::PARAM_STR);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                $result = $stmt->execute();
            } catch (Exception $e) {
            }
        }
        return $result;
    }

    /*static function getAllAsArray()
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM notice";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }
    }*/

    /*static function getByIdAsArray($id)
    {
        try {
            $pdo = Db::connect();
            $sql = "SELECT * FROM notice WHERE id=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }
    }*/

    static function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public static function buildFromPdo($id, $user_id, $notice_date, $notice)
    {
        return new Notice($id, $user_id, $notice_date, $notice);
    }
}