<head>
    	  <link rel="stylesheet" type="text/css" href="assets/css/course_form1.css">
        <link rel="stylesheet" type="text/css" href="assets/css/course_form2.css">
        <link rel="stylesheet" type="text/css" href="assets/css/course form3.css">
  	</head>
  
  <?php
		require_once ('inc/header.php'); 
	?>
    

<?php
   $eid = $_GET['eid'];
    $sucessMsg="";

    if(isset($_POST['submit']))
    {
      
      $C_id=$_POST['c_id'];
      $C_name=$_POST['c_name'];
      $C_des=$_POST['c_description'];
      $D_code=$_POST['department_code'];
      
          if(isset($eid) && $eid!="")
              {

                    $sql = "UPDATE course_table SET cname='".$C_name."',cdescription='".$C_des."',dcode='".$D_code."' WHERE cid='".$eid."' ";
              }
          else
              {
                    $sql="INSERT INTO course_table (cid,cname,cdescription,cstatus,dcode) 
                    VALUES ('".$C_id."','".$C_name."','".$C_des."','1','".$D_code."')";
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
          $selectQuery = "SELECT * FROM course_table WHERE cstatus=1 AND cid='".$eid."'";
          $runQuery = $conn->query($selectQuery);
          $row=mysqli_fetch_array($runQuery);
      }
?>


    <!--Dashbord banner-->
    <main class="app-content">
      		    <div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon fa fa-plus-square">
          	</i><?php if($eid==$eid && $eid!="") { echo "Edit New Course"; } else { echo "Add New Course"; } ?></h1>
          	<p>ATI Tangalle Attendance & Result System </p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Course</a></li>
          <li class="breadcrumb-item"><a href="#"><?php if($eid==$eid && $eid!="") { echo "Edit New Course"; } else { echo "Add New Course"; } ?></a></li>
        </ul>
        
  		</div>


      
<!-------------------------------------------------------------------------------------------------->

<!--New Course Add Form-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 offset-md-3 tab_s_form">
            <table align="center" width="50%" border="2" bordercolor="#009688">
            	<tr>
                	<td class="s_hading_bg">
                    	<h2 align="center" class="s_hading"><?php if($eid==$eid && $eid!="") { echo "Edit New Course"; } else { echo "Add New Course"; } ?></h2>
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
                        
                            <input type="text" name="c_id" placeholder=" Course ID " class="name" required <?php if(isset($eid) && $eid!="") { ?> readonly="readonly" <?php } ?> value="<?php if(isset($eid) && $eid!=""){ echo $row['cid']; }?>"> <br>
                        	
                            	<input type="text" name="c_name" placeholder=" Course Name " class="name" required value="<?php if(isset($eid) && $eid!=""){echo $row['cname']; }?>">	<br>


                              <textarea name="c_description" placeholder=" Description " class="t_name" required ><?php if(isset($eid) && $eid!=""){echo $row['cdescription']; }?></textarea> <br>
                              
                                <select class="department" name="department_code" required>
                                  <optgroup label="Departments" value="0">
                                    <?php
                                      $selectQuery = "SELECT * FROM department_table WHERE dstatus=1";
                                      $runQuery = $conn->query($selectQuery);
                                      while($rowd=mysqli_fetch_array($runQuery))
                                      {
                                    ?>
                                      <option value="0" hidden="">Faculty</option>
                                      <option value="<?php echo $rowd['dcode']; ?>" <?php if($rowd['dcode']==$row['dcode']){ ?> selected="selected" <?php } ?>><?php echo $rowd['dname']; ?></option>
                                    <?php } ?>
                                  </optgroup>
                                </select>
                                <br>
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
<!----------------------------------------------------------------------------------------------------->    
    
    
        <?php
			require_once ('inc/footer.php');
		?>
        
  </body>
</html>