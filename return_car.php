<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
?>
    <!DOCTYPE HTML>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title>Locars - Website cho thuê xe</title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <!--Custome Style -->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <!--OWL Carousel slider-->
        <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
        <!--slick-slider -->
        <link href="assets/css/slick.css" rel="stylesheet">
        <!--bootstrap-slider -->
        <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
        <!--FontAwesome Font Style -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- SWITCHER -->
        <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/logo.jpg">
        <!-- Google-Font-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            /* Full-width input fields */
            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%;
                /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }

                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }

                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>

        <!-- Start Switcher -->

        <!-- /Switcher -->

        <!--Header-->
        <?php include('includes/header.php'); ?>
        <!--Page Header-->
        <!-- /Header -->

        <!--Page Header-->
        <section class="page-header profile_page">
            <div class="container-fluid">
                <div class="page-header_wrap">
                    <div class="page-heading">
                        <h1><b> CHI TIẾT ĐẶT XE</b></h1>
                    </div>
                    <ul class="coustom-breadcrumb">
                        <li><a href="#">Trang chủ</a></li>
                        <li>Chi tiết đặt xe</li>
                    </ul>
                </div>
            </div>
            <!-- Dark Overlay-->
            <div class="dark-overlay"></div>
        </section>
        <!-- /Page Header-->


        <div class="container-fluid" style="border-color:steelblue; border-radius: 20px; border-width: thin; border-style: solid; margin-left: 300px; margin-right: 300px; margin-top: 20px; margin-bottom:20px;">



            <div class="profile_wrap">
                <!-- <h5 class="uppercase underline"> Đơn hàng của tôi </h5> -->
                <div class="my_vehicles_list">
                    <div class="container">

                        <?php
                        $bkid = intval($_GET['bkid']);

                        $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.tinhthanh,tblbooking.Status,tblbooking.PostingDate,tblvehicles.PricePerDay as ppd, tblbooking.userEmail  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.id=:bkid";

                        $query = $dbh->prepare($sql);
                        $query->bindParam(':bkid', $bkid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                $_SESSION['brndid'] = $result->bid;
                        ?>
                                <form action="printbill.php?bkid=<?php echo $bkid ?>" method="POST">
                                    <div class="row">
                                        <div>
                                            <div>
                                                <h5 style="font-size: 25px;"><b>Ngày tạo đơn đặt xe: <?php echo htmlentities($result->PostingDate); ?></b></h5>
                                            </div>
                                            <div>
                                                <?php if ($result->Status == 1) { ?>
                                                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn"><b>ĐÃ CHẤP NHẬN</b></a>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                <?php } else if ($result->Status == 2) { ?>
                                                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs" style="border-color: red; color: red;"><b>ĐÃ TỪ CHỐI</b></a>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                <?php } else { ?>
                                                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs"><b>ĐANG CHỜ XÁC NHẬN</b></a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="return_img">
                                            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"><img style="width: auto; height: 250px; float:left; margin:40px;" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>"></a>
                                        </div>
                                        <div class="vehicle_title">
                                            <h3><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"> <?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></a></h3>
                                            <p></p>
                                            <br>
                                            <p style="font-size: 25px;"><b>Giá thuê:</b> <b style="color:steelblue;"> <?php echo htmlentities(number_format($result->ppd , 0, ".", ".") . ' VND');?>/ ngày</b></p>
                                            <p style="font-size: 25px;"><b>Email khách hàng:</b> <?php echo htmlentities($result->userEmail); ?></p>
                                            <p style="font-size: 25px;"><b>Từ ngày:</b> <?php echo htmlentities($result->FromDate); ?></p>
                                            <p style="font-size: 25px;"><b>Đến ngày:</b> <?php echo htmlentities($result->ToDate); ?></p>
                                            <p style="font-size: 25px;"><b>Số ngày thuê:</b><b style="color: steelblue; font-size: 30px;">
                                                    <?php
                                                    $first_date = strtotime($result->FromDate);
                                                    $second_date = strtotime($result->ToDate);
                                                    $datediff = abs($first_date - $second_date);
                                                    echo floor($datediff / (60 * 60 * 24));
                                                    ?></b></p>
                                        </div>


                                    </div>

                                    <div>

                                        <br>
                                        <div>
                                            <p style="font-size: 25px;"><b>Nơi đến:</b> <?php echo htmlentities($result->tinhthanh); ?> </p>

                                        </div>
                                        <div>

                                            <p style="font-size: 25px;"><b>Ghi chú:</b> <?php echo htmlentities($result->message); ?> </p>

                                            <br>
                                        </div>
                                        <div>
                                            <p style="float: right; font-size: 30px;"><b>Tổng tiền: </b> <b style="color: steelblue; font-size: 40px;"><?php echo htmlentities(number_format($result->ppd * $datediff / (60 * 60 * 24), 0, ".", ".") . ' VND');  ?> </b></p>

                                        </div>

                                        <br>
                                        <p></p>
                                        <div>
                                            <?php if ($result->Status == 1) { ?>
                                                <button onclick="return confirm('Bạn thật sự muốn HOÀN TRẢ xe!');" style=" float: right; margin:40px; width: 400px; height: 60px;"><b>HOÀN TRẢ XE</b> &ensp; <i class="fa fa-undo fa-lg"></i> <i class="fa fa-car fa-lg"></i></button>

                                            <?php } else { ?>
                                                <div class="vehicle_status">
                                                    <div class="clearfix"></div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                    </div>
                    </form>


            <?php }
                        } ?>


            </ul>
                </div>
            </div>
        </div>


        </div>

        </section>
        <!--/my-vehicles-->
        <?php include('includes/footer.php'); ?>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/interface.js"></script>
        <!--Switcher-->
        <script src="assets/switcher/js/switcher.js"></script>
        <!--bootstrap-slider-JS-->
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <!--Slider-JS-->
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
    </body>

    </html>
<?php } ?>