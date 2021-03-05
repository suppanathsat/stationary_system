<?php 
    include 'checkAccess.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stationary System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sta_row.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'slidebar.php'?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-top: 15px;">

          <!-- Page Heading -->

            <?php
                if(isset($_GET['msg'])){
           
                echo  '<script >alert("'.$_GET['msg'].'");</script>';
           
                }
            ?>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h5 class="m-0 font-weight-bold text-white ">Stationary Table</h5>

            </div>
            <div class="card-body">

              <div class="row">
                
                <div class="form-group col-md-3">
                  <label for="type">ประเภท</label>
                  <select class="form-control type" id="">
                    <option value="0">ทุกประเภท</option>
                  </select>
                </div>
                <div class="form-group col-md-4" style="margin-top: 31px;">
                  <div class="input-group">

                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary dropdown-toggle" style="border-color: darkgray;" id="searchBy" value="sta_name"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ชื่ออุปกรณ์</button>
                      <div class="dropdown-menu">
                        <option class="dropdown-item" onclick="searchStaByStaID()" href="#">รหัสอุปกรณ์</option>
                        <option class="dropdown-item" onclick="searchStaByStaName()" href="#">ชื่ออุปกรณ์</option>
                      </div>
                    </div>
                    <input type="text" class="form-control" id="search" aria-label="Text input with dropdown button"placeholder="ค้นหา">
                  </div>
                </div>
                <div class="col-md-3">
                    <?php
                        if($_SESSION['auth_id']==2){
                    ?>
                          <button type="button" style="margin-top:30px" class="btn btn-success" data-toggle="modal" data-target="#addStationary">
                            +เพิ่มอุปกรณ์ใหม่
                          </button>
                    <?php
                        }
                    ?>
                </div>
              </div>

              <!-- stationary table -->
              <div class="table-responsive" id="stationary">

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
      
      <!-- Modal add stationary -->
      <div class="modal fade" id="addStationary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มอุปกรณ์ใหม่</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="container">
                <form action="api/stationary/create.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="staff_id"  style="margin-right:10px;">ผู้ดำเนินการ</label>
                        <input type="text" name="staff_name" class="form-control" id="staff_name" value="<?php echo $_SESSION['fullname'];?>" readonly>
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="receiveNum"  style="margin-right:10px;">เลขที่เอกสาร</label>
                        <input type="text" name="receiveNum" class="form-control" id="receiveNum" value="" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 form-group">
                            <label for="brand">ยี่ห้อ</label>
                            <select class="form-control brand" name="brand_id" required>
                              <option value=""></option>
                            </select>
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="sta_name"  style="margin-right:10px;">ชื่ออุปกรณ์</label>
                        <input type="text" name="sta_name" class="form-control" id="sta_name" required>
                      </div>
                      <div class="col-md-2 form-group">
                            <label for="color">สี</label>
                            <select class="form-control color" name="color_id" required>
                              <option value=""></option>
                            </select>
                      </div>
                      
                    </div>
                    
                    <div class="row">
                       <div class="col-md-4 form-group">
                        <label for="price"  style="margin-right:10px;">ราคา/หน่วย</label>
                        <input type="text" name="price" class="form-control" id="price" required>
                      </div>
                      <div class="col-md-3 form-group">
                        <label for="balance"  style="margin-right:10px;">จำนวนในสต๊อค</label>
                        <input type="number" name="balance" class="form-control" min="0" id="balance" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="min">จำนวนแจ้งเตือน</label>
                        <input type="number" name="min" class="form-control" min="1" id="min" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 form-group" style="padding-right:0">
                        <label for="sta_amount"  style="margin-right:10px;">จำนวน/หน่วย</label>
                        <input type="number" name="sta_amount" class="form-control" id="sta_amount" min="1" value="" required>
                      </div>
                      <div class="col-md-2 form-group" style="padding-left:0">
                              <label for="unit">ชื่อหน่วย</label>
                              <select class="form-control unit" name="unit_id" required>
                                <option value=""></option>
                              </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="type">ประเภท</label>
                        <select class="form-control type" name="type_id" required>
                        </select>
                      </div>
                      
                      <div class="form-group col-md-4 custom-file">
                        <input type="file" name="image" class="custom-file-input"  id="sta_pic" >
                        <label class="custom-file-label" style="margin-top:30px;margin-left:10px;" for="sta_pic">รูปภาพ</label>
                      </div>
                    </div>
                      
                
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">เพิ่มอุปกรณ์</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                  
                </div>
            </form>
          </div>
        </div>
      </div>

       <!-- Modal receive stationary -->
       <div class="modal fade" id="addOneStationary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="receiveTitle">นำเข้าอุปกรณ์</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="api/transition/receive.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="staff_id"  style="margin-right:10px;">ผู้ดำเนินการ</label>
                            <input type="text" name="staff_name" class="form-control" id="rstaff_name" value="<?php echo $_SESSION['fullname'];?>" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="receive_num"  style="margin-right:10px;">เลขที่เอกสาร</label>
                            <input type="text" name="receive_num" class="form-control" id="rreceive_num" value="" >
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="price"  style="margin-right:10px;">ราคา/หน่วย</label>
                            <input type="text" name="price" class="form-control" id="rprice" value="" >
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="amount"  style="margin-right:10px;">จำนวน</label>
                            <input type="text" name="amount" class="form-control" id="ramount" value="" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="sta_id" class="form-control" id="rsta_id" value="" hidden>
                        </div>
                      </div>
            </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">เพิ่มอุปกรณ์</button>
                </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
          </div>
        </div>
      </div>

       <!-- Modal issue stationary -->
       <div class="modal fade" id="issueStationary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="issueTitle">นำเข้าอุปกรณ์</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="api/transition/issue.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="staff_id"  style="margin-right:10px;">ผู้ดำเนินการ</label>
                            <input type="text" name="staff_name" class="form-control" id="sstaff_name" value="<?php echo $_SESSION['fullname'];?>" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="amount"  style="margin-right:10px;">จำนวน</label>
                            <input type="number" name="amount" class="form-control" id="samount" value="" min='1' max=''>
                        </div>
                        <div class="form-group">
                            <input type="text" name="sta_id" class="form-control" id="ssta_id" value="" hidden>
                        </div>
                      </div>
            </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">เบิกอุปกรณ์</button>
                </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
          </div>
        </div>
      </div>

        <!-- Modal edit stationary -->
     <div class="modal fade" id="editStationary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="">แก้ไขข้อมูล</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="container">
                <form action="api/stationary/update.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="staff_id"  style="margin-right:10px;">ผู้ดำเนินการ</label>
                        <input type="text" name="staff_name" class="form-control" id="" value="<?php echo $_SESSION['fullname'];?>" readonly>
                      </div>
                      <div class="form-group">
                         <input type="text" name="sta_id" class="form-control" id="esta_id" hidden>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 form-group">
                            <label for="brand">ยี่ห้อ</label>
                            <select class="form-control brand" name="brand_id" required>
                              <option value="" id="ebrand"></option>
                            </select>
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="sta_name"  style="margin-right:10px;">ชื่ออุปกรณ์</label>
                        <input type="text" name="sta_name" class="form-control" id="esta_name" required>
                      </div>
                      <div class="col-md-2 form-group">
                            <label for="color">สี</label>
                            <select class="form-control color" name="color_id" required>
                              <option value="" id="ecolor"></option>
                            </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="balance"  style="margin-right:10px;">จำนวนในสต๊อค</label>
                        <input type="number" name="balance" class="form-control" min="0" id="ebalance" readonly>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="min">จำนวนแจ้งเตือน</label>
                        <input type="number" name="min" class="form-control" min="1" id="emin" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2 form-group" style="padding-right:0">
                        <label for="sta_amount"  style="margin-right:10px;">จำนวน/หน่วย</label>
                        <input type="number" name="sta_amount" class="form-control" id="esta_amount" min="1" value="" required>
                      </div>
                      <div class="col-md-2 form-group" style="padding-left:0">
                              <label for="unit">ชื่อหน่วย</label>
                              <select class="form-control unit" name="unit_id" required>
                                <option value="" id="eunit_id"></option>
                              </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="type">ประเภท</label>
                        <select class="form-control type" name="type_id" required>
                          <option value="" id="etype_id"></option>
                        </select>
                      </div>
                      
                      <div class="form-group col-md-4 custom-file">
                        <input type="file" name="image" class="custom-file-input"   >
                        <label class="custom-file-label" style="margin-top:30px;margin-left:10px;" for="sta_pic">รูปภาพ</label>
                      </div>
                    </div>
                      
                
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">แก้ไข</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                  
                  
                </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- End of Content Wrapper -->

      <!-- Modal delete stationary -->
    <div class="modal" id="deleteStationary" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">ลบข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
               <div id="deleteDetail"></div>
          </div>
          <div class="modal-footer">
            <form action="api/stationary/delete.php" method="post">
                <input type="text" name="sta_id" id="dsta_id" hidden>
                <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            
          </div>
        </div>
      </div>
    </div>
  </div><!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/showDepartment.js"></script>
  <script src="js/showType.js"></script>
  <script src="js/searchByStaButton.js"></script>
  <script src="js/showBrand.js"></script>
  <script src="js/showColor.js"></script>
  <script src="js/showUnit.js"></script>
  <script id="myScript">
     
    var serverURL = "http://localhost/stationarySystem";

    $(document).ready(function () {

      // show list of product on first load
      //showOneStationary();
      showStationary();
      showDepartment();
      showType();
      showBrand();
      showColor();
      showUnit();
      $( ".type" ).change(function() {
        var type_id = $(".type").val();
        var search = $('#search').val();
        var searchBy = $('#searchBy').val();
        searchStationary(type_id,search,searchBy);
      });

      $("#search").keyup(function(){
        var type_id = $(".type").val();
        var search = $('#search').val();
        var searchBy = $('#searchBy').val();
        searchStationary(type_id,search,searchBy);
      });


    });

    function searchStationary(type_id,search,searchBy){
      var url = serverURL+"/api/stationary/search.php?type_id="+type_id+"&search="+search+"&searchBy="+searchBy;
     
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>รูปภาพ</th><th>ประเภท</th><th>อุปกรณ์</th><th>จำนวนในสต็อค</th><th>จำนวนขั้นต่ำ</th><th <?php if($_SESSION['auth_id']==2) echo 'style="width:230px"'?>></th></tr></thead><tbody>';
    
      $.getJSON(url, function(data){
          var button ="";
          var admin_button ="";
          var end_button="";
          
          $.each(data.records, function(key, val) {
          button = ' <td><div class="dropdown">';
            button += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            button += '<i class="fas fa-cog"></i>';
            button += '</a>';
            button += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
            button += '<a class="dropdown-item" data-toggle="modal" value="'+val.sta_id+'" data-target="#addOneStationary" onclick="receive('+"'"+val.sta_id+"'"+')" >นำเข้า</a>';
            button += '<a class="dropdown-item" data-toggle="modal" value="'+val.sta_id+'" data-target="#issueStationary" onclick="issue('+"'"+val.sta_id+"'"+')" >เบิก</a>';
            button += '<a class="dropdown-item" data-toggle="modal"  onclick="edit('+"'"+val.sta_id+"'"+')"  >แก้ไข</a>';
            button += '<a class="dropdown-item" data-toggle="modal" value="'+val.sta_id+'" data-target="#deleteStationary"  onclick="deleteSta('+"'"+val.sta_id+"'"+')" >ลบ</a>';
            button += '</div>';
          button += '</div></td>';
          admin_button = '<button type="button" style="margin-left:5px;margin-right:5px;" onclick="clickEditButton('+val.sta_id+')" class="btn btn-outline-primary">แก้ไข</button>';
          admin_button += '<button type="button" value="'+val.sta_id+'"  class="btn btn-outline-danger deleteBut" onclick="clickDeleteButton('+val.sta_id+')" >ลบ</button>';
          end_button = '</td>';
            read_select_sta += "<tr class='starow'  value='"+val.sta_id+"'>";
            read_select_sta +=  "<td>"+val.sta_id+"</td>";
            read_select_sta += "<td ><img src='http://localhost/stationarySystem/api/stationary/uploads/"+val.sta_pic+"' style='height:60px' alt='' srcset=''></td>";
            
            read_select_sta +=  "<td>"+val.type_name+"</td>";
            read_select_sta +=  "<td>"+val.sta_name;
            if(val.brand!=""){read_select_sta +=  " "+val.brand}
            if(val.color!=""){read_select_sta +=  " สี"+val.color}
            read_select_sta +=  " "+val.unit;
            read_select_sta += "</td>";
            read_select_sta +=  "<td>"+val.balance+"</td>";
            read_select_sta +=  "<td>"+val.min+"</td>";
            <?php
            

            if($_SESSION['auth_id']==2){
              echo "read_select_sta += button;";
            }else{
              $a = "'";
              $b = '"';
              echo "read_select_sta += ".'"'."<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#issueStationary' onclick='issue(".$b."+".$a.$b.$a."+val.sta_id+".$a.$b.$a."+".$b.",".$b."+".$a.$b.$a."+val.balance+".$a.$b.$a."+".$b.");'>เบิก</button></td>".'"';
            }
            
            ?>
            //แทคปิดแถว
            read_select_sta +=  "</tr>";
          });

          read_select_sta += "</tbody></table>"
           $("#stationary").html(read_select_sta);
      });
    }

    function receive(id){
      $("#receiveTitle").html("นำเข้าอุปกรณ์รหัส "+id);
      $("#rsta_id").val(id);
    }

    function issue(id,max){
      $("#issueTitle").html("เบิกอุปกรณ์รหัส "+id);
      $("#ssta_id").val(id);
      $("#samount").val(1);
      $("#samount").attr({
       "max" : max,        // substitute your own
       "min" : 1          // values (or variables) here
      });
      

    }

    function edit(id){
      $('#editStationary').modal('show');
      console.log("id = "+id);
     $.getJSON("http://localhost/stationarySystem/api/stationary/readOne.php?id="+id, function(data){
        $.each(data.records, function(key, val) {
          $("#esta_id").val(id);
          $("#ebrand").val(val.brand_id);
          $("#ebrand").html(val.brand_name); 
          $("#esta_name").val(val.sta_name); 
          $("#ecolor").val(val.color_id); 
          $("#ecolor").html(val.color_name);  
          $("#ebalance").val(val.balance); 
          $("#emin").val(val.min); 
          $("#etype_id").val(val.type_id); 
          $("#etype_id").html(val.type_name); 

          $("#esta_amount").val(val.sta_amount); 
          $("#eunit_id").val(val.unit_id); 
          $("#eunit_id").html(val.unit_name); 
        });
       
        console.log("test123");
     
      });
    }

    function deleteSta(id){
      $("#deleteDetail").html("ยืนยันการลบอุปกรณ์รหัส "+id);
      $("#dsta_id").val(""+id);
    }
   

    function showEditStationary(sta_id){
      var sta_name = "";
      $.getJSON(serverURL+"/api/stationary/readOne.php?id="+sta_id, function(data){
          $.each(data.records, function(key, val) {
            $('#esta_name').val(val.sta_name);
            $('#esta_name').val(val.sta_name);
            $('#etype_option').val(val.type_id);
            $('#etype_option').html(val.type_name);
            $('#emin').val(val.min);
            $('#eprice').val(val.price);
            $('#ebalance').val(val.balance);
            $('#ebrand').val(val.brand);
            $('#ecolor').val(val.color);
            $('#esize').val(val.size);
            $('#sta_id').val(val.sta_id);
          });
      });
    }

    function showStationary(){
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>รูปภาพ</th><th>ประเภท</th><th>อุปกรณ์</th><th>จำนวนในสต็อค</th><th>จำนวนขั้นต่ำ</th><th></th></tr></thead><tbody>';
    
    
    var sta = $.getJSON("http://localhost/stationarySystem/api/stationary/read.php", function(data){
        var button ="";
        var admin_button ="";
        var end_button="";
        
        $.each(data.records, function(key, val) {

          button = ' <td><div class="dropdown">';
            button += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            button += '<i class="fas fa-cog"></i>';
            button += '</a>';
            button += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
            button += '<a class="dropdown-item" data-toggle="modal" value="'+val.sta_id+'" data-target="#addOneStationary" onclick="receive('+"'"+val.sta_id+"'"+')" >นำเข้า</a>';
            button += '<a class="dropdown-item" data-toggle="modal" value="'+val.sta_id+'" data-target="#issueStationary" onclick="issue('+"'"+val.sta_id+"'"+')" >เบิก</a>';
            button += '<a class="dropdown-item" data-toggle="modal"  onclick="edit('+"'"+val.sta_id+"'"+')"  >แก้ไข</a>';
            button += '<a class="dropdown-item" data-toggle="modal" value="'+val.sta_id+'" data-target="#deleteStationary"  onclick="deleteSta('+"'"+val.sta_id+"'"+')" >ลบ</a>';
            button += '</div>';
          button += '</div></td>';
  
            read_select_sta += "<tr class='starow' style='height:85px' value='"+val.sta_id+"'>";
            read_select_sta +=  "<td>"+val.sta_id+"</td>";
            read_select_sta += "<td><img src='http://localhost/stationarySystem/api/stationary/uploads/"+val.sta_pic+"' style='height:60px' alt='' srcset=''></td>";
            read_select_sta +=  "<td>"+val.type_name+"</td>";
            read_select_sta +=  "<td>"+val.sta_name;
            if(val.brand!=""){read_select_sta +=  " "+val.brand}
            if(val.color!=""){read_select_sta +=  " สี"+val.color}
            read_select_sta +=  " "+val.sta_amount;
            read_select_sta +=  " "+val.unit;
            read_select_sta +=  "/หน่วย";
            read_select_sta += "</td>";
            read_select_sta += "<td>"+val.balance+"</td>";
            read_select_sta +=  "<td>"+val.min+"</td>";
            <?php
            

            if($_SESSION['auth_id']==2){
              echo "read_select_sta += button;";
            }else{
              $a = "'";
              $b = '"';
              echo "read_select_sta += ".'"'."<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#issueStationary' onclick='issue(".$b."+".$a.$b.$a."+val.sta_id+".$a.$b.$a."+".$b.",".$b."+".$a.$b.$a."+val.balance+".$a.$b.$a."+".$b.");'>เบิก</button></td>".'"';
            }
            
            ?>
            //read_select_sta += end_button;
            //แทคปิดแถว
            read_select_sta +=  "</tr>";
          
        });
        
        read_select_sta += "</tbody></table>"
      $("#stationary").html(read_select_sta);
        
      });  
      
     
      }//showStationary
  </script>

</body>

</html>