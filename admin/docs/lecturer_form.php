<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/lecturer_form.css">
  	</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>
  
      
<!----------------------------------------------------------------------------------------------------->  

<?php
 $eid = $_GET['eid'];
$sucessMsg="";

	if(isset($_POST['submit']))
	{
        $L_code=$_POST['lac_code'];
		$L_name=$_POST['name'];
		$L_des=$_POST['Description'];
		$L_email=$_POST['lac_email'];
		$L_type=$_POST['lac_type'];
		
        if(isset($eid) && $eid!="")
            {

                $sql = "UPDATE lecturer_table SET lc_name='".$L_name."',lc_description='".$L_des."',lc_email='".$L_email."',lc_type='".$L_type."' WHERE lc_code='".$eid."' ";
            }
        else
            {
            $sql="INSERT INTO lecturer_table (lc_code,lc_name,lc_description,lc_email,lc_type,lc_status)VALUES ('".$L_code."','".$L_name."','".$L_des."','".$L_email."','".$L_type."','1')";
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
        $selectQuery = "SELECT * FROM lecturer_table WHERE lc_status=1 AND lc_code='".$eid."'";
        $runQuery = $conn->query($selectQuery);
        $row=mysqli_fetch_array($runQuery);
    }
?>

    <!--Dashbord banner-->
    <main class="app-content">
        	
<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon fa fa-plus-square">
          	</i><?php if($eid==$eid && $eid!="") { echo "Edit New Lecturer"; } else { echo "Add New Lecturer"; } ?></h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lecturer</a></li>
          <li class="breadcrumb-item"><a href="#"><?php if($eid==$eid && $eid!="") { echo "Edit New Lecturer"; } else { echo "Add New Lecturer"; } ?></a></li>
        </ul>
        
      	</div>


<!--New Lacture Add Form-->
<center>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 offset-md-3 tab_s_form">
            <table align="center" width="50%" border="2" bordercolor="#009688">
            	<tr>
                	<td class="s_hading_bg">
                    	<h2 align="center" class="s_hading"><?php if($eid==$eid && $eid!="") { echo "Edit New Lecturer"; } else { echo "Add New Lecturer"; } ?></h2>
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

                                <input type="text" name="lac_code" placeholder=" Lecturer Code " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lc_code']; } ?>">  <br>
                        	
                            	<input type="text" name="name" placeholder=" Lecturer Name " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lc_name']; } ?>">	<br>
    
                                
                                <input type="email" name="lac_email" placeholder=" Lecturer Email " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lc_email']; } ?>">	<br>

                                <input type="text" name="Description" placeholder=" Description " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['lc_description']; } ?>"> <br>
                                
                            	<select class="department" name="lac_type">
                                	<optgroup label="Lac Type">
                                                                        <option value="P" <?php if($row['lc_type']=="P"){ ?> selected="selected" <?php } ?>> Permanent Lecture </option>
    									<option value="V" <?php if($row['lc_type']=="V"){ ?> selected="selected" <?php } ?>> Visiting Lecture </option>
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

<!------------------------------------------------------------------------------------------------------>    
    
        <?php
			require_once ('inc/footer.php');
		?>
    
  </body>
</html>