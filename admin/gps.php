<?php
require_once("db.php");
$companies = $conn->getCompaniesList();
$streets = $conn->getStreetsList();
$areas = $conn->getAreasList();
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">



    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="../assets/images/logo.jpg">

    <title>Locars - Index Quản lý GPS</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/leaflet.css" />
    <script src="js/leaflet.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>

</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="ts-main-content">
        <?php $page = 'manage-brands';
        include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div id="map" style="width: 100%; height: 700px"></div>

                        <br>

                        <br>
                        <div class="container">
                            <div class="input-group">
                                <div class="center">
                                    <input style="background-color:white; width:1000px; height:40px;" type="text" name="search" id="search" placeholder=" Nhập tên xe, tên khoanh vùng để tìm kiếm..." /> <button style="width: 130px; height: 40px;" class="btn btn-primary" type="button" id="searchBtn"> <i class="fa fa-search fa-lg"></i> TÌM KIẾM </button>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col" style="color:steelblue"> <i class="fa fa-search"></i><b> KẾT QUẢ TÌM KIẾM</b> &emsp; (Nhấn vào để xem chi tiết vị trí)</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="searchresult"></td>
                                    </tr>

                                </tbody>
                            </table>
                            <hr>

                            <a class="btn btn-primary" href="add-area.php" style="width: 200px;"><b><i class="fa fa-area-chart fa-lg"> </i> THÊM KHOANH VÙNG XE +</b></a> &ensp;
                            <a class="btn btn-primary" href="add-gpscar.php" style="width: 200px; float: right;"><b><i class="fa fa-car fa-lg"> </i> THÊM XE +</b></a>
                        </div>
                        <h2 class="page-title text-center">QUẢN LÝ ĐỊNH VỊ XE</h2>

                        <div class="container-fluid">

                        </div>
                        <br>

                        <!-- Zero Configuration Table -->
                    </div>

                    <!--  -->
                    <div class="container-fluid text-center">
                        <!-- Nav tabs category -->

                        <div class="text-center" style="width: 60%; margin:0px auto ;">
                            <ul class="nav nav-tabs faq-cat-tabs text-center">
                                <li class="active"><a href="#faq-cat-1" data-toggle="tab">&ensp; <b style="color: steelblue;">Dữ liệu vị trí</b> &ensp;</a></li>
                                <li><a href="#faq-cat-2" data-toggle="tab">&ensp; <b style="color: steelblue;">Dữ liệu khoanh vùng</b> &ensp;</a></li>

                            </ul>
                        </div>

                        <br>
                        <!-- Tab panes -->
                        <div class="tab-content faq-cat-content">
                            <div class="tab-pane active in fade" id="faq-cat-1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">DỮ LIỆU VỊ TRÍ XE</div>
                                    <div class="panel-body table-responsive">

                                        <table id="zctb" class="display table  table-bordered table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên xe</th>
                                                    <th>Mô tả</th>
                                                    <th>Vĩ độ</th>

                                                    <th>Kinh độ</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Ghi chú</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên xe</th>
                                                    <th>Mô tả</th>
                                                    <th>Vĩ độ</th>
                                                    <th>Kinh độ</th>

                                                    
                                                    <th>Số điện thoại</th>
                                                    <th>Ghi chú</th>
                                                    <th>Hành động</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php include('configgps.php'); ?>
                                                <?php $sql = "SELECT * from  companies ";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {                ?>
                                                        <tr>

                                                            <td><?php echo htmlentities($result->id); ?></td>
                                                            <td><?php echo htmlentities($result->company); ?></td>
                                                            <td><?php echo htmlentities($result->details); ?></td>
                                                            <td><?php echo htmlentities($result->latitude); ?></td>
                                                            <td><?php echo htmlentities($result->longitude); ?></td>
                                                            <td><?php echo htmlentities($result->telephone); ?></td>
                                                            <td><?php echo htmlentities($result->keywords); ?></td>
                                                            <td><a href="edit-gpscar.php"><i class="fa fa-edit fa-2x"></i></a>&ensp;&ensp;&ensp;&ensp;
                                                                <a href="delete-gpscar.php" onclick="return confirm('Bạn thật sự muốn XÓA vị trí xe này!');"><i class="fa fa-close fa-2x" style="color:red;"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane fade" id="faq-cat-2">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-heading">QUẢN LÝ DỮ LIỆU KHOANH VÙNG</div>
                                    <div class="panel-body table-responsive text-center">

                                        <table id="zctb" class="display table  table-bordered table-hover text-center" cellspacing="0" width="1000px;">
                                            <thead >
                                                <tr>
                                                <th>#</th>
                                                    <th>Tên khoanh vùng</th>
                                                    <th style="width: 400px;">Tọa độ khoanh vùng</th>
                                                    <th>Ghi chú</th>
                                                    <th>Hành động</th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên khoanh vùng</th>
                                                    <th style="width: 400px;">Tọa độ khoanh vùng</th>
                                                    <th>Ghi chú</th>
                                                    <th>Hành động</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php $sql = "SELECT * from  areas ";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {                ?>
                                                        <tr>

                                                            <td><?php echo htmlentities($result->id); ?></td>
                                                            <td><?php echo htmlentities($result->name); ?></td>
                                                            <td style="width: 400px;"><?php echo htmlentities($result->geolocations); ?></td>
                                                            <td><?php echo htmlentities($result->keywords); ?></td>
                
                                                            <td><a href="edit-area.php"><i class="fa fa-edit fa-2x"></i></a>&ensp;&ensp;&ensp;&ensp;
                                                                <a href="delete-area.php" onclick="return confirm('Bạn thật sự muốn XÓA!');"><i class="fa fa-close fa-2x" style="color:red;"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- -->
<hr>

    
    <script>
        var map = L.map('map').setView([9.758963, 105.601753], 13);



        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);



        $(document).ready(function() {
            $('#searchBtn').click(function() {
                $.ajax({
                    type: "GET",
                    url: "ajax.php?keyword=" + $("#search").val()
                }).done(function(data) {
                    var jsonData = JSON.parse(data);
                    var jsonLength = jsonData.results.length;
                    var html = "<ul>";
                    for (var i = 0; i < jsonLength; i++) {
                        var result = jsonData.results[i];
                        html += '<b style="font-size:20px; color:steelblue;"><li data-lat="' + result.latitude + '" data-lng="' + result.longitude + '" class="searchResultElement"><i class="fa fa-car fa-lg">  </i>&ensp;' + result.name + '</li></b>';
                    }
                    html += '</ul>';
                    $('#searchresult').html(html);
                    $('li.searchResultElement').click(function() {
                        var lat = $(this).attr("data-lat");
                        var lng = $(this).attr("data-lng");
                        map.panTo([lat, lng]);
                    });
                });
            });
            addCompanies();
            addStreets();
            addAreas();
        });

        function addCompanies() {
            for (var i = 0; i < companies.length; i++) {
                var marker = L.marker([companies[i]['latitude'], companies[i]['longitude']]).addTo(map);
                marker.bindPopup ("<h4><b>" + companies[i]['company'] + "</b></h4>Mô tả:" + companies[i]['details'] + "<br />Số điện thoại: " + companies[i]['telephone'] + "<br />Ghi chú: " + companies[i]['keywords'] + "<br />Vĩ độ: " + companies[i]['latitude'] + "<br />Kinh độ: " + companies[i]['longitude']);
            }
        }

        function stringToGeoPoints(geo) {
            var linesPin = geo.split(",");

            var linesLat = new Array();
            var linesLng = new Array();

            for (i = 0; i < linesPin.length; i++) {
                if (i % 2) {
                    linesLat.push(linesPin[i]);
                } else {
                    linesLng.push(linesPin[i]);
                }
            }

            var latLngLine = new Array();

            for (i = 0; i < linesLng.length; i++) {
                latLngLine.push(L.latLng(linesLat[i], linesLng[i]));
            }

            return latLngLine;
        }

        function addAreas() {
            for (var i = 0; i < areas.length; i++) {
                console.log(areas[i]['geolocations']);
                var polygon = L.polygon(stringToGeoPoints(areas[i]['geolocations']), {
                    color: 'blue'
                }).addTo(map);
                polygon.bindPopup("<h4><b>" + areas[i]['name'] + "</b><br> ID: " + areas[i]['id']  + " </h4> Dữ liệu khoanh vùng: " + areas[i]['geolocations'] + "<b> Ghi chú: " + areas[i]['keywords']  );
            }
        }

        function addStreets() {
            for (var i = 0; i < streets.length; i++) {
                var polyline = L.polyline(stringToGeoPoints(streets[i]['geolocations']), {
                    color: 'red'
                }).addTo(map);
                polyline.bindPopup("<b> Đường đi của: " + streets[i]['name']);
            }
        }

        var companies = JSON.parse('<?php echo json_encode($companies) ?>');
        var streets = JSON.parse('<?php echo json_encode($streets) ?>');
        var areas = JSON.parse('<?php echo json_encode($areas) ?>');
    </script>



    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>

</html>