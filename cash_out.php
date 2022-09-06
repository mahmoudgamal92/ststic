<?php
include './config/dbconnect.php';
?>
<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="./images/logo.png" />

  <title>Cash-Out</title>
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
              <h4 class="card-title">كل المنصرفات</h4>
          <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    اضافة  منصرف جديد
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">اضافة منصرف جديد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="insert/cashout.php">
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
                           <textarea class="form-control" name="item_desc"></textarea>
                          </div>


                          <div class="form-group">
                            <label>قيمة المنصرف</label>
                            <input type="number" class="form-control" name="item_price">
                          </div>

                          <div class="form-group">
                            <label>تاريح المنصرف</label>
                            <input type="date" class="form-control" name="item_date">
                          </div>

                          <div class="form-group">
                            <label>ملاحظات</label>
                            <textarea name="notes" class="form-control"></textarea>
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
              <div class="row">
              <div class="col-12" style="margin-top:50px;margin-bottom:50px">
                <form method="GET" action="cash_out.php">
                  <div class="row">
                  <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="hidden" name="filtered" value="true"/>
                    <div class="col-md-3">
                      <label>من تاريخ :</label>
                      <input type="date" name="f_date" class="form-control"/>
                    </div>

                    <div class="col-md-3">
                      <label>الي تاريخ :</label>
                      <input type="date" name="l_date" class="form-control"/>
                    </div>

                    <div class="col-md-3">
                    <label>بحث :</label>
                     <input type="text" name="param" class="form-control" placeholder="أبحث الأن "/>
                    </div>

                    <div class="col-md-3">
                  <button class="btn btn-success">بحث</button>
                    </div>
                  </div>
                </form>
              </div>
                <div class="col-12">
                  <table id="order-listing" class="table" style="overflow-x:scroll">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>البند</th>
                    <th>الوصف</th>
                    <th>المبلغ</th>
                    <th>التاريخ</th>
                    <th>الأضافة بواسطة</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['filtered']))
                    {
                      $param = $_GET['param'];
                      $f_date = $_GET['f_date'];
                      $l_date = $_GET['l_date'];
    
                      $cmd =  "select * from cashout where title LIKE '%{$param}%' and date  between '$f_date' and '$l_date'  and properity_id = '$id'";
                    }
                    else
                    {
                    $cmd =  "select * from cashout where properity_id = '$id'";
                    }
                    $ret = mysqli_query($con,$cmd);
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                      <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['added_by']; ?></td>
                        <td>
                      <a class="btn btn-primary" href="edit_cashout.php?id=<?php echo $row['id']; ?>">
                      تعديل
                      </a> 
                    </td>
                    <td>
                      <a class="btn btn-danger" 
                      href="./delete/cash_out.php?c_id=<?php echo $row['id'];?>&p_id=<?php echo $id; ?>">
                      حذف
                    </a> 
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
</body>

</html>