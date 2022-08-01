<head>
    	<link rel="stylesheet" type="text/css" href="assets/css/lacture_data_table.css">
        <link rel="stylesheet" type="text/css" href="assets/data_table/datatables.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/button_all.css">
  	</head>

	<?php
		require_once ('inc/header.php'); 
    ?>

    <?php   
       $did = $_GET['did']; 
 
        if(isset($did) && $did!="")
        {
            $deleteQuery = "UPDATE lecture_table SET lstatus='0' WHERE lid='".$did."'";
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
    
        
    <!--Dashbord banner-->
    <main class="app-content">
      	    <div class="app-title">
        <div class="system_full_name">
          <h1><i class="app-menu__icon glyphicon glyphicon-th-list">
          	</i> All Lecture List</h1>
          	<p>ATI Tangalle Attendance & Result System</p>
        </div>

        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lecture</a></li>
          <li class="breadcrumb-"><a href="#">Lecture List</a></li>
        </ul>
        
      	</div>
      
<!------------------------------------------------------------------------------------------------>

<!--Student Table-->

<div class="container-fluid">
	<div class="row">
            <div>
                <?php echo $sucessMsg; ?> 
            </div> 
		<div class="col-md-12 well">

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Lecture ID</th>
                <th>Lecture Name</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Time</th>
                <th>Edit / Delete</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $selectQuery = "SELECT * FROM lecture_table WHERE lstatus=1";
                $runQuery = $conn->query($selectQuery);
                while($row=mysqli_fetch_array($runQuery)){
                    //get lecture
                    $selectQueryLcode = "SELECT * FROM lecturer_table WHERE lc_status=1 AND lc_code='".$row['lc_code']."'";
                    $runQueryLcode = $conn->query($selectQueryLcode);
                    $rowLcode=mysqli_fetch_array($runQueryLcode);
                    //get subject
                    $selectQueryScode = "SELECT * FROM subject_table WHERE sbstatus=1 AND sbcode='".$row['sbcode']."'";
                    $runQueryScode = $conn->query($selectQueryScode);
                    $rowScode=mysqli_fetch_array($runQueryScode);
            ?>

            <tr>
                <td><?php echo $row['lid']; ?></td>
                <td><?php echo $rowLcode['lc_name']; ?></td>
                <td><?php echo $rowScode['sbname']; ?></th>
                <td><?php echo $row['ldate']; ?></td>
                <td><?php echo $row['lstart_time']; ?>-<?php echo $row['lend_time']; ?></td>
                <td align="center"> 
                        <a class="btn_t" href="lecture_form.php?eid=<?php echo $row['lid']; ?>">
                        <button class="e_or_d_1">Edit</button></a>
                    
                    
                        <a class="btn_t" href="lecture_data_table.php?did=<?php echo $row['lid'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                        <button class="e_or_d_2">Delete</button></a>
                </td>
            </tr>
            
            <?php
        }
            ?>
               
        </tbody>
    
    </table>

		</div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------->    
    
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