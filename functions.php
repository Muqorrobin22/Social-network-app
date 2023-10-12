<?php 

    $host = "localhost";
    $data = "muqorrobinsnest";
    $user = "muqorrobin";
    $pass = "Murshidku";
    $chrs = "utf8mb4";
    $attr = "mysql:host=$host;dbname=$data;charset$chrs";


    try {
        $pdo = new PDO($attr, $user, $pass);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    function createTable($name, $query) {
        queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br>";
    }

    function queryMysql($query) {
        global $pdo;
        return $pdo->query($query);
    }

    function destroySession() {
        $_SESSION = array();

        if(session_id() != "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time()-2592000, '/');
        }

        session_destroy();

    }

    function sanitizeString($var) {
        global $pdo;
        $var = strip_tags($var);
        $var = htmlentities($var);
        if(get_magic_quotes_gpc()) {
            $var = stripslashes($var);
        }

        $result = $pdo->quote($var);

        return str_replace("'". "", $result);
    }


    function showProfile($user) {

        global $pdo;
        
        if(file_exists("$user.jpg")) {
            echo "<img src='$user.jpg' style='float:left;' />";
        }

        $result = $pdo->query("SELECT * FROM profiles WHERE user='$user'");


        while ($row = $result->fetch()) {
            die(stripslashes($row['text'])) . "<br style='clear:left;' />";
        }

        echo "<p>Nothing to see here, yet</p><br>";

    }

?>