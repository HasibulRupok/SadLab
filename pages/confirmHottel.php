<?php

if(isset($_POST['roomId'])){
    $roomId = $_POST['roomId'];

    require_once "../helpers/clientsApi.php";
    $sql = "SELECT * FROM `hottelRooms` WHERE parentId = $roomId;";
    $room = fetchBySql($sql, false);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['roomIdConfirmed'])){
    if ($_POST['name'] != '' && $_POST['email'] != '' && $_POST['phone'] != '' ){
        header("Location: https://paymentdemo.aamarpay.com/paymentdemo.php?demo");
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm your hottel</title>
    <link rel="stylesheet" href="../CSS/pages.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <section class="sectionBg" id="confirmHottelContainer" style="display: block;">
        <h3 style="text-align: center; padding-top: 1rem;">Please fill up this form</h3>
        <br>
        <br>
        <form action="" method="post">
        <div class="position-relative w-75 mx-auto">
            <input type="text" class="form-control border-0 rounded-pill w-100 py-3 ps-o4 pe-5 inputTag" placeholder="Type your name." id="" name="name"> <br>
        </div>
        <div class="position-relative w-75 mx-auto">
            <input type="email" class="form-control border-0 rounded-pill w-100 py-3 ps-o4 pe-5 inputTag" placeholder="Type your email." id="" name="email"> <br>
        </div>
        <div class="position-relative w-75 mx-auto">
            <input type="number" class="form-control border-0 rounded-pill w-100 py-3 ps-o4 pe-5 inputTag" placeholder="Type your phone." id="" name="phone"> <br>
        </div>

        <div style="width: 75%; margin: 1rem auto;">
            <h4><?php echo $room['title']; ?></h4>
            <p><?php echo $room['details']; ?></p>
        </div>

        <div class="button-center">
            <input type="hidden" value="<?php echo $roomId ?>" name="roomIdConfirmed">
            <Button type="submit" id="confirmButton">Confirm Booking</Button>
        </div>
        </form>
    </section>

    <section class="sectionBg" style="display: none ;">
        <div>
            <h3 style="text-align: center; padding-top: 1rem;">You Booked Your Room Successfully</h3>
        </div>
        <div class="button-center">
            <Button type="submit">Back To Home</Button>
        </div>
    </section>

    <script>
        document.getElementById("confirmButton").addEventListener('click', function () {
            console.log("clickeddddddd");
            window.location = "https://paymentdemo.aamarpay.com/paymentdemo.php?demo";
        })
    </script>
</body>

</html>