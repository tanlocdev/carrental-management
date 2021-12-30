<?php
 require_once("db.php");
 $arr = $conn->getCompaniesList();
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Edit a company</title>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/leaflet.css" />
  <script src="js/leaflet.js"></script>
 </head>
 <body>
  <div id="map" style="width: 600px; height: 400px"></div>
  <form action="updatecompany.php" method="POST">
   <h1>Edit a company</h1>
   <table cellpadding="5" cellspacing="0" border="0">
    <tbody>
     <tr align="left" valign="top">
      <td align="left" valign="top">Company name</td>
      <td align="left" valign="top"><select id="company" name="company"><option value="0">Please choose a company</option><?php for($i=0; $i < count($arr); $i++) { print '<option value="'.$arr[$i]['id'].'">'.$arr[$i]['company'].'</option>'; } ?></select></td>
     </tr>
     <tr align="left" valign="top">
      <td align="left" valign="top">Description</td>
      <td align="left" valign="top"><textarea id="details" name="details"></textarea></td>
     </tr>
     <tr align="left" valign="top">
      <td align="left" valign="top">Latitude</td>
      <td align="left" valign="top"><input id="latitude" type="text" name="latitude" /></td>
     </tr>
      <tr align="left" valign="top">
      <td align="left" valign="top">Longitude</td>
     <td align="left" valign="top"><input id="longitude" type="text" name="longitude" /></td>
     </tr>
     <tr align="left" valign="top">
      <td align="left" valign="top">Telephone</td>
      <td align="left" valign="top"><input id="telephone" type="text" name="telephone" /></td>
     </tr>
	<tr align="left" valign="top">
	  <td align="left" valign="top">Keywords</td>
	  <td align="left" valign="top"><textarea name="keywords" id="keywords"></textarea></td>
	</tr>
     <tr align="left" valign="top">
      <td align="left" valign="top"></td>
      <td align="left" valign="top"><input type="submit" value="Update"></td>
     </tr>
    </tbody>
   </table>
  </form>
  <script>
   var map = L.map('map').setView([9.758963, 105.601753], 13);

   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
  
   function putDraggable() {
     
    /* create a draggable marker in the center of the map */
    draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable:true, zIndexOffset:900}).addTo(map);
    
    /* collect Lat,Lng values */
    draggableMarker.on('dragend', function(e) {
     $("#lat").val(this.getLatLng().lat);
     $("#lng").val(this.getLatLng().lng);
    });
   }
   
   $( document ).ready(function() {
    putDraggable();
    
    $("#company").change(function() {
     for(var i=0;i<arr.length;i++) {
      if(arr[i]['id'] == $('#company').val()) {
       $('#details').val(arr[i]['details']);
       $('#latitude').val(arr[i]['latitude']);
       $('#longitude').val(arr[i]['longitude']);
       $('#telephone').val(arr[i]['telephone']);
	   $('#keywords').val(arr[i]['keywords']);
       
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