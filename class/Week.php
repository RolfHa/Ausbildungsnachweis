<?php


class Week
{
    function getWeek($sqlDate, $user_id) //Datum kommt als yyy-mm-dd String
    {
        try {
            $sheet = [];
            $date = new DateTime();
            $dt = explode('-', $sqlDate);//array erzeugt
            $date->setDate($dt[0], $dt[1], $dt[2]);//Datum gesetzt
            $date->sub(new DateInterval('P' . ($date->format('w')) . 'D'));//DateTime Objekt is Sonntag
            $dateMonday = clone $date;
            $dateMonday->add(new DateInterval('P1D'));//DateTime Objekt is Montag
            $dateSunday = clone $dateMonday;
            $dateSunday->add(new DateInterval('P6D'));//DateTime Objekt is Sonntag

            for ($i = 0; $i < 7; $i++) { //prüfe, ob für jeden Tag ein Day Objekt da ist
                $date->add(new DateInterval('P1D'));
                $dateCheck = $date->format('Y-m-d');

                $pdo = Db::connect();
                $sql = "SELECT * FROM day WHERE date_of_day =? AND user_id= ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$dateCheck, $user_id]);

                $day = null;

                if ($stmt->rowCount() === 1) { //wenn ein day Objekt da ist, dann hol es
                    $pdo = Db::connect();
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$dateCheck, $user_id]);
                    $day = $stmt->fetchAll(PDO::FETCH_FUNC, 'Day::buildFromPdo')[0];

                } else { //wenn nicht, erstelle eins und gib es
                    $emptyDay = new Day(NULL, $user_id, $dateCheck, '', 0, 0, 1);
                    $emptyDay->save();
                    $day = $emptyDay;
                }
                $sheet[] = ToReflect::entity2array($day);//Reflektion Notiz
            }

            $noticeDate = $dateMonday->format('Y-m-d');

            $pdo = Db::connect();
            $sql = "SELECT * FROM notice WHERE notice_date =? AND user_id= ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$noticeDate, $user_id]);
            $notice = null;

            if ($stmt->rowCount() === 1) {//Wenn ein Notiz Objekt da ist, dann hol es
                $pdo = Db::connect();
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$noticeDate, $user_id]);
                $notice = $stmt->fetchAll(PDO::FETCH_FUNC, 'Notice::buildFromPdo')[0];
            } else { //wenn nicht, erstelle eins und gib es
                $emptyNotice = new Notice(NULL, $user_id, $noticeDate, '');
                $emptyNotice->save();
                $notice = $emptyNotice;
            }
            $document = ToReflect::entity2array($notice);
            $data = [];
            $data[0] = $document;
            $data[1] = $sheet;

        } catch
        (Exception $e) {
        }
        var_dump($data);
        return $data;
    }

}