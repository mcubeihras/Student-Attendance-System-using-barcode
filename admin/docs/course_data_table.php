<head>
        <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/departments_data_table.css">
        <link rel="stylesheet" type="text/css" href="assets/css/button_all.css">
  	</head>

	<?php
		require_once ('inc/header.php'); 
	?>
    
        
    <!--Dashbord banner-->
    <main class="app-content">
      	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon glyphicon glyphicon-th-list">
          	</i> All Course List</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Course</a></li>
          <li class="breadcrumb-"><a href="#">Course List</a></li>
        </ul>
        
      	</div>

        <?php
       $sucessMsg="";   
       $did = $_GET['did']; //delete id
 
        if(isset($did) && $did!="")
        {
            $deleteQuery = "UPDATE course_table SET cstatus='0' WHERE cid='".$did."'";
            if($conn->query($deleteQuery))
                {
                    $sucessMsg = "Data Sucsessfully Deleted";
                }
            else
                {
                    $sucessMsg = "Delete Data Failed";
                }   
        }
    ?>
      
<!------------------------------------------------------------------------------------------------------->

<!-------Department Table------------->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 well">

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Course Description</th>
                <th>Department</th>
                <th class="btn_header">Edit / Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selectQuery = "SELECT * FROM course_table WHERE cstatus=1";
            $runQuery = $conn->query($selectQuery);
            while($row=mysqli_fetch_array($runQuery)){
                //select department name from dcode
                $selectQueryDep = "SELECT dname FROM department_table WHERE dstatus=1 AND dcode='".$row['dcode']."'";
                $runQueryDep = $conn->query($selectQueryDep);
                $rowDep=mysqli_fetch_array($runQueryDep);  
        ?>
            <tr>
                <td><?php echo $row['cid']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['cdescription']; ?></td>
                <td><?php echo $rowDep['dname']; ?></td>
                <td align="center">
                	
                    
                        <a class="btn_t" href="course_form.php?eid=<?php echo $row['cid']; ?>">
                        <button class="e_or_d_1">Edit</button></a>
                   
                    
                  
                        <a class="btn_t" href="course_data_table.php?did=<?php echo $row['cid'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                        <button class="e_or_d_2">Delete</button></a>
                  

                </td>
            </tr>
            

            <?php
        }
            ?>
            
            <tr>
            	<td><p><?php echo $sucessMsg; ?></p></td>
            </tr>
        </tbody>
    
    </table>

		</div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------------->    
    
    <?php
		require_once ('inc/footer.php');
	?>

      
	<!-- Datatable jquery Link-->
    <script type="text/x-javascript" src="assets/data_table/datatables.min.js"></script>
	 
	 <!-- Datatable Function-->
	 <script>
		$(document).ready( function () {
    		$('#example').DataTable();
		} );
	 </script>
       
  </body>
</html>