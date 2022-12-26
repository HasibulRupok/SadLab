<?php

if (isset($_POST['hottelId'])) {
    $hotelId = $_POST['hottelId'];

    require_once "../helpers/clientsApi.php";
    $sql = "SELECT * FROM `hottelRooms` WHERE parentId = $hotelId;";
    $rooms = fetchBySql($sql, true);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/pages.css">
</head>

<body>
    <section class="container-xxl py-5" id="fullHottelContainer">
        <div class="text-center">
            <!-- <h6 class="section-title bg-white text-center text-primary px-3">Blogs</h6> -->
            <h2 class="mb-5">These rooms are available wight now</h2>
            <h3 class="mv-5">Please select your room</h3>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4" id="hottelCards">

            <?php foreach ($rooms as $room):  ?>
                <?php if($room['isBooked'] == 1) continue; ?>
            <form class="col" method="POST" action="confirmHottel.php">
                <div class="card h-100">
                    <?php $imgAdd = '../admin/hotelRooms/' . $room['image']; ?>
                    <img src="../img/hottel.jpeg" class="card-img-top postImage" alt="...">
                    <button class="hBookingCardBtn">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $room['title']; ?></h5>
                            <p class="card-text"><?php echo $room['details']; ?> </p>

                            <p class="bookNow">Book Now</p>
                            <input type="text" value="<?php echo $room['id']; ?>" name="roomId" class="hidden">
                        </div>
                    </button>
                </div>
            </form>
            <?php endforeach;  ?>


        </div>

    </section>
</body>

</html>