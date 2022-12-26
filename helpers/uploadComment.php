<?php
if (isset($_POST['name']) && isset($_POST['userId']) && isset($_POST['postId']) && isset($_POST['comment']) ){
    $name = $_POST['name'];
    $userId = $_POST['userId'];
    $postId = $_POST['postId'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO `comments`(`postId`, `userId`, `userName`, `cmnt`) VALUES ('$postId','$userId','$name','$comment')" ;
    $pdo = require_once "dbConnector.php";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $returnValue = "<div class='eachComment'>
                      <h6 class='commenter'>".$name."</h6>
                      <p class='commentContent'>".$comment."</p>
                    </div>" ;
    echo $returnValue;
}
