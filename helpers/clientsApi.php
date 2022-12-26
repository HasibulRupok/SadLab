<?php

function fetchPost(){
    $pdo = require_once "dbConnector.php";
    $statement = $pdo->prepare("SELECT id, title, description, image FROM postInfo ORDER BY id DESC;");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetchDataByKey($key, $columnName, $table){
    $sql = "SELECT * FROM `$table` WHERE $columnName LIKE '%$key%';" ;
    $pdo = require_once "dbConnector.php";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function fetchBySql($sql, $isAll){
    $pdo = require_once "dbConnector.php";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if($isAll){
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function fetchALLData($table, $isAll){
    $pdo = require_once "dbConnector.php";
    $sql = "SELECT * FROM `$table`";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if($isAll){
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function fetchPackageImage($sql, $isAll, $pdo){
    $pdo = include_once "../helpers/dbConnect2.php";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if($isAll){
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function insertSql($sql){
    $pdo = require_once "dbConnector.php";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $pdo = false;
}

function fetchIdBySql($sql){
    $pdo = require_once "dbConnector.php";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $id = $statement->fetch(PDO::FETCH_ASSOC);
    $pdo = false;
    return $id;
}

function fetchComments($postId){
    $sql = "SELECT * FROM `comments` WHERE postId = 11;";
    $pdo = require_once "dbConnector.php";

    $statement = $pdo->prepare($sql);
    $statement->execute();
    $comments = $statement->fetch(PDO::FETCH_ASSOC);
    $pdo = false;
    $statement = false;

    return $comments;
}