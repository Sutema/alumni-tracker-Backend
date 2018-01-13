<?php

require_once('vendor/autoload.php');

$app = new \Slim\App;

$app->get('/users', 'getUsers'); // Using Get HTTP Method and process getUsers function


$app->get('/', function ($request, $response, $args) {
    $response->write("Welcome to Slim!");
    return $response;
});

function getConnection() {
    try {
        $db_username = "id3578347_sutemadb";
        $db_password = "11112017abc";
        $conn = new PDO('mysql:host=localhost;dbname=id3578347_sutema_db', $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}

function getUsers() {
    $sql_query = "SELECT * FROM `users`";
    try {
        $dbCon = getConnection();
        $stmt   = $dbCon->query($sql_query);
        $users  = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbCon = null;
        echo '{"users": ' . json_encode($users) . '}';
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }    
}

$app->run();

?>