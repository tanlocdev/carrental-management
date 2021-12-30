<?php
 require_once("db.php");

 $area = strip_tags($_POST['area']);
 $geo = strip_tags($_POST['geo']);
 $keywords = strip_tags($_POST['keywords']);
 echo "<script>alert('Đã thêm khoanh vùng thành công.');</script>";
 echo "<script type='text/javascript'> document.location = 'gps.php'; </script>";
 $conn->addArea( $area, $geo, $keywords);

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Area added</title>
 </head>
 <body>
  <h1>Area has been added</h1>
 </body>
</html>