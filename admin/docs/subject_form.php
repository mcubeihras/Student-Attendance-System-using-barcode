<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/subject_form.css">
  	</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>


<?php
 $eid = $_GET['eid'];
$sucessMsg="";

  if(isset($_POST['submit']))
  {
    
    $Sb_code=$_POST['sub_code'];
    $Sb_name=$_POST['sub_name'];
    $Sb_credit=$_POST['sub_credit'];
    $C_id=$_POST['course_id'];
    $Semester_id=$_POST['semester_id'];
    $Sb_des=$_POST['subject_description'];
    
        if(isset($eid) && $eid!="")
            {
                $sql = "UPDATE subject_table SET sbname='".$Sb_name."',sbcredit='".$Sb_credit."',sbdescription='".$Sb_des."',sbsemester='".$Semester_id."',cid='".$C_id."' WHERE sbcode='".$eid."' ";
            }
        else
            {
            $sql="INSERT INTO subject_table (sbcode,sbname,sbcredit,sbdescription,sbsemester,cid,sbstatus) 
            VALUES ('".$Sb_code."','".$Sb_name."','".$Sb_credit."','".$Sb_des."','".$Semester_id."','".$C_id."','1')";
            }

      if($conn->query($sql))
        {
          	$sucessMsg =  "Data Successfully Added!";
        }
      else
        {
         	$sucessMsg =  "Data Added Failed!";
        }
  }

    if(isset($eid) && $eid!="")
    {
        $selectQuery = "SELECT * FROM subject_table WHERE sbstatus=1 AND sbcode='".$eid."'";
        $runQuery = $conn->query($selectQuery);
        $row=mysqli_fetch_array($runQuery);
    }
?>
  
    <!--Dashbord banner-->
    <main class="app-content">
        		<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon fa fa-plus-square">
          	</i> <?php if($eid==$eid && $eid!="") { echo "Edit New Subject"; } else { echo "Add New Subject"; } ?></h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Subject</a></li>
          <li class="breadcrumb-item"><a href="#"><?php if($eid==$eid && $eid!="") { echo "Edit New Subject"; } else { echo "Add New Subject"; } ?></a></li>
        </ul>
        
      	</div>
      
<!------------------------------------------------------------------------------------------------------>      
<!--New Subject Add Form-->
<center>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 offset-md-3 tab_s_form">
            <table align="center" width="50%" border="2" bordercolor="#009688">
                <tr>
                    <td class="s_hading_bg">
                        <h2 align="center" class="s_hading"><?php if($eid==$eid && $eid!="") { echo "Edit New Subject"; } else { echo "Add New Subject"; } ?></h2>
                        <hr class="s_heding_hr">
                        <?php if($sucessMsg=="Data Successfully Added!") 
						{
                        	echo '<p id="form_success_msg">'.$sucessMsg.'</p>';
						}
						else
						{
							echo '<p id="form_failed_msg">'.$sucessMsg.'</p>';
						}
						?>
                    </td>
                </tr>
                <tr>
                    <td class="s_form_bg">
                        <form class="s_form" method="post">

                            <input type="text" name="sub_code" placeholder=" Subject Code " class="name" <?php if(isset($eid) && $eid!="") { ?> readonly="readonly" <?php } ?> required value="<?php if(isset($eid) && $eid!=""){echo $row['sbcode']; }?>"> <br>

                            
                                <input type="text" name="sub_name" placeholder=" Subject Name " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['sbname']; }?>"> <br>

                                
                                <input type="number" name="sub_credit" placeholder=" Subject Credit " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['sbcredit']; }?>"> <br>
                                
                                <select class="department" name="course_id">
                                    <optgroup label="Course ID">
                                        <?php
                                            $selectQuery = "SELECT * FROM course_table WHERE cstatus=1";
                                            $runQuery = $conn->query($selectQuery);
                                            while($rowc=mysqli_fetch_array($runQuery)){
                                        ?>
                                        <option value="<?php echo $rowc['cid']; ?>" <?php if($rowc['cid']==$row['cid']){ ?> selected="selected" <?php } ?>><?php echo $rowc['cname']; ?></option>
                                         <?php } ?>
                                        
                                    </optgroup>
                                </select> <br>
                                
                                <select class="department" name="semester_id">
                                    <optgroup label="Semester_ID">
                                        <option value="1" <?php if($row['sbsemester']=="1"){ ?> selected="selected" <?php } ?>>1st sem</option>
                                        <option value="2" <?php if($row['sbsemester']=="2"){ ?> selected="selected" <?php } ?>>2nd sem</option>
                                        <option value="3" <?php if($row['sbsemester']=="3"){ ?> selected="selected" <?php } ?>>3rd sem</option>
                                        <option value="4" <?php if($row['sbsemester']=="4"){ ?> selected="selected" <?php } ?>>4th sem</option>
                                        <option value="5" <?php if($row['sbsemester']=="5"){ ?> selected="selected" <?php } ?>>5th sem</option>
                                        <option value="6" <?php if($row['sbsemester']=="6"){ ?> selected="selected" <?php } ?>>6th sem</option>
                                    </optgroup>
                                </select> <br>
                                
                            <center>
                           
                            <input type="text" name="subject_description" placeholder="Description " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['sbdescription']; }?>"> <br>

                                <input type="submit" value="Submit" id="submit" class="s_btn" name="submit">
                            </center>  
                        </form>
                    </td>
                </tr>
            </table> 
        </div>
    </div>
</div>
</center>

<!----------------------------------------------------------------------------------------------->
    
        <?php
			require_once ('inc/footer.php');
		?>
    
  </body>
</html>