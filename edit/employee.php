<?php
include './../config/dbconnect.php';
?>
<?php
if(!isset($_GET['emp_id']))
{
    header("Location:./../employees.php");
}
else
{
    $emp_id = $_GET['emp_id'];
    $cmd = "select * from employees where emp_id = '$emp_id'";
    $query = mysqli_query($con,$cmd);
    $employee = mysqli_fetch_array($query);
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
              <h4 class="card-title">
                تعديل بيانات موظف
              </h4>
              <div class="row">
              <div class="col-md-3">
                <img src="./../uploads/<?php echo $employee['image']; ?>" style="width:100%"/>
              </div>
                <div class="col-md-9">
                <form class="forms-sample" method="POST"  enctype="multipart/form-data" 
                action="./../update/employee.php">

                        <div class="form-group">
                            <input type="hidden" name="emp_id" 
                            value="<?php echo $employee['emp_id']?>">
                          </div>


                          <div class="form-group">
                            <label>الأسم</label>
                            <input type="text" class="form-control" name="name" 
                            value="<?php echo $employee['name']?>">
                          </div>


                          <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" class="form-control" name="address"
                            value="<?php echo $employee['address']?>"
                            >
                          </div>


                          <div class="form-group">
                            <label>تاريخ التسجيل</label>
                            <input type="date" class="form-control" name="date" 
                            value="<?php echo $employee['date_registered']?>">
                          </div>

                          <div class="form-group">
                            <label>الصورة الشخصية</label>
                            <input type="file" class="form-control" name="thumbnail"/>
                          </div>
            
                          <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">
                          حفظ التعديلات</button>
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