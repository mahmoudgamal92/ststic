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
              <h4 class="card-title">جميع الخدمات</h4>
                          <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            اضافة نوع خدمة جديد
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                          اضافة نوع جديد
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="insert/service.php">
                          <div class="form-group">
                            <label>نوع الخدمة</label>
                            <input type="text" class="form-control" name="service_type">
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



            <!-- Edit Modal -->
                <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                        تعديل الخدمة
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="update/service.php">
                          <div class="form-group">
                            <label>نوع الخدمة</label>
                            <input type="hidden" name="service_id" id="ser_id">
                            <input type="text" class="form-control" name="service_type" id="ser_type">
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
                    <th>نوع الخدمة</th>
                    <th>تاريخ الأضافة</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from service_types");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                      $id = $row['id'];
                      $name = $row['name'];
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>

                        <td>
                          <a class="btn btn-outline-success" data-toggle="modal" data-target="#editModalCenter"
                          onclick="set_update('<?php echo $id;?>' , '<?php echo $name;?>')">
                            تعديل
                          </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" 
                            onclick="return confirm('Are You Sure to Delete This Service ? ');"
                            href="delete/service_type.php?id=<?php echo $row['id'] ?>">
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
<script>
  function set_update(id,name){
    document.getElementById("ser_id").value = id;
    document.getElementById("ser_type").value = name;
  }
</script>
  <script src="./vendors/js/vendor.bundle.base.js"></script>
</body>

</html>