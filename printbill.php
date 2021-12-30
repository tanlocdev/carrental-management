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

        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bookingconfirm.css" />

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

        <div class="container-fluid" style="border-color:steelblue; border-radius: 20px; border-width: thin; border-style: solid; margin-left: 300px; margin-right: 300px; margin-top: 20px; margin-bottom:20px;">
            <div class="profile_wrap">
                <!-- <h5 class="uppercase underline"> Đơn hàng của tôi </h5> -->
                <div class="my_vehicles_list">
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

                            <div class="container">
                                <div class="jumbotron">
                                    <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> <B>ĐÃ HOÀN TRẢ XE</B></h1>
                                </div>
                            </div>
                            <br>

                            <h2 class="text-center"> <b>Cảm ơn bạn đã sử dụng dịch vụ của Locars </b></h2>

                            <h3 class="text-center"> <strong>Mã đơn đặt hàng của bạn:</strong> <span style="color: blue;"><?php echo "$bkid"; ?></span> </h3>


                            <div class="container">
                                <h5 class="text-center"><u><b>Vui lòng đọc kỹ thông tin về hóa đơn thuê xe của bạn.</b></u></h5>
                                <div class="box">
                                    <div class="col-md-10" style="float: none; margin: 0 auto; text-align: center;">
                                        <h3 style="color: orange;"><b>Thông tin đơn đặt hàng của bạn đã được lưu vào hệ thống</b></h3>
                                        <br>
                                        <h4><b>Vui lòng ghi lưu lại <strong>mã đặt hàng của bạn</strong> ngay, trường hợp bạn thắc mắc cần liên hệ chúng tôi sẽ dựa vào mã đơn hàng của bạn.</b></h4>
                                        <br>
                                        <h3 style="color: orange; font-size:40px;"><b> HÓA ĐƠN THUÊ XE</B></h3>
                                        <br>
                                    </div>
                                    <div class="col-md-10" style="float: none; margin: 0 auto; ">

                                        <h4> <strong><b>Email khách hàng:</b></strong> <?php echo htmlentities($result->userEmail); ?></h4>
                                        <br>
                                        <h4> <strong><b>Tên xe:</b></strong><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid); ?>"> <?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></a></h4>

                                        <br>

                                        <h4><strong><b>Ngày tạo đơn đặt xe:</b> </strong> <?php echo htmlentities($result->PostingDate); ?></h4>
                                        <br>
                                        <h4> <strong>Từ ngày: </strong> <?php echo htmlentities($result->FromDate); ?></h4>
                                        <br>
                                        <h4> <strong>Đến ngày: </strong> <?php echo htmlentities($result->ToDate); ?></h4>
                                        <br>
                                        <h4> <strong>Số ngày thuê: <?php
                                                                    $first_date = strtotime($result->FromDate);
                                                                    $second_date = strtotime($result->ToDate);
                                                                    $datediff = abs($first_date - $second_date);
                                                                    echo floor($datediff / (60 * 60 * 24));
                                                                    ?> </h4>
                                        <br>
                                        <h4> <strong>Nơi đến: </strong><b> <?php echo htmlentities($result->tinhthanh); ?></b></h4>
                                        <br>
                                        <h4> <strong>Ghi chú: </strong> <?php echo htmlentities($result->message); ?></h4>
                                        <br>
                                        

                                            <h2 style="margin-left: 300px; color:steelblue;"> <strong>Tổng tiền: </strong><?php echo htmlentities(number_format($result->ppd * $datediff / (60 * 60 * 24), 0, ".", ".") );  ?>  VND </h2>

                                      <br>
                                        <div class="text-center">
                                            <h4><b>Cảm ơn <strong>QUÝ KHÁCH </strong> đã sử dụng dịch vụ của LOCARS</b> </h4>
                                            <h3><b> -- CHÚC QUÝ KHÁCH AN KHANG THỊNH VƯỢNG -- </b></h3>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>





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