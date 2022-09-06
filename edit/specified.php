<?php
include './../config/dbconnect.php';
?>
<?php
if(!isset($_GET['id']))
{
    header("Location:./../specified.php");
}
else
{
    $id = $_GET['id'];
    $cmd = "select * from items where id = '$id'";
    $query = mysqli_query($con,$cmd);
    $items = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Properites</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./../vendors/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="./../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="./../vendors/morris.js/morris.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./../images/favicon.png" />
</head>

<body class="rtl">
  <div class="container-scroller">
    <?php include './../components/navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php include './../components/sidebar.php'; ?>
      <!-- partial -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
          
              <div class="row">
                <div class="col-12">
                <h4 class="card-title">
                  تعديل العناصر المحددة مسبقا
                </h4>

                  <form class="forms-sample" method="POST" action="./../update/specified.php">

                  <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo  $items['id'] ?>">
                    </div>
                    
                    <div class="form-group">
                      <label>البند</label>
                      <input type="text" class="form-control" name="title"
                      value="<?php echo  $items['title'] ?>"
                      >
                    </div>

                    <div class="form-group">
                      <label>السعر</label>
                      <input type="number" class="form-control" name="price"
                      value="<?php echo  $items['price'] ?>"
                      >
                    </div>

                    <div class="form-group">
                      <label>الوصف</label>
                      <textarea class="form-control" rows="6" name="description"
                      
                      ><?php echo  $items['description'] ?></textarea>
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
       include './../components/footer.php';
       ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="./../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="./../vendors/raphael/raphael.min.js"></script>
  <script src="./../vendors/morris.js/morris.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="./../js/off-canvas.js"></script>
  <script src="./../js/hoverable-collapse.js"></script>
  <script src="./../js/misc.js"></script>
  <script src="./../js/settings.js"></script>
  <script src="./../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./../js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>