<?php
session_start();
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                       تغيير كلمة المرور
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST"  enctype="multipart/form-data" action="insert/employee.php">

                        <div class="form-group">
                            <label> كلمة المرور الحالية</label>
                            <input type="password" class="form-control" name="current_pwd">
                          </div>


                          <div class="form-group">
                            <label>كلمة المرور الجديدة</label>
                            <input type="password" class="form-control" name="new_pwd">
                          </div>
                      

                          
                          <div class="form-group">
                            <label>تأكيد كلمة المرور</label>
                            <input type="password" class="form-control" name="confirm_pwd">
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
   <!-- End Modal -->

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
               الملف الشخصي
              </h4>
              <div class="row">
              <div class="col-md-3">
                <img src="./uploads/<?php echo get_value('logo'); ?>" style="width:100%"/>
              </div>
                <div class="col-md-9">
                <form class="forms-sample" method="POST"  enctype="multipart/form-data" 
                action="./update/admin.php">

                          <div class="form-group">
                            <label> الأسم بالكامل</label>
                            <input type="text" class="form-control" name="name">
                          </div>


                          <div class="form-group">
                            <label>أسم المستخدم</label>
                            <input type="text" class="form-control" name="address"
                          
                            >
                          </div>
                         
                          <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">
                          حفظ التعديلات
                        </button>

                        <button type="button"class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        تغيير كلمة المرور
                        </button>

                     

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
  <script src="./vendors/dropify/dropify.min.js"></script>
  <script src="./vendors/raphael/raphael.min.js"></script>
  <script src="./vendors/morris.js/morris.min.js"></script>
  <!-- End plugin js for this page-->
  
  <!-- inject:js -->
  <script src="./vendors/dropify/dropify.js"></script>
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




















