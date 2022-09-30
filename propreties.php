<?php
include './config/dbconnect.php';
?>
<?php
function get_cash($id)
{
  include './config/connect.php';
  $cmd1 = "select sum(price) as cashout_value from cashout where properity_id = '$id'";
  $res1 = mysqli_query($con,$cmd1);
  $row1 = mysqli_fetch_array($res1);
  $cashout = $row1['cashout_value'];

  $cmd2 = "select sum(price) as payment_value from payment where properity_id = '$id'";
  $res2 = mysqli_query($con,$cmd2);
  $row2 = mysqli_fetch_array($res2);
  $payment = $row2['payment_value'];
  return $payment - $cashout;

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
              <div class="row" style="justify-content:space-between;margin-bottom:50px">
              <h4 class="card-title">كل العقارات</h4>
              <a  class="btn btn-success" href="export_excel.php?table_name=properities">
                تصدير جدول
               </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  اضافة عقار جديد
                </button>
              </div>
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
                      <form class="forms-sample" method="POST" action="insert/properity.php">

                        <div class="form-group">
                          <label>أسم العميل</label>
                          <input type="text" class="form-control" name="name" placeholder="أسم العميل">
                        </div>

                        <div class="form-group">
                          <label>المنطقة</label>
                          <input type="text" class="form-control" name="address" placeholder="المنطقة">
                        </div>

                        <div class="form-group">
                          <label>الشارع</label>
                          <input type="text" class="form-control" name="street" placeholder="الشارع">
                        </div>


                        <div class="form-group">
                          <label>رقم الشقة</label>
                          <input type="text" class="form-control" name="flat_num" placeholder="رقم الشقة">
                        </div>


                        <div class="form-group">
                          <label>الموقع</label>
                          <input type="text" class="form-control" name="location" placeholder="الموقع">
                        </div>


                        <div class="form-group">
                          <label>رقم الدور</label>
                          <input type="text" class="form-control" name="floar_num" placeholder="رقم الدور">
                        </div>

                        <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
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
                        <th>أسم العميل</th>
                        <th>المنطقة</th>
                        <th>الشارع</th>
                        <th>رقم الشقة</th>
                        <th>ملاحظات</th>
                        <th>الدفعات - المنصرفات</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                    $ret = mysqli_query($con, "select * from  properities ORDER BY id DESC");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                      <tr>
                        <td>
                          <?php echo $cnt; ?>
                        </td>
                        <td>
                          <?php echo $row['name']; ?>
                        </td>
                        <td>
                          <?php echo $row['address']; ?>
                        </td>
                        <td>
                          <?php echo $row['street']; ?>
                        </td>
                        <td>
                          <?php echo $row['flat_num']; ?>
                        </td>
                      
                        <td>
                          <?php echo $row['notes']; ?>
                        </td>
                        <td>
                          <?php echo get_cash($row['id']) ?>
                        </td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary">الأعدادات</button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                              id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              <span class="sr-only">الاعدادات</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">

                              <a class="dropdown-item" href="edit/properity.php?id=<?php echo $row['id']; ?>">
                                تعديل عقار
                              </a>
                              <div class="dropdown-divider"></div>

                              <a class="dropdown-item" href="tickets.php?id=<?php echo $row['id']; ?>">
                                التذاكر
                              </a>
                              <div class="dropdown-divider"></div>
       
                              <a class="dropdown-item" href="invoice.php?id=<?php echo $row['token']; ?>">
                                فاتورة
                              </a>
                              <div class="dropdown-divider"></div>

                              <a class="dropdown-item" href="payments.php?id=<?php echo $row['id']; ?>">
                                دفعة عميل
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="cash_out.php?id=<?php echo $row['id']; ?>">
                                المنصرفات
                              </a>
                              <div class="dropdown-divider"></div>
                            </div>
                          </div>
                        </td>
                        <td>
                        <a class="btn btn-danger" href="delete/properity.php?id=<?php echo $row['id']; ?>">
                              حذف
                          </a>
                        </td>
                </div>
                </td>
                </tr>

                <?php
                 $cnt++;
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