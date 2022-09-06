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
            <div class="container row" style="justify-content:space-between">
              <h4 class="card-title">كل العمال</h4>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          اضافة عامل جديد
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                         اضافة عامل جديد
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="insert/worker.php">
                          <div class="form-group">
                            <label>اسم العامل</label>
                            <input type="text" class="form-control" name="name">
                          </div>


                          <div class="form-group">
                            <label>الوظيفة</label>
                            <input type="text" class="form-control" name="work">
                          </div>

            
                          <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">
                          حفظ التعديلات
                        </button>
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
                     تعديل بيانات العمال
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="update/worker.php">

                        <input type="hidden" name="w_id" id="w_id">

                          <div class="form-group">
                            <label>اسم العامل</label>
                            <input type="text" class="form-control" name="w_name" id="w_name">
                          </div>


                          <div class="form-group">
                            <label>الوظيفة</label>
                            <input type="text" class="form-control" name="w_work" id="w_work">
                          </div>

            
                          <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">
                          حفظ التعديلات
                        </button>
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
                    <th>إسم العامل </th>
                    <th>الوظيفة</th>
                    <th>حذف</th>
                    <th>تعديل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from workers ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($ret)) {
                      $id = $row['id'];
                      $name = $row['name'];
                      $work =  $row['work'];
                    ?>
                      <tr>
                      <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['work']; ?></td>
                    <td>
                      <a 
                      onclick="return confirm('Are You Sure to Delete This Worker ?');"
                      href="delete/worker.php?id=<?php echo $row['id']; ?>" 
                      class="btn btn-danger">
                      حذف
                      </a> 
                    </td>
                    <td>
                    <a class="btn btn-success"
                    data-toggle="modal" data-target="#editModalCenter"
                    onclick="set_update('<?php echo $id;?>' , '<?php echo $name;?>', '<?php echo $work;?>')"
                    >تعديل</a> 
                    </td>
                </div>
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
  function set_update(id,name,work){
    document.getElementById("w_id").value = id;
    document.getElementById("w_name").value = name;
    document.getElementById("w_work").value = work;
  }
  </script>
  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
</body>
</html>