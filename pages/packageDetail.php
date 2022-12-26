<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $packageID = $_POST['packageID'];

    require_once "../helpers/clientsApi.php";
    $sql = "SELECT * FROM `packagedetail` WHERE `parentId` = $packageID;";
    $details = fetchBySql($sql, false);

    $pdo = require_once "../helpers/dbConnector.php";
    $sql = "SELECT * FROM `packageimage` WHERE `parentId` = $packageID;";
    $images = fetchPackageImage($sql, true, $pdo);

//    echo "<pre>";
//    var_dump($details);
//    echo "</pre>";
}

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Package Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- fontawesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../CSS/packageDetail.css">

        <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
        </script>
        <script type="text/javascript">
            (function(){
                emailjs.init("TI0qaKBcrx-uW_BnS");
            })();
        </script>
        <script src="../js/email.js"></script>
    </head>

    <body>
         <!-- navbar starts -->
        <section>
            <!-- Top Navbar  -->
            <div class="container-fluid bg-dark px-5 d-none d-lg-block">
                <div class="row gx-0">
                    <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                        <div class="d-inline-flex align-items-center" style="height: 45px;">
                            <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New
                                York,
                                USA</small>
                            <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                            <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-inline-flex align-items-center" style="height: 45px;">
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                                    class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                                    class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                                    class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                                    class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                                    class="fab fa-youtube fw-normal"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top navbar ends  -->
        </section>

        <section style="background-color: #343a41; color: white !important;">
            <div class="container-fluid position-relative p-0">
                <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                    <a href="../index.php" class="navbar-brand p-0">
                        <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
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
                        <a href="signIn.html" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
                    </div>
                </nav>


            </div>
            <!-- Navbar & Hero End -->
        </section>
        <h3 class="text-center m-4 fw-bold">Here is the Details for your selected package</h3>

        <!-- total section/body  -->
        <section id="fullSection" class="w80">

            <!-- carousel -->
            <section class="carosoulCOntainer">
                <div id="carouselExampleDark" class="carousel carousel-dark slide carosoulCOntainer"
                    data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($images as $image):  ?>
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="<?php echo '../'.$image['image']; ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block carosel1Text">
                                <h5><?php echo $image['title']; ?></h5> <br>
                                <p><?php echo $image['description']; ?></p>
                            </div>
                        </div>
                        <?php endforeach;  ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>

            <!-- room details  -->
            <section id="roomDetaails">
                <h2>Nature view room</h2>
                <div class="cardTopRow">
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-location-dot locationIccon"></i> Destination</h5>
                        <p><?php echo $details['destination']; ?></p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-bus locationIccon"></i> Transportation</h5>
                        <p><?php echo $details['transport']; ?></p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-utensils locationIccon"></i> Food</h5>
                        <p><?php echo $details['food']; ?></p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-bed locationIccon"></i> Hotel Room</h5>
                        <p><?php echo $details['hotel']; ?></p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-clock locationIccon"></i> Date time</h5>
                        <p><?php echo $details['date']; ?></p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-people-arrows locationIccon"></i> Persons</h5>
                        <p><?php echo $details['person']; ?></p>
                    </div>
                    <div class="p-2 flex-fill bd-highlight">
                        <h5><i class="fa-solid fa-circle-dollar-to-slot locationIccon"></i> Pricing</h5>
                        <p>You can book this package from us only for <span id="price">$<?php echo $details['price']; ?></span> <br> there will be a
                            raffel draw with some exciting pricce</p>
                    </div>
                </div>

                <!-- activities -->
                <div id="acticity">
                    <h5>Activities</h5>
                    <ul>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Lorem ipsum dolor sit.</li>
                        <li>Lorem ipsum dolor sit.</li>
                    </ul>
                    <details>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, dignissimos laborum corporis
                        repudiandae earum nemo qui consequuntur dolorum? Perferendis, tempore iure! Possimus neque
                        praesentium doloribus culpa nobis maxime enim magnam, vitae iure, error repellendus, excepturi
                        pariatur accusamus dolorum amet est repudiandae nam accusantium corporis! Aperiam temporibus vel
                        porro eveniet vitae odit atque facilis. Voluptate hic dolorem accusamus dicta velit! Optio
                        mollitia culpa temporibus. Distinctio ullam ea, magnam doloribus obcaecati accusantium labore!
                        Corrupti consequuntur enim, <br> <br> natus nihil voluptate ad cupiditate vel corporis nam
                        delectus numquam, repellat totam necessitatibus ex, odit eum repellendus quam perferendis odio
                        unde saepe. Beatae, eius optio. Velit qui eius nemo. Aspernatur, animi pariatur non
                        exercitationem accusamus perspiciatis quas ex itaque facere possimus sint iure modi nam esse.
                        Saepe facilis corrupti porro magni id pariatur officiis provident doloremque aspernatur
                        quisquam, hic tempore explicabo. Sapiente odio iste molestiae aliquid. Impedit consequuntur
                        fugit et nihil at. Tempora id libero cumque odit illum, <br> ipsa inventore natus ea deserunt in
                        quasi vel expedita, voluptate omnis officia modi veritatis! Totam dolorem officia molestias,
                        eius optio fuga officiis, odit obcaecati et amet excepturi! Nobis consequatur aliquam ipsa sunt
                        labore odio nisi accusamus, distinctio molestias deleniti ullam, cum id dignissimos sequi
                        praesentium voluptates harum in porro. Possimus, error quaerat sequi aperiam molestiae tempora
                        magni dicta nihil nam culpa, suscipit similique ratione. Dolore iure id at deserunt voluptatem
                        quo molestiae commodi provident itaque neque voluptate architecto, labore quibusdam. Nostrum
                        illo reiciendis aut illum reprehenderit odio, cum fugit at excepturi molestias dolor, esse
                        ducimus quod possimus in culpa animi natus? Eos nulla aspernatur nam, quo porro doloribus,
                        molestiae facere doloremque libero ab, qui culpa iusto excepturi minima! Nam, doloremque
                        adipisci libero non quae et. Itaque, aperiam voluptatibus minus laborum praesentium tempore iure
                        pariatur nisi veniam corporis quisquam. Voluptatibus, voluptatum? <br> <br> Eaque assumenda
                        delectus saepe inventore. Quia animi nihil eaque exercitationem maiores optio excepturi nulla
                        sed quam. Odit laboriosam nemo minus sunt, ipsam dolore nam dolorum minima ex assumenda
                        molestias inventore doloremque obcaecati cum doloribus incidunt. Distinctio dolorem molestiae
                        fugit. Odit incidunt ipsam quia dolore nisi, earum doloribus consectetur nam voluptatibus
                        ducimus illo dignissimos cumque quam labore maxime? Similique dolores facilis repellendus
                        voluptatibus, soluta quasi odio corporis! Possimus, nam at iste nobis soluta quasi! Debitis
                        asperiores ipsa nesciunt sunt fugiat alias voluptates accusantium ullam cum laboriosam optio
                        labore incidunt dicta facere quis, deleniti fugit vel reiciendis totam eum dolor perferendis ea?
                        Repellendus labore accusantium, doloremque mollitia expedita tenetur corrupti esse ducimus,
                        praesentium inventore, corporis tempora voluptatum autem repudiandae rerum voluptatibus <br>
                        <br> Commodi minima ea temporibus harum nulla obcaecati placeat perferendis nam. Quo excepturi
                        debitis nesciunt alias aliquam dolore voluptatem dolores a fuga! Eveniet aliquid assumenda vero
                        officiis velit dolorem ipsum id repellendus dolorum fuga. Assumenda sequi voluptates dignissimos
                        odit atque aperiam numquam quasi maxime consequatur saepe! Quasi deserunt exercitationem quod
                        error perspiciatis distinctio placeat voluptatum, harum nisi, nulla optio ea dolore accusantium
                        eveniet, tempore ratione repudiandae vitae voluptatem cupiditate possimus recusandae officia
                        odio! Natus, <br> Modi accusantium, delectus molestias, voluptatum possimus excepturi impedit
                        pariatur quas obcaecati dolore dolor sit nemo blanditiis.
                    </details>
                </div>

                <!-- tour details  -->
                <div id="details">
                    <h5>Tour Details</h5>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates saepe nobis necessitatibus
                        blanditiis. Ea perferendis molestiae culpa ipsa ipsam. Earum dolorem quod quasi error velit cum
                        nam quos a omnis deserunt aspernatur natus dolorum totam dolores beatae aliquid qui commodi
                        reiciendis tenetur perspiciatis nulla tempore numquam, voluptas odio! Molestias nulla hic
                        blanditiis in quam repudiandae ullam unde similique sed animi iure rem ut voluptatem, illo sequi
                        eligendi dicta. Nostrum, dignissimos iusto! <br> <br>
                        Enim id exercitationem, voluptates consequuntur delectus molestias ut, dolorum possimus
                        adipisci, eveniet ea odio iure impedit magnam odit fugiat. Consequuntur dolorum eos minus rem
                        quasi mollitia ad, deleniti nulla quis ex.Asperiores, architecto. Enim dolore laborum commodi
                        quam praesentium nobis incidunt, ratione, vel. <br> <br> Nesciunt impedit molestiae! Quia harum
                        necessitatibus vitae rem delectus dignissimos illo, ut, rerum reiciendis repudiandae quisquam
                        quasi. At, excepturi reprehenderit. Tempore atque eius cupiditate aspernatur consectetur nobis
                        quasi placeat vitae? Est autem ipsam soluta, totam, repellat quasi impedit perferendis dolorem
                        iusto ex quam quia, velit explicabo sunt. Vero ipsam rerum harum cum iure, distinctio saepe et
                        excepturi libero minima, quasi, repellendus consequatur. Quae fugit illum minima. Incidunt totam
                        modi cumque. Ratione quos error quibusdam doloribus asperiores ex maiores earum rerum? Fugit
                        quibusdam laboriosam consectetur soluta exercitationem.
                    </p>
                </div>

                <!-- book now -->
                <div id="bookNOwCOntainer">
                    <button id="confirmButton" onclick="sendEmail()">BOOK NOW</button>
                </div>

            </section>
        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>


    </body>

</html>