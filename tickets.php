<?php
session_start();
error_reporting(0);
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

    <!-- plugins:css -->
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
                                <h4 class="card-title">جميع التذاكر</h4>
                                <a  class="btn btn-success" href="export_excel.php?table_name=tickets">
                                                    تصدير جدول
                                                </a>                               
                             <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">
                                    فتح تذكرة جديدة
                                </button>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    فتح تذكرة جديدة
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>


                                            <div class="modal-body">
                                                <form class="forms-sample" method="POST" action="insert/ticket.php">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>التاريخ</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    name="date_time">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>المدة</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    name="duration">
                                                            </div>
                                                        </div>


                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>عن طريق</label>
                                                                <input type="text" class="form-control" name="by">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>الخدمة</label>
                                                                <select class="form-control" name="service_name">
                                                                    <option>none</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>الموظف 1</label>
                                                                <select class="form-control" name="employee">
                                                                    <?php  
                                                                    $cmd = "select * from employees";
                                                                    $query = mysqli_query($con,$cmd);
                                                                    while ($row = mysqli_fetch_array($query))
                                                                    {
                                                                        ?>
                                                                    <option value="
                                                        <?php echo $row['name'] ?>">
                                                                        <?php
                                                                        
                                                                        echo $row['name']
                                                                        ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>



                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>الموظف 2</label>
                                                                <select class="form-control" name="employee2">
                                                                    <?php  
                                                                    $cmd = "select * from employees";
                                                                    $query = mysqli_query($con,$cmd);
                                                                    while ($row = mysqli_fetch_array($query))
                                                                    {
                                                                        ?>
                                                                    <option value="
                                                        <?php echo $row['name'] ?>">
                                                                        <?php
                                                                        
                                                                        echo $row['name']
                                                                        ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>



                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>الموظف 3</label>
                                                                <select class="form-control" name="employee3">
                                                                    <?php  
                                                                    $cmd = "select * from employees";
                                                                    $query = mysqli_query($con,$cmd);
                                                                    while ($row = mysqli_fetch_array($query))
                                                                    {
                                                                        ?>
                                                                    <option value="
                                                        <?php echo $row['name'] ?>">
                                                                        <?php
                                                                        
                                                                        echo $row['name']
                                                                        ?>
                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>



                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>التكلفة</label>
                                                                <input type="number" class="form-control" name="cost">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>الحالة</label>
                                                                <select class="form-control" name="status">
                                                                    <option>Open</option>
                                                                    <option>Close</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>ملاحظات</label>
                                                                <textarea class="form-control" name="note"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-primary">
                                                                    اضافة
                                                                </button>
                                                            </div>
                                                        </div>
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
                                                <th>الوقت</th>
                                                <th>الفترة</th>
                                                <th>عن طريق</th>
                                                <th>أسم الخدمة</th>
                                                <th>الموظف 1</th>
                                                <th>الموظف 2</th>
                                                <th>الموظف 3</th>
                                                <th>التكلفة</th>
                                                <th>الحالة</th>
                                                <th>ملاحظة</th>
                                                <th>تعديل</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = mysqli_query($con, "select * from tickets ORDER BY ticket_id DESC");
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <?php echo $row['date_open']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['duration']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['open_by']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['service_type']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['emp1']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['emp2']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['emp3']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['cost']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['status']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['notes']; ?>
                                                </td>

                                                <td>
                                                    <a class="btn btn-primary"
                                                    href="edit_ticket.php?id=<?php echo $row['ticket_id']?>"
                                                    >
                                                        <img src="images/edit.png"
                                                            style="width:20px;height:20px;border-radius:0px" />
                                                    </a>
                                                </td>

                                                <td>
                                                    <a class="btn btn-danger"
                                                    onclick="return confirm('Are You Sure to Delete This Ticket ? ');"
                                                    href="delete/ticket.php?id=<?php echo $row['ticket_id'] ?>"
                                                    >
                                                        <img src="images/delete.png"
                                                            style="width:20px;height:20px;border-radius:0px" />
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
            <?php include './components/footer.php';?>
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