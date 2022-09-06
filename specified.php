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
              <h4 class="card-title">العناصر المحدده</h4>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                 اضافة عنصر محدد
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">اضافة عنصر جديد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="insert/specified.php">
                          <div class="form-group">
                            <label>البند</label>
                            <input type="text" class="form-control" name="item">
                          </div>

                          <div class="form-group">
                            <label>السعر</label>
                            <input type="number" class="form-control" name="price">
                          </div>

                          <div class="form-group">
                            <label>الوصف</label>
                            <textarea class="form-control" rows="3" name="description"></textarea>
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
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table" style="overflow-x:scroll">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>البند </th>
                    <th>الوصف</th>
                    <th>السعر</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from items ORDER BY id DESC");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td> 
                          <a href="edit/specified.php?id=<?php echo $row['id']; ?>" 
                          class="btn btn-success">تعديل</a> 
                        </td>

                    <td> 
                      <a href="delete/specified.php?id=<?php echo $row['id']; ?>" 
                      class="btn btn-danger">حذف</a> 
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
  <script src="./vendors/js/vendor.bundle.base.js"></script>
</body>

</html>