<?php
                    
                    if(isset($_GET['deleted']))
                    {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                تم الحذف بنجااح  
                </div>
                <?php
                    }
                ?>

<?php

if(isset($_GET['inserted']))
                    {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
               تمت الأضافه   بنجااح
                </div>
                <?php
                    }
                ?>

<?php

if(isset($_GET['updated']))
                    {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             تم التعديل بنجااح
                </div>
                <?php
                    }
                ?>