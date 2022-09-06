<?php
include './config/dbconnect.php';
?>
<?php
function GetEmployeeById($id){
  include './config/dbconnect.php';
  $cmd = "select * from employees where emp_id = '$id'";
  $qurey = mysqli_query($con,$cmd);
  $emp = mysqli_fetch_array($qurey);
  return $emp;
}
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
                <div class="row" style="justify-content:space-between">
              <h4 class="card-title">كل الموظفين</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           اضافة موظف جديد
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                        اضافة موظف جديد
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST"  enctype="multipart/form-data" action="insert/employee.php">
                          <div class="form-group">
                            <label>الأسم</label>
                            <input type="text" class="form-control" name="name">
                          </div>


                          <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" class="form-control" name="address">
                          </div>


                          <div class="form-group">
                            <label>تاريخ التسجيل</label>
                            <input type="date" class="form-control" name="date">
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

        <!-- Edit Modal Modal Start -->
           <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                      تعديل بيانات موظف
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST"  enctype="multipart/form-data" action="insert/employee.php">

                        <div class="form-group">
                            <input type="text" class="form-control" name="id" id="edit_id">
                          </div>

                          <div class="form-group">
                            <label>الأسم</label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                          </div>


                          <div class="form-group">
                            <label>العنوان</label>
                            <input type="text" class="form-control" name="edit_address" id="edit_address">
                          </div>

                          <div class="form-group">
                            <label>تاريخ التسجيل</label>
                            <input type="date" class="form-control" name="edit_date">
                          </div>

                          <div class="form-group">
                            <label>الصورة الشخصية</label>
                            <input type="file" class="form-control" name="edit_thumbnail"/>
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
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table" style="overflow-x:scroll">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>إسم الموظف</th>
                    <th>العنوان</th>
                    <th>تاريخ التسجيل</th>
                    <th>الصوره الشخصيه</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from employees ORDER BY emp_id DESC");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                      <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['date_registered']; ?></td>
                        <td>
                         <img src="./uploads/<?php echo $row['image']; ?>" style="width:80px;height:80px">
                         </td>
                    <td>
                      <a href="edit/employee.php?emp_id=<?php echo $row['emp_id'];?>" 
                      class="btn btn-outline-success">
                        تعديل
                      </a> 
                    </td>
                    <td>
                      <a class="btn btn-danger" 
                      onclick="return confirm('Are You Sure to Delete This Employee ? ');"
                      href="delete/employee.php?emp_id=<?php echo $row['emp_id']?>">
                      حذف
                    </a> 
                    </td>
                </tr>
                <?php
                    }
                      ?>
                </tbody>
                </table>
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
</body>

</html>