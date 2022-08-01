<!DOCTYPE html>
<html lang="en">
	
    <head>
    	<link rel="stylesheet" type="text/css" href="assets/css/dashboards.css">
    </head>

    <?php
   // session_start();
		require_once ('inc/header.php'); 
	?>
    
    <!--Dashbord banner-->
    <main class="app-content">
      <div class="app-title">												
        <div class="system_full_name">
          <h1><i class="fa fa-dashboard">
          	</i> Dashboard</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      	</div>																						
      
<!----------------------------------------------------------------------------------------------------->      

<!--3 department today attendense show-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 well table-one">
        	<table border="1" align="center" width="100%" height="110px" bordercolor="#000000">
            	<tr>
                	<td rowspan="3" align="center" width="30%" bgcolor="#009688" colspan="2"> 
                    <i class="icon fa fa-users fa-3x"></i></td>
                	<td align="center" height="34px" bgcolor="#009688"><font size="+2" color="#660000"><b>HNDA</b></font></td>
                </tr>
                <tr>
                	<td bgcolor="#FFFFFF">&nbsp; &nbsp; <b>Total Students:</b></td>
                </tr>
                <tr>
                	<td bgcolor="#FFFFFF">&nbsp; &nbsp; <b>Today Present Students:</b> </td>
                </tr>
            </table>
        </div>
        
        <div class="col-md-4 well table-two">
        	<table border="1" align="center" width="100%" height="110px" bordercolor="#000000">
            	<tr>
                	<td rowspan="3" align="center" width="30%" bgcolor="#ffc107"> 
                    <i class="icon fa fa-users fa-3x"></i></td>
                	<td align="center" height="34px" bgcolor="#ffc107"><font size="+2" color="#660000"><b>HNDIT</b></font></td>
                </tr>
                <tr>
                	<td bgcolor="#FFFFFF">&nbsp; &nbsp; <b>Total Students: </b> </td>
                </tr>
                <tr>
                	<td bgcolor="#FFFFFF">&nbsp; &nbsp; <b>Today Present Students:</b> </td>
                </tr>
            </table>
        </div>
        
        <div class="col-md-4 well table-three">
        	<table border="1" align="center" width="100%" height="110px" bordercolor="#000000">
            	<tr>
                	<td rowspan="3" align="center" width="30%" bgcolor="#17a2b8"> 
                    <i class="icon fa fa-users fa-3x"></i></td>
                	<td align="center" height="34px" bgcolor="#17a2b8"><font size="+2" color="660000"><b>HNDE</b></font></td>
                </tr>
                <tr>
                	<td bgcolor="#FFFFFF">&nbsp; &nbsp; <b>Total Students:
                    	<?php
						  //select all admin for table
						  $selectQueryCatW = "SELECT * FROM attandance_table WHERE dcode='4'";
						  $runQueryCatW = $conn->query($selectQueryCatW);
						  $rowcount_CatW=mysqli_num_rows($runQueryCatW);
						  echo "(".$rowcount_CatW.")"; 
						 ?>
                    </b> </td>
                </tr>
                <tr>
                	<td bgcolor="#FFFFFF">&nbsp; &nbsp; <b>Today Present Students:</b>
                     <?php
						  //select all admin for table
						  $selectQueryCatW = "SELECT * FROM attandance_table WHERE dcode='4' AND status='1'";
						  $runQueryCatW = $conn->query($selectQueryCatW);
						  $rowcount_CatW=mysqli_num_rows($runQueryCatW);
						  echo "(".$rowcount_CatW.")"; 
						 ?>
                     </td>
                </tr>
            </table>
        </div>
	</div>
</div>
<!------------------------------------------------------------------------------------------------------>    
	
    <?php
		require_once ('inc/footer.php');
	?>

  </body>
</html>