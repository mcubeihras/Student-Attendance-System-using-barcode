<head>
        <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/attendence_table.css">
  	</head>

	<?php
		require_once ('inc/header.php'); 
	?>
    
        
    <!--Dashbord banner-->
    <main class="app-content">
      	<div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon glyphicon glyphicon-th-list">
          	</i> All Attendances List</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Attendence</a></li>
          <li class="breadcrumb-"><a href="#">Attendence List</a></li>
        </ul>
        
      	</div>
        
<!----------------------------------------------------------------------------------------------------->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 well">

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Index Number</th>
                <th>Subject ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
			
            $selectQueryA = "SELECT * FROM student_table WHERE st_index_number NOT IN ( SELECT st_index_number FROM attandance_table )";
            $runQueryA = $conn->query($selectQueryA);
            while($rowA=mysqli_fetch_assoc($runQueryA)){
			   $sql="INSERT INTO attandance_table (st_index_number,sub_code,lec_code,cur_date,cur_time,attandance,status,dcode,cid) VALUES
						 ('".$rowA['st_index_number']."','0','0','0','0','absent','1','0','0')";
            	$conn->query($sql);
				
			 }?>
            <?php 
					$selectQueryB = "SELECT * FROM attandance_table WHERE attandance='absent'";
					$runQueryB = $conn->query($selectQueryB);
					while($rowB=mysqli_fetch_array($runQueryB)){
						$selectQueryS = "SELECT st_name FROM student_table WHERE st_status=1 AND st_index_number='".$rowB['st_index_number']."'";
						$runQueryS = $conn->query($selectQueryS);
						$rowS=mysqli_fetch_array($runQueryS);
            ?>
            <tr>
            	<td><?php echo $rowS['st_name']; ?></td>
                <td><?php echo $rowB['st_index_number']; ?></td>
                <td><?php echo $rowB['cid']; ?></td>
                <td><?php echo $rowB['cur_date']; ?></td>
                <td><?php echo $rowB['cur_time']; ?></td>
                <td><?php echo "Absent" ?></td>
            </tr>
            <?php
			}
            ?>
        </tbody>
        
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    
    </table>

		</div>
    </div>
</div>


<!------------------------------------------------------------------------------------------------------>

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