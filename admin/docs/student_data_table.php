<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/student_data_table.css">
        <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css">
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
          	</i> All Student List</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Student</a></li>
          <li class="breadcrumb-"><a href="#">Student List</a></li>
        </ul>
        
      	</div>
    
    <?php
       //$sucessMsg"";    
       $did = $_GET['did']; 
 
        if(isset($did) && $did!="")
        {

            $deleteQuery = "UPDATE student_table SET st_status='0' WHERE st_index_number='".$did."'";
            if($conn->query($deleteQuery))
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

<!--Student Table-->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 well">
<div>
                <?php echo $sucessMsg; ?> 
            </div> 
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Index Number</th>
                <th>Email ID</th>
                <th>Phone Number</th>
                <th>Department</th>
                <th>Edit / Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $selectQuery = "SELECT * FROM student_table WHERE st_status=1";
                $runQuery = $conn->query($selectQuery);
                while($row=mysqli_fetch_array($runQuery))
                    {
                	$selectQueryD = "SELECT * FROM course_table WHERE cstatus=1 AND cid='".$row['cid']."'";
            		$runQueryD = $conn->query($selectQueryD);
            		$rowD=mysqli_fetch_array($runQueryD);
        
            ?>
            <tr>
                <td><?php echo $row['st_name']; ?></td>
                <td><?php echo $row['st_index_number']; ?></td>
                <td><?php echo $row['st_email']; ?></th>
                <td><?php echo $row['st_phone_no']; ?></td>
                <td><?php echo $rowD['cname']; ?></td>
                
                <td align="center"> 

                        <a class="btn_t" href="student_form.php?eid=<?php echo $row['st_index_number']; ?>">
                        <button class="e_or_d_1">Edit</button></a>

                        <a class="btn_t" href="student_data_table.php?did=<?php echo $row['st_index_number'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                        <button class="e_or_d_2">Delete</button></a>

                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

        </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------------------->    
    
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