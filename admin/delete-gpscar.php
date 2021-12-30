<?php
 require_once("db.php");
 $arr = $conn->getCompaniesList();
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

                        <div id="map" style="width: 100%; height: 700px"></div><br />
                        <div class="container ">
                            
                            <h4 class="text-center" scope="col" style="color:steelblue"> <i></i><b> GHI CHÚ:</b> &emsp;(Để XÓA khoanh vùng xe, hãy chọn tên khoanh vùng cần xóa ở mục tên khoanh để xem chi tiết. Sau đó nhấn nút Xóa) </h4>
                            <hr>

                            <div class="text-center">
                                <div class="text-center">
                                    <h3>XÓA VỊ TRÍ GPS XE</h3>
                                </div>
                            </div>
                            <br>

                            <form class="form-horizontal" action="deletecompanydb.php" method="POST">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tên xe:<span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                    <select class="form-control" id="company" name="company"><option value="0">Chọn xe cần xóa</option><?php for( $i=0; $i < count($arr); $i++) { print '<option value="'.$arr[$i]['id'].'">'.$arr[$i]['company'].'</option>'; } ?></select></td>
     
                                        
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input style="width:300px; background-color: #C04000; color:white;" class="btn" type="submit" value="XÓA">
                                </div>


                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- -->


    <div>
        <hr>
    </div>

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

    <script>
   var map = L.map('map').setView([9.958963, 105.601753], 11);

   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

   
   
   function putDraggable() {
    /* create a draggable marker in the center of the map */
    draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable: true, zIndexOffset: 900}).addTo(map);
    
    /* collect Lat,Lng values */
    draggableMarker.on('dragend', function(e) {
     $("#lat").val(this.getLatLng().lat);
     $("#lng").val(this.getLatLng().lng);
    });
   }
   
   $( document ).ready(function() {
    putDraggable();
    
    $("#company").change(function() {
     for(var i=0; i <arr.length; i++) {
      if(arr[i]['id'] == $('#company').val()) {
       map.panTo([arr[i]['latitude'], arr[i]['longitude']]);
       draggableMarker.setLatLng([arr[i]['latitude'], arr[i]['longitude']]);
       break;
      }
     }
    });
  
   });
   
   var arr = JSON.parse( '<?php echo json_encode($arr) ?>' );
  </script>

</body>

</html>