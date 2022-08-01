	<?php
  session_start();
    
    error_reporting(E_ALL | E_NOTICE);
    ini_set('display_errors', 0);

		require_once ('conf/connaction.php'); 
//echo $_SESSION['username'];
 if (!isset($_SESSION["userid"]))
   {
      header( "Location:../../login/index.php" );
   }

	?>
    
  <head>
  	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <title> ATI-SARS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    
    <!--My CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!--Font-icon css-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--Data Table Css-->
    <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css">
  </head>
  
    
  <body class="app sidebar-mini rtl">
  <!--Start Header Section-->
    <?php $userType=$_SESSION['usertype']; ?>
    <!--Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashbord.php">ATI-SARS</a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!--Navbar Right Menu-->
      
      <ul class="app-nav">
        <!--<li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>-->

        <!--User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
        <i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          	<!--<li><a class="treeview-item" href="page-lockscreen.php"><i class="glyphicon glyphicon-lock"></i> Lock</a></li>-->
            <li><a class="dropdown-item" href="sign_out.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!--End Header Section-->
    

    <!--Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
      	<img class="app-sidebar__user-avatar" alt="User Image" src="assets/img/48.jpg">
        <div>
          <p class="app-sidebar__user-name"><?php  echo ucfirst($userType); ?></p>
         <!--  <p class="app-sidebar__user-designation">Dilshan Maduranga</p> -->
        </div>
      </div>
      
      <ul class="app-menu">
        <?php $pageName = basename($_SERVER['PHP_SELF']); ?>
        <li><a class="app-menu__item <?php if($pageName=="dashbord.php"){ ?> active <?php } ?>" href="dashbord.php">
        <i class="app-menu__icon fa fa-dashboard"></i>
        <span class="app-menu__label"> Dashboard </span></a></li>
        
        <!--department dropdown title-->
        <?php 
if($userType=="admin" || $userType=="director"){
        ?>
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="department_form.php" || $pageName=="departments_data_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-university"></i>
        <span class="app-menu__label">Department</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="department_form.php">
            <i class="icon fa fa-circle-o"></i> Add Department</a></li>
            <li><a class="treeview-item" href="departments_data_table.php">
            <i class="icon fa fa-circle-o"></i> Department List</a></li>
          </ul>
        </li>
<?php } 
if($userType=="admin" || $userType=="director" || $userType=="hod"){
        ?>
        <!--Course Type dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="course_form.php" || $pageName=="course_data_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-th-large"></i>
        <span class="app-menu__label">Course</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="course_form.php">
            <i class="icon fa fa-circle-o"></i> Add Course</a></li>
            <li><a class="treeview-item" href="course_data_table.php">
            <i class="icon fa fa-circle-o"></i> Course List</a></li>
          </ul>
        </li>

<?php } 
if($userType=="admin" || $userType=="director" || $userType=="hod" || $userType=="staff"){
        ?>
        <!--Subject dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="subject_form.php" || $pageName=="subject_data_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-book"></i>
        <span class="app-menu__label">Subject</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="subject_form.php">
            <i class="icon fa fa-circle-o"></i> Add Subject</a></li>
            <li><a class="treeview-item" href="subject_data_table.php">
            <i class="icon fa fa-circle-o"></i> Subject List</a></li>
          </ul>
        </li>
        <?php } 
if($userType=="admin" || $userType=="director" || $userType=="lecturer"){
        ?>
        <!--Attendance dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="attendence_barcode.php" || $pageName=="attendence_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Attendance</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="attendence_barcode.php"><i class="icon fa fa-circle-o"></i> Barcode</a>
            </li>
            <li><a class="treeview-item" href="attendence_table.php"><i class="icon fa fa-circle-o"></i>Attendance List</a>
            </li>
            <li><a class="treeview-item" href="absent_data_table.php"><i class="icon fa fa-circle-o"></i>Abcent List</a>
            </li>
          </ul>
        </li>
        <?php } 
if($userType=="admin" || $userType=="director" || $userType=="staff"){
        ?>
        <!--Student dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="student_form.php" || $pageName=="student_data_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-group"></i>
        <span class="app-menu__label"> Student</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="student_form.php">
            <i class="icon fa fa-circle-o"></i> Add Student</a></li>
            <li><a class="treeview-item" href="student_data_table.php">
            <i class="icon fa fa-circle-o"></i> Student List</a></li>
          </ul>
        </li>
        <?php } 
if($userType=="admin" || $userType=="director"){
        ?>
        <!--Lecturer dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="lecturer_form.php" || $pageName=="lecturer_data_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-graduation-cap"></i>
        <span class="app-menu__label"> Lecturer</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="lecturer_form.php">
            <i class="icon fa fa-circle-o"></i> Add Lecturer</a></li>
            <li><a class="treeview-item" href="lecturer_data_table.php">
            <i class="icon fa fa-circle-o"></i> Lecturer List</a></li>
          </ul>
        </li>
<?php } 
if($userType=="admin" || $userType=="director"){
        ?>
        <!--Lecture dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="lecture_form.php" || $pageName=="lecture_data_table.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-gift"></i>
        <span class="app-menu__label"> Lecture (CR)</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="lecture_form.php">
            <i class="icon fa fa-circle-o"></i> Add Lecture</a></li>
            <li><a class="treeview-item" href="lecture_data_table.php">
            <i class="icon fa fa-circle-o"></i> Lecture List</a></li>
          </ul>
        </li>
        <?php } 
if($userType=="admin" || $userType=="director"){
        ?>
        <!--Result dropdown title-->
        <li style="display:none;" class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-star"></i>
        <span class="app-menu__label"> Result</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="#">
            <i class="icon fa fa-circle-o"></i> Import Result</a></li>
            <li><a class="treeview-item" href="#">
            <i class="icon fa fa-circle-o"></i> Result List</a></li>
          </ul>
        </li>
        <?php } 
if($userType=="admin" || $userType=="director"){
        ?>
        <!--Report dropdown title-->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-bar-chart"></i>
        <span class="app-menu__label"> Report</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="report.php">
            <i class="icon fa fa-circle-o"></i> Reports</a></li>
            <li><a class="treeview-item" href="#">
            <i class="icon fa fa-circle-o"></i> Report List</a></li>
          </ul>
        </li>
        <?php } 
if($userType=="admin"){
        ?>
        <!--Settings dropdown title-->
        <li class="treeview"><a class="app-menu__item <?php if($pageName=="user_form.php" || $pageName=="#" || $pageName=="user_profile.php"){ ?> active <?php } ?>" href="#" data-toggle="treeview">
        <i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
          	<li><a class="treeview-item" href="user_form.php"><i class="icon fa fa-circle-o"></i> Add Users</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Users List</a></li>
            <li><a class="treeview-item" href="user_profile.php"><i class="icon fa fa-circle-o"></i> Profile</a></li>
          </ul>
        </li>
      <?php 
    } 
        ?>
      </ul>
    </aside>