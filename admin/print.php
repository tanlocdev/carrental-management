<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Paper CSS -->
    <link rel="stylesheet" href="/assets/paper-css/paper.css" type="text/css" />

    <link rel="shortcut icon" type="image/jpg" href="/webiot/frontend/img/logo.jpg" />

    <!-- Block title - Đục lỗ trên giao diện bố cục chung, đặt tên là `title` -->
    <title>Locars - Web cho thuê xe</title>
    <!-- End block title -->

    <!-- Định khổ giấy: A5, A4 or A3 -->
    <style>
        @page {
            size: A4
        }
    </style>
</head>

<body class="A4">

    <?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once(__DIR__ . '/../../../dbconnect.php');

    /* --- 
    --- 2. Truy vấn dữ liệu Đơn hàng theo khóa chính
    --- 
    */
    // Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $hd_ma = $_GET['hd_ma'];

    // Câu lệnh SQL Query lấy thông tin Đơn hàng
    $sqlSelectDonDatHang = <<<EOT
SELECT 
    hd.hd_ma, hd.hd_ngaylap, hd.hd_ngaynhan, hd.hd_ngaytra, hd.hd_noinhan, hd.hd_trangthaithanhtoan, httt.httt_ten, kh.kh_ten, kh.kh_dienthoai
    , SUM(xehd.xe_hd_soluong * xehd.xe_hd_dongia) AS TongThanhTien
FROM `hopdong` hd
JOIN `xe_hopdong` xehd ON hd.hd_ma = xehd.hd_ma
JOIN `khachhang` kh ON hd.kh_tendangnhap = kh.kh_tendangnhap
JOIN `hinhthucthanhtoan` httt ON hd.httt_ma = httt.httt_ma
WHERE hd.hd_ma=$hd_ma
GROUP BY hd.hd_ma, hd.hd_ngaylap, hd.hd_ngaynhan, hd.hd_ngaytra, hd.hd_noinhan, hd.hd_trangthaithanhtoan, httt.httt_ten, kh.kh_ten, kh.kh_dienthoai
EOT;

    // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record
    $resultSelectDonDatHang = mysqli_query($conn, $sqlSelectDonDatHang);
    $dataDonDatHang;
    while ($row = mysqli_fetch_array($resultSelectDonDatHang, MYSQLI_ASSOC)) {
        $dataDonDatHang = array(
            'hd_ma' => $row['hd_ma'],
            'hd_ngaylap' => date('d/m/Y H:i:s', strtotime($row['hd_ngaylap'])),
            'hd_ngaynhan' => empty($row['hd_ngaynhan']) ? '' : date('d/m/Y H:i:s', strtotime($row['hd_ngaynhan'])),
            'hd_ngaytra' => empty($row['hd_ngaytra']) ? '' : date('d/m/Y H:i:s', strtotime($row['hd_ngaytra'])),
            'hd_noinhan' => $row['hd_noinhan'],
            'hd_trangthaithanhtoan' => $row['hd_trangthaithanhtoan'],
            'httt_ten' => $row['httt_ten'],
            'kh_ten' => $row['kh_ten'],
            'kh_dienthoai' => $row['kh_dienthoai'],
            'TongThanhTien' => number_format($row['TongThanhTien'], 2, ".", ",") . ' vnđ',
        );
    }
    /* --- End Truy vấn dữ liệu Đơn hàng --- */

    /* --- 
    --- 3. Truy vấn dữ liệu Chi tiết Đơn hàng theo khóa chính
    --- 
    */
    // Lấy dữ liệu Sản phẩm đơn đặt hàng
    $sqlSelectSanPham = <<<EOT
SELECT 
    xe.xe_ma, xe.xe_ten, xehd.xe_hd_dongia, xehd.xe_hd_soluong
    , lx.lx_ten, nsx.nsx_ten
