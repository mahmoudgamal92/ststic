<?php
include './config/dbconnect.php';
if(!isset($_GET['id']))
{
  header("Location:./propreties.php");
}
$id = $_GET['id'];
$cmd = "select * from tickets where ticket_id = '$id'";
$res = mysqli_query($con,$cmd);
$ticket = mysqli_fetch_array($res);
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
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="justify-content:space-between;margin-bottom:50px">
                            <div class="col-md-12">
                                <h3 style="margin-bottom:20px">
                                    تعديل تذكرة
                                </h3>
                            </div>
                            <div class="col-md-12">
                                <form class="forms-sample" method="POST" action="insert/ticket.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>التاريخ</label>
                                                <input type="datetime-local" class="form-control" name="date_time" value="<?php echo $ticket['date_open'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>المدة</label>
                                                <input type="datetime-local" class="form-control" name="duration" value="<?php echo $ticket['duration'] ?>">
                                            </div>
                                        </div>


                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>عن طريق</label>
                                                <input type="text" class="form-control" name="by"
                                                value="<?php echo $ticket['open_by'] ?>"
                                                >
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الخدمة</label>
                                                <select class="form-control" name="service_name" style="padding:5px">
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
                                            <option value="<?php echo $row['name'] ?>">
                                                <?php echo $row['name']?>
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
                                            <option value="<?php echo $row['name'] ?>">
                                                <?php echo $row['name']?>
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
                                                    <option value="<?php echo $row['name'] ?>">
                                                    <?php echo $row['name'];?>
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
                                                <input type="number" class="form-control" name="cost" value="<?php echo $ticket['cost'];?>">
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
                                                <textarea rows="5" class="form-control" name="note"><?php echo $ticket['notes'];?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary">
                                                    حفظ التعديلات
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