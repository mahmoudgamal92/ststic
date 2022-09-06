<?php
include './config/dbconnect.php';
$token = $_GET['id'];
$cmd = "select * from invoice where properity_token = '$token'";
$res = mysqli_query($con,$cmd);
$prop = mysqli_fetch_array($res);

function get_section_by_id($id)
{
include './config/connect.php';
$cmd ="select * from sections where id = '$id'";
$res = mysqli_query($con,$cmd);
$row = mysqli_fetch_array($res);
return $row['name'];
}?>
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

<body>
  <div class="container">
    <div class="row" style="margin-top:100px">
      <div class="col-md-4" style="text-align:right">
        <div class="form-group">
          <h3>العنوان</h3>
          <h5>
            <?php echo $prop['invoice_address']; ?>
          </h5>
        </div>

        <div class="form-group">
          <h3>رقم الفاتورة</h3>
          <h5>
            <?php echo $prop['invoice_token']; ?>
          </h5>
        </div>

      </div>


      <div class="col-md-4" style="text-align:right">
        <div class="form-group">
          <h3>اسم الفاتورة</h3>
          <h5>
            <?php echo $prop['invoice_title']; ?>
          </h5>
        </div>

        <div class="form-group">
          <h3>التاريخ</h3>
          <h5>
            <?php echo $prop['date_added']; ?>
          </h5>
        </div>
      </div>

      <div class="col-md-4" style="tetx-align:right">
        <img src="./images/logo.png" style="width:200px"/>
      </div>

    </div>
    <?php 
    $invoice_token = $prop['invoice_token'];
    $cmd = "select * from invoice_sections where invoice_token = '$invoice_token'";
    $res = mysqli_query($con,$cmd);
    while($row = mysqli_fetch_array($res))
    {
    ?>
    <div class="card">
      <div class="card-body">
        <div class="row" style="background-color:#f37021">
          <h1 style="width:100%;text-align:center;color:#FFF">
            <?php echo get_section_by_id($row['section_title']); ?>
          </h1>
        </div>
        <div class="row">
          <div class="col-12">
            <table id="order-listing" class="table" style="overflow-x:scroll;direction:rtl">
              <thead>
                <tr>
                  <th>#</th>
                  <th>البند</th>
                  <th>المعيار</th>
                  <th>كمية</th>
                  <th>قيمة</th>
                  <th>نوع الخصم</th>
                  <th>قيمة الخصم</th>
                  <th>اجمالي </th>
                </tr>
              </thead>
              <tbody id="section_<?php echo $row['section_id'] ?>">
                <?php
                  $section_id = $row['section_id'];
                  $cmd = "select * from invoice_items where section_id = '$section_id'";
                  $qurey = mysqli_query($con,$cmd);
                  while($row = mysqli_fetch_array($qurey))
                  {
                    ?>
                <tr>

                  <td>
                    <?php echo $row['item_id'];?>
                  </td>
                  <td>
                    <?php echo $row['item_name'];?>
                  </td>

                  <td>
                    <?php echo $row['standard'];?>
                  </td>

                  <td>
                    <?php echo intval($row['price']); ?>
                  </td>

                  <td>
                    <?php echo intval($row['quantity']); ?>
                  </td>

                  <td>
                    <?php 
                    if($row['discount_type'] == '0')
                    echo "خصم مبلغ محدد ";
                    else
                    {
                      echo "خصم نسبة مئوية ";
                    }
                    ?>
                  </td>

                  <td>
                    <?php echo $row['discount_value'];?>
                  </td>


                  <td>
                    <?php echo $row['total'];?>
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
    <?php
    }
    ?>

  </div>

        <div class="container">
          <div class="row" style="text-align:right;direction:rtl;margin-top:50px">
            <div class="col-md-12">
              <div class="form-group">
                <h3>نسبة الأشراف و التشغيل : 
                <?php echo $prop['supervision_ratio']; ?>  
                %</h3>
              </div>
            <div class="form-group">
                <h3>
                  نسبة الخصم الي الأجمالي : 0%
                </h3>
              </div>
            </div>
            <div class="col-md-12" style="margin-top:50px">
              <h3>
                الأجمالي العام لكل البنود :
                <span style="color:grey;margin:20px;font-weight:regular">
                  <?php
                 $cmd = "select sum(total) as total from invoice_items where properity_token = '$token'";
                 $res = mysqli_query($con,$cmd);
                 $row = mysqli_fetch_array($res);
                 $invoice_total = $row['total'];
                 echo $invoice_total." جنية";
                  ?>
                </span> 
              </h3>
              <h3>
                الاجمالي العام لقيمة نسبة الأشراف و التشغيل في كامل البنود :
                <span style="color:grey"> 
                <?php  echo ($invoice_total + ($invoice_total*$prop['supervision_ratio']) / 100). 
                " جنية" ?>
                </span>
              </h3>
            </div>
          </div>

          <div class="row" style="justify-content:center;margin-top:40px;margin-bottom:40px">
          <button class="btn btn-primary" style="margin-right:20px" 
          onclick="window.print();">
          طباعة 
           </button>
          <button class="btn btn-primary">تحميل </button>
          </div>
        </div>
</body>
</html>