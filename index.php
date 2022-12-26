<?php
require_once "helpers/clientsApi.php";
$posts = fetchPost();

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=tourPlanner', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->prepare("SELECT * FROM `package`");
$statement->execute();
$packages = $statement->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>";
//var_dump($packages);
//echo "</pre>";
session_start();
$isLogin = 'nope';
$userName = "";
$userId = "";

if (isset($_SESSION["user"])){
    $isLogin = 'yep';
    $userName = $_SESSION["user"]['name'];
    $userId = $_SESSION["user"]['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Planner</title>
    
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- custom Css -->
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <!-- header starts -->
    <header>
        <!-- navbar starts -->
        <!-- Top Navbar  -->
        <div class="container-fluid bg-dark px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York,
                            USA</small>
                        <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                        <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top navbar ends  -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="../index.php" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <a href="package.html" class="nav-item nav-link">Packages</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="destination.html" class="dropdown-item">Destination</a>
                                <a href="booking.html" class="dropdown-item">Booking</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="signIn.php" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
                </div>
            </nav>


        </div>
        <!-- Navbar & Hero End -->



        <!-- navbar ends  -->

        <!-- first-section -->
        <div class="contain-fluid position-relative p-0 ">



            <div class="container-fluid bg-primary py-5 mb-5 first-section">
                <div class="container py-5">
                    <div class="row justify-content-center py-5">
                        <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-3 text-white mb-3">Do Enjoy your Vacation</h1>
                            <p class="fs-4 text-white mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Velit soluta tempora laudantium facilis possimus blanditiis nihil, corrupti non?</p>
                            <div class="position-relative w-75 mx-auto">
                                <input type="text" class="form-control border-0 rounded-pill w-100 py-3 ps-o4 pe-5" placeholder="Type your location." id="searchPlaceId">
                                <!-- button  -->
                                <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top:7px;" onclick="placeInfoSearch()">Find</button>
                            </div>

                            <p id="locationError" style="display: none;">Please Enter a city name of Bangladesh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </header>
    <!-- header ends -->

    <main>

        <!-- About section  -->
        <section>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img src="./img/About_us_bg.png" alt="" style="object-fit: cover;" class="img-fluid position-absolute w-100 h-100">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h1 class="section-title bg-white text-center text-dark pe-3">About Us</h1>
                            <h2 class="mb-4 text-center">Welcome to <span class="text-primary">Tour Planner</span></h2>



                            <p class="mb-4">The best way to plan your tour with the help of our guidence</p>
                            <p class="mb-4">We offer many things Which is very essential for your trip.Best wishes for you trip</p>
                            <div class="row gy-2 gx-4 mb-4">
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="me-2">User Guide</i></p>
                                    <p class="mb-0"><i class="me-2">Weather Information</i></p>
                                    <p class="mb-0"><i class="me-2">Hotel Booking</i></p>
                                    <p class="mb-0"><i class="me-2">Bus Ticket Booking</i></p>
                                    <p class="mb-0"><i class="me-2">Packages</i></p>


                                </div>
                            </div>

                            <!-- button  -->
                            <div class="btn btn-primary py-3 px-5 mt-2"><a style="text-decoration: none ; color: cornsilk;" href="about.html">Read More</a></div>


                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!-- About Section Ends  -->


        <!-- Blog -Section starts  -->

        <!--        --><?php
                        //            echo "<pre>";
                        //            var_dump($posts);
                        //            echo "/<pre>";
                        //        
                        ?>
        <section>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center">
                        <!-- <h6 class="section-title bg-white text-center text-primary px-3">Blogs</h6> -->
                        <h1 class="mb-5">Trending Blogs</h1>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php foreach ($posts as $post) : ?>
                            
                            <div class="col">
                                <div class="card h-100">
                                    <?php $imgAdd = 'admin/' . $post['image']; ?>
                                    <img src="<?php echo $imgAdd; ?>" class="card-img-top postImage" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $post['title']; ?></h5>
                                        <p class="card-text"><?php echo $post['description']; ?></p>
                                    </div>
                                    <div class="commentBox">
                                        <input id="<?php echo $post['id'].'-input'; ?>" width="100px" type="text" name="CommentText" placeholder="write your comment...">
                                        <button onclick="makeComment(this.value)" value="<?php echo $post['id']; ?>">Comment</button>
                                    </div>
                                        <?php
                                        $pId = $post['id'];
                                        $sql = "SELECT * FROM `comments` WHERE postId = $pId;";
                                        $statement = $pdo->prepare($sql);
                                        $statement->execute();
                                        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        ?>

                                    <div class="CommentContainer" id="<?php echo $post['id'].'-commentCon'; ?>" style="max-height:20vh; overflow-y: scroll; overflow-x: hidden;">
                                     <?php if (is_array($comments)): ?>
                                        <?php foreach ($comments as $comment): ?>
                                        <div class="eachComment">
                                            <h6 class="commenter"><?php echo $comment['userName']; ?></h6>
                                            <p class="commentContent"><?php echo $comment['cmnt']; ?></p>
                                        </div>
                                        <?php endforeach; ?>
                                     <?php endif; ?>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>


                </div>
            </div>
        </section>

        <!-- Blog-Section Ends  -->

        <!-- hottel section start  -->
        <section class="container-xxl py-5" id="fullHottelContainer">
            <div class="text-center">
                <!-- <h6 class="section-title bg-white text-center text-primary px-3">Blogs</h6> -->
                <h1 class="mb-5">Search Your Hottel Here</h1>
            </div>
            <div class="position-relative w-75 mx-auto">
                <input type="text" class="form-control border-0 rounded-pill w-100 py-3 ps-o4 pe-5" placeholder="Type your location." id="searchHottelId">
                <!-- button  -->
                <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top:7px;" onclick="" id="findHottel">Find</button>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4" id="hottelCards" style="visibility:hidden ;">

                <div class="col">
                    <form action="pages/selectHottel.php" method="POST" class="hottelCard">
                        <button type="submit" style="width:100%;">
                            <div class="card h-100 hottelCardBg">
                                <div class="card-body">
                                    <h5 class="card-title">Hottel TajMahal</h5>
                                    <p class="card-text"> <i class="fa-solid fa-location-dot"></i> CoxBazar Kalatoli</p>
                                    <p class="card-text">Reating: 5 <i class="fa-solid fa-star"></i></p>
                                    <input type="hidden" value="hottelId" name="hottelId">
                                </div>
                            </div>
                        </button>
                    </form>
                </div>

            </div>

        </section>

        <!-- Sevice-section  -->
        <section>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center">
                        <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                        <h1 class="mb-5">Our Services</h1>
                    </div>
                    <div class="row g-4">



                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                                    <h5>WorldWide Toures</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                                    <h5>Hotel Reservation</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-user text-primary mb-4"></i>
                                    <h5>User Guide</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                                    <h5>Event Management</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                                    <h5>WorldWide Toures</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                                    <h5>Hotel Reservation</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-user text-primary mb-4"></i>
                                    <h5>User Guide</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-log-3 col-sm-6 ">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                                    <h5>Event Management</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa eum debitis
                                        delectus aliquid? Voluptates, facilis.

                                    </p>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <!-- service-section ends  -->


        <!-- Destination-Section  -->

        <section>
            <div class="container-xxl py-5 destination">
                <div class="container">
                    <div class="text-center">
                        <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                        <h1 class="mb-5">Popular Destination</h1>
                    </div>

                    <div class="row g-3">
                        <div class="col-lg-7 col-md-6">
                            <div class="row g-3">

                                <div class="col-lg-12 col-md-12">
                                    <a href="" class="d-block position-relative overflow-hidden">
                                        <img src="./img/popular1_sundorban.png" alt="" class="img-fluid">
                                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2 ">
                                            30% off</div>
                                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                            Sundarbans</div>
                                    </a>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <a href="#" class="d-block position-relative overflow-hidden">
                                        <img src="./img/Popular2_Srimongol.png" alt="" class="img-fluid">
                                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2 ">
                                            50% off</div>
                                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                            Srimagal</div>
                                    </a>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <a href="#" class="d-block position-relative overflow-hidden">
                                        <img src="./img/popular3_Rangamati.png" alt="" class="img-fluid">
                                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2 ">
                                            25% off</div>
                                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                            Rangamati</div>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6" style="min-height: 350px;">
                            <a href="" class="d-block position-relative h-100 overflow-hidden">
                                <img src="./img/popular4_Lalbag Fort.png" alt="" class="img-fluid position-absolute w-100 h-100" style="object-fit: cover;">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">
                                    20% off</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Lalbag Fort</div>
                            </a>
                        </div>



                    </div>
                </div>
            </div>

        </section>

        <!-- Destination-Section Ends  -->


        <!-- Package Section  -->

        <section>
            <div class="container-xxl  py-5">
                <div class="container">
                    <div class="text-center">
                        <h1 class="mb-5">Awsome Package</h1>
                    </div>
                    <div class="row g-4 justify-content-center">

                        <?php foreach ($packages as $package):  ?>
                        <form class="col-lg-4 col-md-6" action="pages/packageDetail.php" method="POST">
                            <input type="text" name='packageID' value="<?php echo $package['id']; ?>" class="hidden">

                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img src="<?php echo $package['image']; ?>" alt="" class="img-fluid packageCardImage">
                                </div>
                                <div class="d-flex border-bottom packageCardIcon">
                                    <small class="flex-fill text-center border-end py-2">
                                    <i class="fa-solid fa-location-dot locationIcon2"></i> <?php echo $package['location']; ?>
                                    </small>

                                    <small class="flex-fill text-center border-end py-2">
                                    <i class="fa-solid fa-calendar-days locationIcon2"></i> <?php echo $package['day']; ?>
                                     day(s)</small>

                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa-solid fa-person-walking-luggage locationIcon2"></i> <?php echo $package['person']; ?> person
                                    </small>
                                </div>

                                <div class="text-center p-4">
                                    <h3 class="mb-0">$<?php echo $package['price']; ?>.00</h3>
                                    <div class="mb-3 ">
                                        <?php $rating = $package['rating']; ?>
                                        <?php for ($i=0; $i<$rating; $i++):  ?>
                                            <i class="fa-solid fa-star starIcon"></i>
                                        <?php endfor;  ?>
                                    </div>

                                    <p><?php echo $package['details']; ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="submit" class="btn btn-sm btn-primary px-3 packageBtn" style="border-radius:  30px 0 0 30px ;">Read More</button>
                                        <button type="submit" formaction="about.html" class="btn btn-sm btn-primary px-3 packageBtn" style="border-radius: 0 30px 30px 0 ;" >Book Now</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </section>

        <!-- Package Section Ends  -->

        <!-- book galary -->
        <section class="container-xxl  py-5">
            <div class="container bookContainer">
                <h2 id="freeBook" class="section-title bg-white text-center pe-3">Free Book Store</h2>
                <a href="BookFinder/indexBook.html">
                    <img src="img/book.jpg" alt="" class="packageCardImage img-fluid">
                </a>
            </div>
            
        </section>
        <!-- book galary -->

        <!-- Booking Section  -->
        <section>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="booking p-5">
                        <div class="row g-5 align-items-cneter">
                            <div class="col-md-6 text-white">
                                <h6 class="text-white text-uppercase">Booking</h6>
                                <h1 class="text-white mb-4">Online Booking</h1>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident,
                                    voluptatibus?</p>
                                <p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque velit
                                    molestiae cum corporis unde est obcaecati quis rerum et voluptas.</p>
                                <a href="" class="btn btn-outline-light py-3 px-5 mt-2">Read More</a>
                            </div>
                            <div class="col-md-6">
                                <h1 class="text-white mb-4">Booking A Tour</h1>
                                <form action="">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control bg-transparent" id="name" placeholder="Your Name">
                                                <label for="name">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control bg-transparent" id="email" placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating" id="date3">
                                                <input type="text" class="form-control bg-transparent" id="datetime">
                                                <label for="datetime">Date & Time</label>
                                            </div>
                                        </div>

                                        <!-- Select Box -->
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <select name="" id="select1" class="form-select bg-transparent">
                                                    <option value="1">Destinaiton 1</option>
                                                    <option value="2">Destinaiton 2</option>
                                                    <option value="3">Destinaiton 3</option>
                                                </select>
                                                <label for="select1" class=""></label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control bg-transparent" placeholder="Special Request" id="message" style="height: 100px;"></textarea>
                                                <label for="message">Special Request</label>
                                            </div>
                                        </div>

                                        <!-- Button  -->
                                        <div class="col-12">
                                            <button class="btn btn-outline-light w-100 py-3" type="submit">Book
                                                Now</button>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Booking Section Ends  -->


        <!-- Process Start Section  -->
        <section>

        </section>


        <!-- process start Section ends  -->

        <!-- Travel guide  -->
        <section>

        </section>

        <!-- Travel guide ends  -->

        <!-- Testimonial section  -->
        <section>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center">
                        <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                        <h1 class="mb-5">Our Clients Say!!!</h1>
                    </div>

                    <div class="owl-carousel testimonial-carousel position-relative">
                        <div class="testimonial-item bg-white text-center border p-4">
                            <img src="./img/testimonial-1.jpg" alt="" class="bg-white rounded-circle shadow p-1 mx-auto mb-3" style="width:80px ; height: 80px;">

                            <h5 class="mb-0">Jarin Hasan</h5>
                            <p>Dhanmondi,Dhaka</p>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                                temporibus quas fugiat suscipit perferendis ad!</p>

                        </div>

                        <div class="testimonial-item bg-white text-center border p-4">
                            <img src="./img/testimonial-2.jpg" alt="" class="bg-white rounded-circle shadow p-1 mx-auto mb-3" style="width:80px ; height: 80px;">

                            <h5 class="mb-0">Kamal Sheikh</h5>
                            <p>Gulshan-2,Dhaka</p>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                                temporibus quas fugiat suscipit perferendis ad!</p>

                        </div>

                        <div class="testimonial-item bg-white text-center border p-4">
                            <img src="./img/testimonial-3.jpg" alt="" class="bg-white rounded-circle shadow p-1 mx-auto mb-3" style="width:80px ; height: 80px;">

                            <h5 class="mb-0">Rony Dewan</h5>
                            <p>Mouchak,Dhaka</p>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                                temporibus quas fugiat suscipit perferendis ad!</p>

                        </div>

                        <div class="testimonial-item bg-white text-center border p-4">
                            <img src="./img/testimonial-4.jpg" alt="" class="bg-white rounded-circle shadow p-1 mx-auto mb-3" style="width:80px ; height: 80px;">

                            <h5 class="mb-0">Rodela Jahan</h5>
                            <p>Banani, Dhaka</p>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                                temporibus quas fugiat suscipit perferendis ad!</p>

                        </div>




                    </div>


                </div>
            </div>
        </section>

        <!-- Testimonial section ends  -->

    </main>

    <!-- Footer Section Starts  -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a href="" class="btn btn-link">About us</a>
                    <a href="" class="btn btn-link">Contact us</a>
                    <a href="" class="btn btn-link">Privacy Policy</a>
                    <a href="" class="btn btn-link">FAQ</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 street,Gulshan-2,Dhaka</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+880 175 555 5555</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 street,Gulshan-2,Dhaka</p>

                    <div class="d-flex pt-2">
                        <a href="" class="btn btn-outline-light btn-social">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="btn btn-outline-light btn-social">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="btn btn-outline-light btn-social">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="" class="btn btn-outline-light btn-social">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>

                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img src="./img/package-1.jpg" alt="" class="img-fluid bg-light p-1">
                        </div>
                        <div class="col-4">
                            <img src="./img/package-2.jpg" alt="" class="img-fluid bg-light p-1">
                        </div>
                        <div class="col-4">
                            <img src="./img/package-3.jpg" alt="" class="img-fluid bg-light p-1">
                        </div>
                        <div class="col-4">
                            <img src="./img/package-1.jpg" alt="" class="img-fluid bg-light p-1">
                        </div>
                        <div class="col-4">
                            <img src="./img/package-1.jpg" alt="" class="img-fluid bg-light p-1">
                        </div>
                        <div class="col-4">
                            <img src="./img/package-1.jpg" alt="" class="img-fluid bg-light p-1">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">NewsLetter</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores optio cum adipisci quisquam
                        veniam minus.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input type="text" name="" id="" class="form-control border-primary w-100 py-3 ps-4 pe-5" placeholder="Your Email">
                        <button class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" type="button">SignUp</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Copyright   -->
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">&copy; <a href="" class="border-bottom">Mystery Code</a>|All right Reserved.</div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section Ends  -->


    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- BtsJs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- custom js -->
    <script src="js/app.js"></script>
    <script src="js/index.js"></script>
    <!-- <script>
        $(document).ready(function() {

            $("#findHottsdel").click(function() {
                const searchText = $("#searchHottelId").val();
                if (!searchText) return;

                console.log("Printed");
                const idValue = "";
                $.post("helpers/loadHottelData.php"), {
                        key: searchText
                    },
                    function(data, status) {
                        console.log(data);
                        if (status) {
                            console.log(data);
                            // console.log("success");
                        }
                    }
            });
        });
    </script> -->
    <script>
        document.getElementById("findHottel").addEventListener('click', function() {
            const searchText = $("#searchHottelId").val();
            if (!searchText) return;

            var ajax = new XMLHttpRequest();
            var method = "GET";
            var url = "helpers/loadHottelData.php" + "?location=" + searchText;
            var asynchronous = true;
            ajax.open(method, url, asynchronous);
            ajax.send();

            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const hotels = JSON.parse(this.responseText);
                    // console.log(hotels);
                    let html = '';
                    if (Object.keys(hotels).length) {
                        for (const hotel of hotels) {
                            html += `
                        <div class="col">
                            <form action="pages/selectHottel.php" method="POST" class="hottelCard">
                                <button type="submit" style="width:100%;" >
                                    <div class="card h-100 hottelCardBg">
                                     <div class="card-body">
                                            <h5 class="card-title">${hotel.name}</h5>
                                            <p class="card-text"> <i class="fa-solid fa-location-dot locationIcon"></i> ${hotel.location}</p>
                                            <p class="card-text">Reating: ${hotel.rating} <i class="fa-solid fa-star starIcon"> </i> </p>
                                         <input type="hidden" value="${hotel.id}" name="hottelId">
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>
                        `;
                        }
                    } else {
                        console.log("ELSE");
                        document.getElementById("hottelCards").innerHTML = `
                            <div class="text-center">
                                <h3 class="mb-5">No Hottel Is Available, sorry :3</h3>
                            </div>
                        `;
                        document.getElementById("hottelCards").style.visibility = "visible";
                        return;

                    }


                    document.getElementById("hottelCards").innerHTML = html;
                    document.getElementById("hottelCards").style.visibility = "visible";
                }
            }
        });

        const makeComment = (postId) =>{
            const loginStatus = '<?php echo $isLogin; ?>';

            const commentText = document.getElementById(postId+'-input').value;
            if (commentText === '') return;

            if(loginStatus == "nope") window.location.href = "signIn.php";

            const name = '<?php echo $userName; ?>';
            const userId = '<?php echo $userId; ?>';

            $.post("helpers/uploadComment.php",
                {
                    name: name,
                    userId: userId,
                    postId: postId,
                    comment: commentText
                },
                function(data, status){
                    if(status == 'success'){
                        // alert("Data: " + data + "\nStatus: " + status);
                        document.getElementById(postId+'-input').value = "";
                        let currentHtml = document.getElementById(postId+'-commentCon').innerHTML;

                        document.getElementById(postId+'-commentCon').innerHTML = currentHtml + data;
                    }
                }
            );


        }
    </script>
</body>

</html>