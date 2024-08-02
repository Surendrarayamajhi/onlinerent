<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad View</title>
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bs css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/AdView.css">
    <style>

    </style>
</head>

<body>
    <div>
        <nav class="navbar fixed-top navbar-expand-lg bg-light ">
            <div class="container-fluid css-container">
                <a class="navbar-brand text-dark" href="home.html">OnlineRent</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-dark"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active  text-dark" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  text-dark dropdown-toggle  text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item  " href="#">Action</a></li>
                                <li><a class="dropdown-item  " href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item " href="#">Something else here</a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="d-flex">

                        <button class="btn btn-dark" type="submit">Login</button>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="ad-view-slider-row css-container d-flex justify-content-center align-items-center gap-3 ">
        <div class="ad-view-slider-wrap w-50 ">
            <div id="carouselExampleCaptions" class="carousel slide  carousel-dark" data-bs-ride="carousel">
                <div class="carousel-indicators ">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img src="../assets/images/house (1).jpg" class="d-block w-100" alt="..." style="min-height: 420px;max-height: 420px;">
                        <div class="carousel-caption d-none d-md-block  p-3 pb-0 text-dark rounded">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/images/hero (2).jpg" class="d-block w-100" alt="..." style="min-height: 420px;max-height: 420px;">
                        <div class=" carousel-caption d-none d-md-block p-3 pb-0 text-dark rounded">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/images/hero (3).jpg" class="d-block w-100" alt="..." style="min-height: 420px;max-height: 420px;">
                        <div class="carousel-caption d-none d-md-block p-3 pb-0 text-dark rounded">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <div class="bg-light d-flex justify-content-center align-items-center p-1 rounded-circle">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </div>
                </button>
                <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <div class="bg-light d-flex justify-content-center align-items-center p-1 rounded-circle wid">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </div>
                </button>
            </div>
        </div>


    </div>

    <div class="css-container ad-view-slider-row-right w-50 h-50 ">
        <div class="shadow p-3" style="width: 75%;">
            <h4 class="">2 rooms at itahari-4</h4>
            <p>sbsdkbsdhbfsdlhfblsd bkjsdbckdsh kd ckgfkdh dk kcc dsckdck ckucgk kcv</p>
            <div class="d-flex align-items-center gap-3 ad-view-control-wrap ">
                <button class="btn btn-outline-primary btn-sm">Interested</button>
                <button class="btn btn-danger btn-sm">Message</button>
                <button class="btn btn-outline-none btn-sm btn-fav"><i class="fa-solid fa-heart"></i></button>
            </div>


        </div>

    </div>

    <div class="ad-view-detailes-wrap css-container d-block m-4">
        <div class="row border amenitiesWrapper">



            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Purpose
                    </div>
                    <div class="amenitiesContent">
                        Rent
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Rent Price
                    </div>
                    <div class="amenitiesContent">

                        Rs. 35,000
                    </div>
                </div>
            </div>


            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Bedroom
                    </div>
                    <div class="amenitiesContent">
                        3
                    </div>
                </div>
            </div>




            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Bathroom
                    </div>
                    <div class="amenitiesContent">
                        2
                    </div>
                </div>
            </div>





            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Floor
                    </div>
                    <div class="amenitiesContent">
                        1st Floor
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Parking
                    </div>
                    <div class="amenitiesContent">
                        Yes
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Balcony
                    </div>
                    <div class="amenitiesContent">

                        Yes
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Running Water
                    </div>
                    <div class="amenitiesContent">
                        Yes
                    </div>
                </div>
            </div>


            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Kitchen
                    </div>
                    <div class="amenitiesContent">
                        1
                    </div>
                </div>
            </div>






            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Sitting Room
                    </div>
                    <div class="amenitiesContent">
                        1
                    </div>
                </div>
            </div>










            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Category
                    </div>
                    <div class="amenitiesContent">
                        3BHK
                    </div>
                </div>
            </div>


            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Status
                    </div>
                    <div class="amenitiesContent">
                        Available
                    </div>
                </div>
            </div>




            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Seller Contact Number
                    </div>
                    <div class="amenitiesContent">
                        9860988012
                    </div>
                </div>
            </div>











            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Furnishing
                    </div>
                    <div class="amenitiesContent">
                        No
                    </div>
                </div>
            </div>



            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Price Negotiable
                    </div>
                    <div class="amenitiesContent">

                        Yes
                    </div>
                </div>
            </div>











            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Ad id
                    </div>
                    <div class="amenitiesContent">
                        #KB2303300714231
                    </div>
                </div>
            </div>




            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Road Type
                    </div>
                    <div class="amenitiesContent">
                        Black Pitched
                    </div>
                </div>
            </div>






            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Ad Views
                    </div>
                    <div class="amenitiesContent">
                        260
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Posted On
                    </div>
                    <div class="amenitiesContent">
                        2023/03/30
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="amenities">
                    <div class="amenitiesTitle">
                        Expire On
                    </div>
                    <div class="amenitiesContent">
                        2023/12/30

                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="css-container ad-list mt-4">

        <div class="container">
            <h4>More Rents</h4>
            <div class="row g-4">
                <div class=" col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img src="../assets/images/house (1).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">2 room for rent</h5>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <p class="card-text m-0"><i class="fa-solid fa-location-dot"></i> Itahari-4</p>
                                <i class="fa-regular fa-heart" style="color: #df2a2a; font-size: 20px;"></i>


                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><i class="fa-solid fa-building"></i> House Room</p>
                                <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> Rs. 3000</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                <a href="Ad_view.html" class="btn btn-outline-primary btn-sm w-100">View</a>


                            </div>

                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img src="../assets/images/hero_Dharan.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">2 room for rent</h5>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <p class="card-text m-0"><i class="fa-solid fa-location-dot"></i> Itahari-4</p>
                                <i class="fa-regular fa-heart" style="color: #df2a2a; font-size: 20px;"></i>


                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><i class="fa-solid fa-building"></i> House Room</p>
                                <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> Rs. 3000</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                <a href="#" class="btn btn-outline-primary btn-sm w-100">View</a>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="  col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img src="../assets/images/house (1).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">2 room for rent</h5>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <p class="card-text m-0"><i class="fa-solid fa-location-dot"></i> Itahari-4</p>
                                <i class="fa-regular fa-heart" style="color: #df2a2a; font-size: 20px;"></i>


                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><i class="fa-solid fa-building"></i> House Room</p>
                                <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> Rs. 3000</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                <a href="#" class="btn btn-outline-primary btn-sm w-100">View</a>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="  col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img src="../assets/images/house (1).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">2 room for rent</h5>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <p class="card-text m-0"><i class="fa-solid fa-location-dot"></i> Itahari-4</p>
                                <i class="fa-regular fa-heart" style="color: #df2a2a; font-size: 20px;"></i>


                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><i class="fa-solid fa-building"></i> House Room</p>
                                <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> Rs. 3000</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                <a href="#" class="btn btn-outline-primary btn-sm w-100">View</a>


                            </div>

                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img src="../assets/images/house (1).jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">2 room for rent</h5>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                                <p class="card-text m-0"><i class="fa-solid fa-location-dot"></i> Itahari-4</p>
                                <i class="fa-regular fa-heart" style="color: #df2a2a; font-size: 20px;"></i>


                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><i class="fa-solid fa-building"></i> House Room</p>
                                <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> Rs. 3000</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                <a href="#" class="btn btn-outline-primary btn-sm w-100">View</a>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer mt-5 bg-dark text-light pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Column 1</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae ipsum eu lectus dapibus
                        tincidunt vitae eget turpis.</p>
                </div>
                <div class="col-md-4">
                    <h5>Column 2</h5>
                    <p>Phasellus vitae bibendum velit, vel tristique est. Vivamus eget elit consequat, aliquam elit eu,
                        vehicula ex.</p>
                </div>
                <div class="col-md-4">
                    <h5>Column 3</h5>
                    <p>Sed blandit lorem ut mi venenatis, at convallis ipsum lacinia. Praesent aliquam pharetra ex, non
                        suscipit arcu dictum nec.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<!-- bs cdn  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jquery cdn  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</html>