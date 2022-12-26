<?php
$pdo = false;
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=tourPlanner', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;
