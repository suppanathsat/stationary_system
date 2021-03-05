<?php
  // get database connection
  include_once 'config/database.php';
      
 

  $database = new Database();
  $db = $database->getConnection();

  $staff_id = $_SESSION['staff_id'];


  if($_SESSION['auth_id']==1){
    $issueURL = "staffIssue.php";
  }elseif($_SESSION['auth_id']==2){
    $issueURL = "issueStatus.php";
  }


 
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
 
  <div class="sidebar-brand-text mx-3">Stationary System</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
  <li class="nav-item active" >
    <a class="nav-link" href="">
      <i class="far fa-user"></i>
      <span>
         <?php echo $_SESSION["fullname"];?>
      </span>
    </a>
  </li>
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active" >
  <a class="nav-link" href="index.php" style="padding-bottom: 0;">
    <i class="far fa-list-alt"></i>
    <span>stationary</span>
  </a>
</li>

<li class="nav-item active">
  <a class="nav-link" href="<?php echo $issueURL; ?>">
  <i class="far fa-list-alt"></i>
    <span>status </span></a>
  </a>
</li>

<!-- Divider -->

<?php
    if($_SESSION['auth_id']==2){
?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading " style="font-size: 16px;color:white;">
      for admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed " style="color:white;font-weight: bold;padding-bottom: 0;" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-tools" style="color:white"></i>
          <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="master.php?active=sta_type">ประเภทอุปกรณ์</a>
            <a class="collapse-item" href="master.php?active=brand_type">ยี่ห้อ</a>
            <a class="collapse-item" href="master.php?active=unit_type">หน่วยนับ</a>
            <a class="collapse-item" href="master.php?active=color_type">สีอุปกรณ์</a>
            <a class="collapse-item" href="master.php?active=auth_type">สิทธ์</a>
            <a class="collapse-item" href="master.php?active=dept_type">แผนก</a>
            <a class="collapse-item" href="master.php?active=status_type">สถานะการเบิก</a>
          </div>
        </div>
      </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active" >
      <a class="nav-link" href="index.php" style="padding-bottom: 0;">
        <i class="far fa-list-alt"></i>
        <span>stationary</span>
      </a>
    </li>

    <li class="nav-item active">
    <a class="nav-link" href="issueStatus.php" style="padding-bottom: 0;">
    <i class="far fa-list-alt"></i>
      <span>status </span></a>
    </a>
  </li>

  <li class="nav-item active" >
        <a class="nav-link" href="transition.php" style="padding-bottom: 0;">
        <i class="fas fa-exchange-alt"></i>
          <span>
            transition
          </span>
        </a>
    </li>

    <li class="nav-item active" >
        <a class="nav-link" href="staff.php" style="padding-bottom: 0;">
        <i class="fa fa-user" aria-hidden="true"></i>
          <span>
            staff
          </span>
        </a>
    </li>

    

    

    <li class="nav-item active" >
        <a class="nav-link" href="stationaryReport.php" >
        <i class="fas fa-fw fa-folder" ></i>
        <span>REPORT</span>
        </a>
    </li>

    

    
<?php
    }
?>
<!-- admin only -->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block" style="margin-bottom: 10px;">

<li class="nav-item active">
  <a class="nav-link" href="logout.php" style="padding-top: 0;">
  <i class="fas fa-sign-out-alt"></i>
  <span>LOGOUT</span></a>
</li>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

