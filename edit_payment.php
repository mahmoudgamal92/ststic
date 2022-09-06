<?php
include './config/dbconnect.php';
if(!isset($_GET['id']))
{
  header("Location:./propreties.php");
}
$id = $_GET['id'];
$cmd = "select * from payment where id = '$id'";
$res = mysqli_query($con,$cmd);
$payment = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Properites</title>
  <link rel="shortcut icon" href="./images/logo.png" />
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">

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
          <div class="card">
            <div class="card-body">
            <?php
                include './components/alerts.php';
              ?>
              <div class="row" style="justify-content:space-between;margin-bottom:50px">
              <div class="col-md-12">
              <form class="forms-sample" method="POST" action="update/payment.php">
                          <div class="form-group">
                            <label>الأسم</label>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="text" class="form-control" name="name"
                            value="<?php echo $payment['name']; ?>"
                            >
                          </div>

                          <div class="form-group">
                            <label>المبلغ</label>
                            <input type="number" class="form-control" name="price"
                            value="<?php echo $payment['price']; ?>"
                            >
                          </div>

                          <div class="form-group">
                            <label>تاريح الدفعة</label>
                            <input type="date" class="form-control" name="date"
                            value="<?php echo $payment['date']; ?>"
                            >
                          </div>


                          <div class="form-group">
                            <label>ملاحظات</label>
                            <textarea class="form-control" name="note"><?php echo $payment['notes']; ?></textarea>
                          </div>
                          <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">حفظ التعديلات</button>
                      </div>
                        </form>
     </div>
              </div>
            
          </div>
        </div>
      </div>

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

  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="./vendors/raphael/raphael.min.js"></script>
  <script src="./vendors/morris.js/morris.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/misc.js"></script>
  <script src="./js/settings.js"></script>
  <script src="./js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>