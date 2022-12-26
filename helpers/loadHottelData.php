<?php

if (isset($_GET['location'])) {
    require_once "clientsApi.php";
    $key = $_GET['location'];
    $hotels = fetchDataByKey($key, "rating", "hottels");

    echo json_encode($hotels);
}

