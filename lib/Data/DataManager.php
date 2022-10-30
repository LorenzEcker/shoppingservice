<?php


namespace Data;

use Shoppingservice\AuthenticationManager;
use Shoppingservice\Controller;
use Shoppingservice\Util;

class DataManager
{
    private static $__connection;

    public static function getConnection() {

        if (!isset(self::$__connection)) {

            $type = 'mysql';
            $host = 'localhost';
            $name = 'shoppingservice';
            $user = 'shoppingservice';
            $pass = 'shoppingservice';
            try{
                self::$__connection = new \PDO(
                    $type . ':host=' . $host . '; dbname=' . $name . ';charset=utf8',
                    $user,
                    $pass
                );
            }catch(\PDOException $e){
                print $e;
            }

        }
        return self::$__connection;
    }

    public static function exposeConnection() {
        return self::getConnection();
    }

    public static function closeConnection() {
        self::$__connection = null;
    }

    public static function close($cursor) {
        $cursor->closeCursor();
    }

    public static function query($connection, $query, $parameters = []) {
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        try {
            $statement = $connection->prepare($query);
            $i = 1;
            foreach ($parameters AS $param) {
                if (is_int($param)) {
                    $statement->bindValue($i, $param, \PDO::PARAM_INT);
                }
                if (is_string($param)) {
                    $statement->bindValue($i, $param, \PDO::PARAM_STR);
                }
                $i++;
            }
            $statement->execute();
        }
        catch (\Exception $e) {
            die($e->getMessage());
        }

        return $statement;
    }

    public static function fetchObject($cursor) {
        return $cursor->fetchObject();
    }

    public static function getUserById(int $userId) : User {
        $return = null;

        $con = self::getConnection();
        $res = self::query(
            $con,
            "SELECT userId, eMail, password, isVolunteer
			FROM user
			WHERE userId = ?
			LIMIT 1",
            [$userId]
        );

        while ($user = self::fetchObject($res)) {
            $return = new User($user->userId, $user->eMail, $user->password, $user->isVolunteer);
        }
        self::close($res);
        self::closeConnection();

        return $return;
    }

    public static function getUserByUserName(string $userName) : User {
        $return = null;

        $con = self::getConnection();
        $res = self::query(
            $con,
            'SELECT userId, eMail, password, isVolunteer
			FROM user
			WHERE eMail = ?
			LIMIT 1',
            [$userName]
        );

        if ($user = self::fetchObject($res)) {
            $return = new User($user->userId, $user->eMail, $user->password, $user->isVolunteer);
        }
        self::close($res);
        self::closeConnection();

        return $return;
    }

