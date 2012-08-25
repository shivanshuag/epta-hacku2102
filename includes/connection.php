<?php
require_once("constants.php");

try{
    $connection = $dbh = new PDO('mysql:host='.DB_SERVER.';dbname='.DATABASE, DB_USER, DB_PASS);
}catch(PDOException $e) {
    log_error($e->getMessage());
    die;
}
?>
