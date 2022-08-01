<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/lecture_form.css">
  	</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>
  
      
<!-------------------------------------------------------------------------------------------------> 

<?php
 $eid = $_GET['eid'];
$sucessMsg="";

    if(isset($_POST['submit']))
    {
        $L_id=$_POST['l_id'];
        $L_date=$_POST['l_date'];
        $L_strtTime=$_POST['s_stime'];
        $L_endTime=$_POST['s_etime'];
        $L_des=$_POST['lc_description'];
        $Lc_code=$_POST['lac_name'];
        $Sb_code=$_POST['sb_code'];

        
        if(isset($eid) && $eid!="")
            {

                $sql = "UPDATE  lecture_table SET ldate='". $L_date."',lstart_time='".$L_strtTime."',lend_time='".$L_endTime."',ldescription='".$L_des."',sbcode='".$Sb_code."',lc_code='".$Lc_code."' WHERE lid='".$eid."' ";
            }
        else
            {
            $sql="INSERT INTO lecture_table (lid,ldate,lstart_time,lend_time,ldescription,sbcode,lc_code,lstatus)VALUES ('".$L_id."','".$L_date."','".$L_strtTime."','".$L_endTime."','".$L_des."','".$Sb_code."','".$Lc_code."','1')";
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

    if(isset($eid) && $eid!=""){
        $selectQuery = "SELECT * FROM lecture_table WHERE lstatus=1 AND lid='".$eid."'";
        $runQuery = $conn->query($selectQuery);
        $row=mysqli_fetch_array($runQuery); //var_dump($row);
    }
?> 


    <!--Dashbord banner-->
    <main class="app-content">
        	    <div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon fa fa-plus-square">
          	</i><?php if($eid==$eid && $eid!="") { echo "Edit New Lecture"; } else { echo "Add New Lecture"; } ?></h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lecture</a></li>
          <li class="breadcrumb-item"><a href="#"><?php if($eid==$eid && $eid!="") { echo "Edit New Lecture"; } else { echo "Add New Lecture"; } ?></a></li>
        </ul>
        
      	</div>



<!--New Lecture Add Form-->
<center>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 offset-md-3 tab_s_form">
            <table align="center" width="50%" border="2" bordercolor="#009688">
            	<tr>
                	<td class="s_hading_bg">
                    	<h2 align="center" class="s_hading"><?php if($eid==$eid && $eid!="") { echo "Edit New Lecture"; } else { echo "Add New Lecture"; } ?></h2>
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

                                <input type="text" name="l_id" placeholder=" Lecture ID " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lid']; } ?>">  <br>
                        	
                            	<select class="department" name="lac_name" required> 
                                    <optgroup label="Lecturer Name">
                                        <?php 
                                        $selectQueryl = "SELECT * FROM lecturer_table WHERE lc_status=1";
                                        $runQueryl = $conn->query($selectQueryl);
                                        while($rowl=mysqli_fetch_array($runQueryl)){
                                        ?>
                                        <option value="<?php echo $rowl['lc_code']; ?>" <?php if($rowl['lc_code']==$row['lc_code']){ ?> selected="selected" <?php } ?>><?php echo $rowl['lc_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </optgroup>
                                </select> <br>

                                <input type="date" name="l_date" placeholder=" Date " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['ldate']; }?>">  <br>
                                
                                <input type="text" name="s_stime" placeholder=" Lecture Start Time " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lstart_time']; }?>">  <br>

                                <input type="text" name="s_etime" placeholder=" Lecture End Time " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lend_time']; }?>">  <br>
                                
                                <input type="text" name="lc_description" placeholder=" Description " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['ldescription']; }?>">  <br>

                            	<select class="department" name="sb_code" required>
                                	<optgroup label="Subject Type">
                                            <?php
                                        $selectQuery = "SELECT * FROM subject_table WHERE sbstatus=1";
                                        $runQuery = $conn->query($selectQuery);
                                        while($rows=mysqli_fetch_array($runQuery)){
                                        ?>
                                        <option value="<?php echo $rows['sbcode']; ?>" <?php if($rows['sbcode']==$row['sbcode']){ ?> selected="selected" <?php } ?>><?php echo $rows['sbname']; ?></option>
                                        <?php
                                        }
                                        ?>			
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
</center>

<!---------------------------------------------------------------------------------------------------->    
    
        <?php
			require_once ('inc/footer.php');
		?>
    
  </body>
</html>