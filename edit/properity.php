<?php
include './../config/dbconnect.php';
?>
<?php
session_start();
error_reporting(0);
  if (isset($_POST['submit'])) {

    $eid = $_POST['id'];
    $name = htmlentities(mysqli_real_escape_string($con,$_POST['name'])); //
    $address = htmlentities(mysqli_real_escape_string($con,$_POST['address'])); //
    $street = htmlentities(mysqli_real_escape_string($con,$_POST['street'])); // 
    $flat_num = htmlentities(mysqli_real_escape_string($con,$_POST['flat_num'])); // 
    $location = htmlentities(mysqli_real_escape_string($con,$_POST['location']));
    $floar_num = htmlentities(mysqli_real_escape_string($con,$_POST['floar_num']));
    $notes = htmlentities(mysqli_real_escape_string($con,$_POST['notes'])); // s.code

    $query = mysqli_query($con, "update properities set   `name`='$name',address='$address',  street='$street', flat_num='$flat_num', location='$location', floar_num='$floar_num' , notes='$notes' where id='$eid'");

    if ($query) {

      $msg1 = "تم تعديل العقار بنجاح";

    } else {

      $msg2 = "لم يتم التعديل حاول مره أخرى";

    }

  }
//}
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
              <?php if (isset($msg1)) {
              ?>
              <div class="alert alert-success" role="alert" style="width:50%">
              <?php  echo $msg1;?>
              </div>
              <?php
              }
              ?>

              <?php if (isset($msg2)) {
              ?>
              <div class="alert alert-danger" role="alert" style="width:50%">
              <?php  echo $msg2;?>
              </div>
              <?php
              }
              ?>

                <div class="col-12">
                      <h4 class="card-title">تعديل عقار</h4>
                      <form class="forms-sample" method="POST" action="">
                    <?php
                    $id = $_GET['id'];
                    $res = mysqli_query($con, "select * from properities where id='$id'");
                    $row = mysqli_fetch_array($res);
                    ?>

                        <div class="form-group">
                          <label>أسم العميل</label>
                          <input  type="hidden" name="id" 
                          value="<?php echo $row['id'];?>">
                          <input type="text" class="form-control" name="name" 
                          value="<?php echo $row['name'];?>"
                          placeholder="أسم العميل">
                        </div>

                        <div class="form-group">
                          <label>المنطقة</label>
                          <input type="text" class="form-control" name="address"
                          value="<?php echo $row['address'];?>"
                          placeholder="المنطقة">
                        </div>

                        <div class="form-group">
                          <label>الشارع</label>
                          <input type="text" class="form-control" name="street"
                          value="<?php echo $row['street'];?>"
                          placeholder="الشارع">
                        </div>


                        <div class="form-group">
                          <label>رقم الشقة</label>
                          <input type="text" class="form-control" name="flat_num" 
                          value="<?php echo $row['flat_num'];?>"
                          placeholder="رقم الشقة">
                        </div>


                        <div class="form-group">
                          <label>الموقع</label>
                          <input type="text" class="form-control" name="location"
                          value="<?php echo $row['location']; ?>"
                          placeholder="الموقع">
                        </div>

                        
                        <div class="form-group">
                          <label>رقم الدور</label>
                          <input type="text" class="form-control" name="floar_num"
                          value="<?php echo $row['floar_num']; ?>"
                          placeholder="رقم الدور">
                        </div>

                        <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
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