FROM `xe_hopdong` xehd
JOIN `xe` xe ON xehd.xe_ma = xe.xe_ma
JOIN `loaixe` lx ON xe.lx_ma = lx.lx_ma
JOIN `nhasanxuat` nsx ON xe.nsx_ma = nsx.nsx_ma
WHERE xehd.hd_ma=$hd_ma
EOT;

    // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $resultSelectSanPham = mysqli_query($conn, $sqlSelectSanPham);
    $dataSanPham = [];
    while ($row = mysqli_fetch_array($resultSelectSanPham, MYSQLI_ASSOC)) {
        $dataSanPham[] = array(
            'xe_ma' => $row['xe_ma'],
            'xe_ten' => $row['xe_ten'],
            'xe_hd_dongia' => $row['xe_hd_dongia'],
            'xe_hd_soluong' => $row['xe_hd_soluong'],
            'lx_ten' => $row['lx_ten'],
            'nsx_ten' => $row['nsx_ten'],
        );
    }
    /* --- End Truy vấn dữ liệu Chi tiết Đơn hàng --- */

    // 4. Hiệu chỉnh dữ liệu theo cấu trúc để tiện xử lý
    $dataDonDatHang['danhsachxe'] = $dataSanPham;
    ?>

    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <!-- Thông tin Cửa hàng -->
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center"><img src="/webiot/frontend/img/logo.jpg" width="100px" height="100px" /></td>
                    <td align="center">
                        <b style="font-size: 2em;">LOCARS - Website cho thuê xe</b><br />
                        <small>Cho thuê các loại xe ô tô, 4 chỗ, 7 chỗ,.. và nhiều dịch vụ chăm sóc xe khác</small><br />
                        <small></small>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Thông tin đơn hàng -->
        <p><i><u>Thông tin Hợp Đồng</u></i></p>
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td width="30%">Khách hàng:</td>
                    <td><b><?= $dataDonDatHang['kh_ten'] ?>
                            (<?= $dataDonDatHang['kh_dienthoai'] ?>)</b></td>
                </tr>
                <tr>
                    <td>Ngày lập:</td>
                    <td><b><?= $dataDonDatHang['hd_ngaylap'] ?></b></td>
                </tr>
                <tr>
                    <td>Hình thức thanh toán:</td>
                    <td><b><?= $dataDonDatHang['httt_ten'] ?></b></td>
                </tr>
                <tr>
                    <td>Tổng thành tiền:</td>
                    <td><b><?= $dataDonDatHang['TongThanhTien'] ?></b></td>
                </tr>
            </tbody>
        </table>

        <!-- Thông tin sản phẩm -->
        <p><i><u>Chi tiết hợp đồng thuê xe</u></i></p>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên xe</th>
                    <th>Số ngày thuê</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1; ?>
                <?php foreach($dataDonDatHang['danhsachxe'] as $xe): ?>
                <tr>
                    <td align="center"><?= $stt; ?></td>
                    <td>
                        <b><?= $xe['xe_ten'] ?></b><br />
                        <small><i><?= $xe['lx_ten'] ?></i></small><br />
                        <small><i><?= $xe['nsx_ten'] ?></i></small>
                    </td>
                    <td align="right"><?= $xe['xe_hd_soluong'] ?></td>
                    <td align="right"><?= $xe['xe_hd_dongia'] ?> vnđ</td>
                    <td align="right"><?= $xe['xe_hd_soluong'] * $xe['xe_hd_dongia'] ?> vnđ</td>

                    
                </tr>
                <?php $stt++; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" align="right"><b>Tổng thành tiền</b></td>
                    <td align="right"><b><?= $dataDonDatHang['TongThanhTien'] ?></b></td>
                </tr>
            </tfoot>
        </table>

        <!-- Thông tin Footer -->
        <br />
        <table border="0" width="100%">
            <tbody>
                <tr>
                    <td align="center">
                        <small>Xin cám ơn Quý khách đã ủng hộ Cửa hàng, Chúc Quý khách An Khang, Thịnh Vượng!</small>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
        <br>
        <div class="col-md-9"><p align="right" >Người thuê xe &emsp;&emsp; &emsp;&emsp; </p><br></div>
        <p align="right">Ký tên &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;</p>
    </section>
    <!-- End block content -->
</body>

</html>