    public static function getShoppinglists() : array {
        $return = [];
        $con = self::getConnection();
        if(isset($_GET[Controller::SLIST_FILTER])):
            switch ($_GET[Controller::SLIST_FILTER]):
                case 'all':
                    $res = self::query(
                    $con,
                    "SELECT * 
                    FROM shoppinglist
                     WHERE deleted != 1 AND creator = ?", [$_SESSION[Controller::USER]]);
                break;
                case 'myopen':
                    $res = self::query(
                        $con,
                        "SELECT * 
                    FROM shoppinglist
                    WHERE creator = ? AND done = 0 AND deleted != 1", [$_SESSION[Controller::USER]]);
                break;
                case 'mydone':
                    $res = self::query(
                        $con,
                        "SELECT * 
                    FROM shoppinglist
                    WHERE creator = ? AND done = 1 AND deleted != 1", [$_SESSION[Controller::USER]]);
                    break;
                case 'allopen':
                    $res = self::query(
                        $con,
                        "SELECT * 
                    FROM shoppinglist
                    WHERE volunteer = 0 AND done = 0 AND deleted != 1");
                    break;
                case 'mytooken':
                    $res = self::query(
                        $con,
                        "SELECT * 
                    FROM shoppinglist
                    WHERE volunteer = ? AND done = 0 AND deleted != 1", [$_SESSION[Controller::USER]]);
                    break;
                default:
                    Util::redirect('index.php');
                break;
            endswitch;
        endif;

        while ($sList = self::fetchObject($res)) {
            if($sList->volunteer == null){
                $sList->volunteer = 0;
            }
        $return[] = new Shoppinglist($sList->shoppinglistId,
                                     $sList->creator,
                                     $sList->completeUntil,
                                     $sList->done,
                                     $sList->totalCost,
                                     $sList->volunteer);
        }

        self::close($res);
        self::closeConnection();
        return $return;
    }

    public static function getItemsOfShoppinglist(int $sListId) : array {
        $ret = [];
        $con = self::getConnection();
        $res = self::query($con,
        'SELECT * FROM article WHERE shoppinglistId = ? AND deleted != 1',
            [$sListId]);

        while ($book = self::fetchObject($res)) {
            $ret[] = new Article($book->articleId, $book->shoppinglistId, $book->name, $book->maxPrice, $book->ammount, $book->creator);
        }

        self::close($res);
        self::closeConnection();

        return $ret;
    }

    public static function getListCount() : array {
        $con = self::getConnection();
        $resTotalC = self::query($con,
            "SELECT COUNT(*) AS total
            FROM shoppinglist
            WHERE creator = ? AND deleted != 1", [$_SESSION[Controller::USER]]);

        $resDoneC = self::query($con,
        "SELECT COUNT(*) AS done
        FROM shoppinglist
        WHERE done = 1 AND 
        creator = ?  AND deleted != 1", [$_SESSION[Controller::USER]]);

        $resTotal = self::fetchObject($resTotalC);
        $resDone = self::fetchObject($resDoneC);

        self::close($resDoneC);
        self::close($resTotalC);
        self::closeConnection();

        return $return = array('total' => $resTotal->total,
            'open' => $resTotal->total - $resDone->done,
            'done' => $resDone->done);
    }

    public static function getArticle($articleId) : Article{
        $con = self::getConnection();

        $res = self::query($con,"SELECT *
        FROM article WHERE articleId = ? AND deleted != 1 LIMIT 1", [$articleId]);

        $return = self::fetchObject($res);

        self::close($res);
        self::closeConnection();

        return $return = new Article($return->articleId,
            $return->shoppinglistId,
            $return->name,
            $return->maxPrice,
            $return->ammount,
            $return->creator);
    }

    public static function setArticleDeleted(int $articleId){
        $con = self::getConnection();
        $res = self::query($con,
            "UPDATE article SET deleted = 1 WHERE articleId = ?", [$articleId]);
        self::close($res);
        self::closeConnection();
    }

    public static function setListDeleted(int $listId){
        $con = self::getConnection();
        $res = self::query($con,
            "UPDATE shoppinglist SET deleted = 1 WHERE shoppinglistId = ?", [$listId]);
        self::close($res);
        self::closeConnection();
    }

    public static function addList()
    {
        $con = self::getConnection();

        $res = self::query($con,
            "INSERT INTO shoppinglist (creator, completeUntil, done, totalCost, volunteer) VALUES (
            ?, 
            ?, 
            0, 
            0,
            0)", [$_SESSION['user'], $_POST['completeUntil']]);
        self::close($res);

        $res = self::query($con, "SELECT MAX(shoppinglistId) as lid 
                                        FROM shoppinglist 
                                        WHERE creator = ?", [$_SESSION['user']]);

        $listId = self::fetchObject($res);

        for ($i = 0; $i < $_POST['entries']; $i++) {
            $res = self::query($con,
        "INSERT INTO article (shoppinglistId, name, maxPrice, ammount, creator, deleted) VALUES (
                                            ?, 
                                            ?,
                                            ?,
                                            ?,
                                            ?,
                                            0)", [$listId->lid, $_POST['name' . $i], $_POST['maxPrice' . $i], $_POST['ammount' . $i], $_SESSION['user']]);
        }
        self::closeConnection();
    }

    public static function editArticle()
    {
        $con = self::getConnection();
        $res = self::query($con, "
                            UPDATE article 
                            SET name=?,
                                maxPrice=?,
                                ammount=?
                            WHERE articleId = {$_POST['aid']}", [$_POST['name'], $_POST['maxPrice'], $_POST['ammount']]);
        self::close($res);
        self::closeConnection();
    }

    public static function addArticle()
    {
        $con = self::getConnection();
        $res = self::query($con, "INSERT INTO article (shoppinglistId, name, maxPrice, ammount, creator, deleted) VALUES (?, ?, ?, ?, ?, 0)",
        [$_POST['lid'], $_POST['name'], $_POST['maxPrice'], $_POST['ammount'], $_SESSION['user']]);
        self::close($res);
        self::closeConnection();
    }

    public static function takeList()
    {
        $con = self::getConnection();
        $res = self::query($con, "UPDATE shoppinglist SET volunteer = ? WHERE shoppinglistId = ?", [$_SESSION[Controller::USER] ,$_REQUEST['lid']]);
        self::close($res);
        self::closeConnection();
    }

    public static function setDone()
    {
        $con = self::getConnection();
        $res = self::query($con, "UPDATE shoppinglist SET done = 1 WHERE shoppinglistId = ?", [$_REQUEST['lid']]);
        $res = self::query($con, "UPDATE shoppinglist SET totalCost = ? WHERE shoppinglistId = ?", [$_REQUEST['toCo'], $_REQUEST['lid']]);
        self::close($res);
        self::closeConnection();
    }

    public static function createLog(string $text)
    {
        $con = self::getConnection();
        $res = self::query($con, "INSERT INTO log (ipAddress, action, user) VALUES (?, ?, ?)", [$_SERVER['REMOTE_ADDR'], $text, $_SESSION[Controller::USER]]);
        self::close($res);
        self::closeConnection();
    }
}