    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/student_form1.css">
  	</head>
  
  <?php
		require_once ('inc/header.php'); 
	?>

<?php
  $eid = $_GET['eid'];
  $sucessMsg="";

  if(isset($_POST['submit']))
  {
    $S_index=$_POST['index_number'];
    $S_name=$_POST['name'];
    $S_email=$_POST['email'];
    $S_pn=$_POST['contact'];
    $S_co=$_POST['department'];
    
        if(isset($eid) && $eid!="")
            {
              $sql = "UPDATE student_table SET st_name='".$S_name."',st_email='".$S_email."',st_phone_no='".$S_pn."',cid='".$S_co."' WHERE st_index_number='".$eid."' ";
            }
        else
            {
          echo  $sql="INSERT INTO student_table (st_index_number, st_name, st_email, st_phone_no, cid, st_status) VALUES ('".$S_index."','".$S_name."','".$S_email."','".$S_pn."','".$S_co."','1')";
            }

      if($conn->query($sql))
        {
          $sucessMsg = "Data Sucsessfully Updated";
        }
      else
        {
          $sucessMsg = "Data Update Failed";
        }
  }

  if(isset($eid) && $eid!="")
    {
        $selectQuery = "SELECT * FROM student_table WHERE st_status=1 AND st_index_number='".$eid."'";
        $runQuery = $conn->query($selectQuery);
        $row=mysqli_fetch_array($runQuery);
    }
?>


    
    <!--Dashbord banner-->
    <main class="app-content">
      
	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon fa fa-plus-square">
          	</i> Add New Student </h1>
          	<p>ATI Tangalle Attendance & Result System </p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Students</a></li>
          <li class="breadcrumb-item"><a href="#">Add New Student</a></li>
        </ul>
        
      	</div>
      
<!------------------------------------------------------------------------------------------------->      

<!--New Student Add Form-->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 offset-md-3 tab_s_form">
            <table align="center" width="50%" border="2" bordercolor="#009688">
                <tr>
                    <td style="color: red;text-align: center;font-weight: bold;">
                        <?php echo $sucessMsg; ?>
                    </td>
                </tr>
              <tr>
                  <td class="s_hading_bg">
                      <h2 align="center" class="s_hading"> Add New Student </h2>
                    <hr class="s_heding_hr">
                   
                    </td>
                </tr>
                <tr>
                  <td class="s_form_bg">
                      <form class="s_form" method="post">

                              <input type="text" name="index_number" placeholder=" Index Number " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['st_index_number']; }?>"> <br>
                          
                              <input type="text" name="name" placeholder=" Student Name " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['st_name']; }?>">  <br>
                            
                              <input type="text" name="email" placeholder=" Email ID " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['st_email']; }?>"> <br>
                            
                              <input type="text" name="contact" placeholder=" Phone Number " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['st_phone_no']; }?>"> <br>

                              <select class="department" name="department" required>
                                  <optgroup label="Course">
                                   <?php
                                  $selectQuery = "SELECT * FROM course_table WHERE cstatus=1";
                                  $runQuery = $conn->query($selectQuery);
                                  while($row=mysqli_fetch_array($runQuery))
                                  {
                                ?>
                                  <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?></option>
                                    <?php } ?>
                                  </optgroup>
                              </select> <br>
                                
                              <center>
                                <input type="submit" value="Submit" id="submit" class="s_btn" name="submit">
                              </center>  

                        </form>
                    </td>
                </tr>
            </table> 
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------->    
    
	<?php
		require_once ('inc/footer.php');
	?>
    
      </body>
</html>