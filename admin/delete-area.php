<?php
 require_once("db.php");
 $arr = $conn->getAreasList();
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
                            
                            <h4 class="text-center" scope="col" style="color:steelblue"> <i></i><b> GHI CHÚ:</b> &emsp;(Để XÓA khoanh vùng xe, hãy chọn khoanh vùng xe cần xóa ở mục tên khoanh vùng để xem vị trí. Sau đó nhấn nút Xóa) </h4>
                            <hr>

                            <div class="text-center">
                                <div class="text-center">
                                    <h3>XÓA KHOANH VÙNG XE</h3>
                                </div>
                            </div>
                            <br>

                            <form class="form-horizontal" action="deleteareadb.php" method="post">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tên khoanh vùng:<span style="color:red">*</span></label>
                                    <div class="col-sm-10">
                                     <select class="form-control" id="area" name="area"><option value="0">Chọn khoanh vùng cần xóa</option><?php for( $i=0; $i < count($arr); $i++) { print '<option value="'.$arr[$i]['id'].'">'.$arr[$i]['name'].'</option>'; } ?></select></td>
    
                                        
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
  var map = L.map( 'map' ).setView( [9.958963, 105.601753], 11);
  var polygon;
  var draggableAreaMarkers = new Array();

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

 
  
  function resetArea() {
   if(polygon != null) {
    map.removeLayer( polygon );
   }
   for(i=0; i < draggableAreaMarkers.length; i++) {
    map.removeLayer( draggableAreaMarkers[i] );
   }
   draggableAreaMarkers = new Array();
  }
  
  function addMarkerAreaPoint(latLng) {
   var areaMarker = L.marker( [latLng.lat, latLng.lng], { draggable: true, zIndexOffset: 900}).addTo(map);
   
   areaMarker.arrayId = draggableAreaMarkers.length;

   areaMarker.on('click', function() {
    map.removeLayer( draggableAreaMarkers[ this.arrayId ]);
    draggableAreaMarkers[ this.arrayId ] = "";
   });

   draggableAreaMarkers.push( areaMarker );
  }
  
  function drawArea() {
   if(polygon != null) {
    map.removeLayer( polygon );
   }

   var latLngAreas = new Array();

   for(i=0; i < draggableAreaMarkers.length; i++) {
    if(draggableAreaMarkers[i] != "") {
     latLngAreas.push( L.latLng( draggableAreaMarkers[ i ].getLatLng().lat, draggableAreaMarkers[ i ].getLatLng().lng));
    }
   }

   if(latLngAreas.length > 1) {
    // create a blue polygon from an array of LatLng points
    polygon = L.polygon( latLngAreas, { color: 'blue' }).addTo(map);
   }

   if(polygon != null) {
    // zoom the map to the polygon
    map.fitBounds( polygon.getBounds() );
   }
  }
  
  function getGeoPoints() {
   var points = new Array();
   for(var i=0; i <draggableAreaMarkers.length; i++) {
    if(draggableAreaMarkers[ i ] != "") {
     points[i] =  draggableAreaMarkers[ i ].getLatLng().lng + "," + draggableAreaMarkers[ i ].getLatLng().lat;
    }
   }
   $('#geo').val(points.join(','));
  }
  
  $( document ).ready(function() {   
   $("#area").change(function() {
    resetArea();
    for(var i=0;i<arr.length;i++) {
     if(arr[i]['id'] == $('#area').val()) {
      arrangePoints(arr[i]['geolocations']);
      drawArea();
      break;
     }
    }
   });
  });
  
  function arrangePoints( geo ) {
   var linesPin = geo.split(",");

   var linesLat = new Array();
   var linesLng = new Array();

   for(i=0; i < linesPin.length;i++) {
    if(i % 2) {
     linesLat.push(linesPin[i]);
    }else{
     linesLng.push(linesPin[i]);
    }
   }

   var latLngLine = new Array();

   for(i=0; i < linesLng.length; i++) {
    latLngLine.push( L.latLng( linesLat[i], linesLng[i]));
   }

   for(i=0; i < latLngLine.length;i++) {
    addMarkerAreaPoint( latLngLine[i]);
   }
  }
  
  var arr = JSON.parse( '<?php echo json_encode($arr) ?>' );
 </script>

</body>

</html>