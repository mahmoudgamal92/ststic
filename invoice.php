<?php
include './config/dbconnect.php';
$token = $_GET['id'];
$cmd = "select * from invoice where properity_token = '$token'";
$res = mysqli_query($con,$cmd);
$prop = mysqli_fetch_array($res);
?>
<?php
function get_section_by_id($id)
{
include './config/connect.php';
$cmd ="select * from sections where id = '$id'";
$res = mysqli_query($con,$cmd);
$row = mysqli_fetch_array($res);
return $row['name'];
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

      <!--  Start New Section Modal -->
      <div class="modal fade" id="sectionModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="exampleModalLongTitle">
                اضافة قسم جديد للفاتورة
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="forms-sample" method="POST" action="insert/invoice_section.php">
                <div class="form-group">
                  <label>أدخل الأسم</label>
                  <input type="hidden" name="invoice_token" value="<?php echo $prop['invoice_token'] ?>">
                  <input type="hidden" name="properity_token" value="<?php echo $prop['properity_token'] ?>">
            <select class="form-control" name="section_name" style="padding:5px">
              <?php
                $cmd = "select * from sections";
                $res = mysqli_query($con,$cmd);
                while($row = mysqli_fetch_array($res))
                {
                  ?>
                  <option value="<?php echo $row['id']?>">
                  <?php echo $row['name']?>
                  </option>
                  <?php
                }
              ?>
            </select>
                </div>
                <div class="modal-footer">
                  <button name="submit" type="submit" class="btn btn-primary">
                    اضافة
                </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <form action="invoice/update_invoice.php" method="POST">
            <div class="row" style="text-align:center;justify-content:center;margin-top:10px;margin-bottom:20px">
              <a href="print.php?id=<?php echo $token;?>" class="btn btn-primary">
                <img src="images/print.png" style="width:50px" />
              </a>
              <a href="print.php?id=<?php echo $token;?>" class="btn btn-primary" style="margin-right:50px">
                <img src="images/pdf.png" style="width:50px" />
              </a>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>العنوان</label>
                  <input type="hidden" name="properity_token" value="<?php echo $token; ?>">
                  <input type="text" class="form-control" name="invoice_address"
                    value="<?php echo $prop['invoice_address']; ?>">
                </div>
                <div class="form-group">
                  <label>رقم الفاتورة</label>
                  <input type="text" class="form-control" name="invoice_token"
                    value="<?php echo $prop['invoice_token']; ?>">
                </div>

              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>اسم الفاتورة</label>
                  <input type="text" class="form-control" name="invoice_title"
                    value="<?php echo $prop['invoice_title']; ?>">
                </div>

                <div class="form-group">
                  <label>التاريخ</label>
                  <input type="date" class="form-control" name="invoice_date"
                    value="<?php echo $prop['date_added']; ?>">
                </div>
              </div>

            </div>
            <div class="row" style="text-align:center;justify-content:center;margin-top:10px">
              <button type="submit" class="btn btn-success">
                تحديث
              </button>

            </div>
          </form>
          <div class="row" style="margin-top:20px">
         


          <div class="col-md-6">
          <button class="btn btn-primary" data-toggle="modal" data-target="#sectionModalCenter">
              اضافة قسم جديد
            </button>
          </div>

          </div>
        </div>

        <?php 
        $invoice_token = $prop['invoice_token'];
        $cmd = "select * from invoice_sections where invoice_token = '$invoice_token'";
        $res = mysqli_query($con,$cmd);
        while($row = mysqli_fetch_array($res))
        {
        ?>

        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <h1 style="width:100%;text-align:center;color:#1b5a7d">
                  <?php echo get_section_by_id($row['section_title']); ?>
                </h1>
              </div>
              <div class="row" style="justify-content:space-between">
                <button id="add_row"
                  onclick="add_new_row('<?php echo $row['section_id'];?>','<?php echo $token ?>','<?php echo $prop['invoice_token'];?>')"
                  type="button" class="btn btn-primary">
                  أضافة بند جديد
                </button>


                <a type="button" onclick="return confirm('Are You Sure to Delete This Section ? ');"
                  href="delete/section.php?id=<?php echo $row['section_id']?>" class="btn btn-danger">
                  حذف
                </a>
              </div>
          
              <form action="invoice/update_section.php" method="POST">
                    <div class="row">
                      <div class="col-md-1">#</div>
                      <div class="col-md-5">البند</div>
                      <div class="col-md-1">المعيار</div>
                      <div class="col-md-1">كمية</div>
                      <div class="col-md-1">قيمة</div>
                      <div class="col-md-1">اجمالي </div>
                      <div class="col-md-1">حذف</div>
                      <div class="col-md-1">ملاحظة</div>
                    </div>


                    <div class="row" id="section_<?php echo $row['section_id'] ?>">
                    <?php
                      $section_id = $row['section_id'];
                      $cmd = "select * from invoice_items where section_id = '$section_id'";
                      $qurey = mysqli_query($con,$cmd);
                      while($row = mysqli_fetch_array($qurey))
                      {
                        ?>
                        <div class="row" style="border:1px solid grey;padding:10px;margin:10px">
                          <input type="hidden" name="section_id[]" value="<?php echo $row['section_id'] ?>" />
                          <input type="hidden" name="invoice_token[]" value="<?php echo $prop['invoice_token'];?>" />
                          <input type="hidden" name="prop_token[]" value="<?php echo $token; ?>" />

                          <div class="col-md-1">
                            <input type="text" class="form-control" id="item_id[]" name="item_id[]"
                              value="<?php echo $row['item_id'];?>" disabled>
                          </div>

                          <div class="col-md-5">
                            <input type="text" class="form-control" name="item_name[]" id="item_name"
                              value="<?php echo $row['item_name'];?>">
                          </div>

                    

                          <div class="col-md-1">
                            <input type="text" class="form-control" name="standard[]" id="standard"
                              value="<?php echo $row['standard'];?>">
                          </div>

                          <div class="col-md-1">
                            <input type="number" class="form-control" name="price[]" id="price"
                              value="<?php echo intval($row['price']); ?>">
                          </div>

                          <div class="col-md-1">
                            <input type="number" class="form-control" name="quantity[]" id="quantity"
                              value="<?php echo intval($row['quantity']); ?>">
                          </div>

                         
                          <div class="col-md-1">
                            <input type="text" class="form-control total" id="total" name="total[]"
                              value="<?php echo $row['total'];?>">
                          </div>

                          <div class="col-md-1">
                            <a class="btn btn-danger" id="remove_row" style="margin-bottom:5px">
                              <img src="images/delete.png" style="width:100%;border-radius:0px" />
                            </a>
                          </div>

                          <div class="col-md-1">
                            <a class="btn btn-primary view_notes" style="margin-bottom:5px">
                              <img src="images/eye.png" style="width: 100%;border-radius:0px" />
                             </a>
                          </div>

                       <div class="row col-md-12 notes" style="display:none">
                          <div class="col-md-12" style="margin-top:20px;margin-bottom:10px">
                          <h3 style="color:#FD6C35">بيانات أضافية</h3>
                          </div>

                          <div class="col-md-5">
                            <label>نسبة الخصم</label>
                          </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-5">
                          <label>قيمة الخصم</label>
                          </div>
                       
                            <select class="col-md-5 form-control" name="discount_type" id="discount_type" style="margin-top:10px">
                              <option value="0" selected>قيمة ثابتة</option>
                              <option value="1">نسبة مئوية</option>
                            </select>
                            <div class="col-md-1"></div>
                            <input type="text" class="col-md-5 form-control" id="discount_value" name="discount_value[]"
                            style="margin-top:10px"
                            value="<?php echo $row['discount_value'];?>">                        
                        
                            <div class="col-md-12" style="margin-top:20px">

                            <label>ملاحظات البند</label>
                              <textarea class="col-md-12 form-control" rows="3"  name="notes[]" style="margin-top:10px;margin-bottom:10px;padding:10px"
                              placeholder="أدخل ملاحظات البند">
                              <?php echo $row['item_notes'];?>
                              </textarea>  
                            </div>       
                          </div>
                        </div>

                       <?php 
                      } 
                      ?>
                       </div>


                  <div style="width:100%;text-align:center;margin-bottom:50px">
                    <button class="btn btn-success" onclick="">تحديث بيانات القسم</button>
                  </div>

                  </form>
            
              <div class="container">

              <?php 
            // $cmd = "select sum(total) as sum_total from invoice_items where section_id = '$section_id'";
            // $qurey = mysqli_query($con,$cmd);
            // $row = mysqli_fetch_array($qurey);
            // echo $row['sum_total'];
            ?>
            </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>


        <div class="content-wrapper">

          <form action="invoice/update_invoice.php" method="POST">
            <div class="row">
              <input type="hidden" name="invoice_token" value="<?php echo $prop['invoice_token']; ?>">
              <input type="hidden" name="properity_token" value="<?php echo $token; ?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label>نسبة الأشراف و التشغيل : %</label>
                  <input type="number" id="supervision_ratio" name="supervision_ratio" class="form-control"
                    value="<?php echo $prop['supervision_ratio']; ?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>نسبة الخصم الي الأجمالي</label>
                  <input type="number" class="form-control" name="invoice_title">
                </div>
              </div>
              <div class="col-md-12" style="text-align:center">
                <button type="submit" class="btn btn-success">
                  تحديث
                </button>
              </div>
            </div>
          </form>

          <div class="col-md-12" style="margin-top:50px">
            <h3>
              الأجمالي العام لكل البنود :
              <!-- <span id="invoice_total"></span> -->
              <span>
                <?php
                 $cmd = "select sum(total) as total from invoice_items where properity_token = '$token'";
                 $res = mysqli_query($con,$cmd);
                 $row = mysqli_fetch_array($res);
                 $invoice_total = $row['total'];
                 echo $invoice_total;
                  ?>
              </span>
            </h3>


            <h3>
              الاجمالي العام لقيمة نسبة الأشراف و التشغيل في كامل البنود :
              <?php  echo $invoice_total*($prop['supervision_ratio'] / 100) ?>

            </h3>

            
            <h3>
              الاجمالي العام :
              <?php  echo ($invoice_total + ($invoice_total*$prop['supervision_ratio']) / 100) ?>

            </h3>
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
    function set_item_data(section_id) {
      document.getElementById("section_id_input").value = section_id;
    }
  </script>
  
    <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <script type="text/javascript">
    $(function () {
      $('#add_row').click(function () {
        add_new_row();
      });

      $('.view_notes').click(function () {
      $(this).parent().parent().find('.notes').toggle();
      });

      $('body').delegate('#remove_row', 'click', function () {
        $(this).parent().parent().remove();
      });

      $('body').delegate('#quantity,#price,#discount_value,#discount_type', 'change', function () {
        // var tbody = $(this).parent().parent().parent().attr('id');
        // tbody = "#"+tbody;
        var tr = $(this).parent().parent();
        var qty = tr.find('#quantity').val();
        var price = tr.find('#price').val();
        var dis = tr.find('#discount_value').val();
        var dis_type = tr.find('#discount_type').val();
        var total = 0;

        //var dis = tr.find('.discount').val();
        if (dis_type == '0') {
          var amt = (qty * price) - dis;
          tr.find('#total').val(amt);
        }
        else {
          var amt = (qty * price) - (qty * price * dis) / 100;
          tr.find('#total').val(amt);       
        }

        $(".total").each(function (e) {
          var final_amt = $(this).val() - 0;
          total += final_amt;
        });
        $("#invoice_total").html(total);
      });

      // $('#discount_type').on('change', function () {

      //   var tr = $(this).parent().parent();
      //   var qty = tr.find('#quantity').val();
      //   var price = tr.find('#price').val();
      //   var dis = tr.find('#discount_value').val();
      //   var dis_type = tr.find('#discount_type').val();
      //   var total = 0;
      //   if (dis_type == 'percent') {
      //     var amt = (qty * price) - (qty * price * dis) / 100;;
      //     tr.find('#total').val(amt);
      //   }
      //   else {
      //     var amt = (qty * price) - dis;
      //     tr.find('#total').val(amt);
      //     }

      //   $(".total").each(function (e) {
      //   var final_amt =  $(this).val() - 0 ;
      //     total += final_amt;
      //   });
      //   $("#invoice_total").html(total);
      // });


    });

  </script>
  <script type="text/javascript">
    function add_new_row(section_id, properity_token, invoice_token) {
      var sec_id = 'section_' + section_id;
      var new_row =  '<div class="row" style="border:1px solid grey;padding:10px;margin:10px">' +
        '<input type="hidden" name="section_id[]" value="' + section_id + '"/>' +
        '<input type="hidden" name="invoice_token[]" value="' + invoice_token + '"/>' +
        '<input type="hidden" name="prop_token[]" value="' + properity_token + '"/>' +
        '<div class="col-md-1"><input type="text" class="form-control" name="item_id[]" value="#" disabled></div>' +
        '<div class="col-md-5"><input type="text" class="form-control" name="item_name[]" id="item_name"></div>' +
        '<div class="col-md-1"><input type="text" class="form-control" name="standard[]" id="standard"></div>' +
        '<div class="col-md-1"><input type="number" value="0" class="form-control" name="price[]" id="price"/></div>' +
 
        
        ' <div class="col-md-1"><input type="number" class="form-control" name="quantity[]" id="quantity" > </div>'
        +
        '<div class="col-md-1"><input type="text" class="form-control" id="total" name="total[]"></div>' +

        '<div class="col-md-1"><a class="btn btn-danger" style="margin-bottom:5px"><img src="images/delete.png" style="width:100%;border-radius:0px"/></a></div>' 
      
        '<div class="col-md-1"><a id="view_notes" class="btn btn-primary" style="margin-bottom:5px"><img src="images/eye.png" style="width: 100%;border-radius:0px"/></a></div>'
        +
       '<div class="row col-md-12 notes" style="display:none"><div class="col-md-12" style="margin-top:20px;margin-bottom:10px"><h3 style="color:#FD6C35">بيانات أضافية</h3></div><div class="col-md-5"><label>نسبة الخصم</label></div><div class="col-md-1"></div><div class="col-md-5"><label>قيمة الخصم</label></div><select class="col-md-5 form-control" name="discount_type" id="discount_type" style="margin-top:10px"><option value="0" selected>قيمة ثابتة</option><option value="1">نسبة مئوية</option></select><div class="col-md-1"></div><input type="text" class="col-md-5 form-control" id="discount_value" name="discount_value[]"style="margin-top:10px">                       <div class="col-md-12" style="margin-top:20px"> <label>ملاحظات البند</label><textarea class="col-md-12 form-control" rows="3"  name="notes[]" style="margin-top:10px;margin-bottom:10px;padding:10px" placeholder="أدخل ملاحظات البند"></textarea> </div>      </div>'
        +

        '</div>';
      $('#' + sec_id).append(new_row);
    }
    
  </script>
  

  <script>
    function insert_item(section_id, properity_token, invoice_token) {
      add_new_row(section_id);
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText == 0) {
            // Do Something
          } else {
            // Do Something else
          }
        }
      };
      var params = "prop_tkn=" + properity_token + "&sec_id=" + section_id + "&in_tkn=" + invoice_token;
      xhr.open("POST", "invoice/insert_item.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send(params);
    }
  </script>
</body>

</html>