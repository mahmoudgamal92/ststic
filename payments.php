<?php
include './config/dbconnect.php';
if(!isset($_GET['id']))
{
  header("Location:./propreties.php");
}
$id = $_GET['id'];
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
           
              <div class="row" style="justify-content:space-between;margin-bottom:50px">
                <h4 class="card-title">دفعات العميل</h4>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  اضافة دفعة جديدة
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">اضافة دفعة جديده</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="insert/payment.php">
                          <div class="form-group">
                            <label>الأسم</label>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="text" class="form-control" name="name">
                          </div>

                          <div class="form-group">
                            <label>المبلغ</label>
                            <input type="number" class="form-control" name="price">
                          </div>

                          <div class="form-group">
                            <label>تاريح الدفعة</label>
                            <input type="date" class="form-control" name="date">
                          </div>


                          <div class="form-group">
                            <label>ملاحظات</label>
                            <textarea class="form-control" name="note"></textarea>
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
                        <th>الأسم</th>
                        <th>المبلغ</th>
                        <th>التاريخ</th>
                        <th>ملاحظات</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                    $res = mysqli_query($con, "select * from payment where properity_id = '$id'");
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <tr>
                      <td>
                          <?php echo $row['id']; ?>
                        </td>
                        <td>
                          <?php echo $row['name']; ?>
                        </td>
                        <td>
                          <?php echo $row['price']; ?>
                        </td>
                        <td>
                          <?php echo $row['date']; ?>
                        </td>

                        <td>
                          <?php echo $row['notes']; ?>
                        </td>
                        <td>
                          <a href="edit_payment.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-success">تعديل</a>
                        </td>

                        <td>
                          <button class="btn btn-danger"
                          onclick="return confirm('Are You Sure to Delete This Payment ? ');"
                           href="delete/payment.php?payment_id=<?php echo $row['id'];?>&properity_id=<?php echo $id ?>"
                           >
                          حذف
                        </button>
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

  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
</body>

</html>