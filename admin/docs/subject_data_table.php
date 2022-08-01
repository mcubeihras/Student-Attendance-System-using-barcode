<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/subject_data_table.css">
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
          	</i> All Subject List</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Subject</a></li>
          <li class="breadcrumb-"><a href="#">Subject List</a></li>
        </ul>
        
      	</div>

         <?php
       $sucessMsg="";   
       $did = $_GET['did']; //delete id
 
        if(isset($did) && $did!="")
        {
            $deleteQuery = "UPDATE subject_table SET sbstatus='0' WHERE sbcode='".$did."'";
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
      
<!--------------------------------------------------------------------------------------------------------->

<!-------Student Table------------->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 well">

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sub Code</th>
                <th>Sub Name</th>
                <th>Credit</th>
                <th>Description</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Edit / Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $selectQuery = "SELECT * FROM subject_table WHERE sbstatus=1";
            $runQuery = $conn->query($selectQuery);
            while($row=mysqli_fetch_array($runQuery)){
                //get course name from course code
                $selectQueryC = "SELECT cname FROM course_table WHERE cstatus=1 AND cid='".$row['cid']."'";
                $runQueryC = $conn->query($selectQueryC);
                $rowC=mysqli_fetch_array($runQueryC);
        ?>

            <tr>
                <td><?php echo $row['sbcode']; ?></td>
                <td><?php echo $row['sbname']; ?></td>
                <td><?php echo $row['sbcredit']; ?></td>
                <td><?php echo $row['sbdescription']; ?></td>
                <td><?php echo $row['sbsemester']; ?></td>
                <td><?php echo $rowC['cname']; ?></td>
                <td align="center"> 
                    
                    
                        <a class="btn_t" href="subject_form.php?eid=<?php echo $row['sbcode']; ?>">
                        <button class="e_or_d_1">Edit</button></a>
                  
                    
                    
                        <a class="btn_t" href="subject_data_table.php?did=<?php echo $row['sbcode'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                        <button class="e_or_d_2">Delete</button></a>
                  
                </td>
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
                <th></th>
            </tr>
        </tfoot>
    
    </table>

        </div>
    </div>
</div>
<!----------------------------------------------------------------------------------------------------->    
    
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