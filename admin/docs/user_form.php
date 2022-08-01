<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/user_form.css">
        <link rel="stylesheet" type="text/css" href="assets/css/user_form2.css">
  	</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>


<?php

$sucessMsg="";

	if(isset($_POST['submit']))
	{
		$username=$_POST['u_name'];
    	$password=$_POST['u_pass'];
    	$u_con_pass=$_POST['u_con_pass'];
		$email=$_POST['u_email'];
    	$usertype=$_POST['user_type'];
    	$status=$_POST['status'];
	    $error_no=0;
		$error_uname="";

    if($password!==$u_con_pass)
    {


          echo "Confirm password did not matched with password";
          $error_no++;
    }
	//username validation
	$sqlUnameValidation="SELECT * FROM user_table WHERE user_login='".$username."'";
	$resultUnameValidation=mysqli_query($conn,$sqlUnameValidation);
	$countUname=mysqli_num_rows($resultUnameValidation);

	if($username == "")
		{
			$error_uname ="User Name Cannot be Null..!";
			$error_no++;
		}

	else if (!preg_match("/^[a-zA-Z ]*$/",$username))
		{
			$error_uname = "Only letters and white space allowed"; 
			$error_no++;
		}

	else
		{
			if($countUname > 0)
			{
				$error_uname ="User Name Already Exists.!";
				$error_no++;
			}
		}
		
    if(!$error_no)
    {


		 $sql="INSERT INTO `user_table`(`user_login`, `user_pass`, `user_email`, `user_type`, `status`) VALUES ('".$username."','".md5($password)."','".$email."','".$usertype."','1')";
		
			if($conn->query($sql))
				{
          	$sucessMsg =  "Data Successfully Added!";
			}
		  else
			{
				$sucessMsg =  "Data Added Failed!";
			


          $selectQuery = "SELECT * FROM user_table WHERE status=1 AND uid='".$eid."'";
          $runQuery = $conn->query($selectQuery);
          $row=mysqli_fetch_array($runQuery);  
				}
    }
	}

?>

  
    <!--Dashbord banner-->
    <main class="app-content">
        			<div class="app-title">
        <div class="system_full_name">
          <h1><i class="fa fa-user-plus">
          	</i><?php if($eid==$eid && $eid!="") { echo "Edit New User"; } else { echo "Add New User"; } ?></h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Settings</a></li>
          <li class="breadcrumb-item"><a href="#"><?php if($eid==$eid && $eid!="") { echo "Edit New User"; } else { echo "Add New User"; } ?></a></li>
        </ul>
        
      	</div>
      
<!------------------------------------------------------------------------------------------------->      
<!--New Lacture Add Form-->
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
                        	
                            	<input type="text" name="u_name" placeholder=" User Name " class="name" required>	<br>
                                <?php echo $error_uname;  ?>
                            
                            	<input type="password" name="u_pass" placeholder=" Password " class="name" required> <br>
                                
                                <input type="password" name="u_con_pass" placeholder=" Confirm Password " class="name" required> <br>
                                
                                <input type="email" name="u_email" placeholder=" Email " class="name" required> <br>
                                
                            	<select class="department" name="user_type">
                                	<optgroup label="User Type">
                  									<option value="admin"> Admin </option>
                  									<option value="lacturer"> Lacturer </option>
                                    <option value="clark"> Clark </option>
  									             </optgroup>
                              </select> <br>
                                
                                <input type="file" name="u_img" class="name_img"> <br>
                                
                            <center>
                            	<p align="center">
                        			<font color="#009688" size="+1">
										<?php //echo $sucessMsg; ?>
                            		</font>
                        		</p>
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

<!------------------------------------------------------------------------------------------------>    
    
        <?php
			require_once ('inc/footer.php');
		?>
    
  </body>
</html>