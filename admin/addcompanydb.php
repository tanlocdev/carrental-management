<?php

require_once("db.php");

$company = strip_tags($_POST['company']);
$details = strip_tags($_POST['details']);
$latitude = strip_tags($_POST['latitude']);
$longitude = strip_tags($_POST['longitude']);
$telephone = strip_tags($_POST['telephone']);
$keywords = strip_tags($_POST['keywords']);

$conn->addCompany($company, $details, $latitude, $longitude, $telephone, $keywords);

echo "<script>alert('Đã thêm vị trí xe thành công.');</script>";
echo "<script type='text/javascript'> document.location = 'gps.php'; </script>";
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Company added</title>
 </head>
 <body>
  <h1>Company has been added</h1>
 </body>
</html>