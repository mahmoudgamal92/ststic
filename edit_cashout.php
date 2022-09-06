<?php
include './config/dbconnect.php';
if(!isset($_GET['id']))
{
  header("Location:./propreties.php");
}
$id = $_GET['id'];
$cmd = "select * from cashout where id = '$id'";
$res = mysqli_query($con,$cmd);
$cashout = mysqli_fetch_array($res);
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <?php include 'components/alerts.php';?>
              <div class="row" style="justify-content:space-between;margin-bottom:50px">
                <div class="col-md-12">
                  <form class="forms-sample" method="POST" action="update/cashout.php">
                    <div class="form-group">
                      <input type="hidden" name="properity_id" value="<?php echo $id;?>">
                      <label>بند المنصرف:</label>
                      <select class="form-control" name="title">
                        <?php
                            $cmd = "select * from cashout_items";
                            $query= mysqli_query($con,$cmd);
                            while($row = mysqli_fetch_array($query))
                            {
                              ?>
                        <option value="<?php echo $row['name'] ?>">
                          <?php echo $row['name'] ?>
                        </option>
                        <?php
                            }
                           ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>وصف المنصرف:</label>
                      <textarea rows="6" class="form-control" name="item_desc"><?php echo $cashout['description']?></textarea>
                    </div>


                    <div class="form-group">
                      <label>قيمة المنصرف</label>
                      <input type="number" class="form-control" name="item_price" value="<?php echo $cashout['price']?>">
                    </div>

                    <div class="form-group">
                      <label>تاريح المنصرف</label>
                      <input type="date" class="form-control" name="item_date" value="<?php echo $cashout['date']?>">
                    </div>

                    <div class="form-group">
                      <label>ملاحظات</label>
                      <textarea name="notes" rows="6" class="form-control"><?php echo $cashout['notes']?></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="submit" class="btn btn-primary">
                        حفظ التعديلات
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

  <!-- End custom js for this page-->
</body>

</html>