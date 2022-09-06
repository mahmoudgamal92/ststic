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

  <!-- inject:css -->
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
              <h4 class="card-title">عناصر المنصرفات</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
               اضافة عنصر جديد للمنصرفات
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
                        <form class="forms-sample" method="POST" action="insert/cashout_item.php">
                          <div class="form-group">
                            <label>عنوان البند</label>
                            <input type="text" class="form-control" name="item">
                          </div>                    
                          <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">حفظ التعديلات</button>
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
                        تعديل عناصر المنصرفات
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="forms-sample" method="POST" action="update/cashout_item.php">
                          <div class="form-group">
                            <label>عنوان البند</label>
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" class="form-control" name="item_name" id="item_name">
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
                    <th>إسم العنصر</th>
                    <th>التاريخ</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                  
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from cashout_items ORDER BY id DESC");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                      $id = $row['id'];
                      $name=$row['name'];
                    ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>     
                    <td>
                      <a 
                      data-toggle="modal" data-target="#editModalCenter"
                      onclick="set_update('<?php echo $id;?>' , '<?php echo $name;?>')"
                      class="btn btn-success">تعديل</a>
                    </td>
                    <td>
                    <a 
                    onclick="return confirm('Are You Sure to Delete This Item ? ');"
                    href="delete/cashout_item.php?id=<?php echo $row['id'];?>" 
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
  <!-- container-scroller -->
  <script>
  function set_update(id,name){
    document.getElementById("item_id").value = id;
    document.getElementById("item_name").value = name;
  }
</script>
  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
</body>

</html>