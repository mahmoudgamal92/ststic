<?php
include './config/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Properites</title>
  <link rel="shortcut icon" href="./images/logo.png" />

  <!-- plugins:css -->
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./vendors/dropify/dropify.css">
  <!-- endinject -->
</head>

<body class="rtl">
  <div class="container-scroller">
    <?php include './components/navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php include './components/sidebar.php'; ?>
      <!-- partial -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <div class="row" style="margin-bottom:50px">
                <h2 class="card-title">تغيير الشعار</h2>
              </div>
              <div class="row">
                <div class="col-lg-5">
                  <h4>الشعار الحالي</h4>
                  <div class="card">
                    <div class="card-body">
                      <img src="uploads/<?php echo get_value('logo');?>" style="max-width:100%" />
                    </div>
                  </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                  <h4>تحميل الشعار الجديد</h4>
                  <div class="card">
                    <div class="card-body">
                      <form action="update/settings.php">
                        <input type="file" class="dropify" />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12" style="text-align:center">
                  <button class="btn btn-primary">
                    حفظ التعديلات
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- footer -->
        <?php include './components/footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <script src="./vendors/dropify/dropify.min.js"></script>
  <script src="./vendors/dropify/dropify.js"></script>
</body>
</html>