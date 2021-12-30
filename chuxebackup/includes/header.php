<header>
  <div class="default-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a class="uppercase_text" href="index.php" style="font-size: 20px;"> &ensp; LOCARS </a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">



            <?php if (strlen($_SESSION['login']) == 0) {
            ?>
              <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Đăng nhập / Đăng ký</a> </div>
            <?php } else {

              echo "Chào mừng đến với Locars Company";
            } ?>


          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>


      <div class="header_wrap" style="margin-right:100px;">



        <div class="user_login">
          <ul style="margin-right:20px;">
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                <?php
                $email = $_SESSION['login'];
                $sql = "SELECT FullName FROM chuxe WHERE EmailId=:email ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {

                    echo htmlentities($result->FullName);
                  }
                } ?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu ">
                <?php if ($_SESSION['login']) { ?>
                  <li><a href="my-booking.php" class="fa fa-shopping-cart" style="font-size: 15px;"><b>&ensp; Đơn hàng</b></a></li>
                  <hr>
                  <li><a href="profile.php"><b>Hồ sơ cá nhân</b></a></li>
                  <li><a href="update-password.php"><b>Cập nhật mật khẩu</b></a></li>

                  <li><a href="post-testimonial.php"><b>Gửi phản hồi</b></a></li>
                  <li><a href="my-testimonials.php"><b>Phản hồi của tôi</b></a></li>
                  <hr>
                  <li><a href="logout.php" class="fa fa-sign-out" style="font-size:15px;" onclick="return confirm('Bạn thật sự muốn Đăng xuất')"> <b>Đăng xuất</b></a></li>
                <?php } else { ?>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal" class="fa fa-shopping-cart" style="font-size: 15px;"><b>&ensp; Đơn hàng</b></a></li>
                  <hr>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><b>Hồ sơ cá nhân</b></a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><b>Cập nhật mật khẩu</b></a></li>

                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><b>Gửi phản hồi</b></a></li>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal"><b>Phản hồi của tôi</b></a></li>
                  <hr>
                  <li><a href="#loginform" data-toggle="modal" data-dismiss="modal" class="fa fa-sign-out" style="font-size:15px;"> <b>Đăng xuất</b></a></li>
                <?php } ?>
              </ul>

            </li>

          </ul>

        </div>

        <!-- <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="#" method="get" id="header-search-form">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>  -->
        <?php if ($_SESSION['login']) { ?>
          <div class="nav navbar-nav">
            <li><a href="my-booking.php" class="fa fa-car fa-lg" style="font-size: 23px; float:right"><b class="fa fa-check-circle-o"></b></a></li>

          </div>
        <?php } else { ?>
          <div></div>
        <?php } ?>

      </div>
      <div class="container-fluid" id="navigation">
        <div class="logo" style="float: left;"> </div>

        
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>