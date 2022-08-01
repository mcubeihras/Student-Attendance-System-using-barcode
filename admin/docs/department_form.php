<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/department_form1.css">
        <link rel="stylesheet" type="text/css" href="assets/css/department_form2.css">
  	</head>
  
    <?php
		require_once ('inc/header.php'); 
	?>
    
	<?php
 $eid = $_GET['eid'];
$sucessMsg="";

  if(isset($_POST['submit']))
  {
    
    $D_code=$_POST['d_code'];
    $D_name=$_POST['d_name'];
    $D_des=$_POST['d_description'];
    
        if(isset($eid) && $eid!="")
            {
                $sql = "UPDATE department_table SET dname='".$D_name."',ddescription='".$D_des."' WHERE dcode='".$eid."' ";
            }
        else
            {
                $sql="INSERT INTO department_table (dcode,dname,ddescription,dstatus) 
                    VALUES ('".$D_code."','".$D_name."','".$D_des."','1')";
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
        $selectQuery = "SELECT * FROM department_table WHERE dstatus=1 AND dcode='".$eid."'";
        $runQuery = $conn->query($selectQuery);
        $row=mysqli_fetch_array($runQuery);
    }
?>

<!--Dashbord banner-->
    <main class="app-content">
      		<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon fa fa-plus-square">
          	</i> <?php if($eid==$eid && $eid!="") { echo "Edit New Department"; } else { echo "Add New Department"; } ?> </h1>
          	<p><?php if($eid==$eid && $eid!="") { echo "Edit New Department"; } else { echo "Add New Department"; } ?></p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Department</a></li>
          <li class="breadcrumb-item"><a href="#"><?php if($eid==$eid && $eid!="") { echo "Edit New Department"; } else { echo "Add New Department"; } ?></a></li>
        </ul>
        
    </div>

<!--------------------------------------------------------------------------------------------------->

<!--New Department Add Form-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 offset-md-3 tab_s_form">
            <table align="center" width="50%" border="2" bordercolor="#009688">
              <tr>
                  <td class="s_hading_bg">
                      <h2 align="center" class="s_hading"><?php if($eid==$eid && $eid!="") { echo "Edit New Department"; } else { echo "Add New Department"; } ?></h2>
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
                        
                          <input type="text" name="d_code" placeholder=" Department Code " class="name" <?php if(isset($eid) && $eid!="") { ?> readonly <?php } ?> required value="<?php if(isset($eid) && $eid!=""){ echo $row['dcode']; }?>"> <br>
                          
                              <input type="text" name="d_name" placeholder=" Department Name " class="name" required value="<?php if(isset($eid) && $eid!=""){ echo $row['dname']; }?>"> <br>
                                
                              <textarea name="d_description" placeholder=" Description " class="t_name"><?php if(isset($eid) && $eid!=""){ echo $row['ddescription']; }?></textarea> <br>
                                
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

<!---------------------------------------------------------------------------------------------->    
    
    
        <?php
			require_once ('inc/footer.php');
		?>
        
  </body>
</html>