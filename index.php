<?php
session_start();
 if(!isset($_SESSION['admin_name']))
 {
  header("Location: login.php");
 }
?>

<?php
function get_count($id){
include './config/connect.php';
$cmd = "select * from $id";
$res = mysqli_query($con,$cmd);
$count = mysqli_num_rows($res);
return $count;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Static || Admin</title>
  <link rel="shortcut icon" href="./images/logo.png" />
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body class="rtl">
  <div class="container-scroller">
<?php include './components/navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper"> 
      <?php include './components/sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h1>لوحة التحكم</h1>
          <p>لوحة التحكم</p>
          

          <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light">
                    <img src="images/house.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                   
                      <div class="fluid-container">
                        <a href="propreties.php" style="text-decoration:none;color:black">
                          <h3 class="card-title mb-0">العقارات</h3>
                      </a>
                      </div>
                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('properities'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                    <img src="images/workers.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                   
                      <div class="fluid-container">
                      <a href="employees.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">الموظفين</h3>
                      </a>
                      </div>
                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('employees'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                    <img src="images/services.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                      <div class="fluid-container">
                      <a href="services.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">الخدمات</h3>
                      </a>
                      </div>
                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('service_types'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>            
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                    <img src="images/list.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                      <div class="fluid-container">
                        <a href="specified.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">العناصر المحددة</h3>
                        </a>
                      </div>

                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('items'); ?>
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>




            
            
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                     <img src="images/playlist.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                      <div class="fluid-container">
                      <a href="cashout_items.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">عناصر المنصرفات</h3>
                      </a>
                      </div>
                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('cashout_items'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


                       
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                     <img src="images/videos.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                      <div class="fluid-container">
                      <a href="invoice_sections.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">أقسام الفواتير</h3>
                      </a>
                      </div>
                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('cashout_items'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

         
              
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                    <img src="images/worker.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                      <div class="fluid-container">
                        <a href="workers.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">العمال</h3>
                        </a>
                      </div>
                      <p class="card-text mb-0" style="font-size:25px;text-align:center;margin-top:5px;color:#FD6C35">
                      <?php echo get_count('workers'); ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="highlight-icon bg-light ml-3">
                    <img src="images/logo_avatar.png" style="width:50px"/>
                    </div>
                    <div class="wrapper">
                      <div class="fluid-container">
                      <a href="logo.php" style="text-decoration:none;color:black">
                        <h3 class="card-title mb-0">الشعار</h3>
                      </a>
                      </div>
                      <p class="card-text mb-0">تعديل الشعار</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- footer -->
       <?php
       include './components/footer.php';
       ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  </script>
</body>
</html>
